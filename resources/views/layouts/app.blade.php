<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard Calex Optic</title>
    <link rel="apple-touch-icon" href="{{asset('backend/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/pages/timeline.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/pages/dashboard-ecommerce.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('dashboard.index') }}"><img class="brand-logo" alt="modern admin logo" src="{{asset('backend/images/logo/logo.png')}}">
                            <h3 class="brand-text">Calex Optic</h3>
                        </a></li>
                    <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Calex optic</a>

                        </li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Modern..." tabindex="0" data-search="template-list">
                                <div class="search-input-close"><i class="ft-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i><span class="badge badge-pill  {{ $notifications_notread == 0 ? '' : 'badge-danger' }}   badge-up badge-glow"> {{ $notifications_notread}}</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge {{$notifications_notread == 0 ? '' : 'badge-danger'}} float-right m-0">{{ $notifications_notread}} New</span>
                                </li>
                                @foreach($notifications as $notification)

                                    @php //dd($notification) @endphp
                                <li class="scrollable-container media-list w-100 {{ $notification->status ==0 ? 'bg-light text-dark' : ''}}"><a href="javascript:void(0)">

                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3 mr-0"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading {{ $notification->status ==0 ? 'yellow' : 'success font-weight-bold'}} darken-3 ">{{ $notification->status ==0 ? 'notification en attente' : 'Déjà consulté'}}</h6>
                                                <p class="notification-text font-small-3 text-muted font-weight-bold">{{ $notification->message  }}</p><small>
                                                    <time class="media-meta text-success font-weight-bold " datetime="2015-06-11T18:29:20+08:00"> {{ Carbon\Carbon::parse($notification->created_at)->locale('fr')->format('l')  }} the {{  $notification->created_at }}
                                                    </time></small>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                @endforeach
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="{{route('notifications.index')}}">Read all notifications</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            @if(auth()->check())
                                <span class="mr-1 user-name text-bold-700">{{ auth()->user()->name }}</span>
                             @endif
                        <span class="avatar avatar-online"><img src="{{asset('backend/images/portrait/small/avatar-s-19.png')}}" alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="ft-clipboard"></i> Todo</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('auth.logout')}}"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @if(auth()->user()->role_id == 1)
            <li class=" nav-item" id="admin">
                <a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">gestion des utilisateurs</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('users.create') }}"><i></i><span data-i18n="Invoice Summary">Ajouter un utilisateur</span></a>
                    </li>
                    <li><a class="menu-item" href="{{ route('users.index') }}"><i></i><span data-i18n="Invoice Template">Liste les utilisateur</span></a>

                </ul>
            </li>
            @endif
            @if(auth()->user()->role_id == 1 or auth()->user()->role_id == 3 or auth()->user()->role_id == 2)
                <li class="nav-item" id="client">
                    <a href="#">
                        <i class="la la-clipboard"></i>
                        <span class="menu-title" data-i18n="Invoice">Gestion des Clients</span>
                    </a>
                    <ul class="menu-content">
                        @if(auth()->user()->role_id == 2 or auth()->user()->role_id == 1 or auth()->user()->role_id == 3 )
                            <li>
                                <a class="menu-item" href="{{ route('clients.create') }}">
                                    <i></i>
                                    <span data-i18n="Invoice Summary">Ajouter un Client</span>
                                </a>
                            </li>
                            <li>
                                <a class="menu-item" href="{{ route('clients.index') }}">
                                    <i></i>
                                    <span data-i18n="Invoice Template">Liste des Clients</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

                @if(auth()->user()->role_id == 1 or auth()->user()->role_id == 6 )
                     <li class=" nav-item" id="admin"><a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">Gestion des Commerciaux</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('commercial.create') }}"><i></i><span data-i18n="Invoice Summary">Enregistrer Un Client</span></a></li>
                    <li><a class="menu-item" href="{{ route('commercial.index') }}"><i></i><span data-i18n="Invoice Summary">Lister les Client</span></a></li>
                </ul>
                </li>
                    @endif

                    @if(auth()->user()->role_id == 0)
                    <li class=" nav-item" id="admin"><a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">Gestion des Rendez-vous</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="invoice-summary.html"><i></i><span data-i18n="Invoice Summary">En fonction des clients</span></a></li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->role_id == 1)
                    <li class=" nav-item" id="admin"><a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">Gestion des Commande</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="invoice-summary.html"><i></i><span data-i18n="Invoice Summary">Enregistrer une nouvelle commande </span></a>
                    </li>
                    <li><a class="menu-item" href="invoice-template.html"><i></i><span data-i18n="Invoice Template">Visualiser les commandes </span></a>

                </ul>
                </li>
                    @endif

                    @if(auth()->user()->role_id == 1)
                        <li class=" nav-item" id="admin"><a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">Gestion des Ventes</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="invoice-summary.html"><i></i><span data-i18n="Invoice Summary">Fiche calculé</span></a></li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->role_id == 1)
                <li class=" nav-item" id="admin"><a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">Service Call</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('call_service.showClients') }}"<i></i><span data-i18n="Invoice Summary">Clients Entreprise</span></a></li>
                        <li><a class="menu-item" href="{{ route('call_service.prospects') }}"><i></i><span data-i18n="Invoice Summary">Clients Prospectés</span></a></li>
                    </ul>
                </li>
                @endif

                <li class="nav-item" id="admin">
                    <a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">Paramètres</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('notifications.index') }}"><i></i><span data-i18n="Invoice Summary">Notifications</span></a></li>
                    </ul>
                </li>
        </ul>
    </div>
</div>

     <!-- END: Main Menu-->
    <!-- BEGIN: Content-->

        <!-- start content -->
        @yield('contenu');
    <!-- end content -->



<script src="{{ asset('js/custom.js') }}"></script>

    @section('script')
            <!-- BEGIN: Vendor JS-->
            <script src="{{asset('backend/vendors/js/vendors.min.js')}}"></script>
            <!-- BEGIN Vendor JS-->

            <!-- BEGIN: Page Vendor JS-->
            <script src="{{asset('backend/vendors/js/charts/chartist.min.js')}}"></script>
            <script src="{{asset('backend/vendors/js/charts/chartist-plugin-tooltip.min.js')}}"></script>
            <script src="{{asset('backend/vendors/js/charts/raphael-min.js')}}"></script>
            <script src="{{asset('backend/vendors/js/charts/morris.min.js')}}"></script>
            <script src="{{asset('backend/vendors/js/timeline/horizontal-timeline.js')}}"></script>
            <!-- END: Page Vendor JS-->

            <!-- BEGIN: Theme JS-->
            <script src="{{asset('backend/js/core/app-menu.js')}}"></script>
            <script src="{{asset('backend/js/core/app.js')}}"></script>
            <!-- END: Theme JS-->

            <!-- BEGIN: Page JS-->
            <script src="{{asset('backend/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
            <!-- END: Page JS-->

            <!-- BEGIN: Page Vendor JS-->
            <script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
            <!-- END: Page Vendor JS-->

            <!-- BEGIN: Page JS-->
            <script src="{{asset('backend/js/scripts/pages/hospital-patients-list.js')}}"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <!-- END: Page JS-->
    @endsection
