@extends("app")
@section("contentbox")
<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>All Notifications</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0"><h2>Notifications List</h2></div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ref-ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!--<th>Status</th>-->
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(!empty($notifications)){
                            foreach($notifications as $k => $notification){
                                
                                $refId = '';
                                $fullName = ucwords($notification->fname ." ".$notification->lname);

                                $message = $notification->message;
                                $date = date("d F, Y", strtotime($notification->dateTime));

                                $isRead = $notification->isRead;
                                
                                /*<i class="fa fa-bell-o notifyBell {{ $notification->isRead == 0 ? 'unreadBell' : '' }}"></i>*/
                    ?>
                                
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{strtoupper($refId)}}</td>
                            <td>
                                {{ucwords($fullName)}}
                            </td>
                            <td>{{$message}}</td>
                           
                            <td>{{$date}}</td>
                            <td><a href="#" class="btn cur-p btn-outline-primary">View</a></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                </div>

                <div class="btn-group mr-2 pagination button_section button_style2">
                {{ $notifications->links() }}
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@push("js")
@endpush