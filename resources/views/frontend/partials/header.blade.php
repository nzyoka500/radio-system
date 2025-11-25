@php
    $type = App\Constants\GlobalConst::SETUP_PAGE;
    $menues = DB::table('setup_pages')
            ->where('status', 1)
            ->where('type', Str::slug($type))
            ->get();
@endphp

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<header class="header-section home">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <div class="logo-wrapper">
                        <a class="site-logo site-title" href="{{setRoute('frontend.index')}}">
                            <img src="{{ asset('frontend/assets/images/logo/logo-trans.png') }}" 
                                 data-white_img="{{ get_logo($basic_settings,'white') }}"
                                 alt="bracefm-radio-logo">
                        </a>
                        <button class="sidebar-toggle-btn" id="sidebarToggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="header-action">
                        <div class="lan-swicth">
                            <select class="form--control nice-select" name="lang_switcher">
                                @foreach($__languages as $item)
                                <option value="{{$item->code}}" @if (get_default_language_code() == $item->code) selected  @endif>{{$item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="action-wrapper">
                            @auth
                            <div class="notify-wrapper">
                                <div class="notify-btn-area">
                                    <button class="push-icon"><i class="las la-bell"></i></button>
                                </div>

                                <div class="notification-wrapper">
                                    <div class="notification-header">
                                        <h6 class="title">{{ __('Notification') }}</h6>
                                        <span class="sub-title">{{ __('You Have') }} {{ count(get_user_notifications()) }} {{ __('notification') }}</span>
                                    </div>
                                    <ul class="notification-list">
                                        @foreach (get_user_notifications() as $item)
                                        <li>
                                            <div class="thumb">
                                                <img src="{{ auth()->user()->user_image ?? "" }}" alt="user">
                                            </div>
                                            <div class="content">
                                                <div class="title-area">
                                                    <h5 class="title">{{ @$item->message->title }}</h5>
                                                    <span class="time">{{ @$item->created_at->diffForHumans() }}</span>
                                                </div>
                                                <span class="sub-title">{{ @$item->message->message }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ setRoute('user.profile.index') }}" class="account-area account-area-btn">
                                <div class="account-thumb-area">
                                    <img src="{{ Auth::user()->user_image ?? asset('frontend/assets/images/user/account.png') }}" alt="account">
                                </div>
                                <span class="title">{{ Auth::user()->username ?? ""}}</span>
                            </a>
                            @else
                            <a href="{{ setRoute('user.login') }}" class="account-area account-area-btn">
                                <div class="account-thumb-area">
                                    <img src="{{ asset('frontend/assets/images/user/account.png') }}" alt="account">
                                </div>
                                <span class="title">{{ __('Login') }}</span>
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Sidebar Navigation
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="sidebar-overlay" id="sidebarOverlay"></div>
<aside class="sidebar-menu" id="sidebarMenu">
    <div class="sidebar-header">
        <a href="{{setRoute('frontend.index')}}" class="sidebar-logo">
            <img src="{{ asset('frontend/assets/images/logo/logo-trans.png') }}" alt="Brace FM">
        </a>
        <button class="sidebar-close" id="sidebarClose">
            <i class="las la-times"></i>
        </button>
    </div>
    
    <nav class="sidebar-nav">
        <ul class="sidebar-menu-list">
            <li class="sidebar-menu-item {{ Request::routeIs('frontend.index') ? 'active' : '' }}">
                <a href="{{ setRoute('frontend.index') }}" class="sidebar-menu-link">
                    <i class="las la-home"></i>
                    <span>Home</span>
                    <i class="las la-angle-right arrow"></i>
                </a>
            </li>
            
            <li class="sidebar-menu-item {{ Request::routeIs('frontend.about') ? 'active' : '' }}">
                <a href="{{ setRoute('frontend.about') }}" class="sidebar-menu-link">
                    <i class="las la-info-circle"></i>
                    <span>About</span>
                    <i class="las la-angle-right arrow"></i>
                </a>
            </li>
            
            <li class="sidebar-menu-item {{ Request::routeIs('frontend.gallery') ? 'active' : '' }}">
                <a href="{{ setRoute('frontend.gallery') }}" class="sidebar-menu-link">
                    <i class="las la-images"></i>
                    <span>Gallery</span>
                    <i class="las la-angle-right arrow"></i>
                </a>
            </li>
            
            <li class="sidebar-menu-item {{ Request::routeIs('frontend.team') ? 'active' : '' }}">
                <a href="{{ setRoute('frontend.team') }}" class="sidebar-menu-link">
                    <i class="las la-users"></i>
                    <span>Team</span>
                    <i class="las la-angle-right arrow"></i>
                </a>
            </li>
            
            <li class="sidebar-menu-item {{ Request::routeIs('frontend.blog') ? 'active' : '' }}">
                <a href="{{ setRoute('frontend.blog') }}" class="sidebar-menu-link">
                    <i class="las la-blog"></i>
                    <span>Blog</span>
                    <i class="las la-angle-right arrow"></i>
                </a>
            </li>
            
            <li class="sidebar-menu-item {{ Request::routeIs('frontend.contact') ? 'active' : '' }}">
                <a href="{{ setRoute('frontend.contact') }}" class="sidebar-menu-link">
                    <i class="las la-envelope"></i>
                    <span>Contact</span>
                    <i class="las la-angle-right arrow"></i>
                </a>
            </li>
        </ul>
    </nav>
</aside>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Sidebar Navigation
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<style>
/* ====================================
   Header Styles
==================================== */
.header {
    background: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 999;
}

.header-menu-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
}

