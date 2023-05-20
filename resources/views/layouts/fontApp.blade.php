<!DOCTYPE html>


<html lang="en">

<!--begin::Head-->
<head>
    <base href="">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <style>


        @media print {
            #noprint{display: none}
            body * {
                visibility: hidden;
                background-color: #fff;
            }
            #section-to-print, #section-to-print * {
                visibility: visible;
                background-color: #fff;
                padding: 0;
                margin: 0;
            }
            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
                background-color: #fff;
                padding: 0;
                margin: 0;
            }
        }
        .text-shadow{
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;

        }
        .photo-gallery {
            color:#313437;
            background-color:#fff;
        }

        .photo-gallery p {
            color:#7d8285;
        }

        .photo-gallery h2 {
            font-weight:bold;
            margin-bottom:40px;
            padding-top:40px;
            color:inherit;
        }



        @font-face {
            font-family: 'NotoSans';
            src: url("/assets/NotoSansLao-Bold.ttf");
            font-size: 2em;
        }
        @font-face {
            font-family: 'Lao_Classic3';
            src: url("/assets/Lao_Classic3.ttf");
        }
        @font-face {
            font-family: 'Lao_Derm';
            src: url("/assets/Lao_Derm2_Regular.ttf");
        }
        body{
            font-family: NotoSans;
            font-size: 1.5rem;
        }
        span,p,h1,h2,h3,h4,h5,h6,label{
            font-size: 1.2rem;
        }

        .fontJ{
            font-family: NotoSans;
            font-size: 2.5rem;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

    @yield('style')

</head>

<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed page-loading">

<div class="d-flex flex-column flex-root">

    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">

        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">


            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">

                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">

                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

                        <!--begin::Header Logo-->
                        <div class="header-logo">
                            <a href="{{route('home')}}">
                                <img alt="Logo" src="assets/media/logos/store-cover.png"  width="60px"/>
                            </a>
                        </div>

                        <!--end::Header Logo-->

                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                            <!--begin::Header Nav-->
                            <ul class="menu-nav">
                                <li class="menu-item  @isset($home_page) menu-item-active @endisset" >
                                    <a href="{{route('home')}}" class="menu-link ">
                                        <span class="menu-text">@lang('Dashboard')</span>
                                    </a>
                                </li>

                                <li class="menu-item  @isset($list_stores) menu-item-active @endisset" >
                                    <a href="{{route('store.list')}}" class="menu-link ">
                                        <span class="menu-text">@lang('Store')</span>
                                    </a>
                                </li>

                                @auth
                                    <li class="menu-item  @isset($sells) menu-item-active @endisset" >
                                        <a href="{{route('sell.list')}}" class="menu-link ">
                                            <span class="menu-text">ປະຫວັດການສັ່ງ</span>
                                        </a>
                                    </li>
                                @endauth
                            </ul>

                            <!--end::Header Nav-->
                        </div>

                        <!--end::Header Menu-->

                        <!--begin::Quick Cart-->
                        <div id="kt_quick_cart" class="offcanvas offcanvas-right p-10">
                            <!--begin::Header-->
                            <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
                                <h4 class="font-weight-bold m-0">ກະຕ່າ</h4>
                                @php $total = 0 @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach

                                <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
                                    <i class="ki ki-close icon-xs text-muted"></i>
                                </a>
                            </div>
                            <!--end::Header-->
                            <!--begin::Content-->
                            <div class="offcanvas-content">
                                <!--begin::Wrapper-->
                                <div class="offcanvas-wrapper mb-5 scroll-pull">
                                    <!--begin::Item-->

                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)

                                    <div class="d-flex align-items-center justify-content-between py-8">
                                        <div class="d-flex flex-column mr-2">
                                            <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">{{ $details['name'] }}</a>

                                            <div class="d-flex justify-content-between mt-2">
                                                <span class="font-weight-bold mx-1 text-dark-75 font-size-lg">{{number_format($details['price'])}}</span>

                                                <span class="font-weight-bold mx-2 text-dark-75 font-size-lg text-muted"> x{{$details['quantity']}}</span>

                                                <span class="font-weight-bold mx-2 text-dark-75 font-size-lg"> {{number_format($details['quantity']*$details['price'])}}</span>

                                            </div>
                                        </div>
                                        <a href="#" class="symbol symbol-70 flex-shrink-0">
                                            <img src="{{$details['image']}}" title="" alt="" />
                                        </a>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-solid"></div>
                                    <!--end::Separator-->
                                        @endforeach
                                    @endif
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Purchase-->
                                <div class="offcanvas-footer">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <span class="font-weight-bold text-muted font-size-sm mr-2">@lang("Total")</span>
                                        <span class="font-weight-bolder text-dark-50 text-right">{{number_format($total)}}</span>
                                    </div>

                                    <div class="text-right">
                                        <a href="{{route('cart')}}" class="btn btn-primary text-weight-bold btn-block">ຈັດການ</a>
                                    </div>
                                </div>
                                <!--end::Purchase-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Quick Cart-->
                    </div>

                    <!--end::Header Menu Wrapper-->

                    <!--begin::Topbar-->
                    <div class="topbar">


                        @auth
                            @if(\Illuminate\Support\Facades\Auth::user()->user_type != 'customer')
                                <a class="dropdown " href="{{route('dashboard')}}"  >
                                    <div class="topbar-item" >
                                        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
											<span class="svg-icon svg-icon-xl svg-icon-light">

											         <i class="fas fa-house-user"></i>
                                            </span>
                                            <span class="pulse-ring"></span>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endauth




                        <!--begin::User-->
                        @auth
                                <div class="topbar-item">
                                    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-sm px-2 btn-dropdown btn-light-secondary " id="kt_quick_cart_toggle">
									  <i class="fas fa-shopping-cart text-primary fa-2x mr2"></i>
                                        <span class="badge badge-pill badge-danger ml-2">{{ count((array) session('cart')) }}</span>

                                    </div>

                                </div>





                            <div class="topbar-item">
                                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                    <span class=" font-weight-bold font-size-base d-none d-md-inline mr-1">@lang('Hi'),</span>
                                    <span class=" font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ucfirst(Auth::user()->fname)}}</span>
                                    <span class=" btn btn-light-success">

											<span class="symbol-label font-size-h5 font-weight-bold">{{ucfirst(substr(Auth::user()->email,0,1))}}</span>
										</span>
                                </div>
                            </div>
                        @else


                            <a class="topbar-item "  href="{{route('client.login')}}">
                                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2">
											<span class="svg-icon svg-icon-xl svg-icon-light mr-2 ">

											         <i class=" far fa-user-circle"></i>
                                            </span>
                                    <span > @lang('Login')</span>
                                    <span class="pulse-ring"></span>
                                </div>
                            </a>

                    @endauth
                    <!--end::User-->
                    </div>

                    <!--end::Topbar-->
                </div>

                <!--end::Container-->
            </div>
            <!--begin::Header Mobile-->
            <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">




                <!--begin::Header Menu Mobile Toggle-->
                <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                    <span></span>
                </button>

                <!--end::Header Menu Mobile Toggle-->
                <!--begin::Logo-->
                <a href="{{route('home')}}">
                    <img alt="Logo" src="assets/media/logos/store-cover.png" width="50px"/>
                </a>

                <!--end::Logo-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">


                    <!--begin::Topbar Mobile Toggle-->
                    <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">

						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>

                        <!--end::Svg Icon-->
					</span>
                    </button>

                    <!--end::Topbar Mobile Toggle-->
                </div>

                <!--end::Toolbar-->
            </div>

            <!--begin::Scrolltop-->
            <div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
                <!--end::Svg Icon-->
			</span>
            </div>
            <!--end::Scrolltop-->
            <!--end::Header-->
            <!--begin::Content-->

            <div class="d-flex flex-column flex-column-fluid p-0 m-0" id="kt_content" style="background-color:#F4F4F4">

            @yield('header')


            <!--begin::Entry-->
                <div class="d-flex flex-column-fluid p-0 m-0" >
                    <!--begin::Container-->
                    <div class="container-fluid p-0 m-0">
                        @if (Session::has('success') || Session::has('warning'))
                            <div class="fixed-bottom mr-4 mb-14">
                                <div class="alert @if(Session::has('success')) alert-success @else alert-danger @endif alert-block col-2 float-right mb-4" id="message_id">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>@if(Session::has('success')) {{ Session::get('success') }} @else {{ Session::get('warning') }} @endif</strong>
                                </div>
                            </div>
                        @endif

                        @if($errors->any())

                            <div class="fixed-bottom mr-4 mb-14">
                                <div class="alert alert-danger alert-block col-2 float-right mb-4" id="message_id" >
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    @foreach($errors->all() as $error)
                                        <p><strong>{{$error}}</strong></p>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @yield('content')



                        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
                        @if (Session::has('success') || Session::has('warning') || $errors->any())
                            <script>
                                $("document").ready(function(){
                                    setTimeout(function(){
                                        $("#message_id").fadeToggle();
                                    }, 3200 );
                                });
                            </script>
                        @endif

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>


            <!--end::Content-->







        </div>

        <!--end::Wrapper-->
    </div>

    <!--end::Page-->
