@extends('layouts.app1')

@section('content')
    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>CALEX'OPTIC</h1>
            <p>Un cabinet d'optique médical offrant des solutions personnalisées pour vos besoins en vision.<br /></p>
        </div>
        <video autoplay loop muted playsinline src="{{ asset('images/banner.mp4') }}"></video>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <header class="special">
                <h2>Services Optiques</h2>
                <p>CALEX'OPTIC propose une gamme complète de services pour répondre à vos besoins en vision.</p>
            </header>
            <div class="highlights">
                <section>
                    <div class="content">
                        <header>
                            <a href="#" class="icon fa-vcard-o"><span class="label">Icon</span></a>
                            <h3>Consultation des Yeux</h3>
                        </header>
                        <p>Des consultations personnalisées pour évaluer et préserver la santé de vos yeux.</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="#" class="icon fa-files-o"><span class="label">Icon</span></a>
                            <h3>Vente de Lunettes</h3>
                        </header>
                        <p>Une sélection soigneusement choisie de lunettes pour répondre à vos besoins de vision et de style.</p>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="#" class="icon fa-floppy-o"><span class="label">Icon</span></a>
                            <h3>Conseils Optiques</h3>
                        </header>
                        <p>Des conseils experts pour vous aider à prendre les meilleures décisions pour votre santé visuelle.</p>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section id="cta" class="wrapper">
        <div class="inner">
            <h2>Votre Vision, Notre Priorité</h2>
            <p>À CALEX'OPTIC, nous nous engageons à fournir des soins optiques de qualité supérieure pour vous et votre famille.</p>
        </div>
    </section>
@endsection
