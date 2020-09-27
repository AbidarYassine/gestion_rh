<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg fixed-top navbar-dark default-color">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('espaceEmployer.index')}}">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-433" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Conget
                        @if(session()->has('id'))
                        @if(DB::table('congets')->where('employer_id',session()->get('id'))->where('raison','!=','null')->count()>0)
                        <span class="badge badge-danger ml-2">
                            <i class="fa fa-bell" aria-hidden="true"></i><sup><span class="font-weight-bold">{{DB::table('congets')->where('employer_id',session()->get('id'))->where('raison','!=','null')->count()}}</span></sup>
                        </span>
                        @endif
                        @endif

                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-433">
                        <a data-toggle="modal" data-target="#modalConget" class="dropdown-item">Demandé un conget</a>
                        <a data-toggle="modal" data-target="#modalSubscriptionForm" class="dropdown-item">Demandé une fiche de paie</a>
                        <a class="dropdown-item" href="{{route('congetTraiter.index')}}">Conget Traiter <span class=" float-right badge badge-danger">{{DB::table('congets')->where('employer_id',session()->get('id'))->where('raison','!=','null')->count()}}</span></a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        @if(session()->has('name'))
                        {{session()->get('name')}}
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            <i class="fas fa-sign-out-alt ml-2 text-info"></i>
                        </a>
                        <form id="logout-form" action="{{ route('espaceemployer.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/.Navbar -->
<div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Demande une fiche de paie</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('employer.demandePaie')}}" method="post">
                @csrf
                <div class="modal-body mx-3">
                    <div class="md-form mb-4">
                        <i class="fas fa-calendar-day prefix grey-text"></i>
                        <label for="date_debut" class="mt-n4">Date Debut</label>
                        <input type="date" name="date_debut" class="form-control validate" required>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fas fa-calendar-day prefix grey-text"></i>
                        <label for="date_fin" class="mt-n4">Date Fin</label>
                        <input type="date" name="date_fin" class="form-control validate" required>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Envoyer <i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalConget" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Demande une Conget</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('conget.store')}}">
                @csrf

                <div class="form-group row mt-2">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Date Debut</label>

                    <div class="col-md-6">
                        <input id="date_debut" type="date" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" required value="{{ old('date_debut') }}">
                        @error('date_debut')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Dureé (en Jour)</label>

                    <div class="col-md-6">
                        <input id="durre" type="number" class="form-control @error('durre') is-invalid @enderror" min="1" name="durre" value="{{ old('durre') }}" required>

                        @error('durre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="conget_type_id" class="col-md-4 col-form-label text-md-right">Type de conget</label>
                    <div class="col-md-6">
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                            <option value="">---</option>
                            <option value="PAYÉ">LE CONGÉ PAYÉ</option>
                            <option value="SANS SOLDE">LE CONGÉ SANS SOLDE</option>
                            <option value="CONGÉ ANNUEL">CONGÉ ANNUEL</option>
                            <option value="LE CONGÉ MALADIE">LE CONGÉ MALADIE</option>
                            <option value="autre">Autre</option>
                        </select>
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @if(session()->has('cin'))
                <input id="input_cin" type="hidden" value="{{session()->get('cin')}}">
                @endif
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Matricule</label>

                    <div class="col-md-6">
                        <input id="employer_id" type="text" class="form-control @error('employer_id') is-invalid @enderror" value="{{session()->get('cin')}}" name="employer_id" required>
                        @error('employer_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Envoyer <i class="fas fa-paper-plane-o ml-1"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
