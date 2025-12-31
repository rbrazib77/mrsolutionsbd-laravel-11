
@php
use App\Models\WebsiteSetting;
use App\Models\Menu;

$setting = WebsiteSetting::first();

// Main menus (parent_id = null, active)
$menus = Menu::with('childrenActive')
            ->whereNull('parent_id')
            ->where('status', 1)
            ->orderBy('order_by')
            ->get();
@endphp
 <header id="active-sticky" class="header-area">
 <div class="container">
     <div class="row">
         <div class="col-12">
             <div class="header-inner">
                 <div class="row align-items-center">

                     <!-- Logo -->
                     <div class="col-lg-8 col-xl-3 col-md-8 col-8">
                         <div class="header-logo">
                             <a href="{{ route('/') }}">
                                 <img src="{{ asset($setting->main_logo) }}" alt="Main Logo" />
                             </a>
                         </div>
                     </div>

                     <!-- Menu -->
                     <div class="col-lg-4 col-xl-9 col-md-4 col-4">
                         <div class="header-right">
                             <div class="header-menu">
                                 <nav class="navigation d-flex align-items-center">
                                     <ul class="header-menu-list">

                                        @foreach ($menus as $menu)
                                            <li class="{{ $menu->childrenActive->count() ? 'has-submenu' : '' }}">
                                                <a href="{{ $menu->url ? url($menu->url) : '#' }}">
                                                    {{ $menu->title }}
                                                    @if ($menu->childrenActive->count())
                                                        <i class="fa-solid fa-angle-down"></i>
                                                    @endif
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
                         </div>

                         <!-- Mobile Menu Button -->
                         <button type="button" class="mobile-menu-offcanvas-toggler" data-bs-toggle="modal"
                             data-bs-target="#offcanvas-modal">
                             <span class="line"></span>
                             <span class="line"></span>
                             <span class="line"></span>
                         </button>
                         <!-- End Mobile Menu Button -->

                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>
</header>

