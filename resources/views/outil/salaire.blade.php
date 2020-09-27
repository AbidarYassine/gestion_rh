@extends('admin.include.default')
@section('content')
<div id="accordion">
    <div class="card" style="background-color: white;">
        <div class="card-body">
            <div class="card card-default" style="box-shadow: none">
                <div class="card-header bg-info " id="headingOne" style="opacity: 0.6;">
                    <a class=" text-white mt-1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Le Salaire De base</a>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <hr>
                        <center> <strong> Salire De base =Nombre d'heurs Travail * taux par heur</strong></center>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="card card-default" style="box-shadow: none">
                <div class="card-header bg-info" id="headingTwo" style="opacity: 0.6">
                    <a class=" text-white mt-1" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Les Heurs Supplementaire</a>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <hr>
                        <center><strong>Heur Supplementair= Nombre d'heur supplementaire * taux heurs supplemetaire</strong></center>
                        <hr>
                        <p>Le taux heurs supplementaire selon ce tableaux :</p>
                        <table class="table mt-1 table-bordered text-center">
                            <thead>
                                <tr>

                                    <th scope="col">Horaire</th>
                                    <th scope="col">Jour Ouvrable</th>
                                    <th scope="col">Jour Feries</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Entre 6h a 21h</td>
                                    <td>25%</td>
                                    <td>50%</td>
                                </tr>
                                <tr>
                                    <td>Entre 21h a 6h</td>
                                    <td>50%</td>
                                    <td>100%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card-default" style="box-shadow: none">
                <div class="card-header bg-info" id="headingThree" style="opacity:0.6">
                    <a class=" text-white mt-1" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">Les Primes</a>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <hr>
                        <center><strong>Prime D'anciennte =(Salaire de base +Heur Supplementair)*Taux</strong></center>
                        <hr>
                        <p>Le Taux est determine selon ce tableux :</p>
                        <table class="table text-center table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th scope="col">Anciennete</th>
                                    <th scope="col">Taux</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Plus de 2 ans</td>
                                    <td> 5%</td>
                                </tr>
                                <tr>
                                    <td>Plus de 5 ans</td>
                                    <td>10%</td>
                                </tr>
                                <tr>
                                    <td>Plus de 12 ans</td>
                                    <td>15%</td>
                                </tr>
                                <tr>
                                    <td>Plus de 20 ans</td>
                                    <td>20%</td>
                                </tr>
                                <tr>
                                    <td>Plus de 25 ans</td>
                                    <td>25%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card-default" style="box-shadow: none">
                <div class="card-header bg-info" id="headingThree" style="opacity:0.6">
                    <a class=" text-white mt-1" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">Salire Brut Global (SBG)</a>
                </div>
                <div id="collapsefour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <hr>
                        <center>
                            <strong>SBG=Salaire de base + Heur Supplementair +Primes +Avantages</strong><br>
                            <hr>
                            <strong>Salaire brut imposable (SBI) : Salaire brut –Exonérations</strong>
                        </center>
                        <hr>
                        <p>
                            Les éléments exonérés sont à soustraire du salaire brut pour avoir la base de calcul (SBI)
                            servant à déterminer les montants des déductions. (Cotisations ; Frais professionnels ;
                            Intérêt)
                            Il s’agit généralement des indemnités destinées à couvrir des frais engagés par le salarié
                            dans l’exercice de sa fonction, dans la mesure où ils sont justifiés, quels soient remboursés
                            sur états ou attribués forfaitairement.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
