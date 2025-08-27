@extends("app")
@section("contentbox")
<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>All Recruiters</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0"><h2>Recruiters List</h2></div>
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
                        if(!empty($recruiters)){
                            foreach($recruiters as $k => $row){
                                
                                $id = $row->id;
                                $refId = $row->referral_code;
                                $fullName = $row->fname .' '. $row->lname;
                                $email = $row->email;
                                $verified = $row->verified; //admin verified
                                $active = $row->active; //visibilty
                                $createdDateTime = $row->createdDateTime;
                                $createDate = date("M d, Y", strtotime($createdDateTime));
                    ?>
                                
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{strtoupper($refId)}}</td>
                            <td>
                                {{ucwords($fullName)}}
                            </td>
                            <td>{{$email}}</td>
                            <!--<td>{{$verified ? 'Active' : 'Inactive'}}</td>-->
                            <td>{{$createDate}}</td>
                            <td><a href="{{url('admin/recruiter/'.$id)}}" class="btn cur-p btn-outline-primary">View</a></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                </div>
                
                <div class="btn-group mr-2 pagination button_section button_style2">
                {{ $recruiters->links() }}
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@push("js")
@endpush