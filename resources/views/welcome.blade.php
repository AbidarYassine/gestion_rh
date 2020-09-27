@extends('layouts.app')
@section('style')
    <style>
        #link_employer:hover {
            color: #18ffff;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <center>
                    <h2 style="font-weight: bold">Créez un compte et profitez</br>
                        <span class="ml-5"> d'une période d'essai sans engagement</span>
                    </h2>
                </center>
                <hr>
                <img style="width:80%; height: 80%" src="{{asset('images/paie2.png')}}" alt="image">
            </div>

            <div class="col-md-6">
                <div id="ulErrors" style="display: none" class="row alert alert-danger">
                    <ul id="error"></ul>
                </div>
                <div style="background-color: white" class="card-body shadow-sm p-3 mb-5 bg-white rounded">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#register" role="tab"
                               aria-controls="profile" aria-selected="false">Se Connecter</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab"
                               aria-controls="home" aria-selected="true">Connexion</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
                            <div style="background-color: white" class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Address E-Mail ') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                                   autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Mot De Passe') }}</label>

                                        <div class="col-md-6">
                                            <input id="passworde" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Connexion') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="profile-tab">
                            <div style="background-color: white" class="card-body">
                                <form id="form_store">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>


                                            <span id="name_error" class="invalid-feedback" role="alert">

                                        </span>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __(' Address E-Mail ') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>

                                        <div class="col-md-6">
                                            <input id="emaile" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required
                                                   autocomplete="email">


                                            <span id="email_error" class="invalid-feedback" role="alert">

                                        </span>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rais_social"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Raison Social') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>

                                        <div class="col-md-6">
                                            <input type="text"
                                                   class="form-control @error('rais_social') is-invalid @enderror"
                                                   required name="rais_social">
                                            <span id="rais_social_error" class="invalid-feedback" role="alert">
                                        </span>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tele"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('tele') is-invalid @enderror"
                                                   required name="tele">


                                            <span id="tele_error" class="invalid-feedback" role="alert">

                                        </span>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Mot de Pass') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control"
                                                   name="password" required autocomplete="new-password">


                                            <span class="invalid-feedback" role="alert">
                                                <strong id="password_error"></strong>
                                            </span>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Confirmation Mot de Passe') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Enregistrer') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a id="link_employer" href="{{route('espace.login')}}"
                       class=" mt-4 btn btn-outline-primary float-right text-decoration-none">Je suis Un Employer</a>
                </div>
            </div>
        </div>
        @endsection
        @section('script')
            <script>
                $(document).ready(function () {
                    $(document).on('submit', '#form_store', function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: "{{route('user.store')}}",
                            method: "POST",
                            data: $("#form_store").serialize(),
                            success: function (data) {
                                $("#ulErrors").hide();
                                window.location.href = "/Registration";
                            },
                            error: function (reject) {
                                var response = $.parseJSON(reject.responseText);
                                $("#ulErrors").show();
                                $.each(response.errors, function (key, vale) {
                                    $("#" + key + "_error").text(vale[0]);
                                    let li = "<li class='text-danger'>" + vale[0] + "</li>";
                                    $("#error").append(li);
                                });
                            }
                        });
                    })

                })
            </script>
@endsection
