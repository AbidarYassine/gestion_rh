@extends('admin.include.default')
@section('title','Historique de presence')
@section('content')
<div class="card" style="box-shadow: none">
    <div class="card-header border-secondary text-white" style="background-color: #9e9e9e ">
        Historique de Presences
    </div>
    <div class="card-body">
        @if(count($employers)==0)
        <div class="alert alert-warning" role="alert">
            Aucun Employer Trouver
        </div>
        @else
        <div class="d-flex justify-content-center">
            <input id="datePresence" name="datePresence" style="width: 30%" type="text" value="{{date('m/d/yy')}}" class="form-control mt-2 text-center p-1 pt-1" autocomplete="false">
            <button type="submit" id="btnChercher" class="btn btn-success">Chercher Pointage<i class="fas fa-search  ml-2 fa-1x"></i></button>

        </div>
        <div class="row">
            <div style="display: none;" id="eror_pres_hist" class="alert alert-warning"></div>
        </div>
        <div class="row">
            <table id="presen_histo" class="table table-striped table-bordered text-center" cellspacing="0" style="width: 100%">
                <thead>
                    <tr>
                        <th class="th-sm">Matricule
                        </th>
                        <th class="th-sm">Nom Employer
                        </th>
                        <th class="th-sm">Pointage
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                </tbody>
            </table>
        </div>
        <!-- <a href="{{route('presence.pdf')}}" class="btn btn-outline-primary">Apercu</a> -->
        @endif
    </div>
    @include('util.presence.modelEdit')
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        console.log('hi grom load');
        $("#btnChercher").trigger('click');
    });
</script>
<script>
    $(document).ready(function() {

        let item1 = '<li class="breadcrumb-item active">Presence</li>';
        let item2 = '<li class="breadcrumb-item active">Historique</li>';
        $("#list_breadcrumb").append(item1);
        $("#list_breadcrumb").append(item2);

        $("#datePresence").datepicker();

        function getData(query = '') {

        }
        $(document).on('click', '#btnChercher', function() {
            console.log('hi')
            var query = $("#datePresence").val();
            $.ajax({
                url: "{{ route('presence.employer') }}",
                method: 'GET',
                data: {
                    query
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        $('tbody').html(data.sourece);
                        $("#presen_histo").show();
                        $("#eror_pres_hist").hide();
                        $('#presen_histo').DataTable({
                            "paging": true,
                            "oLanguage": {
                                "sLengthMenu": "Afficher _MENU_",
                                "sSearch": "Rechercher",
                                "sLenghtMenu": "Afficher _MENU_",
                                "sZeroRecords": "Aucun employé Trouvez!",
                                "sInfo": "Afficher _START_ à _END_ de _TOTAL_ employés",
                                "sInfoFiltered": "(filtré à partir de _MAX_ employés)",
                                "oPaginate": {
                                    "sPrevious": "Précédent",
                                    "sNext": "Suivant"
                                }
                            }
                        });
                        $('.dataTables_length').addClass('bs-select');
                    } else {
                        $("#presen_histo").hide();
                        $("#eror_pres_hist").text('aucun element trouveé');
                        $("#eror_pres_hist").show();

                    }

                },
                error: function(data, textStatus, errorThrown) {
                    console.log(errorThrown);
                    console.log(data);
                },
            })
        });
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#heurE').val(button.data('heur-entre'));
            modal.find('#heurS').val(button.data('heur-sortit'));
            modal.find('#noteS').val(button.data('note'));
            modal.find('#id_presence').val(button.data('id_emp'));
            modal.find('#id_employer').val(button.data('id_presence'));

        });
        $(document).on('click', '#deleteBtn', function() {
            let id = $("#deleteBtn").val();

            Swal.fire({
                title: 'Vous Voulez Vraiment l\'apresence ?',
                text: "La suppression est reversible",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'supprimer'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Suppression!',
                        'La presence est supprimer',
                        'success'
                    )
                    $("#editModal").modal("hide");
                    $.ajax({
                        url: "{{route('presence.delete')}}",
                        method: "get",
                        data: {
                            id,
                            id
                        },
                        success: function(data) {
                            // $("#valPoi").remove();
                            location.reload(true);
                        },
                        error: function(one, two, tre) {
                            console.log(one);
                            console.log(two);
                            console.log(tre);
                        }

                    })
                }
            });
        });
    })
</script>
@endsection
