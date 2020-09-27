@extends('admin.include.default')
@section('title','Contrat')
@section('content')
    <div class="col-md-12">
        <div class="card border-primary">
            <div class="card-header">
                Les Employers
            </div>
            <div class="card-body">
                @if(count($employers)==0)
                    <div class="alert alert-warning" role="alert">
                        Aucun Employer Trouver
                    </div>
                @else
                    <div class="table-responsive">
                        <table id="tableContrat" class="table text-center" width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm">Matricule
                                    <i class="fas fa-sort inline"></i>

                                </th>
                                <th class="th-sm">Nom Employer
                                    <i class="fas fa-sort ml-1"></i>
                                </th>
                                <th class="th-sm">Prenom
                                    <i class="fas fa-sort ml-0.5"></i>
                                </th>
                                <th class="th-sm">Contrat Type
                                    <i class="fas fa-sort ml-1"></i>
                                </th>
                                <th class="th-sm">Date Creation
                                    <i class="fas fa-sort ml-1"></i>
                                </th>
                                <th class="th-sm text-center">Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employers as $employer)
                                <tr>

                                    <td>{{$employer->cin}}</td>
                                    <td>{{$employer->nom_employer}}</td>
                                    <td>{{$employer->prenom}}</td>
                                    <td>{{$employer->contrat->contrattype->type}}</td>
                                    <td>{{$employer->contrat->date_embauche}}</td>
                                    <td>
                                        <a href="{{route('contrat.show',$employer->contrat->id)}}"
                                           class="btn btn-default btn-sm  mr-1"><i class="fas fa-eye mr-2"></i>Voir</a>
                                        <a href="{{route('contrat.imprimer',$employer->contrat->id)}}"
                                           class="btn btn-info btn-sm  mr-1"><i class="fas mr-2 fa-download"></i>Imprimer</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            let item = '<li class="breadcrumb-item active">Contrat</li>';
            $("#list_breadcrumb").append(item);

        })
        $('#tableContrat').DataTable({
            "order": [
                [3, "desc"]
            ],
            "paging": true,
            "oLanguage": {
                "sLengthMenu": "Afficher _MENU_",
                "sSearch": "Rechercher",
                "sLenghtMenu": "Afficher _MENU_",
                "sZeroRecords": "Aucun contrat Trouvez!",
                "sInfo": "Afficher _START_ à _END_ de _TOTAL_ contrat",
                "sInfoFiltered": "(filtré à partir de _MAX_ contrat)",
                "oPaginate": {
                    "sPrevious": "Précédent",
                    "sNext": "Suivant"
                }
            }
        });

    </script>
@endsection

<!-- information post -->
<!--
