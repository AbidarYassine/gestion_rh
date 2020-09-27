@extends('admin.include.default')
@section('title','Ajouter un employer')
@section('content')
<div class="card">
    @if($employer!= null)
    <div class="card-header bg-warning text-white">
        Edit Employer
    </div>
    @else
    <div class="card-header bg-success text-white">
        Ajouter Un Nouveaux Employer
    </div>
    @endif
    <div class="card-body">
        <form action="{{isset($employer) ? route('employer.update',$employer->id):route('employer.store')}}" method="POST" enctype="multipart/form-data">
            @if(isset($employer))
            @method('PUT')
            @endif
            <h2 style="font-family: italic;color:gray">Information De L'Employer</h2>
            <div class="row">
                <div class="col-md-6">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="Nom" name="nom_employer" class="form-control @error('nom_employer') is-invalid @enderror" value="{{isset($employer)? $employer->nom_employer:old('nom_employer')}}">
                        @error('nom_employer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Prenom" name="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{isset($employer)? $employer->prenom:old('prenom')}}">
                        @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Group of default radios - option 1 -->
                    <div class="custom-control custom-radio custom-control-inline mb-4 mt-1">
                        <input type="radio" class="custom-control-input" id="sexeh" name="sexe" checked value="homme">
                        <label class="custom-control-label" for="sexeh">Homme</label>
                    </div>

                    <!-- Group of default radios - option 2 -->
                    <div class="custom-control custom-radio custom-control-inline mb-4 mt-1">
                        <input type="radio" class="custom-control-input" id="sexef" name="sexe" value="femme">
                        <label class="custom-control-label" for="sexef">Femme</label>
                    </div>
                    <div class="form-group mt-1">
                        <input type="text" placeholder="Cin/Matricul" name="cin" class="form-control @error('cin') is-invalid @enderror" value="{{isset($employer)? $employer->cin:old('cin')}}">
                        @error('cin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_naissance">Date Naissance</label>
                        <input type="date" placeholder="Date Naissance" name="date_naissance" class="form-control @error('date_naissance') is-invalid @enderror" value="{{isset($employer)? $employer->date_naissance:old('date_naissance')}}">
                        @error('date_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
                        <input placeholder="Select date" type="text" id="example" class="form-control">
                        <label for="example">Try me...</label>
                        <i class="fas fa-calendar input-prefix"></i>
                    </div> -->
                    <div class="form-group">
                        <select name="situationFami" id="situationFami" class="form-control" value="{{isset($employer)? $employer->situationFami:old('situationFami')}}">
                            <option value="célibataire">célibataire</option>
                            <option value="marié">marié</option>
                            <option value="pacsé">pacsé</option>
                            <option value="divorcé">divorcé</option>
                            <option value="séparé">séparé</option>
                            <option value="veuf">veuf</option>
                        </select>
                        @error('situationFami')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" placeholder="Email" id="email_emp" name="email" class="form-control @error('email') is-invalid @enderror" value="{{isset($employer)? $employer->email:old('email')}}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Numero CNSS" name="Num_cnss" class="form-control @error('Num_cnss') is-invalid @enderror" value="{{isset($employer)? $employer->Num_cnss:old('Num_cnss')}}">
                        @error('Num_cnss')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Numero ICMR" name="Num_Icmr" class="form-control @error('Num_Icmr') is-invalid @enderror" value="{{isset($employer)? $employer->Num_Icmr:old('Num_Icmr')}}">
                        @error('Num_Icmr')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Salaire" name="salaire" class="form-control @error('salaire') is-invalid @enderror" value="{{isset($employer)? $employer->salaire:old('salaire')}}">
                        @error('salaire')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" placeholder="Choisir Image" name="image" class="form-control @error('image') is-invalid @enderror" value="{{isset($employer)? $employer->image:old('image')}}">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" id="nbrEnfant" placeholder="Nombre Enfant" name="nbr_enfant" class="form-control @error('nbr_enfant') is-invalid @enderror" value="{{isset($employer)? $employer->nbr_enfant:old('nbr_enfant')}}">
                        @error('nbr_enfant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <h2 style="font-family: italic;color:gray">Poste</h2>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="fonction" placeholder="fonction" class="form-control @error('fonction') is-invalid @enderror" value="{{isset($employer)? $post->fonction:old('fonction')}}">
                        @error('fonction')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_naissance">Date Debut</label>
                        <input type="date" name="date_debut" placeholder="Date Debut" class="form-control @error('date_debut') is-invalid @enderror" value="{{isset($employer)? $post->date_debut:old('date_debut')}}">
                        @error('date_debut')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <input type="text" name="nom_dep" placeholder="Departement" class="form-control @error('nom_dep') is-invalid @enderror" value="{{isset($employer)? $departement->nom_dep:old('nom_dep')}}">
                        @error('nom_dep')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_naissance">Date Fin</label>
                        <input type="date" name="date_fin" placeholder="Date Fin" class="form-control @error('date_fin') is-invalid @enderror" value="{{isset($employer)? $post->date_fin:old('date_fin')}}">
                        @error('date_fin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="salaire_base" placeholder="Salaire De Base" class="form-control @error('salaire_base') is-invalid @enderror" value="{{isset($employer)? $post->salaire_base:old('salaire_base')}}">
                        @error('salaire_base')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea type="text" rows="6" cols="6" name="descrip" placeholder="Description de post" class="form-control @error('descrip') is-invalid @enderror" value="{{isset($employer)? $post->descrip:old('descrip')}}"></textarea>
                        @error('descrip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <h2 style="font-family: italic;color:gray">Contrat</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{isset($employer)? $contratType->type:old('type')}}">
                            <option value="CDD">CDD</option>
                            <option value="CDI">CDI</option>
                        </select>
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_naissance">Date Embauche</label>
                        <input type="date" name="date_embauche" placeholder="Date Embauche" class="form-control  @error('date_embauche') is-invalid @enderror" value="{{isset($employer)? $contart->date_embauche:old('date_embauche')}}">
                        @error('date_embauche')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <h2 style="font-family: italic;color:gray">Banque</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="nom_banque" placeholder="Nom De La Banque " class="form-control @error('nom_banque') is-invalid @enderror" value="{{isset($employer)? $banque->nom_banque:old('nom_banque')}}">
                        @error('nom_banque')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="rib" placeholder="Rib" class="form-control @error('rib') is-invalid @enderror" value="{{isset($employer)?  '':old('rib')}}">
                        @error('rib')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="adresse" placeholder=" Adresse" class="form-control @error('adresse') is-invalid @enderror" value="{{isset($employer)? $banque->adresse:old('adresse')}}">
                        @error('adresse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="tele" placeholder="Telephone" class="form-control @error('tele') is-invalid @enderror" value="{{isset($employer)? $banque->tele:old('tele')}}">
                        @error('tele')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="enregistre" type="submit" class="btn btn-primary">
                    {{isset($employer)? "Update":"Enregistrer"}}
                    <div id="spinerEnregister" class="spinner-border spinner-border-sm text-primary" role="status" aria-hidden="true">
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        let item1 = '<li class="breadcrumb-item active">Employer</li>';
        if ($("#email_emp").val() == '') {
            var item2 = '<li class="breadcrumb-item active">Create</li>';
        } else {
            var item2 = '<li class="breadcrumb-item active">Edit</li>';
        }

        $("#list_breadcrumb").append(item1);
        $("#list_breadcrumb").append(item2);

    })
</script>
@endsection
