<div class="row mt-2">
    <div id="cardPaie" class="card " style="box-shadow: none;display:none">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Raison Social :<label class="ml-2" id="nomSoceite"></label></th>
                        </tr>
                        <tr>
                            <th>Adresse :<span class="ml-2" id="addreSociete"></span></th>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <th>Période</th>
                            <th>Edité le:</th>
                        </tr>
                        <tr>
                            <td>{{date('F/yy')}}</td>
                            <td>{{date('d/m/yy')}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <td>Date Embauche</td>
                            <td id="dateEmbache"></td>
                        </tr>
                        <tr>
                            <td> Date de Naissance</td>
                            <td id="date_naissance"></td>
                        </tr>
                        <tr>
                            <td> Matricule</td>
                            <td id="cin"></td>
                        </tr>
                        <tr>
                            <td>Numero CNSS</td>
                            <td id="cnss"></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <td>Nom</td>
                            <td id="nom_emp"></td>
                        </tr>
                        <tr>
                            <td>Prenom</td>
                            <td id="prenom_emp"></td>
                        </tr>
                        <tr>
                            <td>Emploi</td>
                            <td id="emploi"></td>
                        </tr>
                        <tr>
                            <td>Departement</td>
                            <td id="dep"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>Libelle</th>
                        <th>Base</th>
                        <th>Taux %</th>
                        <th>Gains</th>
                        <th>Retenu</th>
                    </tr>
                    <tr>
                        <td>Salaire de base </td>
                        <td></td>
                        <td></td>
                        <td id="sal_base"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Heur supplementaire (JF) <span id="taux_ferirepourc"></span></td>
                        <td id="nbr_heur_ferire"></td>
                        <td id="taux_ferire"></td>
                        <td id="gainFer"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Heur supplementaire (JO) <span id="taux_ouvra_porcenteag"></span></td>
                        <td id="nbr_heur_ouv"></td>
                        <td id="taux_ouvrable"></td>
                        <td id="gainOuv"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Prime d'ancienté</td>
                        <td id="base_anciente"></td>
                        <td id="taux_ancienter"></td>
                        <td id="gainAncinter"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Total Prime</td>
                        <td></td>
                        <td></td>
                        <td id="total_prime"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Avantage</td>
                        <td></td>
                        <td></td>
                        <td id="avantage_plus"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Salaire Brute global</td>
                        <td></td>
                        <td></td>
                        <td id="sbrutGlobal"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Cotisation CNSS</td>
                        <td></td>
                        <td id="taux_cnss"></td>
                        <td></td>
                        <td id="retenu_cnss"></td>
                    </tr>
                    <tr>
                        <td>Cotisation ICMR</td>
                        <td></td>
                        <td id="taux_ismr"></td>
                        <td></td>
                        <td id="retenu_icmr"></td>
                    </tr>
                    <tr>
                        <td>Cotisation AMO</td>
                        <td></td>
                        <td id="taux_amo"></td>
                        <td></td>
                        <td id="retenu_amo"></td>
                    </tr>
                    <tr>
                        <td>Frais Professionel</td>
                        <td></td>
                        <td id="taux_fp"></td>
                        <td></td>
                        <td id="retenu_fp"></td>
                    </tr>
                    <tr>
                        <td>Credit/Logment</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td id="credit_logn"></td>
                    </tr>
                    <tr>
                        <td>Avance</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td id="retenu_avance"></td>
                    </tr>
                    <tr>
                        <td>Retenu Ir</td>
                        <td></td>
                        <td id="taux_ir"></td>
                        <td></td>
                        <td id="retenu_ir"></td>
                    </tr>
                </table>
                <div class="row">
                    <table class="table table-bordered">
                        <tr>
                            <th>Brut</th>
                            <th>Brut Impossable</th>
                            <th>Net Impossable</th>
                            <th>Salaire Net</th>
                        </tr>
                        <tr>
                            <td id="sbglobal"></td>
                            <td id="sbImpos"></td>
                            <td id="netImposable"></td>
                            <td> <button class="btn btn-outline-success" id="salire_net"></button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
