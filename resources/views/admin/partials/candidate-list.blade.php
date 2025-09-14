<!--- featured candidates --->
@if($page == 1 && isset($featured_candidates) && $featured_candidates->isNotEmpty())
@php 
$i = 0;
@endphp
@foreach($featured_candidates as $fcandidate)
    @php
        $candidateId = $fcandidate->candidateId;
        $candidateName = ucwords($fcandidate->fname . " " . $fcandidate->lname);
        $profSummary = $fcandidate->profSummary;
        $skills = json_decode($fcandidate->skills);
    @endphp

    @if($i % 2 == 0)
        <div class="row column1">
    @endif

    <div class="col-md-6 col-lg-6">
        <div class="full white_shd margin_bottom_30">
            <div class="info_people">
                <a class="candidateLink" href="{{url('admin/candidate/'.$candidateId)}}">
                    <div class="p_info_img">
                        <img src="{{ route('private.image', ['userId' => $candidateId, 'filename' => 'pp-' . $candidateId . '.jpg']) }}" onerror="this.onerror=null; this.src='{{ url('assets/admin/img/user-avatar.png') }}';"
                        alt="{{ $candidateName }}">
                    </div>
                    <div class="user_info_cont">
                        <h4>{{ $candidateName }}</h4>
                        <p class="truncate">{{ $profSummary }}</p>
                        <p class="p_status">
                            @foreach($skills as $skill)
                                <em>{{ $skill }}</em>&nbsp;
                            @endforeach
                        </p>
                    </div>
                </a>
                
                @if($candidate->is_featured > 0)
                <i class="bi bi-shield-check ffa-light ffa-crown yyellow_color crown" data-bs-toggle="tooltip" data-bs-placement="top" title="Featured Candidate"></i>
                @endif

                @if($candidate->purchased > 0)
                    <i class="bi bi-coin yellow_color purchasedCoin" data-bs-toggle="tooltip" data-bs-placement="top" title="Purchased Candidate"></i>
                @else
                    <i class="bi bi-coin purchasedCoin" data-bs-toggle="tooltip" data-bs-placement="top" title="Purchased Candidate" ></i>
                @endif

                <button id="bookmarkbtn-{{$candidateId}}" class="shortListBtn" data-id="{{$candidateId}}" data-shortlist="{{$candidate->shortlist}}" onclick="bookmark(this)">
                    <i class="bi bi-bookmark-star @if($candidate->shortlist > 0) shortlisted @endif" data-bs-toggle="tooltip" data-bs-placement="top" title="Bookmark Candidate"></i>
                </button>
            </div>
        </div>
    </div>

    @php $i++; @endphp

    @if($i % 2 == 0 || $loop->last)
        </div>
    @endif

@endforeach
@endif

@php 

/*for rendering only candidate cards:*/

$i = 0; @endphp
@foreach($candidates as $index => $candidate)
    @php
        $candidateId = $candidate->candidateId;
        $candidateName = ucwords($candidate->fname . " " . $candidate->lname);
        $profSummary = $candidate->profSummary;
        $skills = json_decode($candidate->skills);
    @endphp

    @if($i % 2 == 0)
        <div class="row column1">
    @endif

    <div class="col-md-6 col-lg-6">
        <div class="full white_shd margin_bottom_30">
            <div class="info_people">
                <a class="candidateLink" href="{{url('admin/candidate/'.$candidateId)}}">
                    <div class="p_info_img">
                        <img src="{{ route('private.image', ['userId' => $candidateId, 'filename' => 'pp-' . $candidateId . '.jpg']) }}" onerror="this.onerror=null; this.src='{{ url('assets/admin/img/user-avatar.png') }}';"
                        alt="{{ $candidateName }}">
                    </div>
                    <div class="user_info_cont">
                        <h4>{{ $candidateName }}</h4>
                        <p class="truncate">{{ $profSummary }}</p>
                        <p class="p_status">
                            @foreach($skills as $skill)
                                <em>{{ $skill }}</em>&nbsp;
                            @endforeach
                        </p>
                    </div>
                </a>

                @if($candidate->purchased > 0)
                    <i class="bi bi-coin yellow_color purchasedCoin"></i>
                @else
                    <i class="bi bi-coin purchasedCoin"></i>
                @endif

                <button id="bookmarkbtn-{{$candidateId}}" class="shortListBtn" data-id="{{$candidateId}}" data-shortlist="{{$candidate->shortlist}}" onclick="bookmark(this)">
                    <i class="bi bi-bookmark-star @if($candidate->shortlist > 0) shortlisted @endif"></i>
                </button>
            </div>
        </div>
    </div>

    @php $i++; @endphp

    @if($i % 2 == 0 || $loop->last)
        </div>
    @endif
@endforeach
