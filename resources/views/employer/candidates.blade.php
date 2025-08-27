@extends("app")
@section("contentbox")
@php
$skillsOptions = config('custom.skills');
@endphp
<style>

.info_people {
    padding: 10px;
    display: flex;
}

.info_people .user_info_cont {
    width: 70%;
    padding-left: 10px;
    padding-top: 0px;
}

.truncate {
    display: -webkit-box;
    -webkit-line-clamp: 2;       /* Number of lines to show */
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.p_status{
    font-weight: normal !important;
}

/*.p_status em {
    border: 1px solid #155ed2;
    border-radius: 10px;
    padding: 0 5px 0px 5px;
    background-color: #f5f5f5;
}

.info_people .user_info_cont p.p_status {
    color: #155ed2 !important;
}*/

.candidateLink {
    display: flex;
    cursor: pointer;
}

.searchinput{

}

.searchbtn {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
}

.form-control:focus {
    display: block;
    width: 1%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff !important;
    /*background-clip: padding-box;*/
    border: 1px solid #ced4da !important;
    border-radius: .25rem;
    /*transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out  !important;*/
    box-shadow: none;
}

.shortListBtn {
    border: none;
    background: none;
    position: absolute;
    bottom: 35px;
    cursor: pointer;
    right: 25px;
}

.shortListBtn i{
    color: #cecece;
}

.shortListBtn .shortlisted {
    color: #1ed085;
}

.shortListBtn .spinner-border {
    border-color: #888;
    left: 17px;
    position: relative;
}

.purchasedCoin {
    border: none;
    background: none;
    position: absolute;
    cursor: pointer;
    right: 25px;
    color: #cecece;
}

.crown{
    position: absolute;
    top: 8px;
    right: 45px;
    font-size: 1.1em;
    color:#1ed085;
}

/* ----- */
#skillsContainer{
    width:100%;
}

.select2-container{
    width:100%;
}

span.selection{
    width:100%;
    text-align: left;
}

.select2-container--default .select2-selection--multiple{
    width:100%;
    border-top-right-radius: 0px !important;
    border-bottom-right-radius: 0px !important;
}

.select2-search.select2-search--inline{
    width:100%;
}

.select2-container .select2-search--inline .select2-search__field{
    height: 22px !important;
}

.select2-container.select2-container--default.select2-container--open{
    text-align: left;
}

/* skeleton css */
.skeleton {
    background-color: #e2e2e2;
    border-radius: 4px;
    animation: pulse 1.5s infinite;
}

.skeleton-img {
    width: 125px;
    height: 125px;
    border-radius: 5%;
    margin: auto;
}

@media (max-width: 767px) {
    .skeleton-img {
        width: 90px;
        height: 90px;
    }
}

.skeleton-text {
    height: 12px;
    margin: 5px 0;
    width: 100%;
}

.skeleton-text.short {
    width: 50%;
}

.skeleton-tag {
    display: inline-block;
    height: 18px;
    width: 60px;
    margin-right: 5px;
    border-radius: 12px;
}

@keyframes pulse {
    0% {
        background-color: #eee;
    }
    50% {
        background-color: #ddd;
    }
    100% {
        background-color: #eee;
    }
}

</style>

<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="row page_title">
                <div class="col-md-6">        
                    <h2>Search Candidates</h2>
                </div>
                    <div class="col-md-6" style="text-align: end;">        
                    <form>
                        <div id="skillsContainer" class="input-groupd mb-3" style="display: inline-flex;">

                            <select id="skills" name="skills" class="searchinput form-controld" multiple>
                                @foreach($skillsOptions as $optGrpKey => $optGrp)
                                    <optgroup label="{{$optGrpKey}}">
                                        @foreach($optGrp as $opt)
                                        <option value="{{$opt}}">{{$opt}}</option>
                                        @endforeach        
                                    </optgroup>
                                @endforeach
                            </select>

                            <button class="searchbtn btn btn-primary" type="button" id="button-addon2" onclick="search()"><i class="fa fa-search"></i></button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        @if($featured_candidates->count())
        <div id="featurecandidatesContainer">
        @php $i = 0; @endphp

            @foreach($featured_candidates as $index => $candidate)
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
                            <a class="candidateLink" href="{{url('recruiter/candidate/'.$candidateId)}}">
                            <div class="p_info_img">
                                <img src="{{ route('private.image', ['userId' => $candidateId, 'filename' => 'pp-' . $candidateId . '.jpg']) }}">
                            </div>
                            <div class="user_info_cont">
                                <h4>{{ $candidateName }}</h4>
                                <p class="truncate">{{ $profSummary }}</p>
                                <p class="p_status">
                                    @foreach($skills as $idx => $skill)
                                    <em>{{$skill}}</em>&nbsp;
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
                            <i class="bi bi-coin  purchasedCoin" data-bs-toggle="tooltip" data-bs-placement="top" title="Purchase Candidate"></i>
                            @endif
                            
                            <button id="bookmarkbtn-{{$candidateId}}" class="shortListBtn" data-id="{{$candidateId}}" data-shortlist="{{$candidate->shortlist}}" onclick="bookmark(this)"><i class="bi bi-bookmark-star @if($candidate->shortlist > 0) shortlisted @else '' @endif" data-bs-toggle="tooltip" data-bs-placement="top" title="@if($candidate->shortlist > 0) Bookmarked @else 'Bookmark' @endif Candidate"></i></button>
                        </div>
                    </div>
                </div>

                @php $i++; @endphp

                @if($i % 2 == 0 || $loop->last)
                    </div> {{-- Close row --}}
                @endif
            @endforeach
        </div>
        @endif

        <div id="candidatesContainer">
        @if($candidates->count())
    
            @php $i = 0; @endphp

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
                            <a class="candidateLink" href="{{url('recruiter/candidate/'.$candidateId)}}">
                            <div class="p_info_img">
                                <img src="{{ route('private.image', ['userId' => $candidateId, 'filename' => 'pp-' . $candidateId . '.jpg']) }}">
                            </div>
                            <div class="user_info_cont">
                                <h4>{{ $candidateName }}</h4>
                                <p class="truncate">{{ $profSummary }}</p>
                                <p class="p_status">
                                    @foreach($skills as $idx => $skill)
                                    <em>{{$skill}}</em>&nbsp;
                                    @endforeach
                                </p>
                            </div>
                            </a>


                            @if($candidate->purchased > 0)
                            <i class="bi bi-coin yellow_color purchasedCoin" data-bs-toggle="tooltip" data-bs-placement="top" title="Purchased Candidate"></i>
                            @else
                            <i class="bi bi-coin  purchasedCoin" data-bs-toggle="tooltip" data-bs-placement="top" title="Purchased Candidate"></i>
                            @endif
                            
                            <button id="bookmarkbtn-{{$candidateId}}" class="shortListBtn" data-id="{{$candidateId}}" data-shortlist="{{$candidate->shortlist}}" onclick="bookmark(this)"><i class="bi bi-bookmark-star @if($candidate->shortlist > 0) shortlisted @else '' @endif" data-bs-toggle="tooltip" data-bs-placement="top" title="Bookmark Candidate"></i></button>
                        </div>
                    </div>
                </div>

                @php $i++; @endphp

                @if($i % 2 == 0 || $loop->last)
                    </div> {{-- Close row --}}
                @endif
            @endforeach

        @else
        <!--
        <div class="row column1">
            <div class="col-md-12 col-lg-12">
                <p>No candidates found.</p>
            </div>
        </div>
        -->
        @endif
        </div>
        
    </div>
