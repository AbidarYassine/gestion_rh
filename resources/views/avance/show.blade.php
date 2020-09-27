@extends('admin.include.default')
@section('title','Voir avance')
@section('content')
<div id="accordion">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <input style="width: 100%;" id="mat_employer" class="form-control" type="text" placeholder="Matricule Employer">
        </div>
    </div>
    @foreach($employers as $employer)
    <div class="card mt-3" style="box-shadow: none">
        <div class="card-header bg-info " id="headingOne" style="opacity: 0.6">
            <a id="emp" class=" text-white mt-1" data-toggle="collapse" data-target="#{{$employer->cin}}" aria-expanded="true" aria-controls="{{$employer->cin}}">{{$employer->nom_employer." ".$employer->prenom}}
                <i id="iconDown" class="fas fa-chevron-down float-right"></i>
            </a>
        </div>
        <div id="{{$employer->cin}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <table class=" table_avance table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><strong>Date Creation</strong> </th>
                            <th scope="col"><strong>Montant</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employer->avance as $avance)
                        <tr>
                            <td>{{$avance->date_affectation}}</td>
                            <td>{{$avance->montant." ".$devise}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="button" class="btn btn-outline-primary float-right">
                    Total {{$employer->total." ".$devise}}
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#mat_employer").keyup(function() {
            matriculEmp = $("#mat_employer").val();
            if (matriculEmp == null) {
                console.log('is undefine')
            } else {
                $("#" + matriculEmp).addClass('show');
                console.log($("#" + matriculEmp)).val();
            }
        })
        let item1 = '<li class="breadcrumb-item active">Avance</li>';
        var item2 = '<li class="breadcrumb-item active">Historique</li>';
        $("#list_breadcrumb").append(item1);
        $("#list_breadcrumb").append(item2);

        $('.table_avance').DataTable({
            "order": [
                [3, "desc"]
            ],
            "paging": true,
            "oLanguage": {
                "sLengthMenu": "Afficher _MENU_",
                "sSearch": "Rechercher",
                "sLenghtMenu": "Afficher _MENU_",
                "sZeroRecords": "Aucun avance Trouvez!",
                "sInfo": "Afficher _START_ à _END_ de _TOTAL_ avances",
                "sInfoFiltered": "(filtré à partir de _MAX_ avances)",
                "oPaginate": {
                    "sPrevious": "Précédent",
                    "sNext": "Suivant"
                }
            }
        });
        $("#mat_employer").keyup(function() {
            $("#mat_employer").val();
            console.log($("#mat_employer").val());
        })
        $("#btn_test").click(function(e) {
            e.preventDefault();
            alert('hi');
        })
    })
</script>
@endsection
