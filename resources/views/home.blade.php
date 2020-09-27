@extends('admin.include.default')
@section('title','Tableaux de bord')
@section('style')
@endsection
@section('content')
    <div class="col-md-12">
        <div class="row justify-content-center">
            <!-- Card -->
            <div class="col-md-5">
                <div class="card">
                    <!-- Card image -->
                    <center><i class="fas fa-5x fa-users text-warning"></i></center>
                    <div class="view overlay">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <h4 class="card-title" style="font-style: italic;">{{$nombre_employer}} employés dans votre
                            entreprise</h4>
                        <!-- Text -->
                        <a href="{{route('employer.index')}}" class="btn btn-outline-warning float-right">Detail</a>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <!-- Card -->
            <div class="col-md-5">
                <div class="card">
                    <!-- Card image -->
                    <center><i class="fas fa-5x fa-users text-info"></i></center>
                    <div class="view overlay">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <h4 class="card-title" style="font-style: italic;">{{$employer_preson}} Présent

                            le {{date('d/m/yy')}}</h4>
                        <!-- Text -->
                        <a href="{{route('presenceEmp.index')}}" class="btn btn-outline-info float-right">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <!-- Card -->
            <div class="col-md-5">
                <div class="card">
                    <!-- Card image -->
                    <center><i class="fas fa-building fa-5x mt-1 text-secondary"></i></center>
                    <div class="view overlay">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <h4 class="card-title" style="font-style: italic;">Le Nombre de département est {{$nbrdep}}</h4>
                        <!-- Text -->
                        <button type="button" class="btn btn-outline-secondary float-right" data-toggle="modal"
                                data-target="#exampleModal">Detail
                        </button>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <!-- Card -->
            <div class="col-md-5">
                <div class="card">
                    <!-- Card image -->
                    <center><i class="fas  fa-5x fa-briefcase text-default"></i></center>
                    <div class="view overlay">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <h4 class="card-title" style="font-style: italic;">Les post occuper sont {{$nbremploi}}</h4>
                        <!-- Text -->
                        <a data-toggle="modal" data-target="#ModalEmploi" class="btn btn-outline-default float-right">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <!-- Card -->
            <div class="col-md-10">
                <div class="card">
                    <!-- Card image -->
                    <center><i style="color: #ff4444;" class="fas mt-1 fa-5x fa-file-alt"></i></center>
                    <div class="view overlay">
                        <a href="">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <h4 class="card-title" style="font-style: italic;">{{$nbrFichePaie}} fiche crée
                            le {{date('m/yy')}}</h4>
                        <!-- Text -->
                        <a href="{{route('paie.index')}}" class="btn btn-outline-danger float-right">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row container">
            <div class="col-md-6">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="myChart2" width="200" height="200"></canvas>
            </div>

        </div>
{{--        <div class="row container">--}}
{{--            <canvas id="myChart3" width="200" height="200"></canvas>--}}
{{--        </div>--}}
    </div>
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Les Employés par departement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($employerDepartement as $emploDep)
                    <center>
                        <h1 class="text-center">{{$emploDep[0]->nom_dep}}
                            <center>
                                <hr class="bg-default text-center" style="width: 20%;"/>
                            </center>
                        </h1>
                        <br>

                        <span class="lead text-default">{{count($emploDep[1])}} employers</span>
                    </center>

                    <div class="row">
                        <table class="table table-hover text-center" width="100%">
                            <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom Employer</th>
                                <th>Prenom Employer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($emploDep[1] as $employer)
                                <tr>
                                    <td>{{$employer->cin}}</td>
                                    <td>{{$employer->nom_employer}}</td>
                                    <td>{{$employer->prenom}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEmploi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEmploi">Les Employés par Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($emploieEmploye as $emploiEmp)
                    <center>
                        <h1 class="text-center">{{$emploiEmp[0]->fonction}}
                            <center>
                                <hr class="bg-default text-center" style="width: 20%;"/>
                            </center>
                        </h1>
                        <br>

                        <span class="lead text-default">{{count($emploiEmp[1])}} employers</span>
                    </center>

                    <div class="row">
                        <table class="table table-hover text-center" width="100%">
                            <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom Employer</th>
                                <th>Prenom Employer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($emploiEmp[1] as $employer)
                                <tr>
                                    <td>{{$employer->cin}}</td>
                                    <td>{{$employer->nom_employer}}</td>
                                    <td>{{$employer->prenom}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
@section('script')

    <script>
        $(document).ready(function (e) {
            // $('.table').DataTable();
            $('.table').DataTable();
        });
        $.ajax({
            url: "{{route('admin.statistique')}}",
            method: "GET",
            success: function (data) {
                console.log(data);
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.depa,
                        datasets: [{
                            label: '# Nombre d\'employers pour chaque departement',
                            data: data.emplNombre,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                var ctx2 = document.getElementById('myChart2');
                var myChart2 = new Chart(ctx2, {
                    type: 'polarArea',
                    data: {
                        labels: data.sexe,
                        datasets: [{
                            data: data.sexeNombre,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

            },
            error: function (err) {
                console.log(err);
            }
        });

    </script>
@endsection
