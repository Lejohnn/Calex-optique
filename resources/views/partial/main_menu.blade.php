    <!-- BEGIN: Main Menu-->

    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">

            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                @if(auth()->user()->role_id == 1)
                <li class=" nav-item" id="admin">
                    <a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">gestion des utilisateurs</span></a>
                    <ul class="menu-content">
                        <li class="{{ Request::is('users/create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('users.create') }}"><i></i><span data-i18n="Invoice Summary">Ajouter un utilisateur</span></a>
                        </li>
                        <li class="{{ Request::is('users') ? 'active' : '' }}"><a class="menu-item" href="{{ route('users.index') }}"><i></i><span data-i18n="Invoice Template">Lister les utilisateurs</span></a></li>

                    </ul>
                </li>
                @endif
                @if(auth()->user()->role_id == 1 or auth()->user()->role_id == 3 or auth()->user()->role_id == 2 or auth()->user()->role_id == 4)
                    <li class="nav-item" id="client">
                        <a href="#">
                            <i class="la la-clipboard"></i>

                                <span class="menu-title" data-i18n="Invoice">Gestion des
                                    @if(auth()->user()->role_id == 3 or auth()->user()->role_id == 4 )
                                        Patients
                                    @endif
                                    @if(auth()->user()->role_id != 3 and auth()->user()->role_id != 4 )
                                        Clients
                                    @endif
                                </span>


                        </a>
                        <ul class="menu-content">
                            @if(auth()->user()->role_id == 2 or auth()->user()->role_id == 1 )
                                <li class="{{ Request::is('clients/create') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('clients.create') }}">
                                        <i></i>
                                        <span data-i18n="Invoice Summary">Ajouter un
                                            @if(auth()->user()->role_id == 3 or auth()->user()->role_id == 4 )
                                                Patient
                                            @endif
                                            @if(auth()->user()->role_id != 3 and auth()->user()->role_id != 4 )
                                                Client
                                            @endif
                                        </span>
                                    </a>
                                </li>
                            @endif
                                @if(auth()->user()->role_id == 2 or auth()->user()->role_id == 1 or auth()->user()->role_id == 3 or auth()->user()->role_id == 4 )
                                    <li class="{{ Request::is('clients') ? 'active' : '' }}">
                                        <a class="menu-item" href="{{ route('clients.index') }}">
                                            <i></i>
                                            <span data-i18n="Invoice Template">Liste des
                                                @if(auth()->user()->role_id == 3 or auth()->user()->role_id == 4 )
                                                    Patients
                                                @endif
                                                @if(auth()->user()->role_id != 3 and auth()->user()->role_id != 4 )
                                                    Clients
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                @endif

                            @if(auth()->user()->role_id == 1 or auth()->user()->role_id == 3)
                                <li class="{{ Request::is('ordonnance/generate') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('ordonnance.create') }}">
                                        <i></i>
                                        <span data-i18n="Invoice Template">Faire une Ordonnance</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('prescriptions') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('prescriptions.index') }}">
                                        <i></i>
                                        <span data-i18n="Invoice Template">Lister les Ordonnances</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                    @if(auth()->user()->role_id == 1 or auth()->user()->role_id == 6 )
                         <li class=" nav-item" id="admin"><a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">Gestion des Commerciaux</span></a>
                    <ul class="menu-content">
                        <li class="{{ Request::is('agent/create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('agent.create') }}"><i></i><span data-i18n="Invoice Summary">Ajouter Un Commercial</span></a></li>
                        <li class="{{ Request::is('commercial/create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('commercial.create') }}"><i></i><span data-i18n="Invoice Summary">Enregistrer Un Client</span></a></li>
                        <li class="{{ Request::is('commercial') ? 'active' : '' }}"><a class="menu-item" href="{{ route('commercial.index') }}"><i></i><span data-i18n="Invoice Summary">Lister les Client</span></a></li>
                        <li class="{{ Request::is('commercialstat') ? 'active' : '' }}"><a class="menu-item" href="{{ route('commercial.stats') }}"><i></i><span data-i18n="Invoice Summary">Statistiques</span></a></li>
                        {{-- <li class="{{ Request::is('commercialstat') ? 'active' : '' }}"><a class="menu-item" href="{{ route('commercials.monthlyPerformance') }}"><i></i><span data-i18n="Invoice Summary">Performance du Mois</span></a></li> --}}
                    </ul>
                    </li>
                        @endif



                    @if(auth()->user()->role_id == 1 or auth()->user()->role_id == 10)
                    <li class=" nav-item" id="admin"><a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">Service Call</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('clients_call') ? 'active' : '' }}"><a class="menu-item" href="{{ route('call_service.showClients') }}"><i></i><span data-i18n="Invoice Summary">Clients Entreprise</span></a></li>
                            <li class="{{ Request::is('prospects') ? 'active' : '' }}"><a class="menu-item" href="{{ route('call_service.prospects') }}"><i></i><span data-i18n="Invoice Summary">Clients Prospectés</span></a></li>
                        </ul>
                    </li>
                    @endif
                    @if(auth()->user()->role_id == 1 or auth()->user()->role_id == 5)
                    <li class=" nav-item" id="admin"><a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">Gestion Caisse</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('clients') ? 'active' : '' }}"><a class="menu-item" href="{{ route('clients.index') }}"><i></i><span data-i18n="Invoice Template">Liste des Clients</span></a></li>
                            <li class="{{ Request::is('caisse/facture') ? 'active' : '' }}"><a class="menu-item" href="{{ route('caisse.facture') }}"><i></i><span data-i18n="Invoice Summary">generer une facture</span></a></li>
                            <li class="{{ Request::is('factures') ? 'active' : '' }}"><a class="menu-item" href="{{ route('caisse.views') }}"><i></i><span data-i18n="Invoice Summary">visualiser les factures</span></a></li>
                        </ul>
                    </li>
                    @endif


                    <li class="nav-item" id="admin">
                        <a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="Invoice">Paramètres</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('notifications') ? 'active' : '' }}"><a class="menu-item" href="{{ route('notifications.index') }}"><i></i><span data-i18n="Invoice Summary">Notifications</span></a></li>
                        </ul>
                    </li>
            </ul>
        </div>
    </div>

         <!-- END: Main Menu-->
