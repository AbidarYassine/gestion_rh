@extends('admin.include.default')
@section('content')
<div id="accordion">
    <div class="card" style="background-color: white;">
        <div class="card-body">
            <div class="card card-default" style="box-shadow: none">
                <div class="card-header bg-info" id="headingOne" style="opacity: 0.6">
                    <a class=" text-white mt-1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Retenu a caractère  socail</a>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <hr>
                        <center><strong>Cotisation à la CNSS : Salaire brut imposable SBI * 4,48%</strong></center>
                        <hr>
                        <p><mark>CNSS</mark> :Un organisme public assurant la protection des employés contre les risques qui peuvent
                            diminuer ou cesser la force de travail. Elle assure des prestations à court
                            terme (Maladie ; Maternité ; Allocations familiales … etc.), et autres à long terme
                            (Invalidité ; Pensions de retraite … etc.). </p>
                        <p> Le Plafond est 268,80</p>
                        <hr>
                        <center><strong>Cotisation à l’AMO : Salaire brut imposable (Sans plafond) * 2,26%</strong></center>
                        <hr>
                        <p>
                            <mark>AMO</mark>:Une assurance qui assume la couverture médicale de base, gérée par deux organismes,
                            la CNOPS pour le secteur public et la CNSS pour le secteur privé.
                            Pour le secteur privé, le taux en application est de 4,00% dont 2,00% à la charge du
                            salarié et 2,00% à la charge de l’employeur, à appliquer sur le salaire brut imposable
                            sans plafond.
                            Cependant, les entreprises affiliées à une assurance maladie facultative
                        </p>
                        <hr>
                        <center><strong>Cotisation à la CIMR : (Salaire brut imposable (Sans plafond) – AEN) * Taux</strong></center>
                        <hr>
                        <p><mark>ICMR</mark>:
                            Une caisse de retraite complémentaire à laquelle l’employeur peut souscrire. Le taux de
                            cotisation varie de 3 à 6%, à appliquer sur le salaire brut imposable non plafonné, exclu
                            des avantages en nature.

                        </p>
                        <hr>
                        <center><strong>professionnels (FP): (Salaire brut imposable – Avantages) x Taux </strong></center>
                        <hr>
                        <p><mark>Abattement des frais professionnels (FP) </mark>:
                            C’est un pourcentage à appliquer sur le salaire brut imposable afin d’estomper la base
                            de calcul de l’impôt. Il s’agit des frais qu’un salarié engage durant l’exercice de sa
                            fonction (nourriture, transport …) et que l’État les prenne en considération sous forme de
                            pourcentage variant selon la catégorie professionnelle. Toutefois, pour l’ensemble des
                            catégories citées ci-dessous, le montant de cette déduction ne peut dépasser
                            2500 DH/Mois (Plafond).
                        </p>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Taux</th>
                                    <th>Catégories professionnelles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>20%</td>
                                    <td>Pour le personnel relevant des catégories professionnelles autres que celles
                                        visées ci-dessous.
                                    </td>
                                </tr>
                                <tr>
                                    <td>25%</td>
                                    <td>Pour le personnel des casinos et cercles. </td>
                                </tr>
                                <tr>
                                    <td>35%</td>
                                    <td>
                                        Pour les ouvriers d’imprimerie de journaux travaillant la nuit, ouvriers mineurs.
                                        Pour les artistes dramatiques, lyriques, cinématographiques ou
                                        chorégraphique, artistes musiciens, chefs d’orchestre.
                                    </td>
                                </tr>
                                <tr>
                                    <td>40%</td>
                                    <td>Pour le personnel navigant de la marine marchande et de la pêche maritime. </td>
                                </tr>
                                <tr>
                                    <td>45%</td>
                                    <td>Pour les journalistes, rédacteurs, photographes, directeurs de journaux, agents
                                        de placement de l’assurance vie, inspecteurs et contrôleurs des compagnies
                                        d’assurance des branches vie, capitalisation et épargne, voyageurs,
                                        représentants et placiers de commerce et d’industrie, personnel navigant de
                                        l’aviation marchande (pilotes, radios, mécaniciens et personnel de cabine
                                        navigant des compagnies de transport aérien, pilotes et mécaniciens employés
                                        par les maisons de construction d’avions et de moteurs pour l’essai de
                                        prototypes, pilotes moniteurs d’aéro-clubs et des écoles d’aviation civile. </td>
                                </tr>
                            </tbody>
                        </table>
                        <center>
                            <h4 class="bg-info text-white">Salaire Net imposable (SNI) : Salaire brut imposable –Déductions </h4>
                        </center>
                    </div>
                </div>
            </div>
            <div class="card card-default" style="box-shadow: none">
                <div class="card-header bg-info " id="headingToo" style="opacity: 0.6;">
                    <a class=" text-white mt-1" data-toggle="collapse" data-target="#collapseToo" aria-expanded="true" aria-controls="collapseToo">Retenu A caractère  fiscal</a>
                </div>

                <div id="collapseToo" class="collapse" aria-labelledby="headingToo" data-parent="#accordion">
                    <div class="card-body">
                        <strong> Calcul de IR</strong>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <center>
                                    <strong>
                                        Salaire Net Imposable=SBI - Element déductible
                                    </strong>
                                </center>
                                <p><mark>IR</mark>:
                                    C’est la somme due à l’État à titre d’impôt. Elle est calculée sur le salaire net imposable
                                    et cela suivant le barème de l’IR prévu par le CGI qui répartit cette somme selon les
                                    tranches du revenu.
                                    L’impôt dû à l’État étant le net qui est égal à l’impôt brut exclu des charges de famille.
                                </p>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tranche de revenu</th>
                                            <th>Taux</th>
                                            <th>Somme a deduire</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>0-2500</td>
                                            <td>0%</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>2501-4166,66</td>
                                            <td>10%</td>
                                            <td>250 Dh</td>
                                        </tr>
                                        <tr>
                                            <td>4166,67-5000</td>
                                            <td>20%</td>
                                            <td>666.67</td>
                                        </tr>
                                        <tr>
                                            <td>5001-6666,666</td>
                                            <td>30%</td>
                                            <td>1166,67</td>
                                        </tr>
                                        <tr>
                                            <td>6666,67-15000</td>
                                            <td>34%</td>
                                            <td>1433,33</td>
                                        </tr>
                                        <tr>
                                            <td>+15000</td>
                                            <td>38%</td>
                                            <td>2033,33 </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <center><strong>IR Brut : (Salaire Net imposable x Taux) – somme à déduire </strong></center>
                                <p><mark>Charges de Famille:</mark> Elles désignent l'ensemble des frais supportés par le salarié pour
                                    les personnes à charge de son foyer (Enfants et conjoint). Elles permettent de réduire
                                    le montant de l'Impôt sur le revenu.
                                    <p class="mt-2"> Le montant prévu pour chaque personne est de 30 DH dans la limite de 6 personnes
                                        soit 180 DH/Mois pour 6 individus.
                                    </p>
                                </p>

                                <center><strong>IR Net : IR Brut – Charges de famille</strong> </center>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card card-default" style="box-shadow: none">
                <div class="card-header bg-info" id="headingThree" style="opacity:0.6">
                    <a class=" text-white mt-1" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">Retenu A caractère  Personnel</a>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <p>L’acompte consiste à verser, avant la date habituelle de paie, une partie du salaire d’un
                            travail déjà exécuté mais dont la rémunération n’est pas encore exigible. Cependant,
                            le montant de cet acompte ne peut être supérieur à la rémunération mensuelle exigible.

                            En outre, pour les salariés mensualisés, l’acompte ne peut dépasser la moitié du salaire
                            mensuel exigible et il ne peut leur être accordé au-deçà de 15 jours de travail.
                        </p>

                    </div>
                </div>
            </div>
            <div class="card card-default" style="box-shadow: none">
                <div class="card-header bg-info" id="headingThree" style="opacity:0.6">
                    <a class=" text-white mt-1" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">Salire Net</a>
                </div>
                <div id="collapsefour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <strong>Salaire net (SN) : Salaire net imposable – Les retenues </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