</div>
@endsection
@push("js")

<link href="{{ url('assets/admin/css/_form-multi-select.scss')}}" rel="stylesheet" />
<script src="{{ url('assets/admin/js/bootstrap-coreui.bundle.min.js')}}"></script>

<script>


$(function(){
    
    var setSelectedSkills = [];

    $('#skills').select2({
      placeholder: "Select skills",
      allowClear: true,
      multiple: true,
      width: '100%',
      dropdownParent: $('#skillsContainer'),
      tokenSeparators: [','],
    });
    
    $('#skills').on('change', function () {
        const selectedValues = $(this).val();
        setSelectedSkills = selectedValues;
    });

    $(window).on('scroll', function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {
        loadMore();
    }
});


});

    function bookmark(elm){

        var elmId = $(elm).attr("id");
        var flag = $(elm).attr("data-shortlist");
        flag = parseInt(flag);

        if(flag > 0){
            flag = 0;
        }else{
            flag = 1;
        }

        var elmIdParts = elmId.split("-");
        var candidateId = elmIdParts[1];
        var loadingTxt = '<i class="bi bi-bookmark-star"></i>';
        var orgTxt = loadingTxt;
        showLoader(elmId,loadingTxt);
        
        const requrl = "recruiter/bookmark";
        const postdata = {
            "candidateId":candidateId,
            "flag":flag
        };
        callajax(requrl, postdata, function(resp){
            
            hideLoader(elmId,orgTxt);
            setTimeout(function(){
                $(elm).attr("data-shortlist", flag);
                if(flag == 1){
                    $("#"+elmId+" i").addClass("shortlisted");
                }else{
                    $("#"+elmId+" i").removeClass("shortlisted");
                }
            }, 500);
            
        });
    }

    let currentPage = 1;
    let loading = false;

    function search(){
        //setSelectedSkills
        const selectedSkills = $('#skills').val();
        
        if(selectedSkills.length == 0) return false;
        
        currentPage = 1;
        if (loading) return;
        loading = true;
        currentPage++;

        // Inject loading placeholders
        const dummyHTML = `@include('employer.partials.loading-cards')`;
        $('#candidatesContainer').append(dummyHTML);

        $.ajax({
            url: '{{ url("recruiter/candidates/loadmore") }}',
            method: 'GET',
            data: {
                page: currentPage,
                skills: selectedSkills
            },
            success: function (res) {
                $('.loadingPlaceholders').remove();
                if ($.trim(res) === '') {
                    // No more results
                } else {
                    $('#candidatesContainer').append(res);
                    
                }
                loading = false;
            },
            error: function () {
                $('.loadingPlaceholders').remove();
                loading = false;
                var err = 1;
                var msg = "Something went wrong while loading more candidates.";
                showToast(err,msg);
            }
        });

    }

    function loadMore() {
        if (loading) return;
        loading = true;
        currentPage++;

        // Inject loading placeholders
        const dummyHTML = `@include('employer.partials.loading-cards')`;
        $('#candidatesContainer').append(dummyHTML);

        const selectedSkills = $('#skills').val();

        $.ajax({
            url: '{{ url("recruiter/candidates/loadmore") }}',
            method: 'GET',
            data: {
                page: currentPage,
                skills: selectedSkills
            },
            success: function (res) {
                $('.loadingPlaceholders').remove();
                if ($.trim(res) === '') {
                    // No more results
                } else {
                    $('#candidatesContainer').append(res);
                    
                }
                loading = false;
            },
            error: function () {
                $('.loadingPlaceholders').remove();
                loading = false;
                var err = 1;
                var msg = "Something went wrong while loading more candidates.";
                showToast(err,msg);
            }
        });
    }
</script>
@endpush