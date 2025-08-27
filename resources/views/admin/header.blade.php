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
                        <h6>{{$LOGINUSER["fname"]}}</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div> 
                  <input type="file" id="ProfilePhotoFile" accept="image/*" style="display: none;" onchange="ppDailog()">
                  
               </div>
               <div class="sidebar_blog_2">
                  <h4>Administrator</h4>
                  <ul class="list-unstyled components">
                     <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>

                     <!--<li><a href="{{url('/admin/myprofile')}}"><i class="bi bi-person-gear yellow_color"></i> <span>My Profile</span></a></li>-->

                     <li><a href="{{url('/admin/candidates')}}"><i class="bi bi-person-vcard yellow_color"></i> <span>All Candidates</span></a></li>

                     <li><a href="{{url('/admin/recruiters')}}"><i class="fa fa-briefcase yellow_color"></i> <span>All Recruiters</span></a></li>

                     <li><a href="{{url('/admin/notifications')}}"><i class="fa fa-bell-o yellow_color"></i> <span>All Notifications</span></a></li>
                     <!--
                     <li><a href="{{url('/admin/messages')}}"><i class="fa fa-envelope-o yellow_color"></i> <span>All Messages</span></a></li>
                     -->  
                     <li><a href="{{url('/admin/transactions')}}"><i class="yellow_color">{{config('custom.baseCurrency.symbol')}}</i> <span>All Transactions</span></a></li>
                     
                     @if($LOGINUSER["role"] == 3)
                     <li><a href="{{url('/admin/settings')}}"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>
                     @endif
                     

                     <li><a href="{{url('/admin/logout')}}"><i class="fa fa-sign-out yellow_color"></i> <span>Logout</span></a></li>

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
                              <ul>
                                 
                                 <li>
                                    <a href="{{url('admin/notifications');}}"><i class="fa fa-bell-o"></i>
                                   
                                    @php $bellClass = 'online_animation'; @endphp
                                    <span class="badge {{$bellClass}}">{{$LOGINUSER["notificationsCount"]}}</span>
                                    </a>
                                 </li>
                                 <!--
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 -->
                                 <!--<li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>-->
                                 
                              </ul>

                              <ul class="user_profile_dd">
                                 <li class="recruit_blue">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="profilephotoimg img-responsive rounded-circle" src="{{ route('private.image', ['userId' => $LOGINUSER['userId'], 'filename' => 'pp-' . $LOGINUSER['userId'] . '.jpg']) }}"
                                    onerror="this.onerror=null; this.src='{{ url('assets/admin/img/user.png') }}';" alt="#" /><span class="name_user">{{ucwords($LOGINUSER["fname"])}}</span></a>
                                    <div class="dropdown-menu">
                                    
                                       <a class="dropdown-item" href="{{url('/admin/logout')}}"><span>Logout</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->