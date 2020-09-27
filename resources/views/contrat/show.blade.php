@extends('admin.include.default')
@section('title','Contrat')
@section('content')
    <div class="col-md-12">
        <div class="card border-primary">
            <div class="card-header">
                Les Employers
            </div>
            <div class="card-body">
                @if(count(contrat)==null)
                    <div class="alert alert-warning" role="alert">
                        Aucun Contrat Trouver
                    </div>
                @else

                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            let item = '<li class="breadcrumb-item active">Contrat</li>';
            let item2 = '<li class="breadcrumb-item active">Voir</li>';
            $("#list_breadcrumb").append(item);
            $("#list_breadcrumb").append(item2);
        })

    </script>
@endsection

<!-- information post -->
<!--
