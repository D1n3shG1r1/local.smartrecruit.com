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