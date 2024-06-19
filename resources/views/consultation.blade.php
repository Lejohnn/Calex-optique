@extends('layouts.app1')


@section('title', 'Consultation - Calex Optic')
@section('description', 'Formulaire de consultation pour Calex Optic.')
@section('keywords', 'consultation, formulaire, Calex Optic')

@section('content')
<div id="heading">
    <h1>Consultation</h1>
</div>

<section id="main" class="wrapper">
    <div class="inner">
        <div class="content">
            <div class="row">
                <div class="col-6 col-12-medium">
                    <h3>Formulaire de Consultation</h3>
                    <form method="post" action="#">
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                <input type="text" name="name" id="name" value="" placeholder="Nom" />
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <input type="email" name="email" id="email" value="" placeholder="Adresse Email" />
                            </div>
                            <div class="col-12">
                                <select name="category" id="category">
                                    <option value="">- Sélectionner -</option>
                                    <option value="optique">Consultation Optique</option>
                                    <option value="contact">Lentilles de Contact</option>
                                    <option value="examen">Examen de la Vue</option>
                                </select>
                            </div>
                            <div class="col-4 col-12-small">
                                <input type="radio" id="radio-optique" name="radio" checked>
                                <label for="radio-optique">Consultation Optique</label>
                            </div>
                            <div class="col-4 col-12-small">
                                <input type="radio" id="radio-contact" name="radio">
                                <label for="radio-contact">Lentilles de Contact</label>
                            </div>
                            <div class="col-4 col-12-small">
                                <input type="radio" id="radio-examen" name="radio">
                                <label for="radio-examen">Examen de la Vue</label>
                            </div>
                            <div class="col-6 col-12-small">
                                <input type="checkbox" id="checkbox-lunettes" name="checkbox">
                                <label for="checkbox-lunettes">Lunettes de Vue</label>
                            </div>
                            <div class="col-6 col-12-small">
                                <input type="checkbox" id="checkbox-lentilles" name="checkbox" checked>
                                <label for="checkbox-lentilles">Lentilles Correctrices</label>
                            </div>
                            <div class="col-12">
                                <textarea name="textarea" id="textarea" placeholder="Message" rows="6"></textarea>
                            </div>
                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Envoyer" class="primary" /></li>
                                    <li><input type="reset" value="Effacer" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
