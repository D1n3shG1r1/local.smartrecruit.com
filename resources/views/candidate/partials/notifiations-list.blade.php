@foreach($notifications as $notification)
<li style="border-left-color: #ff9800;">
    <span><img src="{{ route('private.image', ['userId' => $notification->sender, 'filename' => 'pp-' . $notification->sender . '.jpg']) }}"
    onerror="this.onerror=null; this.src='{{ url('assets/admin/img/user.png') }}';" class="img-responsive" /></span>
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