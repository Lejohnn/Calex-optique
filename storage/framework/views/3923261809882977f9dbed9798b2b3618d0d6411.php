<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <?php if(auth()->user()->role_id == 1): ?>
                <li class="nav-item" id="admin">
                    <a href="#">
                        <i class="la la-user"></i>
                        <span class="menu-title" data-i18n="Invoice">Gestion des utilisateurs</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php echo e(Request::is('users/create') ? 'active' : ''); ?>">
                            <a class="menu-item" href="<?php echo e(route('users.create')); ?>">
                                <i class="la la-plus-circle"></i>
                                <span data-i18n="Invoice Summary">Ajouter un utilisateur</span>
                            </a>
                        </li>
                        <li class="<?php echo e(Request::is('users') ? 'active' : ''); ?>">
                            <a class="menu-item" href="<?php echo e(route('users.index')); ?>">
                                <i class="la icon-list"></i>
                                <span data-i18n="Invoice Template">Lister les utilisateurs</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(auth()->user()->role_id == 1 or
                    auth()->user()->role_id == 3 or
                    auth()->user()->role_id == 2 or
                    auth()->user()->role_id == 4 or
                    auth()->user()->role_id == 10 or
                    auth()->user()->role_id == 8): ?>
                <li class="nav-item" id="client">
                    <a href="#">
                        <i class="la la-heart"></i>
                        <span class="menu-title" data-i18n="Invoice">Gestion des
                            <?php if(auth()->user()->role_id == 3 or auth()->user()->role_id == 4 or auth()->user()->role_id == 10): ?>
                                Patients
                            <?php endif; ?>
                            <?php if(auth()->user()->role_id != 3 and auth()->user()->role_id != 4 and auth()->user()->role_id != 10): ?>
                                Clients
                            <?php endif; ?>
                        </span>
                    </a>
                    <ul class="menu-content">
                        <?php if(auth()->user()->role_id == 2 or auth()->user()->role_id == 1 or auth()->user()->role_id == 8): ?>
                            <li class="<?php echo e(Request::is('clients/create') ? 'active' : ''); ?>">
                                <a class="menu-item" href="<?php echo e(route('clients.create')); ?>">
                                    <i></i>
                                    <span data-i18n="Invoice Summary">Ajouter un
                                        <?php if(auth()->user()->role_id == 3 or auth()->user()->role_id == 4): ?>
                                            Patient
                                        <?php endif; ?>
                                        <?php if(auth()->user()->role_id != 3 and auth()->user()->role_id != 4): ?>
                                            Client
                                        <?php endif; ?>
                                    </span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(auth()->user()->role_id == 2 or
                                auth()->user()->role_id == 1 or
                                auth()->user()->role_id == 3 or
                                auth()->user()->role_id == 4 or
                                auth()->user()->role_id == 10 or
                                auth()->user()->role_id == 8): ?>
                            <li class="<?php echo e(Request::is('clients') ? 'active' : ''); ?>">
                                <a class="menu-item" href="<?php echo e(route('clients.index')); ?>">
                                    <i></i>
                                    <span data-i18n="Invoice Template">Liste des
                                        <?php if(auth()->user()->role_id == 3 or auth()->user()->role_id == 4 or auth()->user()->role_id == 10): ?>
                                            Patients
                                        <?php endif; ?>
                                        <?php if(auth()->user()->role_id != 3 and auth()->user()->role_id != 4 and auth()->user()->role_id != 10): ?>
                                            Clients
                                        <?php endif; ?>
                                    </span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(auth()->user()->role_id == 4 or auth()->user()->role_id == 1): ?>
                            <li class="<?php echo e(Request::is('clients/factures') ? 'active' : ''); ?>">
                                <a class="menu-item" href="<?php echo e(route('caisse.recu.index')); ?>">
                                    <i></i>
                                    <span data-i18n="Invoice Template">Liste des Reçus</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 3): ?>
                            <li class="<?php echo e(Request::is('ordonnance/generate') ? 'active' : ''); ?>">
                                <a class="menu-item" href="<?php echo e(route('ordonnance.create')); ?>">
                                    <i></i>
                                    <span data-i18n="Invoice Template">Faire une Ordonnance</span>
                                </a>
                            </li>
                            <li class="<?php echo e(Request::is('prescriptions') ? 'active' : ''); ?>">
                                <a class="menu-item" href="<?php echo e(route('prescriptions.index')); ?>">
                                    <i></i>
                                    <span data-i18n="Invoice Template">Lister les Ordonnances</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(auth()->user()->role_id == 1 or
                    auth()->user()->role_id == 6 or
                    auth()->user()->role_id == 8 or
                    auth()->user()->role_id == 10): ?>
                <li class="nav-item" id="admin">
                    <a href="#">
                        <i class="la la-users"></i>
                        <span class="menu-title" data-i18n="Invoice">Gestion des Commerciaux</span>
                    </a>
                    <ul class="menu-content">
                        <?php if(auth()->user()->role_id == 1 or
                                auth()->user()->role_id == 6 or
                                auth()->user()->role_id == 8 or
                                auth()->user()->role_id == 10): ?>
                            <li class="<?php echo e(Request::is('commercial') ? 'active' : ''); ?>">
                                <a class="menu-item" href="<?php echo e(route('commercial.index')); ?>">
                                    <i></i>
                                    <span data-i18n="Invoice Summary">Lister les Clients Prospectés</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 8): ?>
                            <li class="<?php echo e(Request::is('agent/create') ? 'active' : ''); ?>">
                                <a class="menu-item" href="<?php echo e(route('agent.create')); ?>">
                                    <i class="la la-user-tie"></i>
                                    <span data-i18n="Invoice Summary">Ajouter Un Commercial</span>
                                </a>
                            </li>
                            <li class="<?php echo e(Request::is('commercialstat') ? 'active' : ''); ?>">
                                <a class="menu-item" href="<?php echo e(route('commercial.stats')); ?>">
                                    <i></i>
                                    <span data-i18n="Invoice Summary">Statistiques</span>
                                </a>
                            </li>
                            
                        <?php endif; ?>
                        <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 6 or auth()->user()->role_id == 8): ?>
                            <li class="<?php echo e(Request::is('commercial/create') ? 'active' : ''); ?>">
                                <a class="menu-item" href="<?php echo e(route('commercial.create')); ?>">
                                    <i></i>
                                    <span data-i18n="Invoice Summary">Enregistrer Un Client</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </li>
            <?php endif; ?>

            
            <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 5): ?>
                <li class="nav-item" id="admin">
                    <a href="#">
                        <i class="la la-money"></i>
                        <span class="menu-title" data-i18n="Invoice">Gestion Caisse</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php echo e(Request::is('clients') ? 'active' : ''); ?>">
                            <a class="menu-item" href="<?php echo e(route('clients.index')); ?>">
                                <i></i>
                                <span data-i18n="Invoice Template">Liste des Clients</span>
                            </a>
                        </li>
                        <li class="<?php echo e(Request::is('caisse/facture') ? 'active' : ''); ?>">
                            <a class="menu-item" href="<?php echo e(route('caisse.facture')); ?>">
                                <i></i>
                                <span data-i18n="Invoice Summary">Générer une facture</span>
                            </a>
                        </li>
                        <li class="<?php echo e(Request::is('factures') ? 'active' : ''); ?>">
                            <a class="menu-item" href="<?php echo e(route('caisse.views')); ?>">
                                <i></i>
                                <span data-i18n="Invoice Summary">Visualiser les factures</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 4): ?>
                <li class="nav-item" id="admin">
                    <a href="#">
                        <i class="la icon-eyeglasses"></i>
                        <span class="menu-title" data-i18n="Invoice">Montures</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php echo e(Request::is('brands') ? 'active' : ''); ?>">
                            <a class="menu-item" href="<?php echo e(route('brands.index')); ?>">
                                <i></i>
                                <span data-i18n="Invoice Summary">Marques</span>
                            </a>
                        </li>
                        <li class="<?php echo e(Request::is('get-codes') ? 'active' : ''); ?>">
                            <a class="menu-item" href="<?php echo e(route('frames.index')); ?>">
                                <i></i>
                                <span data-i18n="Invoice Summary">Codes</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 4): ?>
                <li class="nav-item" id="admin">
                    <a href="#">
                        <i class="la ft-book"></i>
                        <span class="menu-title" data-i18n="Invoice">Gestion Bons</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php echo e(Request::is('bons') ? 'active' : ''); ?>">
                            <a class="menu-item" href="<?php echo e(route('bons.index')); ?>">
                                <i></i>
                                <span data-i18n="Invoice Summary">Etat des Bons</span>
                            </a>
                        </li>
                        <li class="<?php echo e(Request::is('orders') ? 'active' : ''); ?>">
                            <a class="menu-item" href="<?php echo e(route('orders.index')); ?>">
                                <i></i>
                                <span data-i18n="Invoice Summary">Commandes</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <li class="nav-item" id="admin">
                <a href="#">
                    <i class="la la-gear"></i>
                    <span class="menu-title" data-i18n="Invoice">Paramètres</span>
                </a>
                <ul class="menu-content">
                    <li class="<?php echo e(Request::is('notifications') ? 'active' : ''); ?>">
                        <a class="menu-item" href="<?php echo e(route('notifications.index')); ?>">
                            <i></i>
                            <span data-i18n="Invoice Summary">Notifications</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
<?php /**PATH D:\line\Calex_op\Calex-optique\resources\views//partial/main_menu.blade.php ENDPATH**/ ?>