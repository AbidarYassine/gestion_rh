@extends('admin.include.default')
@section('title','Crée une paie')
@section('content')
    <div class="card" style="box-shadow: none;">
        <div class="card-header bg-success text-white">
            Crée Une fiche de paie
        </div>
        <div class="card-body">
            <form id="fromSimul" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <!-- les employers -->
                        <!-- la date du paie -->
                        <!-- date embauche  -->
                        <!-- salaire de base -->
                        <div class="form-group row">
                            <label for="employer_id" name="employer_id"
                                   class="col-md-5 col-form-label text-md-right">{{ __('Employer') }}
                                <span class="text-danger ml-1">*</span>
                            </label>
                            <select id="employer_id" name=" employer_id"
                                    class="form-control col-md-6 @error('employer_id') is-invalid @enderror">
                                <option value="0">---select---</option>
                                @if(count($employers)==0)
                                    <option
                                        value="{{isset($employer)? $employer->id:''}}">{{isset($employer)?$employer->nom_employer:''}}</option>
                                @endif
                                @foreach($employers as $employer)
                                    <option value="{{$employer->id}}">{{$employer->nom_employer}}</option>
                                @endforeach
                            </select>
                            @error('employer_id')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="date_belletin_debut"
                                   class="col-md-5 col-form-label text-md-right">{{ __('Du') }}
                                <span class="text-danger ml-1">*</span>
                            </label>
                            <input id="date_belletin_debut" type="date" name="date_belletin_debut"
                                   class=" col-md-6 form-control @error('date_belletin_debut') @enderror"
                                   value="{{old('date_belletin_debut')}}">
                            @error('date_belletin_debut')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="date_belletin_fin" class="col-md-5 col-form-label text-md-right">{{ __('Au') }}
                                <span class="text-danger ml-1">*</span>
                            </label>
                            <input id="date_belletin_fin" type="date" name="date_belletin_fin"
                                   class=" col-md-6 form-control @error('date_belletin_fin') @enderror"
                                   value="{{old('date_belletin_fin')}}">
                            @error('date_belletin_fin')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="date_embauche"
                                   class="col-md-5 col-form-label text-md-right">{{ __('Date D\'embauche') }}
                                <span class="text-danger ml-1">*</span>
                            </label>
                            <input id="date_embauche" type="date" name="date_embauche"
                                   class="col-md-6 form-control @error('date_embauche') @enderror"
                                   value="{{old('date_embauche')}}">
                            @error('date_embauche')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="salaire_base"
                                   class="col-md-5 col-form-label text-md-right">{{ __('Salaire de base') }}
                                <span class="text-danger ml-1">*</span>
                            </label>
                            <input id="salaire_base" type="text" name="salaire_base"
                                   class=" col-md-6 form-control @error('salaire_base') @enderror"
                                   value="{{old('salaire_base')}}">
                            @error('salaire_base')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="taux_Icmr" class="col-md-5 col-form-label text-md-right">{{ __('Taux ICMR') }}
                                <span class="text-danger ml-1">*</span>
                            </label>
                            <input id="taux_Icmr" type="text" value="{{isset($icmr)? $icmr['taux']:''}}"
                                   placeholder="entre 3 et 6 %" name="taux_Icmr"
                                   class=" col-md-6 form-control @error('taux_Icmr') @enderror"
                                   value="{{old('taux_Icmr')}}" required>
                            @error('taux_Icmr')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="avantage"
                                   class="col-md-5 col-form-label text-md-right">{{ __('Avantage En nature') }}
                                <span class="text-danger ml-1"></span>
                            </label>
                            <input id="avantage" type="number" min="0"
                                   value="{{isset($bulletin)? $bulletin->avantage:'0'}}" name="avantage"
                                   class=" col-md-6 form-control @error('avantage') @enderror">
                            @error('avantage')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="situationFami"
                                   class="col-md-5 col-form-label text-md-right">{{ __('Situation Familaile') }}
                                <span class="text-danger ml-1">*</span>
                            </label>
                            <input id="situationFami" type="text" name="situationFami"
                                   class=" col-md-6 form-control @error('situationFami') @enderror"
                                   value="{{old('situationFami')}}">
                            @error('situationFami')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="nbr_enfant"
                                   class="col-md-5 col-form-label text-md-right">{{ __('Nombre d\'enfant') }}
                                <span class="text-danger ml-1">*</span>
                            </label>
                            <input id="nbr_enfant" type="number" min="0" name="nbr_enfant"
                                   class=" col-md-6 form-control @error('nbr_enfant') @enderror"
                                   value="{{old('nbr_enfant')}}">
                            @error('nbr_enfant')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="sexe" class="col-md-5 col-form-label text-md-right">{{ __('sexe') }}
                                <span class="text-danger ml-1">*</span>
                            </label>
                            <input id="sexe" type="text" name="sexe"
                                   class=" col-md-6 form-control @error('sexe') @enderror">
                            @error('sexe')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="avance" class="col-md-5 col-form-label text-md-right">{{ __('Avance') }}
                                <span class="text-danger ml-1"></span>
                            </label>
                            <input id="avance" type="number" min="0" name="avance" value="0"
                                   class=" col-md-6 form-control @error('avance') @enderror">
                            @error('avance')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="cout_heurSup"
                                   class="col-md-5 col-form-label text-md-right">{{ __('Cout Par Heur') }}
                                <span class="text-danger ml-1"></span>
                            </label>
                            <input id="cout_heurSup" type="number" min="0"
                                   value="{{isset($bulletin)? $bulletin->cout_heurSup:'0'}}" name="cout_heurSup"
                                   class=" col-md-6 form-control @error('cout_heurSup') @enderror">
                            @error('cout_heurSup')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="interit"
                                   class="col-md-5 col-form-label text-md-right">{{ __('Interet credit logement') }}
                                <span class="text-danger ml-1"></span>
                            </label>
                            <input id="interit" type="number" min="0" value="0" name="interit"
                                   class=" col-md-6 form-control @error('interit') @enderror">
                            @error('interit')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="exoneretion"
                                   class="col-md-5 col-form-label text-md-right">{{ __('EXONERATIONS') }}
                                <span class="text-danger ml-1"></span>
                            </label>
                            <input id="exoneretion" type="number" min="0"
                                   value="{{isset($bulletin)? $bulletin->exoneration:'0'}}" name="exoneretion"
                                   class=" col-md-6 form-control @error('exoneretion') @enderror">
                            @error('exoneretion')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <p class="mt-2">Heur Supplementaire</p>
                <hr style="width: 15%;">
                <div class="row">
                    <div class="col-md-6">
                        <p class="lead">Jour Ferier</p>
                    </div>
                    <div class="col-md-6">
                        <p class="lead">Jour Ouvrable</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" value="{{isset($jf)? $jf['nombre_heur']:'0'}}" min="0"
                                   name="nbr_heur_ferie" id="nbr_heur_ferie" class="form-control"
                                   placeholder="Heur Supplementaire">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select type="text" value="{{isset($jf)? $jf['interval']:'---'}}" name="interval_Ferier"
                                    id="interval_Ferier" class="form-control" placeholder="Interval">
                                @if(isset($jf))
                                    <option>---</option>
                                    <option selected value="{{$jf['interval']}}">Entre {{$jf['interval']}}</option>
                                @else
                                    <option>---</option>
                                    <option value="6-21">Entre 6h--21h</option>
                                    <option value="21-6">Entre 21h--6h</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" value="{{isset($jo)? $jo['nombre_heur']:'0'}}" min="0"
                                   name="nbr_heur_ouvrable" id="nbr_heur_ouvrable" class="form-control"
                                   placeholder="Heur Supplementaire">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select type="text" name="interval_ouvrable" value="{{isset($jo)? $jf['interval']:'---'}}"
                                    id="interval_ouvrable" class="form-control" placeholder="Interval">
                                @if(isset($jo))
                                    <option>---</option>
                                    <option selected value="{{$jo['interval']}}">Entre {{$jo['interval']}}</option>
                                @else
                                    <option>---</option>
                                    <option value="6-21">Entre 6h--21h</option>
                                    <option value="21-6">Entre 21h--6h</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <p class="lead mt-2"> Les Primes</p>
                <hr style="width: 9%;">
                <div class="row">
                    <input id="nbr_prime_impo" value="{{isset($primes)? count($primes) :'1'}}" type="hidden"
                           name="nbr_prime_impo">
                    @if(isset($primes))
                        @foreach($primes as $key=>$prime)
                            <div class="col-md-6">
                                Designation
                                <div id="forDesignImposa">
                                    <input id="designImpo{{$key+1}}" name="designImpo{{$key+1}}" class="form-control"
                                           placeholder="designation" value="{{$prime->designation}}">
                                </div>

                            </div>
                            <div class="col-md-6">
                                Montant
                                <div id="forMontantImposa">
                                    <div id="forDesignImposa">
                                        <input id="MontantImpo{{$key+1}}" name="MontantImpo{{$key+1}}"
                                               class="form-control" placeholder="Montant"
                                               value="{{$prime->montant_prim}}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-6">
                            Designation
                            <div id="forDesignImposa">
                            </div>
                        </div>
                        <div class="col-md-6">
                            Montant
                            <div id="forMontantImposa">

                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div id="addDeleteImpo" class="col-md-6">
                        <a id="btnImosable" class=" btn btn-outline-info">Ajouter une prime<i
                                class="fas ml-2  fa-plus-square"></i></a>
                        <a style="display: none;" id="iconImp" class="btn btn-danger btn-sm"><i
                                class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">
                    <i class="fas ml-2 fa-1x fa-save">
                        Enregistre
                    </i>
                </button>
            </form>
            @include('util.avance.paie.fichePaie')
            <a style="display: none;" id="btnapercu" class="btn btn-primary float-right">Apercu<i
                    class="fas ml-2 fa-1x fa-file-pdf"></i></a>
            <input type="hidden" id="user_connect" value="{{Auth::user()->id}}">
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            let item1 = '<li class="breadcrumb-item active">Paie</li>';
            if ($("#cout_heurSup").val() == '0') {
                var item2 = '<li class="breadcrumb-item active">Create</li>';
            } else {
                var item2 = '<li class="breadcrumb-item active">Edit</li>';
            }

            $("#list_breadcrumb").append(item1);
            $("#list_breadcrumb").append(item2);
            let j = 1;
            $(document).on('keyup', '#taux_Icmr', function (e) {
                $valIcmr = $("#taux_Icmr").val();
                if ($("#taux_Icmr").val() < 3 || $("#taux_Icmr").val() > 6 || !($.isNumeric($('#taux_Icmr').val()))) {
                    Swal.queue([{
                        title: '"Icmr" doit etre un numero entre 3 et 6',
                    }]);
                }

            });
            // $("#iconImp").hide();
            // $("#iconNonImpo").hide();
            $(document).on('change', '#employer_id', function (e) {
                e.preventDefault()
                var id = $("#employer_id").val();
                if (id > 0) {
                    $.ajax({
                        url: "{{route('paie.show')}}",
                        type: "GET",
                        contentType: 'application/json',
                        data: {
                            id
                        },
                        success: function (data) {
                            console.log(data.employer.id);
                            $("#nbr_enfant").val(data.employer.nbr_enfant);
                            $("#situationFami").val(data.employer.situationFami);
                            $("#sexe").val(data.employer.sexe);
                            $("#date_belletin_debut").val(data.dateDeb);
                            $("#date_belletin_fin").val(data.dateFin);
                            $("#date_embauche").val(data.contrat.date_embauche);
                            $("#salaire_base").val(data.post.salaire_base);
                            $("#avance").val(data.montant);

                        },
                    })
                } else {
                    $("#nbr_enfant").val("");
                    $("#situationFami").val("");
                    $("#sexe").val("");
                    $("#date_embauche").val("");
                    $("#salaire_base").val("");
                }
            });

            $(document).on('submit', '#fromSimul', function (e) {
                e.preventDefault()
                if ($("#employer_id").val() == 0) {
                    Swal.queue([{
                        title: 'Employer non trouver',
                        text: 'Choisit un employer',
                    }]);
                } else {
                    $.ajax({
                        url: "{{route('paie.salNet')}}",
                        type: "get",
                        contentType: 'application/json',
                        data: $('#fromSimul').serialize(),
                        success: function (data) {
                            console.log(data);
                            if (data.status) {
                                Swal.fire({
                                    title: 'Erreur!',
                                    text: 'La fiche de ce mois est deja faite',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            } else {
                                $("#cardPaie").show();
                                $("#btnapercu").show();
                                $("#nomSoceite").text(data.societe.nom_societe);
                                $("#addreSociete").text(data.societe.adresse);
                                $("#dateEmbache").text(data.contrat.date_embauche);
                                $("#date_naissance").text(data.employer.date_naissance);
                                $("#cin").text(data.employer.cin);
                                $("#cnss").text(data.employer.Num_cnss);
                                $("#nom_emp").text(data.employer.nom_employer);
                                $("#prenom_emp").text(data.employer.prenom);
                                $("#emploi").text(data.post.fonction);
                                $("#dep").text(data.departement.nom_dep);
                                $("#sal_base").text(data.post.salaire_base);
                                //heur sup ferier
                                $("#nbr_heur_ferire").text(data.nbr_heur_ferie);
                                $("#taux_ferire").text(data.tauxFer * $("#cout_heurSup").val());
                                $("#taux_ferirepourc").text((data.tauxFer - 1) * 100 + "%");
                                $("#gainFer").text(data.gainFer);
                                // heur sup ouvrable
                                $("#nbr_heur_ouv").text(data.nbr_heur_ouvrable);
                                $("#taux_ouvrable").text(data.tauvOv * $("#cout_heurSup").val());
                                $("#taux_ouvra_porcenteag").text((data.tauvOv - 1) * 100 + "%");
                                $("#gainOuv").text(data.gainOuv);
                                // ancienter
                                $("#base_anciente").text(data.post.salaire_base + data.gainFer + data.gainOuv);
                                $("#taux_ancienter").text(data.tauxAncienter);
                                $("#gainAncinter").text(data.Primeancienter);
                                // autre prime
                                $("#total_prime").text(data.totalPrime);
                                // avaantage
                                $("#avantage_plus").text(data.avtg);
                                //sbglobal
                                $("#sbrutGlobal").text(data.sbg);
                                //cotisation cnss
                                $("#taux_cnss").text(4.48);
                                $("#retenu_cnss").text(data.coticnss);
                                // cotisation icmr
                                $("#taux_ismr").text(data.taux_Icmr);
                                $("#retenu_icmr").text(data.cotiIcmr);
                                // cotisation amo
                                $("#taux_amo").text(2.26);
                                $("#retenu_amo").text(data.amo);
                                //cotiant Fp
                                $("#taux_fp").text(20);
                                $("#retenu_fp").text(data.fp);
                                // avance
                                $("#retenu_avance").text(data.avance);
                                //credit
                                $("#credit_logn").text(data.credit);
                                // ir net
                                $("#taux_ir").text(data.tauxIr);
                                $("#retenu_ir").text(data.irNet);
                                // salaire global
                                $("#sbglobal").text(data.sbg);
                                $("#sbImpos").text(data.sbi);
                                $("#netImposable").text(data.sni);
                                $("#salire_net").text(data.salaire_net);
                                let user = $("#user_connect").val();
                                $("#btnapercu").attr('href', '/admin/paie/apercu/' + data.idPaie);
                            }

                        },
                        error: function (one, two, three) {
                            console.log(one);
                            console.log(two);
                            console.log(three);
                        }
                    });
                }
            });
            $(document).on('click', '#btnImosable', function (e) {
                e.preventDefault();

                $("#iconImp").show();
                var e1 = $("<input  class='form-control mt-1' placeholder='Designation' type='text'>");
                $("#forDesignImposa").append(e1);
                e1.attr('id', 'designImpo' + j);
                e1.attr('name', 'designImpo' + j);

                var e2 = $("<input id='i' class='form-control mt-1' placeholder='Montant'  type='number'>");
                $("#forMontantImposa").append(e2);
                e2.attr('id', 'MontantImpo' + j);
                e2.attr('name', 'MontantImpo' + j);
                $("#nbr_prime_impo").val(j);
                j++;

                // alert($("#nbr_prime_impo").val());

            });
            $(document).on('click', '#iconImp', function () {
                let index = j - 1;
                $("#designImpo" + index).remove();
                $("#MontantImpo" + index).remove();
                $("#nbr_prime_impo").val(j - 2);
                j = j - 1;
                if (j == 1) {
                    $("#iconImp").hide();
                }
            });
            // pour  la fiche de paie


        });
    </script>
@endsection
