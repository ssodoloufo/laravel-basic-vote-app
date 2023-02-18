@extends('layouts.app')

@section('title', 'Choix préliminaire')

@section('content')

<div class="col-lg-6">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"> <strong><u>MES CHOIX PRELIMINAIRES</u></strong> </h1>
  <p class="mb-4">
    Sachant que seul les 5 premiers de cette liste qui seront pris en compte... <br>
    Veuillez les réorganiser en "<strong>GLISSER-DEPOSER</strong> " vos choix dans leur ordre définitif.
  </p>


    <!-- boutton -->
  <div class="form-group text-center d-flex justify-content-between">
    <form method="POST" action="{{ route('session.restart') }}">
      @csrf
      <button type="submit" class="btn btn-dark">
        <i class="mr-2 fa fa-arrow-left"></i>
        Quitter
      </button>
    </form>

    <button class="btn btn-dark" onclick="window.location.reload();">
      Rafraichir
      <i class="ml-2 fa fa-spinner"></i>
    </button>
  </div>

  <!-- Table -->
  <div class="card shadow mb-4">
    <div class="card-body text-justify-end">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Matricules</th>
              <th scope="col">Nom & Prénoms</th>
              <!-- <th scope="col">Supprimer</th> -->
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody id="sortable2">
            @foreach($data as $item)
            <tr class="row1" data-id="{{ $item->id }}" style="cursor: move;">
              <th scope="row">{{ $item->order }}</th>
              <td>{{ $item->matricule }}</td>
              <td>{{ $item->nom }} {{ $item->prenom }}</td>
              <!-- <td>
                <form method="POST" action="{{ route('choice.delete', $item->id) }}">
                  @csrf
                  <button type="submit" class="btn btn-danger" onclick="window.location.reload()">
                    <i class="fa fa-times"></i>
                  </button>
                </form>
              </td> -->
              <th><i class="fa fa-arrows-alt"></i></th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop