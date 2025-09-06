<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\ImageController as ImageController;


//front
use App\Http\Controllers\FrontController as FrontController;

//admin
use App\Http\Controllers\Admin\Admin as AdminAdmin;
use App\Http\Controllers\Admin\Dashboard as AdminDashboard;
use App\Http\Controllers\Admin\Candidates as AdminCandidates;
use App\Http\Controllers\Admin\Recruiters as AdminRecruiters;
use App\Http\Controllers\Admin\Notifications as AdminNotifications;
use App\Http\Controllers\Admin\Transactions as AdminTransactions;
use App\Http\Controllers\Admin\Settings as AdminSettings;

//candidate
use App\Http\Controllers\Candidate\Register as CandidateRegister;
use App\Http\Controllers\Candidate\Dashboard as CandidateDashboard;
use App\Http\Controllers\Candidate\Profile as CandidateProfile;
use App\Http\Controllers\Candidate\Resume as CandidateResume;
use App\Http\Controllers\Candidate\Notifications as CandidateNotifications;

//recruiter
use App\Http\Controllers\Employer\Register as EmployerRegister;
use App\Http\Controllers\Employer\Dashboard as EmployerDashboard;
use App\Http\Controllers\Employer\Profile as EmployerProfile;
use App\Http\Controllers\Employer\Candidates as Candidates;
use App\Http\Controllers\Employer\Pricing as EmployerPricing;
use App\Http\Controllers\Employer\Notifications as EmployerNotifications;

// routes/web.php

//
/*Route::get('/', function () {
    return view('content');
});*/
Route::get('/',[FrontController::class, 'aboutus']);
Route::get('/aboutus',[FrontController::class, 'aboutus']);
Route::get('/howtouse',[FrontController::class, 'howtouse']);
Route::get('/faq',[FrontController::class, 'faq']);
Route::get('/privacypolicy',[FrontController::class, 'privacypolicy']);
Route::get('/pricing',[FrontController::class, 'pricing']);

Route::get('/private-image/{userId}/{filename}', [ImageController::class, 'show'])->name('private.image');
Route::get('/private-adimage/{filename}', [ImageController::class, 'showAd'])->name('private.adimage');

Route::post('/forgotpassword',[EmployerRegister::class, 'forgotpassword']); 
Route::get('/changepassword',[EmployerRegister::class, 'changepassword']); 
Route::post('/changepassword',[EmployerRegister::class, 'changepassword']); 
//Route::get('/verifyme/{$token}',[EmployerRegister::class, 'verifyme']); 
Route::get('/verifyme',[EmployerRegister::class, 'verifyme']); 

Route::prefix('admin')->name('admin.')->group(function () {
    Route::post('/login',[AdminAdmin::class, 'login']);
    Route::get('/logout',[AdminAdmin::class, 'logout']);
    Route::get('/dashboard',[AdminDashboard::class, 'dashboard']);
    //Route::get('/myprofile',[AdminAdmin::class, 'myprofile']);  
    Route::post('/saveprofile',[AdminAdmin::class, 'saveprofile']);  
    Route::post('/saveprofilephoto',[AdminAdmin::class, 'saveprofilephoto']);  
    Route::post('/changepassword',[AdminAdmin::class, 'changepassword']);
    
    Route::get('/candidates',[AdminCandidates::class, 'candidates']);  
    Route::get('/candidate/{id}',[AdminCandidates::class, 'candidate']);
    Route::get('/candidateresume/{id}',[AdminCandidates::class, 'resume']);
    Route::post('/sendlinkandverify',[AdminCandidates::class, 'sendlinkandverify']);
    Route::post('/updatecandidateresume',[AdminCandidates::class, 'updateresume']);
    Route::post('/candidatesaveprofile',[AdminCandidates::class, 'saveprofile']);
    Route::post('/candidateplanactivate',[AdminCandidates::class, 'activateFeatureProfile']);
    
    Route::get('/recruiters',[AdminRecruiters::class, 'recruiters']);  
    Route::get('/recruiter/{id}',[AdminRecruiters::class, 'recruiter']);
    Route::post('/recruitersaveprofile',[AdminRecruiters::class, 'saveprofile']);  

    Route::get('/notifications',[AdminNotifications::class, 'notifications']);
    Route::get('/notifications/loadmore', [AdminNotifications::class, 'loadMore']);
    
    Route::get('/transactions',[AdminTransactions::class, 'transactions']);

    Route::get('/settings',[AdminSettings::class, 'settings']);
    Route::post('/generateaccesskey',[AdminSettings::class, 'generateaccesskey']);
    Route::post('/savepaymentsettings',[AdminSettings::class, 'savePaymentSettings']);
    Route::post('/saveemailsettings',[AdminSettings::class, 'saveemailsettings']);
    Route::post('/sendTestEmail',[AdminSettings::class, 'sendTestEmail']);
    Route::post('/createuser',[AdminSettings::class, 'createuser']);
    Route::post('/deleteuser',[AdminSettings::class, 'deleteuser']);
    Route::post('/uploadadphoto',[AdminSettings::class, 'uploadadphoto']);
    Route::post('/deleteadphoto',[AdminSettings::class, 'deleteadphoto']);
    Route::post('/activeAd',[AdminSettings::class, 'activeAd']);
    
});

