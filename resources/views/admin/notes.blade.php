@extends("app")
@section("contentbox")
<style>

.info_people_padding {
    padding: 13px;
    display: flex;
}

.noteIcon {
    font-size: 6em;
}

.info_people .user_info_cont {
    width: max-content;
    padding-left: 10px;
    padding-top: 0px;
    text-align: left;
}

@media (max-width: 767px) {
    .info_people .user_info_cont {
        width: max-content;
        padding-left: 10px;
        padding-top: 0px;
        text-align: left;
    }
}

.info_people .p_info_img {
    width: max-content;
}

@media (max-width: 767px) {
    .info_people .p_info_img {
        width: max-content;
        text-align: center;
    }
}

@media (max-width: 767px) {
    .info_people {
        padding: 13px;
        display: flex;
    }
}

.truncateTitle{
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.truncateDescription{
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

</style>

<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title row">
                <div class="col-md-12">
                    
                    <h2 style="width: max-content; float: left;">All Notes</h2>
                
                    <button id="contactBtn" type="button" class="viewResumeBtn btn cur-p btn-outline-primary mx-2" title="" onclick="createNote()" style="float: right;"><i class="bi bi-plus"></i> Create Note</button>

                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="row">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0"><h2>Notes List</h2></div>
                </div>
            </div>
        </div>
    </div>
    -->

    <div id="notesContainer" class="row column1">


@php
if(!empty($notes)){
    foreach($notes as $k => $row){
        
        $id = $row->id;
        $title = $row->title;
        $description = $row->description;
        $content = $row->content;
        $createdDateTime = $row->createdDateTime;
        $createDate = date("M d, Y", strtotime($createdDateTime));
        $noteLink = url("admin/note/$id");
@endphp

    <div class="col-md-6 col-lg-4">
        <div class="full white_shd margin_bottom_30">
            <div style="padding-bottom: 0;" class="info_people info_people_padding">
                <div class="p_info_img">
                <i class="noteIcon fa fa-pencil-square-o blue_color"></i>
                </div>
                <div class="user_info_cont">
                <h4 class="truncateTitle">{{ucwords($title)}}</h4>
                <p class="truncateDescription">{{ucwords($description)}}</p>
                <p class="p_status">{{$createDate}}</p>
                </div>
            </div>
            <a href="{{$noteLink}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;position: absolute;bottom: 35px;right: 25px;" data-original-title="View note."><i class="fa fa-pencil-square-o"></i>&nbsp;View</a>
        </div>
    </div>

@php
    }
}
@endphp

    </div>
</div>
@endsection
@push("js")
<script>

let currentPage = 1;
let loading = false;

$(function(){
    $(window).on('scroll', function () {
        // Only trigger loadMore if the window has scrolled to the bottom and no request is in progress
        if (!loading && $(window).scrollTop() + $(window).height() >= $(document).height() - 300) {
            loadMore();
        }
    });
});

function loadMore() {
    if (loading) return;
    loading = true;
    currentPage++;

    // Inject loading placeholders
    const dummyHTML = `@include('admin.partials.note-cards')`;
    $('#notesContainer').append(dummyHTML);

    const selectedSkills = $('#skills').val();

    $.ajax({
        url: '{{ url("admin/notes/loadmore") }}',
        method: 'GET',
        async:false,
        data: {
            page: currentPage,
            skills: selectedSkills
        },
        success: function (res) {
            $('.loadingPlaceholders').remove();
            if ($.trim(res) === '') {
                // No more results
                currentPage--;
            } else {
                $('#notesContainer').append(res);
                
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

function createNote(){
   window.location.href = "{{url('admin/createnote')}}";
}
</script>
@endpush