/* Logo Wrapper */
.logo-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo-wrapper .site-logo img {
    max-height: 50px;
    width: auto;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.logo-wrapper .site-logo:hover img {
    transform: scale(1.05);
}

/* Hamburger Menu - Animated Bars */
.sidebar-toggle-btn {
    background: transparent;
    /* border: 2px solid #1DB9F2; */
    padding: 10px;
    border-radius: 8px;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    gap: 4px;
    width: 45px;
    height: 45px;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.sidebar-toggle-btn span {
    display: block;
    width: 22px;
    height: 2px;
    background: #1DB9F2;
    border-radius: 2px;
    transition: all 0.3s ease;
}

.sidebar-toggle-btn:hover {
    background: linear-gradient(135deg, #1DB9F2 0%, #0EA5D9 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(29, 185, 242, 0.3);
}

.sidebar-toggle-btn:hover span {
    background: #fff;
}

.sidebar-toggle-btn:hover span:nth-child(1) {
    transform: translateY(-2px);
}

.sidebar-toggle-btn:hover span:nth-child(3) {
    transform: translateY(2px);
}

/* ====================================
   Sidebar Styles
==================================== */
.sidebar-menu {
    position: fixed;
    left: -280px;
    top: 0;
    width: 280px;
    height: 100vh;
    background: #fff;
    box-shadow: 2px 0 20px rgba(0,0,0,0.1);
    z-index: 1001;
    transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow-y: auto;
}

.sidebar-menu.active {
    left: 0;
}

/* Sidebar Header */
.sidebar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #f0f0f0;
}

.sidebar-logo img {
    max-height: 45px;
    width: auto;
}

.sidebar-close {
    background: transparent;
    border: none;
    font-size: 24px;
    color: #666;
    cursor: pointer;
    padding: 5px;
    transition: all 0.3s ease;
}

.sidebar-close:hover {
    color: #FF6B35;
    transform: rotate(90deg);
}

/* Sidebar Navigation */
.sidebar-nav {
    padding: 20px 0;
}

.sidebar-menu-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-menu-item {
    margin-bottom: 5px;
}

.sidebar-menu-link {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    color: #4a5568;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.sidebar-menu-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 0%;
    background: linear-gradient(135deg, #1DB9F2 0%, #0EA5D9 100%);
    transition: height 0.3s ease;
}

.sidebar-menu-link:hover::before,
.sidebar-menu-item.active .sidebar-menu-link::before {
    height: 100%;
}

.sidebar-menu-link i:first-child {
    font-size: 20px;
    color: #FF6B35;
    transition: all 0.3s ease;
}

.sidebar-menu-link span {
    flex: 1;
    font-size: 15px;
    font-weight: 500;
}

.sidebar-menu-link .arrow {
    font-size: 16px;
    color: #cbd5e0;
    transition: all 0.3s ease;
}

.sidebar-menu-link:hover {
    background: linear-gradient(90deg, rgba(29, 185, 242, 0.05) 0%, transparent 100%);
    color: #1DB9F2;
    padding-left: 30px;
}

.sidebar-menu-link:hover i:first-child {
    color: #1DB9F2;
    transform: scale(1.1);
}

.sidebar-menu-link:hover .arrow {
    color: #1DB9F2;
    transform: translateX(5px);
}

.sidebar-menu-item.active .sidebar-menu-link {
    background: linear-gradient(90deg, rgba(29, 185, 242, 0.1) 0%, transparent 100%);
    color: #1DB9F2;
}

.sidebar-menu-item.active .sidebar-menu-link i:first-child {
    color: #1DB9F2;
}

.sidebar-menu-item.active .sidebar-menu-link .arrow {
    color: #1DB9F2;
}

/* Overlay */
.sidebar-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.sidebar-overlay.active {
    opacity: 1;
    visibility: visible;
}

/* ====================================
   Responsive Design
==================================== */
@media (max-width: 768px) {
    .logo-wrapper .site-logo img {
        max-height: 40px;
    }
    
    .sidebar-toggle-btn {
        width: 40px;
        height: 40px;
    }
    
    .sidebar-toggle-btn span {
        width: 20px;
    }
    
    .header-action {
        gap: 10px;
    }
}

@media (max-width: 480px) {
    .sidebar-menu {
        width: 250px;
        left: -250px;
    }
    
    .logo-wrapper {
        gap: 15px;
    }
}

/* Smooth Scrollbar */
.sidebar-menu::-webkit-scrollbar {
    width: 6px;
}

.sidebar-menu::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.sidebar-menu::-webkit-scrollbar-thumb {
    background: #1DB9F2;
    border-radius: 3px;
}

.sidebar-menu::-webkit-scrollbar-thumb:hover {
    background: #0EA5D9;
}
</style>

@push('script')
<script>
    // Language Switcher
    $("select[name=lang_switcher]").change(function(){
        var selected_value = $(this).val();
        var submitForm = `<form action="{{ setRoute('frontend.language.switch') }}" id="local_submit" method="POST"> @csrf <input type="hidden" name="target" value="${$(this).val()}" ></form>`;
        $("body").append(submitForm);
        $("#local_submit").submit();
    });
    
    // Sidebar Toggle Functionality
    $(document).ready(function() {
        const sidebarToggle = $('#sidebarToggle');
        const sidebarMenu = $('#sidebarMenu');
        const sidebarOverlay = $('#sidebarOverlay');
        const sidebarClose = $('#sidebarClose');
        
        // Open Sidebar
        sidebarToggle.on('click', function() {
            sidebarMenu.addClass('active');
            sidebarOverlay.addClass('active');
            $('body').css('overflow', 'hidden');
        });
        
        // Close Sidebar
        function closeSidebar() {
            sidebarMenu.removeClass('active');
            sidebarOverlay.removeClass('active');
            $('body').css('overflow', 'auto');
        }
        
        sidebarClose.on('click', closeSidebar);
        sidebarOverlay.on('click', closeSidebar);
        
        // Close on ESC key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && sidebarMenu.hasClass('active')) {
                closeSidebar();
            }
        });
    });
</script>
@endpush