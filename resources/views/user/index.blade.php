@extends('admin.include.default')
@section('title','Profile')
@section('style')
<style>
    .input-icone {
        position: relative;
    }

    .input-icone i {
        position: absolute;
        left: 0;
        top: 5px;
        padding: 9px 8px;
        color: #64b5f6;
        left: 90%;
        cursor: pointer;
    }

    input[type=text]:hover {
        background: #f2f2f2;
    }

    input:hover {
        background: #f2f2f2;
    }
</style>
@endsection
@section('content')
<div class="col-md-12">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <center>
                <div style="width:265px; height: 265px;" class="view overlay zoom mt-1">
                    <img style="width: 220px;height:220px;" src="{{asset('images/'.$user->image)}}" class="img-fluid rounded-circle " alt="zoom">
                    <div class="mask flex-center waves-effect waves-light">
                        <p class="white-text">{{$user->name}}</p>
                    </div>
                </div>
            </center>
            <ul class="list-group">
                <a data-toggle="modal" data-target="#modalPaswword" class="list-group-item btn btn-outline-info">Changet Le mot de passe</a>
                <li class="list-group-item btn btn-outline-info">
                    <form action="{{route('user.updateImage')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="image">Changer L'image de votre profil </label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn btn-default">Enregistre</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Utilisateur</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}
                            </label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __(' Address E-Mail ') }}
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rais_social" class="col-md-4 col-form-label text-md-right">{{ __('Raison Social') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" value="{{$user->rais_social}}" class="form-control @error('rais_social') is-invalid @enderror" required name="rais_social">
                                @error('rais_social')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tele" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('tele') is-invalid @enderror" value="{{$user->tele}}" name="tele">

                                @error('tele')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <center> <button class="btn btn-info">Enregistre Les Modification</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
    @include('util.user.modalPaswword')
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $(document).on('click', '#shownvMotpasse', function(e) {
            e.preventDefault();
            $("#hidenvMotpasse").show();
            $("#shownvMotpasse").hide();
            $("#nvMotpasse").attr('type', 'text');

        });
        $(document).on('click', '#hidenvMotpasse', function(e) {
            e.preventDefault();
            $("#shownvMotpasse").show();
            $("#hidenvMotpasse").hide();
            $("#nvMotpasse").attr('type', 'password');

        });
        $(document).on('click', '#showconfirmMotpasse', function(e) {
            e.preventDefault();
            $("#hideconfirmMotpasse").show();
            $("#showconfirmMotpasse").hide();
            $("#confirmMotpasse").attr('type', 'text');

        });
        $(document).on('click', '#hideconfirmMotpasse', function(e) {
            e.preventDefault();
            $("#showconfirmMotpasse").show();
            $("#hideconfirmMotpasse").hide();
            $("#confirmMotpasse").attr('type', 'password');

        });
    });
</script>
@endsection
