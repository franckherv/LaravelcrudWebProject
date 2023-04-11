@extends('layouts.master')
@section('contenu')
<div class="my-3 p-3 bg-body rounded shadow-sm">

    <h3 class="border-bottom pb-2 mb-4"> Editer un étudiant</h3>

    <div class="mt-4">

        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        </ul>
      

            <form style="width:65%" method="post" action="{{ route('etudiant.update', [$etudiant->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nom</label>
                  <input type="text" class="form-control" required  name="nom" value="{{$etudiant->nom}}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Prénom</label>
                  <input type="text" class="form-control" required name="prenom" value="{{$etudiant->prenom}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Classe</label>
                    <select class="form-control" required name="classe_id">>
                        @foreach($classes as $classe)
                        @if ($classe->id == $etudiant->classe_id)
                        <option value="{{ $classe->id }}" selected>{{ $classe->libelle }}</option>
                        @else
                        <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                        @endif

                        @endforeach
                    </select>
                  </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('etudiant') }}" class="btn btn-danger">Annuler</a>
              </form>
            </div>
        </div>


    @endsection
