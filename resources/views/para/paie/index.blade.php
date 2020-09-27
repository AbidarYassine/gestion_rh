@extends('admin.include.default')
@section('title','Parametre')
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="container">
        <form action="{{route('para-paie.store')}}" method="post">
            @csrf
            <input type="hidden" value="{{$idsociete}}" name="id_societe">
            <div class="form-group">
                <label for="cotisCnss">Taux Cnss</label>
                <input type="text" name="tauxCnss" id="cotisCnss" value="{{$parametre->tauxCnss}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="cotisCnss">Taux Amo</label>
                <input type="text" name="tauxAmo" id="cotisCnss" value="{{$parametre->tauxAmo}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="chargeFamille">Charge Famille pour personne (DH)</label>
                <input type="text" id="chargeFamille" name="chargeFamille" value="{{$parametre->chargeFamille}}"
                       class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary float-right">Enregistrer</button>
            </div>
            <div class="form-group">

            </div>
        </form>
    </div>
@endsection
@section('script')

@endsection
