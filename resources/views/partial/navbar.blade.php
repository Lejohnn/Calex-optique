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
                    <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Calex optic</a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Explore Modern..." tabindex="0" data-search="template-list">
                            <div class="search-input-close"><i class="ft-x"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i><span class="badge badge-pill {{ $notifications_notread == 0 ? '' : 'badge-danger' }} badge-up badge-glow">{{ $notifications_notread }}</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge {{ $notifications_notread == 0 ? '' : 'badge-danger' }} float-right m-0">{{ $notifications_notread }} New</span>
                            </li>
                            @foreach($notifications as $notification)
                            <li class="scrollable-container media-list w-100 {{ $notification->status == 0 ? 'bg-light text-dark' : '' }}"><a href="javascript:void(0)">
                                <div class="media">
                                    <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3 mr-0"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading {{ $notification->status == 0 ? 'yellow' : 'success font-weight-bold' }} darken-3">{{ $notification->status == 0 ? 'Notification en attente' : 'Déjà consulté' }}</h6>
                                        <p class="notification-text font-small-3 text-muted font-weight-bold">{{ $notification->message }}</p><small>
                                            <time class="media-meta text-success font-weight-bold" datetime="{{ $notification->created_at }}">{{ Carbon\Carbon::parse($notification->created_at)->locale('fr')->format('l') }} le {{ $notification->created_at }}</time></small>
                                    </div>
                                </div>
                            </a></li>
                            @endforeach
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="{{ route('notifications.index') }}">Lire toutes les notifications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                        @if(auth()->check())
                            <span class="mr-1 user-name text-bold-700">{{ auth()->user()->name }}</span>
                        @endif
                        <span class="avatar avatar-online"><img src="{{ asset('backend/images/portrait/small/avat.png') }}" alt="avatar"><i></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('auth.logout') }}"><i class="ft-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
