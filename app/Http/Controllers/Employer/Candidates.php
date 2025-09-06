<?php

namespace App\Http\Controllers\Employer;
use App\Http\Controllers\Employer\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Users_model;
use App\Models\CandidateResumeData_model;
use App\Models\Profile_model;
use App\Models\shortlistCandidates_model;
use App\Models\Package_model;
use App\Models\purchasedCandidates_model;
use App\Models\FeaturedCandidate_model;
use App\Models\Notification_model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Candidates extends Controller
{
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }

    public function loadMore(Request $request){

        if ($this->USERID > 0) {

            $userId = $this->USERID;
            $page = $request->input('page', 1);
            $skills = $request->input('skills', []);

            // Get featured candidates ONLY on first page
            $featuredCandidates = collect();
            $excludedCandidateIds = [];

            if ($page == 1) {
                $featuredCandidates = CandidateResumeData_model::select(
                        'customers.id as profile_id',
                        'customers.fname',
                        'customers.lname',
                        'candidateResumeData.id as resume_id',
                        'candidateResumeData.candidateId',
                        'candidateResumeData.profSummary',
                        'candidateResumeData.skills'
                    )
                    ->join('customers', 'candidateResumeData.candidateId', '=', 'customers.id')
                    ->join('featuredcandidate', 'candidateResumeData.candidateId', '=', 'featuredcandidate.userId')
                    ->where('candidateResumeData.submit', 1)
                    ->where('featuredcandidate.active', 1)
                    ->where('featuredcandidate.expired', 0)
                    ->where('customers.active', 1)
                    ->where('customers.verified', 1)
                    ->inRandomOrder()
                    ->limit(6)
                    ->get();

                if(!empty($featuredCandidates)){
                    // Apply flags to featured
                    foreach ($featuredCandidates as &$candidate) {
                        $candidate->is_featured = 1;

                        $shortlist = shortlistCandidates_model::where("recruiterId", $userId)
                            ->where("candidateId", $candidate->candidateId)
                            ->exists();

                        $purchased = purchasedCandidates_model::where("recruiterId", $userId)
                            ->where("candidateId", $candidate->candidateId)
                            ->exists();

                        $candidate->shortlist = $shortlist ? 1 : 0;
                        $candidate->purchased = $purchased ? 1 : 0;
                    }
                }
                // Get list of featured IDs to exclude from regular list
                $excludedCandidateIds = $featuredCandidates->pluck('candidateId')->toArray();
            }

            // Build main query for regular candidates
            $query = CandidateResumeData_model::select(
                    'customers.id as profile_id',
                    'customers.fname',
                    'customers.lname',
                    'candidateResumeData.id as resume_id',
                    'candidateResumeData.candidateId',
                    'candidateResumeData.profSummary',
                    'candidateResumeData.skills'
                )
                ->where('candidateResumeData.submit', 1)
                ->where('customers.active', 1)
                ->where('customers.verified', 1)
                ->join('customers', 'candidateResumeData.candidateId', '=', 'customers.id');

            if (!empty($skills)) {
                $query->where(function ($q) use ($skills) {
                    foreach ($skills as $skill) {
                        $q->orWhere('candidateResumeData.skills', 'LIKE', "%$skill%");
                    }
                });
            }

            // Exclude featured candidates if present
            if (!empty($excludedCandidateIds)) {
                $query->whereNotIn('candidateResumeData.candidateId', $excludedCandidateIds);
            }

            $candidates = $query->paginate(10, ['*'], 'page', $page);

            if(!empty($candidates)){
                foreach ($candidates as &$candidate) {
                    $candidate->is_featured = false;
    
                    $shortlist = shortlistCandidates_model::where("recruiterId", $userId)
                        ->where("candidateId", $candidate->candidateId)
                        ->exists();
    
                    $purchased = purchasedCandidates_model::where("recruiterId", $userId)
                        ->where("candidateId", $candidate->candidateId)
                        ->exists();
    
                    $candidate->shortlist = $shortlist ? 1 : 0;
                    $candidate->purchased = $purchased ? 1 : 0;
                }
            }
            
            // Render partial blade with both featured and regular candidates
            return view('employer.partials.candidate-list', [
                'featured_candidates' => $featuredCandidates,
                'candidates' => $candidates,
                'page' => $page
            ])->render();
        }
    }


    public function candidates(Request $request)
    {
        if ($this->USERID <= 0) {
            return Redirect::to(url('/'));
        }

        $userId = $this->USERID;

        $page = $request->input('page', 1);
        $skills = $request->input('skills', []); // optional filter from form
        
        if (is_string($skills)) {
            $skills = array_filter(array_map('trim', explode(',', $skills)));
        }

        
        // 1. Fetch 6 random active & non-expired featured candidates
        $featuredCandidates = CandidateResumeData_model::select(
                'customers.id as profile_id',
                'customers.fname',
                'customers.lname',
                'candidateResumeData.id as resume_id',
                'candidateResumeData.candidateId',
                'candidateResumeData.profSummary',
                'candidateResumeData.skills'
            )
            ->join('customers', 'candidateResumeData.candidateId', '=', 'customers.id')
            ->join('featuredcandidate', 'candidateResumeData.candidateId', '=', 'featuredcandidate.userId')
            ->where('candidateResumeData.submit', 1)
            ->where('featuredcandidate.active', 1)
            ->where('featuredcandidate.expired', 0)
            ->where('customers.active', 1)
            ->where('customers.verified', 1)
            ->inRandomOrder()
            ->limit(6)
            ->get();

        // Add status flags to featured candidates
        $featuredCandidates->transform(function ($candidate) use ($userId) {
            $candidate->is_featured = 1;

            $candidate->shortlist = shortlistCandidates_model::where("recruiterId", $userId)
                ->where("candidateId", $candidate->candidateId)
                ->exists() ? 1 : 0;

            $candidate->purchased = purchasedCandidates_model::where("recruiterId", $userId)
                ->where("candidateId", $candidate->candidateId)
                ->exists() ? 1 : 0;

            return $candidate;
        });

        // 2. Fetch paginated non-featured candidates
        $nonFeaturedQuery = CandidateResumeData_model::select(
                'customers.id as profile_id',
                'customers.fname',
                'customers.lname',
                'candidateResumeData.id as resume_id',
                'candidateResumeData.candidateId',
                'candidateResumeData.profSummary',
                'candidateResumeData.skills'
            )
            ->join('customers', 'candidateResumeData.candidateId', '=', 'customers.id')
            ->where('candidateResumeData.submit', 1)
            ->where('customers.active', 1)
            ->where('customers.verified', 1);

        // Exclude featured candidate IDs
        if ($featuredCandidates->isNotEmpty()) {
            $nonFeaturedQuery->whereNotIn('candidateResumeData.candidateId', $featuredCandidates->pluck('candidateId'));
        }

        // Filter by skills if provided
        if (!empty($skills)) {
            $nonFeaturedQuery->where(function ($query) use ($skills) {
                foreach ($skills as $skill) {
                    $query->orWhere('candidateResumeData.skills', 'LIKE', '%' . $skill . '%');
                }
            });
        }

        $candidates = $nonFeaturedQuery->paginate(10, ['*'], 'page', $page);

        // Add status flags to paginated candidates
        $candidates->getCollection()->transform(function ($candidate) use ($userId) {
            $candidate->is_featured = 0;

            $candidate->shortlist = shortlistCandidates_model::where("recruiterId", $userId)
                ->where("candidateId", $candidate->candidateId)
                ->exists() ? 1 : 0;

            $candidate->purchased = purchasedCandidates_model::where("recruiterId", $userId)
                ->where("candidateId", $candidate->candidateId)
                ->exists() ? 1 : 0;

            return $candidate;
        });

        // 3. Return view with data
        return view("employer.candidates", [
            'pageTitle' => 'Candidates',
            'candidates' => $candidates,
            'featured_candidates' => $featuredCandidates
        ]);
    }


    public function candidates_1sep2025(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID;
    
            // 1. Fetch 6 random active & non-expired featured candidates
            $featuredCandidates = CandidateResumeData_model::select(
                    'customers.id as profile_id',
                    'customers.fname',
                    'customers.lname',
                    'candidateResumeData.id as resume_id',
                    'candidateResumeData.candidateId',
                    'candidateResumeData.profSummary',
                    'candidateResumeData.skills'
                )
                ->join('customers', 'candidateResumeData.candidateId', '=', 'customers.id')
                ->join('featuredcandidate', 'candidateResumeData.candidateId', '=', 'featuredcandidate.userId')
                ->where('candidateResumeData.submit', 1)
                ->where('featuredcandidate.active', 1)
                ->where('featuredcandidate.expired', 0)
                ->where('customers.active', 1)
                ->where('customers.verified', 1)
                ->inRandomOrder()
                ->limit(6)
                ->get();
    
            if($featuredCandidates){
                // 2. Mark featured candidates with status flags
                foreach ($featuredCandidates as &$candidate) {
                    $candidate->is_featured = 1;
        
                    $shortlist = shortlistCandidates_model::where("recruiterId", $userId)
                        ->where("candidateId", $candidate->candidateId)
                        ->exists();
        
                    $purchased = purchasedCandidates_model::where("recruiterId", $userId)
                        ->where("candidateId", $candidate->candidateId)
                        ->exists();
        
                    $candidate->shortlist = $shortlist ? 1 : 0;
                    $candidate->purchased = $purchased ? 1 : 0;
                }
            }
            
    
            // 3. Fetch paginated non-featured candidates
            $candidates = CandidateResumeData_model::select(
                    'customers.id as profile_id',
                    'customers.fname',
                    'customers.lname',
                    'candidateResumeData.id as resume_id',
                    'candidateResumeData.candidateId',
                    'candidateResumeData.profSummary',
                    'candidateResumeData.skills'
                )
                ->where('customers.active', 1)
                ->where('customers.verified', 1)
                ->where('candidateResumeData.submit', 1)
                ->join('customers', 'candidateResumeData.candidateId', '=', 'customers.id')
                ->whereNotIn('candidateResumeData.candidateId', $featuredCandidates->pluck('candidateId'))
                ->paginate(10);
    
            foreach ($candidates as &$candidate) {
                $candidate->is_featured = false;
    
                $shortlist = shortlistCandidates_model::where("recruiterId", $userId)
                    ->where("candidateId", $candidate->candidateId)
                    ->exists();
    
                $purchased = purchasedCandidates_model::where("recruiterId", $userId)
                    ->where("candidateId", $candidate->candidateId)
                    ->exists();
    
                $candidate->shortlist = $shortlist ? 1 : 0;
                $candidate->purchased = $purchased ? 1 : 0;
            }
    
            // 4. Send data to view
            $data = array();
            $data["pageTitle"] = "Candidates";
            $data["candidates"] = $candidates;
            $data["featured_candidates"] = $featuredCandidates;
    
            return View("employer.candidates", $data);
    
        } else {
            return Redirect::to(url('/'));
        }
    }
    
    function candidate(int $id){

        if ($this->USERID > 0) {
            $userId = $this->USERID;

            $candidate = CandidateResumeData_model::select(
                'customers.id as profile_id',
                'customers.fname',
                'customers.lname',
                'customers.gender',
                'customers.dob',
                'customers.address_1',
                'customers.address_2',
                'customers.city',
                'customers.state',
                'customers.country',
                'customers.zipcode',
                'customers.email',
                'customers.phone',
                'candidateResumeData.id as resume_id',
                'candidateResumeData.candidateId',
                'candidateResumeData.profSummary',
                'candidateResumeData.workExperience',
                'candidateResumeData.skills',
                'candidateResumeData.languages',
                'candidateResumeData.degree',
                'candidateResumeData.certifications',
                'candidateResumeData.videolink'
            )
            ->where('candidateResumeData.submit', 1)
            ->where('candidateResumeData.candidateId', $id)
            ->join('customers', 'candidateResumeData.candidateId', '=', 'customers.id')
            ->first();

            /*$age = calculateAge($candidate->dob);
            $age = 0;
            $candidate->age = $age;
            */

                
            // Check if candidate is shortlisted by the recruiter
            $shortlist = shortlistCandidates_model::where("recruiterId", $userId)->where("candidateId", $candidate->candidateId)->count();

            $candidate->shortlist = $shortlist > 0 ? 1 : 0;

            // Check if candidate is purchased by the recruiter
            $purchased = purchasedCandidates_model::where("recruiterId", $userId)->where("candidateId", $candidate->candidateId)->count();

            $candidate->purchased = $purchased > 0 ? 1 : 0;    
            $candidate->purchased = 0;

            if($purchased <= 0){
                $candidate->email = '';
                $candidate->phone = '';
            }
             
            
            // mark notifications as read
            Notification_model::where("sender", $candidate->candidateId)->update(array("isRead" => 1));


            $data = [
                'pageTitle' => 'Candidate',
                'candidate' => $candidate
            ];
            //https://youtu.be/RDuT0Zm7SgA?si=iGo6-laHDcwbhGPc
            //echo "<pre>"; print_r($candidate); die;
            //dd($candidate);
            
            return view('employer.candidate', $data);

        } else {
            // Redirect to login
            return redirect()->to(url('/'));
        }
    }

    function bookmark(Request $request){
        //bookmark - unbookmark the candidate
        if($this->USERID > 0){
            $userId = $this->USERID;
            $candidateId = $request->input("candidateId");
            $flag = $request->input("flag");
            
            if($flag > 0){
                //add bookmark
                $bookmarkobj = new shortlistCandidates_model();
                $bookmarkobj->recruiterId = $userId;
                $bookmarkobj->candidateId = $candidateId;
                $bookmarkobj->save();

                // Create notifications
                $notfyId = db_randnumber();
                $createdDateTime = date("Y-m-d H:i:s");
                
                $notfyObj = array(
                    "id" => $notfyId,
                    "message" => "Your profile has caught a recruiter’s attention.",
                    "receiver" => $candidateId,
                    "sender" => $userId,
                    "dateTime" => $createdDateTime,
                    "isRead" => 0,
                    "type" => 'candidate',
                    "reference" => $candidateId
                );
                
                $this->createNotification($notfyObj);
                    
            }else{
                //remove bookmark
                shortlistCandidates_model::where("recruiterId", $userId)->where("candidateId", $candidateId)->delete();
            }



            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => ""
            );
        }else{
            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    }

    public function buy(Request $request){

        $postBackData = [];

        // Check if user is logged in
        if ($this->USERID > 0) {
            $userId = $this->USERID;
            $candidateId = $request->input("candidateId");
            
            // Get the user's current plan
            $currentPlan = Package_model::where("userId", $userId)->first();

            if ($currentPlan) {
                $isExpired = $currentPlan->expired;
                $limit = $currentPlan->candidatePurchaseLimit;
                $purchased = $currentPlan->candidatePurchased;
                
                if ($isExpired) {
                    // Plan expired
                    $response = [
                        "C" => 102,
                        "R" => $postBackData,
                        "M" => "Your current plan is expired. Please renew or buy a new plan."
                    ];
                } elseif ($purchased >= $limit) {
                    // Purchase limit reached
                    $response = [
                        "C" => 101,
                        "R" => $postBackData,
                        "M" => "Your candidate purchase limit has been exhausted."
                    ];
                } else {
                    // Candidate can be added to the user's list
                    $purchasedCandidateObj = new purchasedCandidates_model();
                    $purchasedCandidateObj->recruiterId = $userId;
                    $purchasedCandidateObj->candidateId = $candidateId;
                    $purchasedCandidateObj->save();

                    // update candidate purchased count
                    $newPurchased = $purchased + 1; 
                    $currentPlan = Package_model::where("userId", $userId)->update(array("candidatePurchased" => $newPurchased));

                    // Create notifications
                    $notfyId = db_randnumber();
                    $createdDateTime = date("Y-m-d H:i:s");
                    
                    $notfyObj = array(
                        "id" => $notfyId,
                        "message" => "A recruiter has expressed strong interest in your profile.",
                        "receiver" => $candidateId,
                        "sender" => $userId,
                        "dateTime" => $createdDateTime,
                        "isRead" => 0,
                        "type" => 'candidate',
                        "reference" => $candidateId
                    );
                    
                    $this->createNotification($notfyObj);

                    $response = [
                        "C" => 100,
                        "R" => $postBackData,
                        "M" => "Candidate has been added to your list."
                    ];
                }
            } else {
                // No plan found
                $response = [
                    "C" => 103,
                    "R" => $postBackData,
                    "M" => "You don't have an active plan. Please activate a plan to purchase candidates."
                ];
            }
        } else {
            // User not logged in or session expired
            $response = [
                "C" => 1004,
                "R" => $postBackData,
                "M" => "Session expired. Please log in again."
            ];
        }

        return response()->json($response);
    }


    function mybookmarks(Request $request){
        
        if($this->USERID > 0){
            
            $userId = $this->USERID;
            
            $bookmarkResult = shortlistCandidates_model::where("recruiterId", $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
            if($bookmarkResult->isNotEmpty()){
                $candidatesIdArr = array();
                foreach($bookmarkResult as $bookmarkRw){
                    $tmpCandidateId = $bookmarkRw->candidateId;
                    $candidatesIdArr[] = $tmpCandidateId;
                }
                
                $candidatesData = Users_model::select(
                    'customers.id as profile_id',
                    'customers.fname',
                    'customers.lname',
                    'candidateResumeData.id as resume_id',
                    'candidateResumeData.candidateId',
                    'candidateResumeData.profSummary',
                    'candidateResumeData.skills'
                )
                ->join('candidateResumeData', 'candidateResumeData.candidateId', '=', 'customers.id')
                ->where('customers.active', 1)
                ->where('customers.verified', 1)
                ->whereIn('customers.id', $candidatesIdArr)
                ->get();

                
                $idwiseData = array();
                foreach($candidatesData as $candidatesRw){
                    $idwiseData[$candidatesRw->profile_id] = $candidatesRw;
                }

                foreach($bookmarkResult as $k => &$bookmarkRww){
                    $tmpCandidateId = $bookmarkRw->candidateId;
                    
                    if(array_key_exists($tmpCandidateId, $idwiseData)){
                        $tmpCandData = $idwiseData[$tmpCandidateId];

                        $bookmarkRww->profile_id = $tmpCandData->profile_id;
                        $bookmarkRww->fname = $tmpCandData->fname;
                        $bookmarkRww->lname = $tmpCandData->lname;
                        $bookmarkRww->resume_id = $tmpCandData->resume_id;
                        $bookmarkRww->candidateId = $tmpCandData->candidateId;
                        $bookmarkRww->profSummary = $tmpCandData->profSummary;
                        $bookmarkRww->skills = $tmpCandData->skills;
                        $bookmarkRww->shortlist = 1;
                    }else{
                        unset($bookmarkResult[$k]);
                    }

                }

            }

            $data = array();
            $data["pageTitle"] = "My Bookmarks";
            $data["candidates"] = $bookmarkResult;
            
            return View("employer.mybookmarks",$data);

        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }

    function bookmarksLoadMore(Request $request){
        $page = $request->input('page', 1);
        $skills = $request->input('skills', []);
        
        $userId = $this->USERID;

        $bookmarkResult = shortlistCandidates_model::where("recruiterId", $userId)
        ->orderBy('created_at', 'desc')
        ->paginate(10, ['*'], 'page', $page);

        if($bookmarkResult->isNotEmpty()){
            $candidatesIdArr = array();
            foreach($bookmarkResult as $bookmarkRw){
                $tmpCandidateId = $bookmarkRw->candidateId;
                $candidatesIdArr[] = $tmpCandidateId;
            }
            
            $candidatesData = Users_model::select(
                'customers.id as profile_id',
                'customers.fname',
                'customers.lname',
                'candidateResumeData.id as resume_id',
                'candidateResumeData.candidateId',
                'candidateResumeData.profSummary',
                'candidateResumeData.skills'
            )
            ->join('candidateResumeData', 'candidateResumeData.candidateId', '=', 'customers.id')
            ->where('customers.active', 1)
            ->where('customers.verified', 1)
            ->whereIn('customers.id', $candidatesIdArr)
            ->get();

            
            $idwiseData = array();
            foreach($candidatesData as $candidatesRw){
                $idwiseData[$candidatesRw->profile_id] = $candidatesRw;
            }

            foreach($bookmarkResult as $k => &$bookmarkRww){
                $tmpCandidateId = $bookmarkRw->candidateId;
                
                if(array_key_exists($tmpCandidateId, $idwiseData)){
                    $tmpCandData = $idwiseData[$tmpCandidateId];

                    $bookmarkRww->profile_id = $tmpCandData->profile_id;
                    $bookmarkRww->fname = $tmpCandData->fname;
                    $bookmarkRww->lname = $tmpCandData->lname;
                    $bookmarkRww->resume_id = $tmpCandData->resume_id;
                    $bookmarkRww->candidateId = $tmpCandData->candidateId;
                    $bookmarkRww->profSummary = $tmpCandData->profSummary;
                    $bookmarkRww->skills = $tmpCandData->skills;
                    $bookmarkRww->shortlist = 1;
                }else{
                    unset($bookmarkResult[$k]);
                }

            }
        
        }
        
        $candidates = $bookmarkResult;
        return view('employer.partials.candidate-list', ['candidates' => $candidates, 'page' => $page])->render();

    }

    function mycandidates(Request $request){
        //purchased candidates
        if($this->USERID > 0){
            
            $userId = $this->USERID;
            
            $bookmarkResult = purchasedCandidates_model::where("recruiterId", $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

            if($bookmarkResult->isNotEmpty()){
                $candidatesIdArr = array();
                foreach($bookmarkResult as $bookmarkRw){
                    $tmpCandidateId = $bookmarkRw->candidateId;
                    $candidatesIdArr[] = $tmpCandidateId;
                }
                
                $candidatesData = Users_model::select(
                    'customers.id as profile_id',
                    'customers.fname',
                    'customers.lname',
                    'candidateResumeData.id as resume_id',
                    'candidateResumeData.candidateId',
                    'candidateResumeData.profSummary',
                    'candidateResumeData.skills'
                )
                ->join('candidateResumeData', 'candidateResumeData.candidateId', '=', 'customers.id')
                ->where('customers.active', 1)
                ->where('customers.verified', 1)
                ->whereIn('customers.id', $candidatesIdArr)
                ->get();

                
                $idwiseData = array();
                foreach($candidatesData as $candidatesRw){
                    $idwiseData[$candidatesRw->profile_id] = $candidatesRw;
                }

                foreach($bookmarkResult as $k => &$bookmarkRww){
                    $tmpCandidateId = $bookmarkRw->candidateId;
                    
                    if(array_key_exists($tmpCandidateId, $idwiseData)){
                        $tmpCandData = $idwiseData[$tmpCandidateId];
    
                        $bookmarkRww->profile_id = $tmpCandData->profile_id;
                        $bookmarkRww->fname = $tmpCandData->fname;
                        $bookmarkRww->lname = $tmpCandData->lname;
                        $bookmarkRww->resume_id = $tmpCandData->resume_id;
                        $bookmarkRww->candidateId = $tmpCandData->candidateId;
                        $bookmarkRww->profSummary = $tmpCandData->profSummary;
                        $bookmarkRww->skills = $tmpCandData->skills;
                        $bookmarkRww->shortlist = 1;
                    }else{
                        unset($bookmarkResult[$k]);
                    }
                    
                }

            }

            /*$bookmarkResult[] = $bookmarkResult[0];
            $bookmarkResult[] = $bookmarkResult[0];
            $bookmarkResult[] = $bookmarkResult[0];
            $bookmarkResult[] = $bookmarkResult[0];
            $bookmarkResult[] = $bookmarkResult[0];
            $bookmarkResult[] = $bookmarkResult[0];
            $bookmarkResult[] = $bookmarkResult[0];
            $bookmarkResult[] = $bookmarkResult[0];*/
            

            $data = array();
            $data["pageTitle"] = "My Candidates";
            $data["candidates"] = $bookmarkResult;
            
            return View("employer.mycandidates",$data);

        }else{
            //redirect to login
            return Redirect::to(url('/'));
        }
    }

    function mycandidatesLoadmore(Request $request){
        $page = $request->input('page', 1);
        $skills = $request->input('skills', []);
        
        $userId = $this->USERID;

        $bookmarkResult = purchasedCandidates_model::where("recruiterId", $userId)
        ->orderBy('created_at', 'desc')
        ->paginate(10, ['*'], 'page', $page);

        if($bookmarkResult->isNotEmpty()){
            $candidatesIdArr = array();
            foreach($bookmarkResult as $bookmarkRw){
                $tmpCandidateId = $bookmarkRw->candidateId;
                $candidatesIdArr[] = $tmpCandidateId;
            }
            
            $candidatesData = Users_model::select(
                'customers.id as profile_id',
                'customers.fname',
                'customers.lname',
                'candidateResumeData.id as resume_id',
                'candidateResumeData.candidateId',
                'candidateResumeData.profSummary',
                'candidateResumeData.skills'
            )
            ->join('candidateResumeData', 'candidateResumeData.candidateId', '=', 'customers.id')
            ->where('customers.active', 1)
            ->where('customers.verified', 1)
            ->whereIn('customers.id', $candidatesIdArr)
            ->get();

            
            $idwiseData = array();
            foreach($candidatesData as $candidatesRw){
                $idwiseData[$candidatesRw->profile_id] = $candidatesRw;
            }

            foreach($bookmarkResult as $k => &$bookmarkRww){
                $tmpCandidateId = $bookmarkRw->candidateId;
                
                if(array_key_exists($tmpCandidateId, $idwiseData)){
                    $tmpCandData = $idwiseData[$tmpCandidateId];

                    $bookmarkRww->profile_id = $tmpCandData->profile_id;
                    $bookmarkRww->fname = $tmpCandData->fname;
                    $bookmarkRww->lname = $tmpCandData->lname;
                    $bookmarkRww->resume_id = $tmpCandData->resume_id;
                    $bookmarkRww->candidateId = $tmpCandData->candidateId;
                    $bookmarkRww->profSummary = $tmpCandData->profSummary;
                    $bookmarkRww->skills = $tmpCandData->skills;
                    
                    // Check if candidate is shortlisted by the recruiter
                    $shortlist = shortlistCandidates_model::where("recruiterId", $userId)->where("candidateId", $bookmarkRww->candidateId)->count();

                    $bookmarkRww->shortlist = $shortlist > 0 ? 1 : 0;

                    // Check if candidate is purchased by the recruiter
                    $purchased = purchasedCandidates_model::where("recruiterId", $userId)->where("candidateId", $bookmarkRww->candidateId)->count();

                    $bookmarkRww->purchased = $purchased > 0 ? 1 : 0;
                    
                }else{
                    unset($bookmarkResult[$k]);
                }
                
            }

        }
        
        $candidates = $bookmarkResult;
        return view('employer.partials.candidate-list', ['candidates' => $candidates, 'page' => $page])->render();

    }
    
    function createNotification(array $data){
        //$id = db_randnumber();
        //$createdDateTime = date("Y-m-d H:i:s");
        //Bookmark: “Your profile has caught a recruiter’s attention.”
        //Purchase: “A recruiter has expressed strong interest in your profile.”
        
        if(!empty($data)){
            $notfyObj = new Notification_model();
            $notfyObj->id = $data["id"];
            $notfyObj->message = $data["message"];
            $notfyObj->receiver = $data["receiver"];
            $notfyObj->sender = $data["sender"];
            $notfyObj->dateTime = $data["dateTime"];
            $notfyObj->isRead = $data["isRead"];
            $notfyObj->type = $data["type"];
            $notfyObj->reference = $data["reference"];
            $notfyObj->save();
        }
        
    }
}