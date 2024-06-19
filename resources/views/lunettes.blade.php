@extends('layouts.app1')

@section('title', 'Lunettes de Calex Optic')
@section('description', '')
@section('keywords', '')

@section('content')
<div id="heading">
    <h1>Lunettes de Calex Optic</h1>
</div>

<section id="main" class="wrapper">
    <div class="inner">
        <div class="content">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <!-- Add more indicators if needed -->
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('frontend/images/lunettes1.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('frontend/images/lunettes2.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('frontend/images/lunettes3.jpg') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('frontend/images/lunettes4.jpg') }}" alt="Fourth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('frontend/images/lunettes5.jpg') }}" alt="Fifth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('frontend/images/lunettes6.jpg') }}" alt="Sixth slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <hr />
            <h3>Qualité et Style</h3>
            <p>Nos lunettes sont fabriquées avec les meilleurs matériaux pour assurer un confort optimal et une durabilité exceptionnelle. Que vous recherchiez des lunettes de vue ou des lunettes de soleil, nous avons ce qu'il vous faut.</p>
            <p>Chaque paire de lunettes de Calex Optic est conçue avec soin pour refléter les dernières tendances de la mode tout en offrant une vision claire et confortable.</p>
        </div>
    </div>
</section>
@endsection
