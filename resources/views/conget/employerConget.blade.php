@extends('admin.include.default')
@section('title','Les employers en conget')
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header text-white bg-primary">
            Les Employers en conget
        </div>
        <div class="card-body">
            @if(count($employerEnConget)==0)
            <div class="alert alert-warning" role="alert">
                Aucun Conget Trouver
            </div>
            @else
            <table id="tableEmployer" class="table text-center table-hover" width="100%">
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
                        <th class="th-sm">Type de conget
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="th-sm bg-default text-white">date debut
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="th-sm text-white bg-danger">date Fin
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="th-sm text-center">Durre
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                        <th class="th-sm text-center">Status
                            <i class="fas fa-sort ml-1"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employerEnConget as $employerEnCon)
                    <tr>

                        <td>{{$employerEnCon->employer->cin}}</td>
                        <td>{{$employerEnCon->employer->nom_employer}}</td>
                        <td>{{$employerEnCon->employer->prenom}}</td>
                        <td>{{$employerEnCon->congetType->type}}</td>
                        <td class="bg-default text-white">{{$employerEnCon->date_debut}}</td>
                        <td class="bg-danger text-white">{{date('Y-m-d', strtotime($employerEnCon->date_debut.'+'.($employerEnCon->durre).'days'))}}</td>
                        <td>{{$employerEnCon->durre}}</td>
                        <td>{{$employerEnCon->status}}</td>
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

</script>
@endsection
