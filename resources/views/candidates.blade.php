@extends('layouts.app')

@section('title', 'Les nominés')

@section('content')
<div class="col-lg-8">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> <strong><u>LES NOMINES PAR DIRECTION</u></strong> </h1>
    <p class="mb-4">
        <strong>{{ session('membreJuryName') }}</strong>, bienvenu sur notre platforme de vote.<br>
        Ci-dessous la liste des candidats regroupés par direction et/ou departement. <br>
        Votre tâche sera de la parcourir, puis d'en sélectionner vos 5 nominés,
        après quoi vous entrerez à nouveau votre code avant la soumission du formulaire.
    </p>

    <!-- notification -->
    @if (Session::has('errorMessage'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Ooops !</strong> <br>
        {{ session('errorMessage') }}
    </div>
    @endif

    <!-- form -->
    <form method="POST" action="{{ route('candidats.store') }}">
        @csrf
        <!-- 1. Accounting -->
        <div class="card border-left-primary shadow h-100 py-2 mb-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="d-flex justify-content-between text-lg">
                            <div class="font-weight-bold text-primary text-uppercase mb-4">
                                Accounting
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($data['forDep_01'] as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="choice[]" value="$item->id" aria-label="Checkbox for following text input">
                                        </td>
                                        <td>{{ $item->matricule}}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->title }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Engineering -->
        <div class="card border-left-primary shadow h-100 py-2 mb-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="d-flex justify-content-between text-lg">
                            <div class="font-weight-bold text-primary text-uppercase mb-4">
                                Engineering
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($data['forDep_02'] as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="choice[]" value="{{ $item->id}}" aria-label="Checkbox for following text input">
                                        </td>
                                        <td>{{ $item->matricule}}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->title }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Human Resources -->
        <div class="card border-left-primary shadow h-100 py-2 mb-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="d-flex justify-content-between text-lg">
                            <div class="font-weight-bold text-primary text-uppercase mb-4">
                                Human Resources
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($data['forDep_03'] as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="choice[]" value="{{ $item->id}}" aria-label="Checkbox for following text input">
                                        </td>
                                        <td>{{ $item->matricule}}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->title }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Legal -->
        <div class="card border-left-primary shadow h-100 py-2 mb-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="d-flex justify-content-between text-lg">
                            <div class="font-weight-bold text-primary text-uppercase mb-4">
                                Legal
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($data['forDep_04'] as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="choice[]" value="{{ $item->id}}" aria-label="Checkbox for following text input">
                                        </td>
                                        <td>{{ $item->matricule}}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->title }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. -->
        <div class="card border-left-primary shadow h-100 py-2 mb-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="d-flex justify-content-between text-lg">
                            <div class="font-weight-bold text-primary text-uppercase mb-4">
                                Marketing
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($data['forDep_05'] as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="choice[]" value="{{ $item->id}}" aria-label="Checkbox for following text input">
                                        </td>
                                        <td>{{ $item->matricule}}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->title }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. Product Management -->
        <div class="card border-left-primary shadow h-100 py-2 mb-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="d-flex justify-content-between text-lg">
                            <div class="font-weight-bold text-primary text-uppercase mb-4">
                                Product Management
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($data['forDep_06'] as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="choice[]" value="{{ $item->id}}" aria-label="Checkbox for following text input">
                                        </td>
                                        <td>{{ $item->matricule}}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->title }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 7. Research and Development -->
        <div class="card border-left-primary shadow h-100 py-2 mb-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="d-flex justify-content-between text-lg">
                            <div class="font-weight-bold text-primary text-uppercase mb-4">
                                Research and Development
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($data['forDep_07'] as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="choice[]" value="{{ $item->id}}" aria-label="Checkbox for following text input">
                                        </td>
                                        <td>{{ $item->matricule}}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->title }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 8. Sales -->
        <div class="card border-left-primary shadow h-100 py-2 mb-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="d-flex justify-content-between text-lg">
                            <div class="font-weight-bold text-primary text-uppercase mb-4">
                                Sales
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($data['forDep_08'] as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="choice[]" value="{{ $item->id}}" aria-label="Checkbox for following text input">
                                        </td>
                                        <td>{{ $item->matricule}}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->title }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 9. Support -->
        <div class="card border-left-primary shadow h-100 py-2 mb-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="d-flex justify-content-between text-lg">
                            <div class="font-weight-bold text-primary text-uppercase mb-4">
                                Support
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($data['forDep_09'] as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="choice[]" value="{{ $item->id}}" aria-label="Checkbox for following text input">
                                        </td>
                                        <td>{{ $item->matricule}}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->title }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 10. Training -->
        <div class="card border-left-primary shadow h-100 py-2 mb-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="d-flex justify-content-between text-lg">
                            <div class="font-weight-bold text-primary text-uppercase mb-4">
                                Training
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($data['forDep_10'] as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="choice[]" value="{{ $item->id}}" aria-label="Checkbox for following text input">
                                        </td>
                                        <td>{{ $item->matricule}}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->title }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- boutton -->
        <div class="form-group text-center d-flex justify-content-between">
            <form method="POST" action="{{ route('session.end') }}">
                @csrf
                <button type="submit" class="btn btn-dark">
                    <i class="mr-2 fa fa-arrow-left"></i>
                    Quitter
                </button>
            </form>

            <button type="submit" class="btn btn-success">
                Valider
                <i class="ml-2 fa fa-arrow-right"></i>
            </button>
        </div>
    </form>
</div>
@stop