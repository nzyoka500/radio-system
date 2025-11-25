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
                        <img src="{{ asset('frontend/assets/images/logo/logo-trans.png') }}" 
     data-white_img="{{ get_logo($basic_settings,'white') }}"
     alt="bracefm-radio-logo"
     style="max-height: 60px; width: auto;">
                        {{-- <a class="site-logo site-title" href="{{setRoute('frontend.index')}}">
                            <img src="{{ asset('frontend/assets/images/logo/logo-trans.png') }}"  data-white_img="{{ get_logo($basic_settings,'white') }}"
                            alt="bracefm-radio-logo">
                        </a> --}}
                        <button class="logo-btn"><i class="las la-bars"></i></button>
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
                                        <img src="{{ Auth::user()->user_image ?? "" }}" alt="account">
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

@push('script')
    <script>
        $("select[name=lang_switcher]").change(function(){
            var selected_value = $(this).val();
            var submitForm = `<form action="{{ setRoute('frontend.language.switch') }}" id="local_submit" method="POST"> @csrf <input type="hidden" name="target" value="${$(this).val()}" ></form>`;
            $("body").append(submitForm);
            $("#local_submit").submit();
        });
    </script>

@endpush

<style>
    /* Logo Sizing */
    .header .logo-wrapper .site-logo img {
        max-height: 60px;
        width: auto;
        object-fit: contain;
    }
    
    /* Hamburger Menu Styling */
    .header .logo-btn {
        background: #1DB9F2;
        border: none;
        color: #fff;
        font-size: 24px;
        padding: 10px 15px;
        border-radius: 8px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .header .logo-btn:hover {
        background: transparent;
        border: 2px solid #1DB9F2;
        transform: scale(1.05);
    }
    
    .header .logo-btn i {
        color: #fff;
        font-size: 24px;
    }
    
    /* Mobile responsive */
    @media (max-width: 768px) {
        .header .logo-wrapper .site-logo img {
            max-height: 45px;
        }
        
        .header .logo-btn {
            font-size: 20px;
            padding: 8px 12px;
        }
    }
</style>
