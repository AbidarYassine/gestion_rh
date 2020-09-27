$(document).ready(function() {
    let i = 1;
    let j = 1;
    // $("#iconImp").hide();
    // $("#iconNonImpo").hide();
    $(document).on('change', '#employer_id', function(e) {
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
                success: function(data) {
                    console.log(data.employer.id);
                    $("#nbr_enfant").val(data.employer.nbr_enfant);
                    $("#situationFami").val(data.employer.situationFami);
                    $("#sexe").val(data.employer.sexe);
                    $("#date_embauche").val(data.contrat.date_embauche);
                    $("#salaire_base").val(data.post.salaire_base);
                    $("#avance").val(data.avance.montant);

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

    $(document).on('submit', '#fromSimul', function(e) {
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
                success: function(data) {
                    console.log(data);
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
                    $("#avantage").text(data.avtg);
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
                    // ir net
                    $("#taux_ir").text(data.tauxIr);
                    $("#retenu_ir").text(data.irNet);
                    // salaire global
                    $("#sbglobal").text(data.sbg);
                    $("#sbImpos").text(data.sbi);
                    $("#netImposable").text(data.sni);
                    $("#salire_net").text(data.salaire_net);

                },
                error: function(one, two, three) {
                    console.log(one);
                    console.log(two);
                    console.log(three);
                }
            });
        }
    });
    $(document).on('click', '#btnImosable', function(e) {
        e.preventDefault();

        $("#iconImp").show();
        var e1 = $("<input id='i' class='form-control mt-1' placeholder='Designation' type='text'>");
        $("#forDesignImposa").append(e1);
        e1.attr('id', 'designImpo' + j);
        e1.attr('name', 'designImpo' + j);

        var e2 = $("<input id='i' class='form-control mt-1' placeholder='Montant'  type='number'>");
        $("#forMontantImposa").append(e2);
        e2.attr('id', 'MontantImpo' + j);
        e2.attr('name', 'MontantImpo' + j);
        $("#nbr_prime_impo").val(j);
        // alert($("#nbr_prime_impo").val());
        j++;



    });



    $(document).on('click', '#iconImp', function() {
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