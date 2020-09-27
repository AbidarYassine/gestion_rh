@extends('admin.include.default')
@section('title','Tout les avances')
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAddAvance">Ajouter Une Avance</button>
        </div>
        <div class="col-md-6">
            <a href="{{route('avancee.historique')}}" class="btn btn-info float-right"><i class="fas fa-eye mr-2"></i>Historique des avances</a>
        </div>
    </div>
    <div class="card border-success">
        <div class="card-header">
            Les avance {{date('m/yy')}}
        </div>
        @if($avances==null)
        <center>
            <div class="alert alert-warning mt-2" style="width: 50%;">
                Aucun avance Trouver
            </div>
        </center>
        @else
        <div class="card-body">
            <table id="tableAvance" class="table text-center" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">
                            <span>Matricule</span>
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="th-sm">
                            <span>Nom</span>
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="th-sm"><span>Prenom</span>
                            <i class="fas fa-sort ml-0.5"></i>
                        </th>
                        <th class="th-sm"><span>Matricule</span>
                            <i class="fas fa-sort ml-0.5"></i>
                        </th>
                        <th class="th-sm"><span class="test-sm">Date Afectation</span>
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="th-sm"><span>Montant</span>
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="th-sm text-center"><span>Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employers as $employer)
                    @if(count($avances[$employer->id])>0)
                    <tr>
                        <td>{{$employer->cin}}</td>
                        <td>{{$employer->nom_employer}}</td>
                        <td>{{$employer->prenom}}</td>
                        <td>{{$employer->cin}}</td>
                        @foreach($avances[$employer->id] as $avance)
                        <td>{{$avance->date_affectation}}</td>
                        <td>{{$avance->montant." ".$devise}}</td>
                        <td class="text-center">
                            <button data-toggle="modal" data-target="#ModaleditAvance" data-date_affectation="{{$avance->date_affectation}}" data-id="{{$avance->id}}" data-employer_id="{{$employer->id}}" data-montant="{{$avance->montant}}" class="btn btn-warning btn-sm  mr-1"><i class="far fa-edit mr-2"></i>Edit</button>
                            <a href="{{route('avance.delete',$avance->id)}}" class="btn btn-danger btn-sm  mr-1 ml-1 delete-confirm"> <i class="fas fa-trash-alt mr-2"></i>Supprimer</a>

                            <!-- Button trigger modal -->
                            <!-- Modal -->
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>


<!--  start add modal -->
@include('util.avance.add');
<!-- end add modal  -->
<!-- start  edit modal -->
@include('util.avance.edit');
<!-- end edit model  -->

@endsection
@section('script')
<script>
    $(document).ready(function() {
        let item1 = '<li class="breadcrumb-item active">Avance</li>';
        var item2 = '<li class="breadcrumb-item active">Index</li>';
        $("#list_breadcrumb").append(item1);
        $("#list_breadcrumb").append(item2);
        $('body').scrollspy({
            target: '#navbar-example'
        });
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Vous Voulez Vraiment supprimer l\'employer ?',
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
                        'L\'employer et supprimer',
                        'success'
                    )
                }
            })
        });
        $('#tableAvance').DataTable({
            "order": [
                [3, "desc"]
            ],
            "paging": true,
            "oLanguage": {
                "sLengthMenu": "Afficher _MENU_",
                "sSearch": "Rechercher",
                "sLenghtMenu": "Afficher _MENU_",
                "sZeroRecords": "Aucun avance effectue ce  mois  Trouvez!",
                "sInfo": "Afficher _START_ à _END_ de _TOTAL_ employés",
                "sInfoFiltered": "(filtré à partir de _MAX_ avances)",
                "oPaginate": {
                    "sPrevious": "Précédent",
                    "sNext": "Suivant"
                }
            }
        });
        $(document).on('submit', '#form_add_avance', function(e) {
            e.preventDefault();
            let id = $("#employer_id").val();
            let date_affectation = $("#date_affectation").val();
            let montant = $("#montant").val();

            if ($("#employer_id").val() == 0) {
                Swal.queue([{
                    title: 'Employer non trouver',
                    text: 'Choisit un employer',
                }]);
            } else {
                $.ajax({
                    url: "{{route('avance.store')}}",
                    method: "POST",
                    data: {
                        '_token': "{{csrf_token()}}",
                        "employer_id": id,
                        'date_affectation': date_affectation,
                        'montant': montant,
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.status) {
                            // $('#btnAddAvance').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
                            // $("#alertMessage").fadeTo('show',0.5);//oppacity
                            $("#alertMessage").show();
                            $("#alertMessage").addClass('alert-success');
                            $("#alertMessage").text(data.message);

                        } else {
                            $("#alertMessage").show();
                            $("#alertMessage").addClass('alert-danger');
                            $("#alertMessage").text(data.message + " " + data.nom + " " + data.prenom);
                        }

                    },
                    error: function(one, two, three) {
                        console.log(one);
                        console.log(two);
                        console.log(three);
                    }
                });
            }
        })
        ///edit avance
        $('#ModaleditAvance').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var modal = $("#ModaleditAvance");
            modal.find('#employer_id_e').val(button.data('employer_id'));
            modal.find('#date_affectation_e').val(button.data('date_affectation'));
            modal.find('#montant_e').val(button.data('montant'));
            modal.find('#id_avance').val(button.data('id'));
        })
        $(document).on('submit', '#form_edit_avance', function(e) {
            let id_avance = $("#id_avance").val();
            let date_affectation = $("#date_affectation_e").val();
            let montant = $("#montant_e").val();
            e.preventDefault();
            $.ajax({
                url: "/admin/avance/" + id_avance,
                method: "PUT",
                data: {
                    '_token': "{{csrf_token()}}",
                    'date_affectation': date_affectation,
                    'montant': montant,
                    'id_avance': id_avance,
                },
                success: function(data) {
                    console.log(data);
                    $("#alertEMessage").show();
                    $("#alertEMessage").addClass('alert-success');
                    $("#alertEMessage").text(data.message);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection
