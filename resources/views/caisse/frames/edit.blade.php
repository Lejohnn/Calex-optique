@extends('layouts.app')

@section('title', 'Modifier la Monture')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section id="edit-frame">
                <div class="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Modifier la Monture</h4>
                                    <div class="heading-elements">
                                        <a href="{{ route('frames.index') }}" class="btn btn-primary">
                                            <i class="la la-list font-small-2"></i> Voir les Montures
                                        </a>
                                    </div>
                                </div>
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-content collapse show">
                                    @if(auth()->user()->role_id == 1 )
                                        <div class="card-body">
                                            <form action="{{ route('frames.update', $frame->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="code">Code de la Monture <span class="text-danger">*</span></label>
                                                    <input type="text" id="code" name="code" class="form-control" value="{{ $frame->code }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="brand_id">Marque <span class="text-danger">*</span></label>
                                                    <select id="brand_id" name="brand_id" class="form-control" required>
                                                        @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}" {{ $brand->id == $frame->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('backend/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('backend/js/core/app-menu.js') }}"></script>
<script src="{{ asset('backend/js/core/app.js') }}"></script>
