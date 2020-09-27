@extends('espaceEmployer.include.default')
@section('style')
<style>
    * {
        box-sizing: border-box;
    }

    section hr {
        width: 10%;
        height: 2px;
        background-color: lightseagreen;
    }

    .entre_info {
        height: 300px;
    }

    section .row {
        padding-top: 35px;
    }

    #row_employer ul li {
        padding-top: 10px;
        height: 100px;
    }

    #section_entre {
        margin-top: 20px;
    }

    .espace {
        height: 50px;

    }

    #lien_ficeh_paie {
        width: 25%;
        height: 10px;
        text-shadow: 0 0 3px #00C851, 0 0 5px #33b5e5;
        animation: masuperanimation 1s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        /* On utilise "ma super animation" définie plus tôt */
    }

    @keyframes masuperanimation {
        0% {
            transform: scale(1);

        }

        50% {
            transform: scale(1.5);
            text-shadow: 0 0 3px #fb8c00, 0 0 5px #ff4444;
        }

        100% {
            transform: scale(1);
        }
    }

    #lien_ficeh_paie:hover {
        -webkit-animation-play-state: paused;
    }

    .fixe {
        background-image: url('https://mdbootstrap.com/img/Photos/Others/architecture.jpg');
        background-attachment: fixed;
        background-size: cover;
        width: 100%;
        min-height: auto;
        background-repeat: no-repeat;
    }

    .image_pro:hover{

    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="espace"></div>
    <div class="container">
        @if(count($demande)>0)
        @foreach($demande as $dem)
        <div id="lien_ficeh_paie" class="text-center mt-3">
            <a class="link font-weight-bold" href="/admin/paie/apercu/{{$dem->id_bulltein}}">fiche de paie forma pdf</a>
        </div>
        @endforeach
        @endif
    </div>
    <div class="espace"></div>
    <section class="container">
        <center>
            <h1 data-aos="fade-up" class="text-center font-weight-bold">Votre Entreprise
            </h1>
            <hr data-aos="fade-up">
        </center>
        <div class="row">
            <div class="col-md-6 text-center">
                <div data-aos="fade-right" class="card  card-image text-center" style="background-image: url({{asset('images/societe.png')}});">
                    <div class=" entre_info text-white text-center d-flex align-items-center rgba-black-strong  py-5 px-4">
                        <div>
                            <h3 class="card-title pt-2"><strong>{{$societe->nom_societe }}</strong></h3>
                            <p>
                                {{$societe->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div data-aos="fade-left" class="card card-image image_pro" style="background-image: url({{asset('images/societe2.jpg')}});">
                    <div class=" entre_info text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                        <div>
                            <h3 class="card-title pt-2"><strong>Apropos de l'entreprise</strong></h3>
                            <p>
                                <span class="font-weight-bold">Adresse</span> <span>{{$societe->adresse}}</span><br />
                                <span class="font-weight-bold">Email</span><br />
                                <span>{{$societe->email}}</span><br />
                                <span class="font-weight-bold">GSM</span><br />
                                <span>{{$societe->GSM}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="espace"></div>
    <section class="fixe">
        <center>
            <h1 data-aos="fade-up" class="text-center font-weight-bold">Vous
            </h1>
            <hr data-aos="fade-up">
        </center>
        <div class="row" id="row_employer">
            <div class="col-md-8 offset-md-2">
                <center>
                    <img data-aos="zoom-in-down" style="width: 100px; height: 100px;" src="{{asset('storage/'.$employer->image)}}" class="rounded-circle" alt="test">
                </center>
                <div class="card-body text-center">
                    <ul class="list-group">
                        <li data-aos="fade-right" data-aos-duration="500" class="list-group-item mt-2 z-depth-3 align-items-center">
                            <div class="row">
                                <div class="col-md-6 text-success">Nom</div>
                                <div class="col-md-6">{{$employer->nom_employer}}</div>
                            </div>
                        </li>
                        <li data-aos="fade-left" data-aos-duration="700" class="list-group-item mt-2 z-depth-3">
                            <div class="row">
                                <div class="col-md-6  text-success">Prenom</div>
                                <div class="col-md-6">{{$employer->prenom}}</div>
                            </div>
                        </li>
                        <li data-aos="fade-left" data-aos-duration="1100" class="list-group-item mt-2 z-depth-3">
                            <div class="row">
                                <div class="col-md-6 text-success">Date d'embauche</div>
                                <div class="col-md-6">{{$contrat->date_embauche}}</div>
                            </div>
                        </li>
                        <li data-aos="fade-right" data-aos-duration="900" class="list-group-item mt-2 z-depth-3">
                            <div class="row">
                                <div class="col-md-6 text-success">Salaire Net du moi precedent</div>
                                <div class="col-md-6">{{$employer->salaire." ".$societe->devise}}</div>
                            </div>
                        </li>
                    </ul>
                    <div class="btn btn-default float-right mt-4">Plus</div>
                </div>
            </div>
        </div>
    </section>
    <section class="fixe">
        <center>
            <h1 data-aos="fade-up" class="text-center font-weight-bold">
                Votre Poste
            </h1>
            <hr data-aos="fade-up">
        </center>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card-body text-center">
                    <ul class="list-group">
                        <li data-aos="fade-right" data-aos-duration="1100" class="list-group-item mt-2 z-depth-3 align-items-center">
                            <div class="row">
                                <div class="col-md-6 text-success">Fonction</div>
                                <div class="col-md-6">{{$emploi->fonction}}</div>
                            </div>
                        </li>
                        <li data-aos="fade-left" data-aos-duration="900" class="list-group-item mt-2 z-depth-3">
                            <div class="row">
                                <div class="col-md-6  text-success">Date Debut</div>
                                <div class="col-md-6">{{$emploi->date_debut}}</div>
                            </div>
                        </li>
                        <li data-aos="fade-right" data-aos-duration="700" class="list-group-item mt-2 z-depth-3">
                            <div class="row">
                                <div class="col-md-6  text-success">Departement</div>
                                <div class="col-md-6">{{$departement->nom_dep}}</div>
                            </div>
                        </li>
                        <li data-aos="fade-left" data-aos-duration="500" class="list-group-item mt-2">
                            <center>
                                <h1 class="text-default font-weight-bold">Description</h1>
                            </center>
                            <p class="lead">
                                {{{$emploi->descrip}}}
                            </p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        AOS.init({
            duration: 2500,
        })
    })
</script>
@endsection
