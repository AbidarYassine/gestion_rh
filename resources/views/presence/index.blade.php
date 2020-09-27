@extends('admin.include.default')
@section('title','Pointage')
@section('content')
    <div class="card" style="box-shadow: none">
        <div class="row">
            <div class="col-md-6">
                <div class="card-header bg-primary mt-1 border-secondary text-white">
                    Présence des employes le {{date('yy-m-d')}}
                </div>
            </div>
            <div class="col-md-6">
                @if(count($employers)>0)
                    <button id="pointer_employer_selectioner" data-toggle="modal" data-target="#addALL"
                            class="btn btn-primary float-right">Pointer les employer selectionee
                    </button>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="card-body" style="background-color: white">
                @if(count($employers)==0)
                    <div class="alert alert-warning" role="alert">
                        Aucun Employer Trouver
                    </div>
            @else
                <!-- Table  -->
                    <table id="table_presence_emp" class="table table-bordered">
                        <!-- Table head -->
                        <thead>
                        <tr>
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="tableDefaultCheck1">
                                    <label class="custom-control-label" for="tableDefaultCheck1">Selectione tout</label>
                                </div>
                            </th>
                            <th class="th-sm">Nom Employer
                            </th>
                            <th class="th-sm">Pointage
                            </th>
                            <th class="th-sm text-center">Action
                            </th>
                        </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody>
                        <div class="row">
                            <input type="hidden" id="nbr_employer" value="{{count($employers)}}">
                            <input type="hidden" id="min" value="{{($min)}}">
                            <input type="hidden" id="max" value="{{($max)}}">
                            @foreach($employers as $employer)
                                <tr>
                                    <th scope="row">
                                        <!-- Default unchecked -->
                                        <div id="check_div" class="custom-control custom-checkbox col-md-3">
                                            <input type="checkbox" class="custom-control-input "
                                                   id="chek{{$employer->id}}">
                                            <label class="custom-control-label " for="chek{{$employer->id}}"></label>
                                        </div>
                                    </th>
                                    <td>{{$employer->nom_employer." ".$employer->prenom}}</td>
                                    <td>
                                        <ul class="list-group list-group-horizontal">
                                            @foreach($tablePresence[$employer->id] as $presence)

                                                <button style="border-radius: 20px;"
                                                        class="btn btn-outline-primary text-white" data-toggle="modal"
                                                        data-id="{{$presence->id}}" data-note="{{$presence->note}}"
                                                        data-id-emp="{{$employer->id}}"
                                                        data-heur-entre="{{$presence->heur_entre}}"
                                                        data-heur-sortit="{{$presence->heur_sortit}}"
                                                        data-target="#editModal"> {{$presence->heur_entre." "."=>"." ".$presence->heur_sortit}}
                                                </button>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <center>
                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-whatever="{{$employer->id}}" data-target="#exampleModal"><i
                                                    class="fas fa-plus"></i></button>

                                    </td>
                                </tr>
                            @endforeach
                        </div>
                        </tbody>
                        <!-- Table body -->
                    </table>
            </div>
        </div>
    </div>
    <!-- Table  -->
    @endif
    @include('util.presence.modelAdd')
    @include('util.presence.modelEdit')
    @include('util.presence.modelAddAll')
@endsection
@section('script')
    <!-- <script src="{{asset('App/public/js/presence/index.js')}}"></script> -->
    <script>
        $(document).ready(function () {

            let item1 = '<li class="breadcrumb-item active">Presence</li>';
            let item2 = '<li class="breadcrumb-item active">Pointage</li>';
            $("#list_breadcrumb").append(item1);
            $("#list_breadcrumb").append(item2);


            $('#table_presence_emp').DataTable({
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
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var modal = $(this)
                modal.find('#id_emp').val(recipient);
            });
            $('#editModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('heur-entre') // Extract info from data-* attributes
                var modal = $(this);
                modal.find('#heurE').val(button.data('heur-entre'));
                modal.find('#heurS').val(button.data('heur-sortit'));
                modal.find('#noteS').val(button.data('note'));
                modal.find('#id_presence').val(button.data('id'));
                modal.find('#deleteBtn').val(button.data('id'));
                console.log($("#deleteBtn").val());
            });
            $(document).on('click', '#deleteBtn', function () {
                let id = $("#deleteBtn").val();
                Swal.fire({
                    title: 'Vous Voulez Vraiment l\'apresence ?',
                    text: "La suppression est reversible",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Annulue',
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
                            success: function (data) {
                                // $("#valPoi").remove();
                                location.reload(true);
                                console.log(data);
                            },
                            error: function (err, two, tre) {
                                console.log(err);
                                console.log(two);
                                console.log(tre);
                            }

                        })
                    }
                });
            });
            $(document).on('click', '#tableDefaultCheck1', function () {
                if ($("#tableDefaultCheck1").is(':checked')) {
                    console.log('selection tous');

                    let min = parseInt(document.getElementById('min').value);
                    let max = parseInt(document.getElementById('max').value);
                    for (let j = min; j <= max; j++) {
                        $("#chek" + j).prop('checked', true);
                    }
                } else {
                    // console.log('deselectionne tous');
                    let min = parseInt(document.getElementById('min').value);
                    let max = parseInt(document.getElementById('max').value);
                    for (let i = min; i <= max; i++) {
                        $("#chek" + i).prop('checked', false)
                    }
                }
            });
            $('#addALL').on('show.bs.modal', function (event) {
                var employer_selectionne = [];
                console.log($("#nbr_employer").val());
                let min = parseInt(document.getElementById('min').value);
                let max = parseInt(document.getElementById('max').value);
                for (let i = min; i <= max; i++) {
                    if ($("#chek" + i).is(':checked')) {
                        let option = '<option selected>' + i + '</option>';
                        // push id employer pour faire la presence
                        employer_selectionne.push(i);
                        $("#select_empl").append(option);
                        // console.log('l\'un des employer sel ' + i);
                    }
                }
            });

            $('.dataTables_length').addClass('bs-select');
            // select_empl
            $(document).on('submit', '#formForAddAll', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{route('presence.saveAll')}}",
                    type: "POST",
                    data: $('#formForAddAll').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data.status) {
                            setInterval('location.reload()', 3000);
                            // location.reload(true);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'success',
                                title: data.cmp + " " + 'pointe avec succe'
                            })
                        }
                    },
                    error: function (one, two, tre) {
                        console.log(one);
                        console.log(two);
                        console.log(tre);
                    }

                })
            });
        });
    </script>
@endsection
