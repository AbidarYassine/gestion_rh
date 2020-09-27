@extends('admin.include.default')
@section('title','Tout les paie')
@section('style')
<style>
</style>
@endsection
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <a href="{{route('paie.create')}}" class="btn btn-outline-primary">
                <i class="fas fa-plus fa-1x mr-1"></i>Ajouter Une Fice de Paie
            </a>
        </div>
    </div>
    <div class="card border-primary">
        <div class="card-header">
            Les fiches de paie
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="annee_paie">Choisit L'annee</label>
                    <select name="annee_paie" id="annee_paie" class="form-control mdb-select md-form">
                        <option value="0">---</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="moi_paie">Choisit le mois</label>
                    <select name="moi_paie" id="moi_paie" class="form-control mdb-select md-form">
                        <option value="0">---</option>
                    </select>
                </div>
            </div>
            <div id="paie_alert" style="display: none;" class="alert alert-warning mt-2" role="alert"></div>
            <table id="table_paie" style="display: none;" class="table table-hover table-bordered mt-2">
                <thead>
                    <tr>
                        <th>Nom employer</th>
                        <th>Prenom</th>
                        <th>Fiche de paie Du</th>
                        <th>Fiche de paie Au</th>
                        <th>Salire Brut global</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody id="body_table_paie">

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        let item1 = '<li class="breadcrumb-item active">Paie</li>';
        let item2 = '<li class="breadcrumb-item active">Index</li>';
        $("#list_breadcrumb").append(item1);
        $("#list_breadcrumb").append(item2);
        let d = new Date();
        let yearNow = d.getFullYear();
        for (let i = 2020; i <= yearNow; i++) {
            let option = `<option> ${i}</option>`
            $("#annee_paie").append(option);
        }
        for (let j = 1; j <= 12; j++) {
            let optionn = '<option>' + j + '</option>'
            $("#moi_paie").append(optionn);
        }
        $(document).on('change', '#annee_paie', function(e) {
            let year = $("#annee_paie").val();
            $.ajax({
                url: "{{route('paie.cherche')}}",
                type: "GET",
                contentType: 'application/json',
                data: {
                    'year': year,
                },
                success: function(data) {
                    console.log(data)
                    if (data.status) {
                        $("#table_paie").show();
                        $("#paie_alert").hide();
                        $("tbody").html(data.data);
                        $('#table_paie').DataTable({
                            "order": [
                                [3, "desc"]
                            ],
                            "paging": true,
                            "oLanguage": {
                                "sLengthMenu": "Afficher _MENU_",
                                "sSearch": "Rechercher",
                                "sLenghtMenu": "Afficher _MENU_",
                                "sZeroRecords": "Aucun paie Trouvez!",
                                "sInfo": "Afficher _START_ à _END_ de _TOTAL_ paie",
                                "sInfoFiltered": "(filtré à partir de _MAX_ paie)",
                                "oPaginate": {
                                    "sPrevious": "Précédent",
                                    "sNext": "Suivant"
                                }
                            }
                        });
                    } else {
                        $("#table_paie").hide();
                        $("#paie_alert").show();
                        $("#paie_alert").text(data.data);
                    }
                },
                error: function(errr, tow) {
                    console.log(errr);
                }
            });
        });
        $(document).on('change', '#moi_paie', function(e) {
            e.preventDefault();
            let month = $("#moi_paie").val();
            let year = $("#annee_paie").val();
            $.ajax({
                url: "{{route('paie.cherche')}}",
                type: "GET",
                contentType: 'application/json',
                data: {
                    'month': month,
                    'year': year,
                },
                success: function(data) {
                    console.log(data)
                    if (data.status) {
                        $("#table_paie").show();
                        $("#paie_alert").hide();
                        $("tbody").html(data.data);
                    } else {
                        $("#table_paie").hide();
                        $("#paie_alert").show();
                        $("#paie_alert").text(data.data);
                    }


                },
                error: function(errr, tow) {
                    console.log(errr);
                    console.log(tow);
                }
            });
        });
        $('.delet-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Vous Voulez Vraiment supprimer l\'apaie ?',
                text: "La suppression est reversible",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'supprimer'
            }).then((result) => {
                if (result.value) {
                    window.location.href = url;
                    Swal.fire(
                        'Suppression!',
                        'L\'paie et supprimer',
                        'success'
                    )
                }
            })
        });
    });
</script>
@endsection
