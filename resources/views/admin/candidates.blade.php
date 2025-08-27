@extends("app")
@section("contentbox")
<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>All Candidates</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0"><h2>Candidate List</h2></div>
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
                            <th>Visibility</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(!empty($candidates)){
                            foreach($candidates as $k => $row){
                                
                                $id = $row->id;
                                $refId = $row->referral_code;
                                $fullName = $row->fname .' '. $row->lname;
                                $email = $row->email;
                                $isFeatured = $row->isFeatured;
                                $verified = $row->verified; //admin verified
                                $active = $row->active; //visibilty
                                $createdDateTime = $row->createdDateTime;
                                $createDate = date("M d, Y", strtotime($createdDateTime));
                    ?>
                                
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{strtoupper($refId)}}</td>
                            <td>
                                @if($isFeatured > 0)
                                <i class="bi bi-shield-check recruit_blue_text"></i>
                                @endif
                                {{ucwords($fullName)}}
                            </td>
                            <td>{{$email}}</td>
                            <td>{{$active ? 'Visible' : 'Hidden'}}</td>
                            <td>{{$verified ? 'Active' : 'Inactive'}}</td>
                            <td>{{$createDate}}</td>
                            <td><a href="{{url('admin/candidate/'.$id)}}" class="btn cur-p btn-outline-primary">View</a></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                </div>

                <div class="btn-group mr-2 pagination button_section button_style2">
                {{ $candidates->links() }}
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@push("js")
@endpush