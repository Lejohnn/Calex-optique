<?php $__env->startSection('title', 'Consultation - Calex Optic'); ?>
<?php $__env->startSection('description', 'Formulaire de consultation pour Calex Optic.'); ?>
<?php $__env->startSection('keywords', 'consultation, formulaire, Calex Optic'); ?>

<?php $__env->startSection('content'); ?>
<div id="heading">
    <h1>Consultation</h1>
</div>

<section id="main" class="wrapper">
    <div class="inner">
        <div class="content">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <h3>Formulaire de Consultation</h3>
                    <form method="post" action="#">
                        <div class="row gtr-uniform">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="name" id="name" value="" placeholder="Nom" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" name="email" id="email" value="" placeholder="Adresse Email" class="form-control" />
                            </div>
                            <div class="col-12 mb-3">
                                <select name="category" id="category" class="form-control">
                                    <option value="">- Sélectionner -</option>
                                    <option value="optique">Consultation Optique</option>
                                    <option value="contact">Lentilles de Contact</option>
                                    <option value="examen">Examen de la Vue</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-12 mb-3">
                                <input type="radio" id="radio-optique" name="radio" checked class="form-check-input">
                                <label for="radio-optique" class="form-check-label">Consultation Optique</label>
                            </div>
                            <div class="col-md-4 col-12 mb-3">
                                <input type="radio" id="radio-contact" name="radio" class="form-check-input">
                                <label for="radio-contact" class="form-check-label">Lentilles de Contact</label>
                            </div>
                            <div class="col-md-4 col-12 mb-3">
                                <input type="radio" id="radio-examen" name="radio" class="form-check-input">
                                <label for="radio-examen" class="form-check-label">Examen de la Vue</label>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <input type="checkbox" id="checkbox-lunettes" name="checkbox" class="form-check-input">
                                <label for="checkbox-lunettes" class="form-check-label">Lunettes de Vue</label>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <input type="checkbox" id="checkbox-lentilles" name="checkbox" checked class="form-check-input">
                                <label for="checkbox-lentilles" class="form-check-label">Lentilles Correctrices</label>
                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="textarea" id="textarea" placeholder="Message" rows="6" class="form-control"></textarea>
                            </div>
                            <div class="col-12">
                                <ul class="actions list-inline">
                                    <li class="list-inline-item"><input type="submit" value="Envoyer" class="btn btn-primary" /></li>
                                    <li class="list-inline-item"><input type="reset" value="Effacer" class="btn btn-secondary" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\line\Calex_op\Calex-optique\resources\views/consultation.blade.php ENDPATH**/ ?>