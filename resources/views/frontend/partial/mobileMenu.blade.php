 @php
     use App\Models\WebsiteSetting;
     use App\Models\Menu;

     $setting = WebsiteSetting::first();

     // Main menus (parent_id = null, active)
     $menus = Menu::with('childrenActive')->whereNull('parent_id')->where('status', 1)->orderBy('order_by')->get();
 @endphp
 <div class="modal mobile-menu-modal offcanvas-modal fade" id="offcanvas-modal">
     <div class="modal-dialog offcanvas-dialog">
         <div class="modal-content">
             <div class="modal-header offcanvas-header">
                 <!-- offcanvas-logo-start -->
                 <div class="offcanvas-logo">
                     <a href="{{ route('/') }}">
                         <img src="{{ asset($setting->main_logo) }}" alt="Main Logo" />
                     </a>
                 </div>
                 <!-- offcanvas-logo-end -->
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>

             <div class="mobile-menu-modal-main-body">
                 <!-- offcanvas-menu start -->
                 <nav id="offcanvas-menu" class="navigation offcanvas-menu">
                     <ul id="nav mobile-nav" class="list-none offcanvas-men-list">

                         @foreach ($menus as $menu)
                             <li class="{{ $menu->childrenActive->count() ? 'has-submenu' : '' }}">
                                 <a href="{{ $menu->url ? url($menu->url) : '#' }}"
                                     class="{{ $menu->childrenActive->count() ? 'menu-arrow' : '' }}">
                                     {{ $menu->title }}
                                 </a>

                                 @if ($menu->childrenActive->count())
                                     <ul class="sub-menu">
                                         @foreach ($menu->childrenActive as $child)
                                             <li>
                                                 <a href="{{ $child->url ? url($child->url) : '#' }}">
                                                     {{ $child->title }}
                                                 </a>
                                             </li>
                                         @endforeach
                                     </ul>
                                 @endif
                             </li>
                         @endforeach
                     </ul>
                 </nav>
             </div>

             <div class="mobile-menu-modal-main-bottom">
                 <div class="topbar-school-info">
                     <ul class="topbar-school-info-list d-flex mb-0 justify-content-center">
                         <li>
                             <a href="https://www.facebook.com/share/1AZaWinmjV/" target="_blank"><img
                                     src="{{ asset('images/facebook.svg') }}" alt="#" /></a>
                         </li>
                         <li>
                             <a href="https://www.facebook.com/share/1AZaWinmjV/" target="_blank"><img
                                     src="{{ asset('images/linkedin.svg') }}" alt="#" /></a>
                         </li>
                         <li>
                             <a href="#" target="_blank"><img src="{{ asset('images/whatsapp.svg') }}"
                                     alt="#" /></a>
                         </li>
                     </ul>
                 </div>
             </div>

         </div>
     </div>
 </div>
