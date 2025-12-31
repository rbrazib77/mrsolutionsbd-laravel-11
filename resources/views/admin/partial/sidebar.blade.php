 @php
     $setting = \App\Models\WebsiteSetting::first();
 @endphp
 <div class="app-sidebar-menu">
     <div class="h-100" data-simplebar>

         <!--- Sidemenu -->
         <div id="sidebar-menu">

             <div class="logo-box">
                 <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                     <span class="logo-sm">
                         <img src="{{ asset('backend/assets/images/favicon.png') }}" alt="" height="22">
                     </span>
                     <span class="logo-lg">
                         <img src="{{ asset($setting->main_logo) }}" alt="Logo" height="50"
                             width="200">
                     </span>
                 </a>
             </div>

             <ul id="side-menu">

                 <li class="menu-title">Menu</li>
                 <li>
                     <a href="{{ route('admin.dashboard') }}" class="tp-link">
                         <i data-feather="home"></i>
                         <span> Dashboard </span>
                     </a>
                 </li>
                 {{-- <li class="menu-title">Pages</li> --}}
                 <li>
                     <a href="{{ url('/') }}" target="_blank" class="tp-link">
                         <i data-feather="globe"></i>
                         <span>Website</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('admin.user.list') }}" class="tp-link">
                         <i data-feather="users"></i>
                         <span> User List </span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('admin.histories.index') }}" class="tp-link">
                         <i data-feather="calendar"></i>
                         <span>Admin History </span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('contact.message.index') }}" class="tp-link">
                         <i data-feather="message-square"></i>
                         <span>Contact Message List</span>
                     </a>
                 </li>

                 <li>
                     <a href="{{ route('admin.user-activity.index') }}" class="tp-link">
                         <i data-feather="users"></i>
                         <span>Website Visitor List</span>
                     </a>
                 </li>

                 <li>
                     <a href="{{ route('admin.seo.index') }}" class="tp-link">
                         <i data-feather="search"></i>
                         <span>Seo Setting</span>
                     </a>
                 </li>

                 <li>
                     <a href="#sidebarSetting" data-bs-toggle="collapse">
                         <i data-feather="cpu"></i>
                         <span> Setting </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarSetting">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.website.index') }}" class="tp-link">Website Setting</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li>
                     <a href="#sidebarSocileMedia" data-bs-toggle="collapse">
                         <i data-feather="film"></i>
                         <span>Socile Media</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarSocileMedia">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.social.media.index') }}" class="tp-link">Index</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.social.media.create') }}" class="tp-link">Create</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li>
                     <a href="#sidebarMenu" data-bs-toggle="collapse">
                         <i data-feather="film"></i>
                         <span>Menu</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarMenu">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.menu.index') }}" class="tp-link">Index</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.menu.create') }}" class="tp-link">Create</a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li>
                     <a href="#sidebarBanner" data-bs-toggle="collapse">
                         <i data-feather="layout"></i>
                         <span>Banner</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarBanner">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.banner.index') }}" class="tp-link">Index</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.banner.create') }}" class="tp-link">Create</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li>
                     <a href="#sidebarService" data-bs-toggle="collapse">
                         <i data-feather="tool"></i>
                         <span>Our Services</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarService">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.our.service.index') }}" class="tp-link">Index</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.our.service.create') }}" class="tp-link">Create</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li>
                     <a href="#sidebarWorkingPhoto" data-bs-toggle="collapse">
                         <i data-feather="image"></i>
                         <span>Working Photo</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarWorkingPhoto">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.category.index') }}" class="tp-link">Category Button</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.working-photo.index') }}" class="tp-link">Index</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.working-photo.create') }}" class="tp-link">Create</a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li>
                     <a href="#sidebarWorkingVideo" data-bs-toggle="collapse">
                         <i data-feather="video"></i>
                         <span>Working Video</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarWorkingVideo">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.working-video.index') }}" class="tp-link">Index</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.working-video.create') }}" class="tp-link">Create</a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li>
                     <a href="#sidebarClient" data-bs-toggle="collapse">
                         <i data-feather="user-plus"></i>
                         <span>Clients</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarClient">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.client.index') }}" class="tp-link">Index</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.client.create') }}" class="tp-link">Create</a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li>
                     <a href="#sidebarAboutSection" data-bs-toggle="collapse">
                         <i data-feather="file-text"></i>
                         <span>About Section</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarAboutSection">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.about-section.index') }}" class="tp-link">Index</a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li>
                     <a href="#sidebarWhyChooseUsSection" data-bs-toggle="collapse">
                         <i data-feather="check-circle"></i>
                         <span> Why Choose Us</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarWhyChooseUsSection">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.why-choose-us.heading') }}" class="tp-link">Section
                                     Heading</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.why-choose-us.index') }}" class="tp-link">Index</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.why-choose-us.create') }}" class="tp-link">create</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li>
                     <a href="#sidebarOurMissionSection" data-bs-toggle="collapse">
                         <i data-feather="target"></i>
                         <span>Our Mission</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarOurMissionSection">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.our-mission.index') }}" class="tp-link">Index</a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li>
                     <a href="#sidebarOurVisionSection" data-bs-toggle="collapse">
                         <i data-feather="zap"></i>
                         <span>Our Vision</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarOurVisionSection">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.our-vision.index') }}" class="tp-link">Index</a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li>
                     <a href="#sidebarActivitiesSection" data-bs-toggle="collapse">
                         <i data-feather="activity"></i>
                         <span>Activities</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarActivitiesSection">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.activity.index') }}" class="tp-link">Index</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.activity.create') }}" class="tp-link">Create</a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li>
                     <a href="#sidebarFaq" data-bs-toggle="collapse">
                         <i data-feather="help-circle"></i>
                         <span>Faq</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarFaq">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.faq.index') }}" class="tp-link">Index</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.faq.create') }}" class="tp-link">Create</a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 <li>
                     <a href="#sidebarprivacyPolicy" data-bs-toggle="collapse">
                         <i data-feather="lock"></i>
                         <span>Privacy Policy</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarprivacyPolicy">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('admin.privacy-policy.index') }}" class="tp-link">Index</a>
                             </li>
                             <li>
                                 <a href="{{ route('admin.privacy-policy.create') }}" class="tp-link">create</a>
                             </li>
                         </ul>
                     </div>
                 </li>



             </ul>

         </div>
         <!-- End Sidebar -->

         <div class="clearfix"></div>

     </div>
 </div>
