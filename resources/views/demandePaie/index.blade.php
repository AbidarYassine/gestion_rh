@extends('admin.include.default')
@section('title','Demande votre fiche de paie')
@section('style')
<style>
</style>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Les Demandes de paie
        </div>
        <div class="card-body">
            @if(count($demandPaie)==0)
            <div class="alert alert-warning" role="alert">
                Aucun demande Trouver
            </div>
            @else
            <table id="table_demande" class="table text-center" width="100%">
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
                        <th class="th-sm">Du
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="th-sm">Au
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="th-sm text-center">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demandPaie as $demnpaie)
                    <tr>

                        <td>{{$demnpaie[1]->cin}}</td>
                        <td>{{$demnpaie[1]->nom_employer}}</td>
                        <td>{{$demnpaie[1]->prenom}}</td>
                        <td>{{$demnpaie[0]->date_paie_debut}}</td>
                        <td>{{$demnpaie[0]->date_paie_dfin}}</td>
                        <td class="text-center">
                            <a href="{{route('paie.showPaie',$demnpaie[0]->id)}}" class="btn btn-info btn-sm  mr-1"><i class="fas fa-eye mr-2"></i>Paie Demande</a>
                            <a href="{{route('demandepaie.envoyerLienPaie',[$demnpaie[0]->id,$demnpaie[2]->id])}}" class="btn btn-default btn-sm  mr-1"><i class="far fa-edit mr-2"></i>Envoyer</a>
                            <a href="{{route('demandepaie.delete',$demnpaie[2]->id)}}" class="btn btn-danger btn-sm  mr-1 ml-1 delete-confirm"> <i class="fas fa-trash-alt mr-2"></i>Supprimer</a>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#table_demande').DataTable({
            "order": [
                [3, "desc"]
            ],
            "paging": true,
            "oLanguage": {
                "sLengthMenu": "Afficher _MENU_",
                "sSearch": "Rechercher",
                "sLenghtMenu": "Afficher _MENU_",
                "sZeroRecords": "Aucun demande Trouvez!",
                "sInfo": "Afficher _START_ à _END_ de _TOTAL_ demandes",
                "sInfoFiltered": "(filtré à partir de _MAX_ demande)",
                "oPaginate": {
                    "sPrevious": "Précédent",
                    "sNext": "Suivant"
                }
            }
        });

    });
</script>
@endsection
