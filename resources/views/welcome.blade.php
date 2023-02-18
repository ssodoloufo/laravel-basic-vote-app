@extends('layouts.app')

@section('title', 'Bienvenu')

@section('content')
<div class="col-lg-6">
            <p class="h3 mb-4 text-center">
                Bienvenu sur notre application de vote. <br>
                Pour continuer, veuillez entrez votre identifiant.
            </p>
    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-body text-center">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('template/img/undraw_voting.svg')}}" alt="...">
            </div>

            <form method="POST" action="{{ route('session.open') }}">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="col-lg-6 mb-4">
                        <input type="password" name="code" class="form-control @error('code') is-invalid @enderror" required autofocus id="inputPassword" placeholder="Votre code secret, SVP !">
                        @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">
                        Commencer
                        <i class="ml-2 fa fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@stop
