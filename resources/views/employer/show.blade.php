@extends('admin.include.default')
@section('title','employer')
@section('content')
<div class="col-md-12">
    <div class="card-header bg-info text-white">
        Detail de employer {{$employer->nom_employer}}
    </div>
    <div class="row mt-2">
        <div class=" col-md-12 d-flex justify-content-center">
            <img id="imageEmployer" src="{{asset('storage/'.$employer->image)}}" alt="Image employer">
        </div>
    </div>
    <h3 class="ml-2">Les Information Personnel</h3>
    <hr style="width:30%" class="bg-info ml-2">
    <div class="row mt-3">
        <div class="col-md-6">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>id</td>
                    <td>{{$employer->id}}</td>
                </tr>
                <tr>
                    <td>Cin</td>
                    <td>{{$employer->cin}}</td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td>{{$employer->nom_employer}}</td>
                </tr>
                <tr>
                    <td>Date Naissance</td>
                    <td>{{$employer->date_naissance}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$employer->email}}</td>
                </tr>
                <tr>
                    <td>Sexe</td>
                    <td>{{$employer->sexe}}</td>
                </tr>

            </table>
        </div>
        <div class="col-md-6">
            <table class="table  table-bordered table-hover">
                <tr>
                    <td>Numero CNSS</td>
                    <td>{{$employer->Num_cnss}}</td>
                </tr>
                <tr>
                    <td>Situation Familail</td>
                    <td>{{$employer->situationFami}}</td>
                </tr>
                <tr>
                    <td>Numero ICMR</td>
                    <td>{{$employer->Num_Icmr}}</td>
                </tr>
                <tr>
                    <td>Salaire</td>
                    <td>{{$employer->salaire." ".$devise}}</td>
                </tr>
                <tr>
                    <td>Nombre D'enfant</td>
                    <td>{{$employer->nbr_enfant}}</td>
                </tr>
                <tr>
                    <td>Departement</td>
                    <td>{{$departement->nom_dep}}</td>
                </tr>
            </table>
        </div>
    </div>
    <h3 class="ml-2">Le Post Et la Contrat</h3>
    <hr style="width:23%" class="bg-info ml-2">
    <div class="row">
        <div class="col-md-6">
            <table class="table  table-bordered table-hover">
                <tr>
                    <td>Contrat Type</td>
                    <td>{{$contratType->type}}</td>
                </tr>
                <tr>
                    <td>Date de Creation de contrat</td>
                    <td>{{$contrat->created_at}}</td>
                </tr>
            </table>
        </div>

        <div class="col-md-6">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>Date embuache </td>
                    <td>{{$contrat->date_embauche}}</td>
                </tr>
                <tr>
                    <td>Post </td>
                    <td>{{$post->fonction}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        let item1 = '<li class="breadcrumb-item active">Employer</li>';
        let item2 = '<li class="breadcrumb-item active">Detail</li>';
        $("#list_breadcrumb").append(item1);
        $("#list_breadcrumb").append(item2);

    });
</script>
@endsection
