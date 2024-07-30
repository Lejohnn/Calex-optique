<?php $__env->startSection('title', 'Ajouter un Client'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Add Client Form -->
            <section id="add-client">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ajouter un Client</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                         <!-- Display Success Message -->
                                        <?php if(session('success')): ?>
                                            <div class="alert alert-success">
                                                <?php echo e(session('success')); ?>

                                            </div>
                                        <?php endif; ?>

                                        <!-- Display Errors -->
                                        <?php if($errors->any()): ?>
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                        <form action="<?php echo e(route('clients.store')); ?>" method="POST" class="add-client-form">

                                            <?php echo csrf_field(); ?>

                                            <input type="hidden" name="user_id" value="<?php echo e(auth()->id()); ?>">
                                            <!-- Informations du client -->

                                                <h6>
                                                    <i class="step-icon la la-user"></i>
                                                    Informations du client (Accueil)
                                                </h6>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="prenom">Prénom <span class="text-danger">*</span></label>
                                                                <input class="form-control" id="prenom" name="prenom" type="text" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nom">Nom <span class="text-danger">*</span></label>
                                                                <input class="form-control" id="nom" name="nom" type="text" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="telephone">N° de Téléphone <span class="text-danger">*</span></label>
                                                                <input class="form-control" id="telephone" name="telephone" type="text" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="carte_identite">N° de carte Nationale d’identité</label>
                                                                <input class="form-control" id="carte_identite" name="carte_identite" type="text"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="date_naissance">Date de naissance</label>
                                                                <input class="form-control" id="date_naissance" name="date_naissance" type="date" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lieu_naissance">Lieu de naissance</label>
                                                                <input class="form-control" id="lieu_naissance" name="lieu_naissance" type="text" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="profession">Profession</label>
                                                                <input class="form-control" id="profession" name="profession" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="sexe">Sexe :<span class="text-danger">*</span></label>
                                                                <select class="form-control" id="sexe" name="sexe" required>
                                                                    <option value="" selected disabled>Sélectionnez le sexe</option>
                                                                    <option value="M">Masculin</option>
                                                                    <option value="F">Féminin</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="assurance">Assurance</label>
                                                                <input class="form-control" id="assurance" name="assurance" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="societe_attache">Société d’attache</label>
                                                                <input class="form-control" id="societe_attache" name="societe_attache" type="text" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                            <!-- Informations supplémentaires (Médecin/Administrateur) -->

                                            <?php if(auth()->user()->role_id == 3): ?>
                                                <fieldset>
                                                    <!-- Ajoutez ici les nouveaux champs pour les informations supplémentaires -->
                                                    <h6>
                                                        <i class="step-icon la la-plus"></i>
                                                        Informations supplémentaires (Médecin/Administrateur)
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="disciplines_pratiquees">Discipline(s) pratiquée(s)</label>
                                                                <input class="form-control" id="disciplines_pratiquees" name="disciplines_pratiquees" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="date_debut">Date de début</label>
                                                                <input class="form-control" id="date_debut" name="date_debut" type="date" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="activite_interpelant_vision">Activité interpelant la vision</label>
                                                                <input class="form-control" id="activite_interpelant_vision" name="activite_interpelant_vision" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="antecedents_familiaux">Antécédents familiaux</label>
                                                                <textarea class="form-control" id="antecedents_familiaux" name="antecedents_familiaux"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="antecedents_chirurgicaux">Antécédents chirurgicaux (avec date) y compris ORL, ophtalmo</label>
                                                                <textarea class="form-control" id="antecedents_chirurgicaux" name="antecedents_chirurgicaux"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="traitements_en_cours">Traitements en cours</label>
                                                                <textarea class="form-control" id="traitements_en_cours" name="traitements_en_cours"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="allergies">Allergies</label>
                                                                <textarea class="form-control" id="allergies" name="allergies"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mentions_generales">Mentions générales</label>
                                                                <textarea class="form-control" id="mentions_generales" name="mentions_generales"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="portez_vous_des_lunettes">Portez-vous des lunettes ?</label>
                                                                <select class="form-control" id="portez_vous_des_lunettes" name="portez_vous_des_lunettes">
                                                                    <option value="" selected disabled>Choisissez</option>
                                                                    <option value="1">Oui</option>
                                                                    <option value="0">Non</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="besoin_changer_lunettes">Avez-vous besoin de changer de lunettes ?</label>
                                                                <select class="form-control" id="besoin_changer_lunettes" name="besoin_changer_lunettes">
                                                                <option value="" selected disabled>Choisissez</option>
                                                                    <option value="1">Oui</option>
                                                                    <option value="0">Non</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="autre_choses">Autre chose à mentionner au besoin</label>
                                                                <textarea class="form-control" id="autre_choses" name="autre_choses"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="diagnostic">Diagnostic</label>
                                                                <textarea class="form-control" id="diagnostic" name="diagnostic"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="prescription">Prescription</label>
                                                                <textarea class="form-control" id="prescription" name="prescription"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="examen_particulier">Examen particulier</label>
                                                                <textarea class="form-control" id="examen_particulier" name="examen_particulier"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="rendez_vous">Rendez-vous</label>
                                                                <input class="form-control" id="rendez_vous" name="rendez_vous" type="date" />
                                                            </div>
                                                        </div>
                                                </fieldset>
                                            <?php endif; ?>
                                                <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 4): ?>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="entretien">Entretien:</label>
                                                            <select id="entretien" name="entretien" class="form-control" required>
                                                                <option value="non payant">Non payant</option>
                                                                <option value="payant">Payant</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 " >
                                                            <label for="montant">Montant:</label>
                                                            <input class="form-control" type="number" id="montant" name="montant" step="0.01">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="choix_service">Choix du Service <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="choix_service" name="choix_service" required>
                                                                <option value="" selected disabled>Choisissez le service</option>
                                                                <option value="consultation">Consultation</option>
                                                                <option value="entretien_lunettes">Entretien de lunettes</option>
                                                                <option value="caisse">Caisse</option>
                                                                
                                                                <option value="visite_simple">Visite Simple</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="canal">Canal</label>
                                                            <select class="form-control" id="canal_select" name="canal_select">
                                                                <option value="">Sélectionnez un commercial</option>
                                                                <?php $__currentLoopData = $commercials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commercial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($commercial->id); ?>"><?php echo e($commercial->full_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <input class="form-control d-none" id="canal_input" name="canal_input" type="text" />
                                                            <i class="fas fa-edit mt-2" id="toggle_canal_input" style="cursor: pointer;" title="Saisir manuellement"></i>
                                                        </div>
                                                        <input type="hidden" name="canal" id="canal_hidden" value="">
                                                    </div>

                                                    <script>
                                                        document.getElementById('toggle_canal_input').addEventListener('click', function() {
                                                            var canalSelect = document.getElementById('canal_select');
                                                            var canalInput = document.getElementById('canal_input');

                                                            if (canalSelect.classList.contains('d-none')) {
                                                                canalSelect.classList.remove('d-none');
                                                                canalInput.classList.add('d-none');
                                                                canalSelect.required = true;
                                                                canalInput.required = false;
                                                                this.setAttribute('title', 'Saisir manuellement');
                                                            } else {
                                                                canalSelect.classList.add('d-none');
                                                                canalInput.classList.remove('d-none');
                                                                canalSelect.required = false;
                                                                canalInput.required = true;
                                                                this.setAttribute('title', 'Sélectionner un commercial');
                                                            }
                                                        });

                                                        document.querySelector('form').addEventListener('submit', function(e) {
                                                            var canalSelect = document.getElementById('canal_select');
                                                            var canalInput = document.getElementById('canal_input');
                                                            var canalHidden = document.getElementById('canal_hidden');

                                                            if (!canalSelect.classList.contains('d-none')) {
                                                                var selectedOption = canalSelect.options[canalSelect.selectedIndex].text;
                                                                canalHidden.value = selectedOption;
                                                            } else {
                                                                canalHidden.value = canalInput.value;
                                                            }
                                                        });
                                                    </script>




                                                </div>


                                            <!-- Bouton de soumission -->
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>





<!-- BEGIN: Vendor JS-->
<script src="<?php echo e(asset('backend/vendors/js/vendors.min.js')); ?>"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo e(asset('backend/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?php echo e(asset('backend/js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/core/app.js')); ?>"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo e(asset('backend/js/scripts/pages/hospital-patients-list.js')); ?>"></script>
<!-- END: Page JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/clients/create.blade.php ENDPATH**/ ?>