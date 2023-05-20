
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head><base href="../../">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    @yield('head')
    <meta name="description" content="Page with empty content" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Page Custom Styles(used by this page)-->
    <link href="assets/css/pages/wizard/wizard-1.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

    <!--begin::upload image style-->
    <link rel="stylesheet" href="dist/image-uploader.min.css">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--end::upload image style-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="assets/media/logos/favicon.png" />

{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
{{--  --}}
    <style>

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

        @media (max-width:767px) {
            .photo-gallery h2 {
                margin-bottom:25px;
                padding-top:25px;
                font-size:24px;
            }
        }

        .photo-gallery .intro {
            font-size:16px;
            max-width:500px;
            margin:0 auto 40px;
        }

        .photo-gallery .intro p {
            margin-bottom:0;
        }

        .photo-gallery .photos {
            padding-bottom:20px;
        }

        .photo-gallery .item {
            padding-bottom:30px;
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






</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<!--begin::Header Mobile-->

<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
    <button class="btn p-0 burger-icon burger-icon" id="kt_aside_mobile_toggle">
        <span></span>
    </button>
    <a href="{{route('dashboard')}}">
<img alt="Logo" src="assets/media/logos/logo_nafri.png" width="60px"/>

        @if(\App\Models\User::find(Auth::user()->id)->user_type == "admin")
            <p class="ml-2 mt-5 pt-2 font-weight-bold font-size-h6 text-white">@lang('Store')</p>
        @else
            @if(Auth::user()->status ==0)
                <p class="ml-4 mt-5 pt-2 font-weight-bold font-size-h6 badge badge-warning">@lang("Pending")</p>
            @else
                <p class="ml-4 mt-5 pt-2 font-weight-bold font-size-h6 badge badge-success">@lang("Success")</p>
            @endif
        @endif
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->

        <!--end::Aside Mobile Toggle-->
        <!--begin::Header Menu Mobile Toggle-->

        <!--end::Header Menu Mobile Toggle-->
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
<!--end::Header Mobile-->

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
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
            <!--begin::Brand-->
            <div class="brand flex-column-auto" id="kt_brand">
                <!--begin::Logo-->
                <a href="{{route('dashboard')}}" class="brand-logo">
           <img alt="Logo" src="assets/media/logos/logo_nafri.png" width="60px"/>
                    @if(\App\Models\User::find(Auth::user()->id)->user_type == "admin")
                        <p class="ml-2 mt-5 pt-2 font-weight-bold font-size-h6 text-white">@lang('Store')</p>
                    @else
                        @if(Auth::user()->status ==0)
                        <p class="ml-4 mt-5 pt-2 font-weight-bold font-size-h6 badge badge-warning">@lang("Pending")</p>
                        @else
                            <p class="ml-4 mt-5 pt-2 font-weight-bold font-size-h6 badge badge-success">@lang("Success")</p>
                        @endif
                    @endif

                </a>
                <!--end::Logo-->
                <!--begin::Toggle-->
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
                                <!--end::Svg Icon-->
							</span>
                </button>
                <!--end::Toolbar-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside Menu-->
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                <!--begin::Menu Container-->
                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                    <!--begin::Menu Nav-->
                    <ul class="menu-nav">
                        <li class="menu-item  @isset($dashboard) menu-item-here @endisset" aria-haspopup="true">
                            <a href="{{route('dashboard')}}" class="menu-link">
                                <i class="menu-icon flaticon-home"></i>
                                <span class="menu-text">ໜ້າຫຼັກ</span>
                            </a>
                        </li>
                        @if(\App\Models\User::find(Auth::user()->id)->user_type == "admin")
                        <li class="menu-item  @isset($list_product_types) menu-item-here @endisset" aria-haspopup="true">
                            <a href="{{route('product-type.index')}}" class="menu-link">
                                <i class="menu-icon fas fa-warehouse"></i>
                                <span class="menu-text">ປະເພດສິນຄ້າ</span>
                            </a>
                        </li>
                        @endif


                        <li class="menu-item  @isset($list_products) menu-item-here @endisset" aria-haspopup="true">
                            <a href="{{route('product.index')}}" class="menu-link">
                                <i class="menu-icon fas fa-boxes"></i>
                                <span class="menu-text">ສິນຄ້າ</span>
                            </a>
                        </li>


                        <li class="menu-item  @isset($list_sells) menu-item-here @endisset" aria-haspopup="true">
                            <a href="{{route('sell.index')}}" class="menu-link">
                                <i class="menu-icon fas fa-cart-plus"></i>
                                <span class="menu-text">ການຂາຍ</span>
                            </a>
                        </li>


                        <li class="menu-item  @isset($list_payments) menu-item-here @endisset" aria-haspopup="true">
                            <a href="{{route('payment.index')}}" class="menu-link">
                                <i class="menu-icon fas fa-dollar-sign"></i>
                                <span class="menu-text">ການຊຳລະ</span>
                            </a>
                        </li>


                        @if(\App\Models\User::find(Auth::user()->id)->user_type == "admin")
                        <li class="menu-item  @isset($list_customers) menu-item-here @endisset" aria-haspopup="true">
                            <a href="{{route('customer.index')}}" class="menu-link">
                                <i class="menu-icon fas fa-user-friends"></i>
                                <span class="menu-text">ລູກຄ້າ</span>
                            </a>
                        </li>

                        <li class="menu-item  @isset($list_stores) menu-item-here @endisset" aria-haspopup="true">
                            <a href="{{route('store.index')}}" class="menu-link">
                                <i class="menu-icon fas fa-university"></i>
                                <span class="menu-text">ຮ້ານຄ້າ</span>
                            </a>
                        </li>

                        <li class="menu-item menu-item-submenu @if(isset($list_users) || isset($list_roles))menu-item-open menu-item-here @endif " aria-haspopup="true" data-menu-toggle="hover">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <i class="menu-icon fas fa-house-user"></i>
                                <span class="menu-text">@lang('Users')</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">

                                    <li class="menu-item @isset($list_users) menu-item-active @endisset" aria-haspopup="true">
                                        <a href="{{route('user.index')}}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">@lang('List')</span>
                                        </a>
                                    </li>



{{--                                    <li class="menu-item @isset($list_roles) menu-item-active @endisset" aria-haspopup="true">--}}
{{--                                        <a href="{{route('role.index')}}" class="menu-link">--}}
{{--                                            <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                <span></span>--}}
{{--                                            </i>--}}
{{--                                            <span class="menu-text">@lang('Role')</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}


                                </ul>

                            </div>
                        </li>
                        <li class="menu-item  @isset($list_slides) menu-item-here @endisset" aria-haspopup="true">
                            <a href="{{route('slide.index')}}" class="menu-link">
                                <i class="menu-icon fas fa-sliders-h"></i>
                                <span class="menu-text">@lang('Slide')</span>
                            </a>
                        </li>
                        @endif



                    </ul>
                    <!--end::Menu Nav-->
                </div>
                <!--end::Menu Container-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

                    </div>
                    <!--end::Header Menu Wrapper-->
                    <!--begin::Topbar-->
                    <div class="topbar">

                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                    @if(str_replace('_', '-', app()->getLocale())=="en")
                                        <img class="h-20px w-20px rounded-sm" src="assets/media/svg/flags/226-united-states.svg" alt="" />
                                    @else
                                        <img class="h-20px w-20px rounded-sm" src="assets/media/svg/flags/112-laos.svg" alt="" />
                                    @endif

                                </div>
                            </div>
                            <!--end::Toggle-->
{{--                            <!--begin::Dropdown-->--}}
{{--                            <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">--}}
{{--                                <!--begin::Nav-->--}}
{{--                                <ul class="navi navi-hover py-4">--}}
{{--                                    <!--begin::Item-->--}}
{{--                                    <li class="navi-item">--}}
{{--                                        <a href="{{route('lang','en')}}" class="navi-link">--}}
{{--													<span class="symbol symbol-20 mr-3">--}}
{{--                                                        <img src="assets/media/svg/flags/226-united-states.svg" alt="" />--}}

{{--													</span>--}}
{{--                                            <span class="navi-text">@lang('English')</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <!--end::Item-->--}}
{{--                                    <!--begin::Item-->--}}
{{--                                    <li class="navi-item ">--}}
{{--                                        <a href="{{route('lang','la')}}" class="navi-link">--}}
{{--													<span class="symbol symbol-20 mr-3">--}}
{{--														<img src="assets/media/svg/flags/112-laos.svg" alt="" />--}}
{{--													</span>--}}
{{--                                            <span class="navi-text">@lang('Lao')</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <!--end::Item-->--}}

{{--                                </ul>--}}
{{--                                <!--end::Nav-->--}}
{{--                            </div>--}}
{{--                            <!--end::Dropdown-->--}}
                        </div>
                        <!--end::Languages-->
                        <!--begin::User-->
                        <div class="topbar-item">
                            <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">@lang('Hi'),</span>
                                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ucfirst(Auth::user()->fname)}}</span>
                                <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
											<span class="symbol-label font-size-h5 font-weight-bold">{{ucfirst(substr(Auth::user()->fname,0,1))}}</span>
										</span>
                            </div>
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->

                            <!--begin::Page Heading-->
                        @yield('header')
                        <!--end::Page Heading-->

                        <!--end::Info-->
                        <!--begin::Toolbar-->

                        <!--end::Toolbar-->
                    </div>
                </div>
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid col-12" >
                    <!--begin::Container-->
                    <div class="container-fluid">
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
            <!--begin::Footer-->
            <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted font-weight-bold mr-2">2022©</span>
                        <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Nung Code Developer</a>
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Nav-->
                    <div class="nav nav-dark">
{{--                        <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">About</a>--}}
{{--                        <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Team</a>--}}
{{--                        <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">Contact</a>--}}
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->

<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">@lang('User Profile')
            <small class="text-muted font-size-sm ml-2">{{Auth::user()->user_type}}</small></h3>
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

                @if(\App\Models\User::find(Auth::user()->id)->user_type == "admin")
                    <div class="symbol-label" style="background-image:url('assets/media/users/default.jpg')"></div>
                @else
                    <div class="symbol-label" style="background-image:url({{Auth::user()->image}})"></div>
                @endif

                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{Auth::user()->fname}}</a>
                <div class="text-muted mt-1"></div>
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
        <form method="post" action="{{route('users.store')}}">
            @csrf
            <h1 class="text-primary py-4 text-center">@lang('Change Password')</h1>
            <div class="form-group">
                <label>@lang('Old Password')</label>
                <input type="password" class="form-control" name="old_password">
            </div>
            <div class="form-group">
                <label>@lang('New Password')</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>@lang('Confirm New Password')</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <button class="btn btn-primary btn-block">@lang('Submit')</button>
        </form>


    </div>
    <!--end::Content-->
</div>
<!-- end::User Panel-->






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

@yield('script')
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
<script src="assets/js/pages/crud/datatables/basic/scrollable.js"></script>
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

<script src="assets/js/pages/crud/forms/widgets/bootstrap-touchspin.js"></script>
</body>
<!--end::Body-->
</html>
