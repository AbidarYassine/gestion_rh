<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<center>
    <h1 class="text-danger">Fiche de Paie</h1>
</center>
<div class="container">
    <table class="table table-striped table-bordered table-sm" width="50%">
        <tr>
            <th>Raison Social</th>
            <th>Adresse</th>
        </tr>
        <tr>
            <td>{{$societe->nom_societe}}</td>
            <td>{{$societe->adresse}}</td>
        </tr>
        <tr>

            <th>Période</th>
            <th>Edité le:</th>
        </tr>
        <tr>
            @if(isset($bulletinPaie))
                <td>{{$bulletinPaie->created_at->format('F/yy')}}</td>
                <td>{{$bulletinPaie->created_at->format('yy-m-d')}}</td>
            @else
                <td>{{date('F/yy')}}</td>
                <td>{{date('d/m/yy')}}</td>
            @endif
        </tr>
    </table>
    <table class="table table-bordered table-striped table-sm" width="50%">
        <tr>
            <td>Date Embauche</td>
            <td id="dateEmbache">{{$contrat->date_embauche}}</td>
        </tr>
        <tr>
            <td> Date de Naissance</td>
            <td id="date_naissance">{{$employer->date_naissance}}</td>
        </tr>
        <tr>
            <td> Matricule</td>
            <td id="cin">{{$employer->cin}}</td>
        </tr>
        <tr>
            <td>Numero CNSS</td>
            <td id="cnss">{{$employer->Num_cnss}}</td>
        </tr>
        <tr>
            <td>Nom</td>
            <td id="nom_emp">{{$employer->nom_employer}}</td>
        </tr>
        <tr>
            <td>Prenom</td>
            <td id="prenom_emp">{{$employer->prenom}}</td>
        </tr>
        <tr>
            <td>Emploi</td>
            <td id="emploi">{{$post->fonction}}</td>
        </tr>
        <tr>
            <td>Departement</td>
            <td id="dep">{{$departement->nom_dep}}</td>
        </tr>
    </table>
    <table class="table table-striped table-bordered table-sm">
        <tr>
            <th>Libelle</th>
            <th>Base</th>
            <th>Taux %</th>
            <th>Gains</th>
            <th>Retenu</th>
        </tr>
        <tr>
            <td>Salaire de base</td>
            <td></td>
            <td></td>
            <td id="sal_base">{{$post->salaire_base}}</td>
            <td></td>
        </tr>
        @foreach($heurSup as $heursup)
            <tr>
                <td>Heur supplementaire ({{$heursup->type}}) <span>{{$heursup->majoration}}%</span></td>
                <td id="nbr_heur_ferire">{{$heursup->nombre_heur}}</td>
                <td id="taux_ferire">{{$heursup->taux}}</td>
                <td id="gainFer">{{$heursup->gain}}</td>
                <td></td>
            </tr>
        @endforeach
        <tr>
            <td>Prime d'ancienté</td>
            <td id="base_anciente">{{$post->salaire_base+$totalHeurSup}}</td>
            <td id="taux_ancienter">{{$tauxAncienter}}</td>
            <td id="gainAncinter">{{$Primeancienter}}</td>
            <td></td>
        </tr>
        @foreach($primes as $prime)
            <tr>
                <td>{{$prime->designation}}</td>
                <td></td>
                <td></td>
                <td>{{$prime->montant_prim}}</td>
                <td></td>
            </tr>
        @endforeach
        <tr>
            <td>Avantage</td>
            <td></td>
            <td></td>
            <td id="avantg">{{$avantage}}</td>
            <td></td>
        </tr>
        @foreach($cotisation as $coti)
            <tr>
                <td> Cotisation {{$coti->libelle}}</td>
                <td></td>
                <td id="taux_cnss">{{$coti->taux}}</td>
                <td></td>
                <td id="retenu_cnss">{{$coti->retenu}}</td>
            </tr>
        @endforeach
        <tr>
            <td>Credit/logement</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$credit}}</td>
        </tr>
        <tr>
            <td>Avance</td>
            <td></td>
            <td></td>
            <td></td>
            <td id="retenu_avance">{{$montant}}</td>
        </tr>
    </table>
    <table class="table table-striped table-bordered table-sm">
        <tr>
            <th>Brut</th>
            <th>Brut Impossable</th>
            <th>Net Impossable</th>
            <th>Salaire Net</th>
        </tr>
        <tr>
            <td id="sbglobal">{{$bulletinPaie->sbg}}</td>
            <td id="sbImpos">{{$bulletinPaie->sbi}}</td>
            <td id="netImposable">{{$salire_net_Impo}}</td>
            <td>{{$salireNet}}</td>
        </tr>
    </table>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>
