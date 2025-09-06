@php 

$activePaths = ['dashboard', 'notifications', 'searchcandidate', 'mybookmarks', 'mycandidates', 'myprofile', 'mypackage'];

$skillsOptions = config('custom.skills');
@endphp
<style>
/* ----- */
#header-skillsContainer{
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

.searchbtn {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
}

.header-searchbar {
   /* text-align: end; */
   float: left;
   /* border: 1px solid; */
   padding-top: 11px !important;
}

@media (max-width: 1199px) {
   .right_topbar .header-searchbar {
      display: none;
   }
}

</style>
<div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="{{url('/')}}"><img class="logo_icon img-responsive" src="{{url('images/logo.png')}}" alt="Smart Recruit" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img">
                        <a href="javascript:void(0);" class="profilePhotoCamera" data-fileElm="ProfilePhotoFile" onclick="editProfilePhoto(this)"><i class="fa fa-camera" style="font-size: 15px;"></i><span style="font-size: 11px;line-height: 14px;">Change Profile Photo</span></a> 
                        
                        <img class="profilephotoimg img-responsive" src="{{ route('private.image', ['userId' => $LOGINUSER['userId'], 'filename' => 'pp-' . $LOGINUSER['userId'] . '.jpg']) }}"
                        onerror="this.onerror=null; this.src='{{ url('assets/admin/img/user.png') }}';"/></div>
                        <div class="user_info">
                        <h6>{{ucwords($LOGINUSER["fname"])}}</h6>
                           <p><span class="online_animation"></span> Online</p>
                           <p style="color:#222;">Ref:{{strtoupper($LOGINUSER["referralCode"])}}</p>
                           <p style="color:#222;">{{$LOGINUSER["email"]}}</p>
                        </div>
                     </div>
                  </div> 
                  <input type="file" id="ProfilePhotoFile" accept="image/*" style="display: none;" onchange="ppDailog()">
                  
               </div>
               <div class="sidebar_blog_2">
                  <h4>Recruiter</h4>
                  <ul class="list-unstyled components"> 
                     <li>
                        <a href="{{ url('/recruiter/dashboard') }}">
                           <i class="fa fa-dashboard yellow_color"></i>
                           <span class="{{ request()->is('recruiter/dashboard*') ? 'active-nav' : '' }}">Dashboard</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ url('/recruiter/notifications') }}">
                           <i class="fa fa-bell-o yellow_color"></i>
                           <span class="{{ request()->is('recruiter/notifications*') ? 'active-nav' : '' }}">Notifications</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ url('/recruiter/searchcandidate') }}">
                           <i class="fa fa-search yellow_color"></i>
                           <span class="{{ request()->is('recruiter/searchcandidate*') ? 'active-nav' : '' }}">Search Candidate</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ url('/recruiter/mybookmarks') }}">
                           <i class="bi bi-bookmark-star yellow_color"></i>
                           <span class="{{ request()->is('recruiter/mybookmarks*') ? 'active-nav' : '' }}">My Bookmarks</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ url('/recruiter/mycandidates') }}">
                           <i class="bi bi-clipboard-check yellow_color"></i>
                           <span class="{{ request()->is('recruiter/mycandidates*') ? 'active-nav' : '' }}">My Candidates</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ url('/recruiter/myprofile') }}">
                           <i class="bi bi-person-vcard yellow_color"></i>
                           <span class="{{ request()->is('recruiter/myprofile*') ? 'active-nav' : '' }}">My Profile</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ url('/recruiter/mypackage') }}">
                           <i class="fa fa-briefcase yellow_color"></i>
                           <span class="{{ request()->is('recruiter/mypackage*') ? 'active-nav' : '' }}">Pricing</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ url('/recruiter/logout') }}">
                           <i class="fa fa-sign-out yellow_color"></i>
                           <span>Logout</span>
                        </a>
                     </li>
                  </ul>
               </div>
            </nav>
            
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle recruit_blue"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                        
                        <a href="{{url('/');}}"><img class="img-responsivedk logoblackdk logoblackpngdk" src="{{url('images/logo.png')}}" alt="Smart Recruit" /></a>
                        
                        </div>
                        <div class="right_topbar">
                        
                           <div class="icon_info">
                           @if(strtolower($pageTitle) != 'candidates')   
                           <div class="header-searchbar" style="text-align: end;width: 400px;">        
                                 <form method="GET" action="{{url('/recruiter/searchcandidate')}}">
                                    <div id="header-skillsContainer" class="input-groupd mb-3" style="display: inline-flex;">

                                          <select id="header-skills" name="skills" class="searchinput form-controld" multiple>
                                          @foreach($skillsOptions as $optGrpKey => $optGrp)
                                                <optgroup label="{{$optGrpKey}}">
                                                      @foreach($optGrp as $opt)
                                                      <option value="{{$opt}}">{{$opt}}</option>
                                                      @endforeach        
                                                </optgroup>
                                          @endforeach
                                          </select>
                                          
                                          <button class="searchbtn btn btn-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                                    </div>
                                 </form>
                              </div>
                              @endif
                              <ul class="icon-ul">
                              
                                 <li class="icon-li">
                                    <a href="{{url('recruiter/notifications');}}"><i class="fa fa-bell-o"></i>
                                   
                                    @php $bellClass = 'online_animation'; @endphp
                                    <span class="badge {{$bellClass}}">{{$LOGINUSER["notificationsCount"]}}</span>
                                    </a>
                                 </li>
                                 
                                 <li class="icon-li"><a href="javascript:void(0);" data-toggle="modal" data-target="#contactModal"><i class="fa fa-question-circle"></i></a></li>
                                 <li class="icon-li"><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                 
                              </ul>

                              <ul class="user_profile_dd">
                                 <li class="recruit_blue">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="profilephotoimg img-responsive rounded-circle" src="{{ route('private.image', ['userId' => $LOGINUSER['userId'], 'filename' => 'pp-' . $LOGINUSER['userId'] . '.jpg']) }}"
                                    onerror="this.onerror=null; this.src='{{ url('assets/admin/img/user.png') }}';" alt="#" /><span class="name_user">{{ucwords(substr($LOGINUSER["fname"], 0, 8))}}</span></a>
                                    <div class="dropdown-menu">
                                    
                                       <a class="dropdown-item" href="{{url('/recruiter/myprofile')}}">My Profile</a>
                                       
                                       
                                       <a class="dropdown-item" href="{{url('/recruiter/logout')}}"><span>Logout</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->