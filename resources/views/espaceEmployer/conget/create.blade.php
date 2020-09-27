@extends('espaceEmployer.include.nosidebar')
@section('style')
<style>


    #submitConget {
        border-radius: 20px;
        box-shadow: none;
    }
    .espace{
        height: 50px;
    }
</style>
@endsection
@section('content')
<div class="espace"></div>
<div class="espace"></div>
<div class="container">
    <div class="card col-md-8 offset-md-2">
        <div class="card-header bg-white" style="width: 100%;">
            Demandé un conget
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
                    <input id="employer_id" type="text" class="form-control @error('employer_id') is-invalid @enderror" name="employer_id" required>
                    @error('employer_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button id="submitConget" type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="espace"></div>
@endsection
@section('script')
<script>
    $(document).ready(function(e) {
        $("#employer_id").val($("#input_cin").val());
    });
</script>
@endsection
