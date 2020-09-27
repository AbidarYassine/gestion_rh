@extends('admin.include.default')
@section('title','Tout les employers')
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <a href="{{route('employer.create')}}" class="btn btn-success">
                <i class="fas fa-plus fa-1x mr-1"></i>Ajouter Un Employer
            </a>
        </div>
    </div>
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
            <table id="tableEmployer" class="table text-center" width="100%">
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
                        <th class="th-sm">Numero CNSS
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="th-sm">Salaire
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
                        <td>{{$employer->Num_cnss}}</td>
                        <td>{{$employer->salaire." ".$devise}}</td>
                        <td class="text-center">
                            <a href="{{route('employer.edit',$employer->id)}}" class="btn btn-warning btn-sm  mr-1"><i class="far fa-edit mr-2"></i>Edit</a>

                            <a href="{{route('employer.delete',$employer->id)}}" class="btn btn-danger btn-sm  mr-1 ml-1 delete-confirm"> <i class="fas fa-trash-alt mr-2"></i>Supprimer</a>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <a href="{{route('employer.show',$employer->id)}}" class="btn btn-info btn-sm  mr-1"><i class="fas fa-eye mr-2"></i>Detail</a>
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
        let item = '<li class="breadcrumb-item active">Employer</li>';
        $("#list_breadcrumb").append(item);

    })
</script>
@endsection

<!-- information post -->
<!--