</div>


<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">2020©</span>
            <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Keenthemes</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Nav-->
        <div class="nav nav-dark">
            <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">About</a>
            <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Team</a>
            <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">Contact</a>
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Container-->
</div>




<!-- begin::User Panel-->
@auth
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0">@lang('User Profile')
                <small class="text-muted font-size-sm ml-2"></small></h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
                <div class="symbol symbol-100 mr-5">
                    <div class="symbol-label" style="background-image:url('assets/media/users/default.jpg')"></div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div class="d-flex flex-column">
                    <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{Auth::user()->name}}</a>
                    <div class="text-muted mt-1">
                        @if(Auth::user()->is_admin ==1)
                            @lang("Admin")
                        @else
                            @lang("Clients")
                        @endif
                    </div>

                    <div class="navi mt-2">
                        <a href="#" class="navi-item">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
									</span>
                            <span class="navi-text text-muted text-hover-primary">{{Auth::user()->email}}</span>
                            </span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">
                                @lang('Sign Out')
                            </x-responsive-nav-link>
                        </form>

                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <!--end::Separator-->


        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->
@endauth
@yield('script')
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->

<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>

<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/widgets.js"></script>

<script src="assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
<!--end::Page Scripts-->

<!--begin::Page Vendors(used by this page)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/crud/datatables/data-sources/html.js"></script>
<!--end::Page Scripts-->

<script type="text/javascript" src="dist/image-uploader.min.js"></script>

<script src="assets/js/myScript.js"></script>
<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/crud/forms/widgets/jquery-mask.js"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/crud/forms/widgets/select2.js"></script>
<!--end::Page Scripts-->

<script src="assets/js/pages/crud/forms/widgets/form-repeater.js"></script>

<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/custom/wizard/wizard-1.js"></script>
<!--end::Page Scripts-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

<!--end::Page Scripts-->

<script src="assets/js/main.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


@yield('script')
</body>

<!--end::Body-->
</html>
