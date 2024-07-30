<?php $__env->startSection('title', 'Modifier un Client'); ?>

<?php $__env->startSection('contenu'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Edit Client Form -->
            <section id="edit-client">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Modifier un Client</h4>
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
                                        <form action="<?php echo e(route('clients.update', $client)); ?>" method="POST" class="edit-client-form">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <!-- Informations du client -->

                                            <h6>
                                                <i class="step-icon la la-user"></i>
                                                Informations du client (Accueil)
                                            </h6>
                                            <?php if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3 || auth()->user()->role_id == 4 || auth()->user()->role_id == 5 ): ?>
                                                <fieldset>
                                                    <?php if(auth()->user()->role_id !== 1 && auth()->user()->role_id !== 2): ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="prenom">Prénom <span class="text-danger">*</span></label>
                                                                    <input class="form-control" id="prenom" name="prenom" type="text" value="<?php echo e($client->prenom); ?>" required readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="nom">Nom <span class="text-danger">*</span></label>
                                                                    <input class="form-control" id="nom" name="nom" type="text" value="<?php echo e($client->nom); ?>" required readonly  />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="telephone">N° de Téléphone <span class="text-danger">*</span></label>
                                                                    <input class="form-control" id="telephone" name="telephone" type="text" value="<?php echo e($client->telephone); ?>" required readonly />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="carte_identite">N° de carte Nationale d’identité</label>
                                                                    <input class="form-control" id="carte_identite" name="carte_identite" type="text" value="<?php echo e($client->carte_identite); ?>" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="prenom">Prénom <span class="text-danger">*</span></label>
                                                                    <input class="form-control" id="prenom" name="prenom" type="text" value="<?php echo e($client->prenom); ?>" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="nom">Nom <span class="text-danger">*</span></label>
                                                                    <input class="form-control" id="nom" name="nom" type="text" value="<?php echo e($client->nom); ?>" required  />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="telephone">N° de Téléphone <span class="text-danger">*</span></label>
                                                                    <input class="form-control" id="telephone" name="telephone" type="text" value="<?php echo e($client->telephone); ?>" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="carte_identite">N° de carte Nationale d’identité</label>
                                                                    <input class="form-control" id="carte_identite" name="carte_identite" type="text" value="<?php echo e($client->carte_identite); ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="date_naissance">Date de naissance</label>
                                                                <input class="form-control" id="date_naissance" name="date_naissance" type="date" value="<?php echo e($client->date_naissance); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lieu_naissance">Lieu de naissance</label>
                                                                <input class="form-control" id="lieu_naissance" name="lieu_naissance" type="text" value="<?php echo e($client->lieu_naissance); ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="profession">Profession</label>
                                                                <input class="form-control" id="profession" name="profession" type="text" value="<?php echo e($client->profession); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="sexe">Sexe :<span class="text-danger">*</span></label>
                                                                <select class="form-control" id="sexe" name="sexe" required>
                                                                    <option value="M" <?php if($client->sexe == 'M'): ?> selected <?php endif; ?>>Masculin</option>
                                                                    <option value="F" <?php if($client->sexe == 'F'): ?> selected <?php endif; ?>>Féminin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="assurance">Assurance</label>
                                                                <input class="form-control" id="assurance" name="assurance" type="text" value="<?php echo e($client->assurance); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="societe_attache">Société d’attache</label>
                                                                <input class="form-control" id="societe_attache" name="societe_attache" type="text" value="<?php echo e($client->societe_attache); ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            <?php endif; ?>

                                            <!-- Informations supplémentaires (Médecin/Administrateur) -->
                                            <?php if(auth()->user()->role_id == 3 || auth()->user()->role_id == 1): ?>
                                                <fieldset>
                                                    <h6>
                                                        <i class="step-icon la la-plus"></i>
                                                        Informations supplémentaires (Médecin/Administrateur)
                                                    </h6>
                                                    <!-- Ajoutez ici les champs pré-remplis avec les valeurs existantes du client -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="disciplines_pratiquees">Discipline(s) pratiquée(s)</label>
                                                                <input class="form-control" id="disciplines_pratiquees" name="disciplines_pratiquees" type="text" value="<?php echo e($client->disciplines_pratiquees); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="date_debut">Date de début</label>
                                                                <input class="form-control" id="date_debut" name="date_debut" type="date" value="<?php echo e($client->date_debut); ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="activite_interpelant_vision">Activité interpelant la vision</label>
                                                                <input class="form-control" id="activite_interpelant_vision" name="activite_interpelant_vision" type="text" value="<?php echo e($client->activite_interpelant_vision); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="antecedents_familiaux">Antécédents familiaux</label>
                                                                <textarea class="form-control" id="antecedents_familiaux" name="antecedents_familiaux"><?php echo e($client->antecedents_familiaux); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="antecedents_chirurgicaux">Antécédents chirurgicaux (avec date) y compris ORL, ophtalmo</label>
                                                                <textarea class="form-control" id="antecedents_chirurgicaux" name="antecedents_chirurgicaux"><?php echo e($client->antecedents_chirurgicaux); ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="traitements_en_cours">Traitements en cours</label>
                                                                <textarea class="form-control" id="traitements_en_cours" name="traitements_en_cours"><?php echo e($client->traitements_en_cours); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="allergies">Allergies</label>
                                                                <textarea class="form-control" id="allergies" name="allergies"><?php echo e($client->allergies); ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mentions_generales">Mentions générales</label>
                                                                <textarea class="form-control" id="mentions_generales" name="mentions_generales"><?php echo e($client->mentions_generales); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="portez_vous_des_lunettes">Portez-vous des lunettes ?</label>
                                                                <select class="form-control" id="portez_vous_des_lunettes" name="portez_vous_des_lunettes">
                                                                    <option value="" disabled selected>Sélectionnez</option>
                                                                    <option value="1" <?php if($client->portez_vous_des_lunettes == 1): ?> selected <?php endif; ?>>Oui</option>
                                                                    <option value="0" <?php if($client->portez_vous_des_lunettes == 0): ?> selected <?php endif; ?>>Non</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="besoin_changer_lunettes">Avez-vous besoin de changer de lunettes ?</label>
                                                                <select class="form-control" id="besoin_changer_lunettes" name="besoin_changer_lunettes">
                                                                    <option value="" disabled selected>Sélectionnez</option>
                                                                    <option value="1" <?php if($client->besoin_changer_lunettes == 1): ?> selected <?php endif; ?>>Oui</option>
                                                                    <option value="0" <?php if($client->besoin_changer_lunettes == 0): ?> selected <?php endif; ?>>Non</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="autre_choses">Autre chose à mentionner au besoin</label>
                                                                <textarea class="form-control" id="autre_choses" name="autre_choses"><?php echo e($client->autre_choses); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="diagnostic">Diagnostic</label>
                                                                <textarea class="form-control" id="diagnostic" name="diagnostic"><?php echo e($client->diagnostic); ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="prescription">Prescription</label>
                                                                <textarea class="form-control" id="prescription" name="prescription"><?php echo e($client->prescription); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="examen_particulier">Examen particulier</label>
                                                                <textarea class="form-control" id="examen_particulier" name="examen_particulier"><?php echo e($client->examen_particulier); ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="rendez_vous">Rendez-vous</label>
                                                                <input class="form-control" id="rendez_vous" name="rendez_vous" type="date" value="<?php echo e($client->rendez_vous); ?>" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                </fieldset>
                                            <?php endif; ?>
                                                <?php if(auth()->user()->role_id == 1 || auth()->user()->role_id == 4): ?>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="entretien">Entretien:</label>
                                                            <select id="entretien" name="entretien" class="form-control"  required>
                                                                <option value="" selected disabled>Choisissez</option>
                                                                <option value="non payant" <?php echo e($client->entretien == "non payant" ? 'selected' : ''); ?>>Non payant</option>
                                                                <option value="payant" <?php echo e($client->entretien == "payant" ? 'selected' : ''); ?>>Payant</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 " >
                                                            <label for="montant">Montant:</label>
                                                            <input class="form-control" type="number" id="montant" name="montant" value="<?php echo e($client->montant); ?>" step="1000">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="choix_service">Choix du Service <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="choix_service" name="choix_service">
                                                            <option value="" selected disabled>Choisissez le service</option>
                                                            <option value="consultation" <?php echo e($client->choix_service == 'consultation' ? 'selected' : ''); ?>>Consultation</option>
                                                            <option value="entretien_lunettes" <?php echo e($client->choix_service == 'entretien_lunettes' ? 'selected' : ''); ?>>Entretien de lunettes</option>
                                                            <option value="caisse" <?php echo e($client->choix_service == 'caisse' ? 'selected' : ''); ?>>Caisse</option>
                                                            
                                                            <option value="visite_simple" <?php echo e($client->choix_service == 'visite_simple' ? 'selected' : ''); ?>>Visite Simple</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php if(auth()->user()->role_id == 1 or auth()->user()->role_id == 2): ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="canal">Canal</label>
                                                            <select class="form-control" id="canal_select" name="canal_select" style="display: none;">
                                                                <option value="">Sélectionnez un commercial</option>
                                                                <?php $__currentLoopData = $commercials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commercial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($commercial->full_name); ?>" <?php echo e($client->canal == $commercial->full_name ? 'selected' : ''); ?>><?php echo e($commercial->full_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <input class="form-control" id="canal_input" name="canal_input" type="text" value="<?php echo e($client->canal); ?>" />
                                                            <i class="fas fa-edit mt-2" id="toggle_canal_input" style="cursor: pointer;" title="Sélectionner un commercial"></i>
                                                        </div>
                                                        <input type="hidden" name="canal" id="canal_hidden" value="<?php echo e($client->canal); ?>">
                                                    </div>
                                                <?php endif; ?>
                                                <script>
                                                    document.getElementById('toggle_canal_input').addEventListener('click', function() {
                                                        var canalSelect = document.getElementById('canal_select');
                                                        var canalInput = document.getElementById('canal_input');

                                                        if (canalSelect.style.display === 'none') {
                                                            canalSelect.style.display = 'block';
                                                            canalInput.style.display = 'none';
                                                            canalSelect.required = true;
                                                            canalInput.required = false;
                                                            this.setAttribute('title', 'Saisir manuellement');
                                                        } else {
                                                            canalSelect.style.display = 'none';
                                                            canalInput.style.display = 'block';
                                                            canalSelect.required = false;
                                                            canalInput.required = true;
                                                            this.setAttribute('title', 'Sélectionner un commercial');
                                                        }
                                                    });

                                                    document.querySelector('form').addEventListener('submit', function(e) {
                                                        var canalSelect = document.getElementById('canal_select');
                                                        var canalInput = document.getElementById('canal_input');
                                                        var canalHidden = document.getElementById('canal_hidden');

                                                        if (canalSelect.style.display !== 'none') {
                                                            var selectedOption = canalSelect.options[canalSelect.selectedIndex].text;
                                                            canalHidden.value = selectedOption;
                                                        } else {
                                                            canalHidden.value = canalInput.value;
                                                        }
                                                    });
                                                </script>

                                            </div>
                                            <!-- Bouton de soumission -->
                                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/clients/edit.blade.php ENDPATH**/ ?>