Route::prefix('recruiter')->name('recruiter.')->group(function () {
    Route::post('/login',[EmployerRegister::class, 'login']);
    Route::get('/logout',[EmployerRegister::class, 'logout']);
    Route::post('/register',[EmployerRegister::class, 'register']); 
    
    Route::get('/dashboard',[EmployerDashboard::class, 'dashboard']); 
    Route::post('/sendmessage',[EmployerDashboard::class, 'sendmessage']); 
    
    Route::get('/myprofile',[EmployerProfile::class, 'myprofile']);  
    Route::post('/saveprofile',[EmployerProfile::class, 'saveprofile']);  
    Route::post('/saveprofilephoto',[EmployerProfile::class, 'saveprofilephoto']);  
    
    Route::get('/searchcandidate',[Candidates::class, 'candidates']);
    Route::get('/candidates/loadmore', [Candidates::class, 'loadMore']);
    Route::get('/candidate/{id}',[Candidates::class, 'candidate']);

    Route::post('/bookmark',[Candidates::class, 'bookmark']);
    Route::get('/mybookmarks',[Candidates::class, 'mybookmarks']);
    Route::get('/bookmarks/loadmore',[Candidates::class, 'bookmarksLoadMore']);
    
    Route::post('/buycandidate',[Candidates::class, 'buy']);
    Route::get('/mycandidates',[Candidates::class, 'mycandidates']);
    Route::get('/mycandidatesloadmore',[Candidates::class, 'mycandidatesLoadmore']);
    
    Route::get('/mypackage',[EmployerPricing::class, 'plans']);
    Route::get('/planactivate/{plan}',[EmployerPricing::class, 'buy']);
    Route::get('/payment/callback',[EmployerPricing::class, 'payment']);
    Route::get('/payment/cancel',[EmployerPricing::class, 'cancel']);
    Route::post('/savequote',[EmployerPricing::class, 'savequote']);
    
    Route::get('/notifications',[EmployerNotifications::class, 'notifications']);
    Route::get('/notifications/loadmore', [EmployerNotifications::class, 'loadMore']);
});

Route::prefix('candidate')->name('candidate.')->group(function () {
    Route::post('/login',[CandidateRegister::class, 'login']);
    Route::get('/logout',[CandidateRegister::class, 'logout']);
    Route::post('/register',[CandidateRegister::class, 'register']);   
    Route::post('/forgotpassword',[CandidateRegister::class, 'forgotpassword']); 

    Route::get('/dashboard',[CandidateDashboard::class, 'dashboard']);  
    Route::post('/sendmessage',[CandidateDashboard::class, 'sendmessage']); 
    Route::get('/myprofile',[CandidateProfile::class, 'myprofile']);  
    Route::post('/saveprofile',[CandidateProfile::class, 'saveprofile']);  
    Route::post('/saveprofilephoto',[CandidateProfile::class, 'saveprofilephoto']);  
    
    Route::get('/myresume',[CandidateResume::class, 'myresume']); 
    Route::get('/createresume',[CandidateResume::class, 'resumeform']); 
    Route::post('/updateresume',[CandidateResume::class, 'updateresume']);  
    Route::get('/downloadResume',[CandidateResume::class, 'downloadResume']); 
    

    Route::get('/planactivate/{plan}',[CandidateProfile::class, 'activateFeatureProfile']);
    Route::get('/payment/callback',[CandidateProfile::class, 'payment']);
    Route::get('/payment/cancel',[CandidateProfile::class, 'cancel']);

    Route::get('/notifications',[CandidateNotifications::class, 'notifications']);
    Route::get('/notifications/loadmore', [CandidateNotifications::class, 'loadMore']);
});