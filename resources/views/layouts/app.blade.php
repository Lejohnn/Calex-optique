<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <!-- Meta tags, title, favicon, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title') - Dashboard TDC</title>
    <link rel="apple-touch-icon" href="{{ asset('backend/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <style></style>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- Other head elements -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/fonts/simple-line-icons/style.css') }}">
    <!-- END: Theme CSS-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/tables/datatable/datatables.min.css') }}">
    <!-- END: Page CSS-->
</head>

<body class="vertical-layout vertical-menu-modern 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    @include('.partial.navbar')
    @include('.partial.main_menu')
    @yield('contenu')
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    @include('.partial.footer')

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Toastr.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
    <!-- END: Page JS-->

    <!-- Your custom script -->
        <script>
            $(document).ready(function() {
                function attachNavItemClickEvents() {
                    $('.nav-item').off('click').on('click', function() {
                        var $menuContent = $(this).find('.menu-content');
                        if ($menuContent.is(':visible')) {
                            $menuContent.slideUp();
                        } else {
                            $('.menu-content').slideUp(); // Ferme tous les autres menus ouverts
                            $menuContent.slideDown();
                        }
                    });
                }

                function attachAppointmentBtnClickEvents() {
                    $(document).off('click', '.appointment-btn').on('click', '.appointment-btn', function() {
                        var clientId = $(this).data('id');
                        $('#client_id').val(clientId);
                        console.log("Appointment button clicked, clientId:", clientId);
                    });
                }

                // Désactiver les alertes de DataTables
                $.fn.dataTable.ext.errMode = 'none';

                // Initialisation de DataTable
                var table = $('.datatable').DataTable({
                    "order": [
                        [2, "desc"]
                    ] // Indice de la colonne Date Facture (2) et ordre décroissant (desc)
                });

                // Attach the events on initial page load
                attachNavItemClickEvents();
                attachAppointmentBtnClickEvents();

                // Attach the events on each draw event (pagination, search, etc.)
                table.on('draw', function() {
                    attachNavItemClickEvents();
                    attachAppointmentBtnClickEvents();
                });

                // Gestion du formulaire de rendez-vous
                $('#appointmentForm').on('submit', function(event) {
                    event.preventDefault();
                    var clientId = $('#client_id').val();
                    var rendezVousDate = $('#rendez_vous').val();
                    var rendezVousTime = $('#rendez_vous_time').val();
                    var rendezVous = rendezVousDate + ' ' + rendezVousTime;

                    console.log("Form submitted, clientId:", clientId, "rendezVousDate:", rendezVousDate, "rendezVousTime:", rendezVousTime);

                        $.ajax({
                            url: "{{ route('clients.setAppointment') }}",
                            method: 'POST',
                            data: {
                                _token: $('input[name="_token"]').val(),
                                client_id: clientId,
                                rendez_vous: rendezVousDate,
                                rendez_vous_time: rendezVousTime
                            },
                            success: function(response) {
                                console.log("AJAX request successful, response:", response);
                                $('#appointmentModal').modal('hide');

                                // SweetAlert success message
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Rendez-vous défini!',
                                    text: 'Le rendez-vous a été défini avec succès.',
                                    showConfirmButton: false,
                                    timer: 2000
                                });

                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            },
                            error: function(response) {
                                console.log("AJAX request failed, response:", response);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erreur!',
                                    text: 'Une erreur est survenue. Veuillez réessayer.',
                                    showConfirmButton: true
                                });
                            }
                        });
                    });

                // Toastr notifications
                @if (isset($toastrNotifications))
                    var notifications = @json($toastrNotifications);
                    console.log('Notifications:', notifications); // Debugging line

                    notifications.forEach(function(notification) {
                        if (notification) {
                            var toastrClass;
                            if (notification.includes('dans 2 jours')) {
                                toastrClass = 'toast-warning';
                            } else if (notification.includes('demain') || notification.includes(
                                'aujourd\'hui')) {
                                toastrClass = 'toast-info';
                            } else {
                                toastrClass = 'toast-info'; // Default class
                            }

                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };
                            toastr.info(notification, 'Rappel', {
                                "className": toastrClass
                            });
                        }
                    });
                @endif
    });

        </script>
</body>
</html>
