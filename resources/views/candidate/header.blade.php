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
                        onerror="this.onerror=null; this.src='{{ url('assets/admin/img/user.png') }}';"/>
                     </div>
                        <div class="user_info">
                        <h6>{{ucwords($LOGINUSER["fname"]." ".$LOGINUSER["lname"])}}</h6>
                           <p><span class="online_animation"></span> Online</p>
                           <p style="color:#222;">Ref:{{strtoupper($LOGINUSER["referralCode"])}}</p>
                        </div>
                     </div>
                  </div> 
                  <input type="file" id="ProfilePhotoFile" accept="image/*" style="display: none;" onchange="ppDailog()">
                  
               </div>
               <div class="sidebar_blog_2">
                  <h4>Candidate</h4>
                  <ul class="list-unstyled components">
                     <li><a href="{{url('/candidate/dashboard')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>

                     <li>
                        <a href="{{ url('/candidate/notifications') }}">
                           <i class="fa fa-bell-o yellow_color"></i>
                           <span class="{{ request()->is('candidate/notifications*') ? 'active-nav' : '' }}">Notifications</span>
                        </a>
                     </li>
                     
                     <li>
                        <a href="{{url('/candidate/myprofile')}}">
                           <i class="bi bi-person-vcard yellow_color"></i>
                           <span class="{{ request()->is('candidate/myprofile*') ? 'active-nav' : '' }}">My Profile</span></a>
                     </li>
                     
                     <li>
                        <a href="{{url('/candidate/createresume')}}">
                           <i class="bi bi-file-earmark-person yellow_color"></i> <span class="{{ request()->is('candidate/createresume*') ? 'active-nav' : '' }}">Create Resume</span></a>
                     </li>
                     
                     @if($LOGINUSER["resumeSubmit"] == 1)
                     <li><a href="{{url('/candidate/myresume')}}"><i class="bi bi-file-person yellow_color"></i> <span class="{{ request()->is('candidate/myresume*') ? 'active-nav' : '' }}">View Resume</span></a></li>
                     @endif

                     <!--<li>
                        <a href="#settings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a>

                        <ul class="collapse list-unstyled" id="settings">
                           <li><a href="{{url('/candidate/featureprofile')}}"><i class="bi bi-shield-check yellow_color"></i> <span>Feature Profile</span></a></li>
                           <li><a href="{{url('/candidate/profilevisibility')}}"><i class="bi bi-eye bi-eye-slash yellow_color"></i> <span>Profile Visibility</span></a></li>
                        </ul>
                     </li>-->

                     <li><a href="{{url('/candidate/logout')}}"><i class="fa fa-sign-out yellow_color"></i> <span>Logout</span></a></li>
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
                              <ul class="icon-ul">
                                 
                                 <li class="icon-li">
                                    <a href="{{url('candidate/notifications');}}"><i class="fa fa-bell-o"></i>
                                   
                                    @php $bellClass = 'online_animation'; @endphp
                                    <span class="badge {{$bellClass}}">0</span>
                                    </a>
                                 </li>

                                 <li class="icon-li">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#contactModal"><i class="fa fa-question-circle"></i></a>
                                 </li>
                                 
                                 <!--
                                 <li class="icon-li"><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                 -->
                              </ul>
                              <ul class="user_profile_dd">
                                 <li class="recruit_blue">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="profilephotoimg img-responsive rounded-circle" src="{{ route('private.image', ['userId' => $LOGINUSER['userId'], 'filename' => 'pp-' . $LOGINUSER['userId'] . '.jpg']) }}"
                                    onerror="this.onerror=null; this.src='{{ url('assets/admin/img/user.png') }}';" alt="#" /><span class="name_user">{{ucwords($LOGINUSER["fname"]." ".$LOGINUSER["lname"])}}</span></a>
                                    <div class="dropdown-menu">
                                    
                                       <a class="dropdown-item" href="{{url('/candidate/myprofile')}}">My Profile</a>
                                       
                                       
                                       <a class="dropdown-item" href="{{url('/candidate/logout')}}"><span>Logout</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->