@extends("app")
@section("contentbox")
<style>

.msg_list_main ul li span .name_user {
    text-decoration: underline;
}

.msg_list_main ul li span .time_ago {
    position: absolute;
    right: 10px;
    top: 30px;
}

.notifyBell{
    position: absolute;
    right: 10px;
    top: 10px;
}

.unreadBell{color: #ff9800;}

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
                <div class="page_title">
                    <h2>Notifications</h2>
                </div>
            </div>
        </div>


        <div class="row column1">
            <div class="col-md-12">
                <div class="msg_section">
                    <div class="msg_list_main">
                        <ul id="notificationsContainer" class="msg_list">


                        @if($notifications->count() > 0)

                        @foreach($notifications as $notification)
                        <li style="border-left-color: #ff9800;">
                            <span><img src="{{ route('private.image', ['userId' => $notification->sender, 'filename' => 'pp-' . $notification->sender . '.jpg']) }}"
                            onerror="this.onerror=null; this.src='{{ url('assets/admin/img/user-avatar.png') }}';"
                                alt="{{ucwords($notification->fname .' '.$notification->lname)}}" class="img-responsive"></span>
                            <span>
                                <a href="{{url('recruiter/candidate/'.$notification->sender)}}">
                                    <span class="name_user">{{ucwords($notification->fname ." ".$notification->lname)}}</span>
                                </a>
                                <span class="msg_user" style="width: fit-content;">{{$notification->message}}.</span>
                                <span class="time_ago">{{date("d F, Y", strtotime($notification->dateTime));}}</span>
                                <i class="fa fa-bell-o notifyBell {{ $notification->isRead == 0 ? 'unreadBell' : '' }}"></i>
                            </span>
                        </li>
                        @endforeach
                        
                        @else
                        <li class="text-center" style="text-align: center !important; display: inline-block;"><i class="fa fa-bell-o" style="font-size: 100px;"></i><p style="font-size: 21px; margin-top: 20px;">It seems that you have no new notifications.</p></li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
            @if($notifications->count() > 0)
            <div class="col-md-12" style="text-align: center;padding-top: 10px;">
                <button type="button" id="profSaveBtn" class="btn cur-p btn-primary" data-txt="Load More" data-loadingtxt="Loading..." onclick="loadMore(this);" style="font-size: 18px;">Load More</button>
            </div>
            @endif
        </div>
@endsection
@push("js")
<script>
    let currentPage = 1;
    let loading = false;
    /*$(function(){
        $(window).on('scroll', function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {
                loadMore();
            }
        });
    });*/

    function loadMore(elm) {
        if (loading) return;
        loading = true;
        currentPage++;

        // Inject loading placeholders
        
        const dummyHTML = `@include('employer.partials.notifications-cards')`;
        $('#notificationsContainer').append(dummyHTML);
        


        /*const requrl = "recruiter/notifications/loadmore";
        const postdata = {
            page: currentPage
        };
        
        callajax(requrl, postdata, function(res){
            $('.loadingPlaceholders').remove();
            if ($.trim(res) === '') {
                // No more results
            } else {
                $('#notificationsContainer').append(res);
            }
            loading = false;

        });*/

        
        $.ajax({
            url: '{{ url("admin/notifications/loadmore") }}',
            method: 'GET',
            data: {
                page: currentPage
            },
            success: function (res) {
                $('.loadingPlaceholders').remove();
                if ($.trim(res) === '') {
                    // No more results
                    currentPage--;

                    var err = 1;
                    var msg = "No more notifications found.";
                    showToast(err,msg);
                } else {
                    $('#notificationsContainer').append(res);
                }
                loading = false;
            },
            error: function () {
                $('.loadingPlaceholders').remove();
                loading = false;
                var err = 1;
                var msg = "Something went wrong while loading more notifications.";
                showToast(err,msg);
            }
        });
    }
</script>
@endpush
