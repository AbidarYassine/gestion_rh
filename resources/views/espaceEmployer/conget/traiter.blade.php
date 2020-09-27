@extends('espaceEmployer.include.nosidebar')
@section('style')
<style>
    .espace {
        height: 50px;
    }
</style>
@endsection
@section('content')
<div class="espace"></div>
<div class="espace"></div>
<div class="container">
    @foreach($tabCongetTraiter as $conget)
    <div class="row">
        <div class="col-md-12">
            <!--Panel-->
            <div class="card text-center">
                <div class=" card-header default-color white-text">
                    Votre demande est traite {{$conget[1]}}
                </div>
                <div class="card-body">
                    <h4 class="card-title">Votre demande</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">Date dubét</div>
                                <div class="col-md-6">{{$conget[0]->date_debut}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">Durre</div>
                                <div class="col-md-6">{{$conget[0]->durre}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">Reponse</div>
                                <div class="col-md-6">{{$conget[0]->status}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">Raison</div>
                                <div class="col-md-6">
                                    <p class="lead"> {{$conget[0]->raison}}
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="espace"></div>
<div class="espace"></div>
@endsection
@section('script')
<script>
    // alert('hi')
</script>

@endsection
