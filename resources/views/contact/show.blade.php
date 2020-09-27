@extends('admin.include.default')
@section('title','Contact')
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="col-md-12">
    <!--Panel-->
    <div class="card ">
        <div class=" card-header default-color white-text">
            Le messagge est envoyer {{$time}}
        </div>
        <div class="card-body">
            <h4 class="card-title"> Message</h4>
            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                 -->
            <!-- <a class="btn btn-success btn-sm">Go somewhere</a> -->
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">Nom Employer:</div>
                        <div class="col-md-6">{{$employer->nom_employer}}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">Prenom:</div>
                        <div class="col-md-6">{{$employer->prenom}}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">Email:</div>
                        <div class="col-md-6">{{$contact->email}}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6">Contenu de Message:</div>
                        <div class="col-md-6">
                            <textarea class="lead form-control" cols="10" rows="7">
                            {{$contact->subject}}
                            </textarea>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col-md-6">
                    <a data-toggle="modal" data-target="#modelRepondre" class="btn btn-primary">Repondre</a>
                </div>
                <div class="col-md-6">
                    <input type="hidden" id="id_contact" value="{{$contact->id}}">
                    <a href="{{route('contact.destroy',$contact->id)}}" id="btn_supp_contact" id="{{$contact->id}}" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modelRepondre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form  action="{{route('mail.sendEmail')}}" method="GET">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Repondre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div style="display:none" id="alertMessageR" class="alert" role="alert">
                        </div>
                        <input type="hidden" id="id_contact" name="id_contact" value="{{$contact->id}}">
                        <div class="form-group">
                            <input type="text"  name="email" class="form-control" value="{{$contact->email}}">
                        </div>
                        <div class="form-group">
                            <label for="raison" class="col-form-label">Votre Message:</label>
                            <textarea autofocus rows="5" cols="5" name="contenu" type="text" id="raisonR" class="form-control @error('raison') is-invalid @enderror" required>
                            </textarea>
                            @error('raison')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </>
                        <div class="modal-footer">
                            <button id="btnupdateCongetR" type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $(document).on('click', '#btn_supp_contact', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Vous Voulez Vraiment supprimer le message ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'supprimer'
            }).then((result) => {
                if (result.value) {
                    let id_contact = $("#id_contact").val();
                    $.ajax({
                        url: "/employer/contact/" + id_contact,
                        type: "DELETE",
                        data: {
                            '_token': "{{csrf_token()}}",
                            'id_contact': id_contact,
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.status) {
                                Swal.fire(
                                    'Suppression!',
                                    'Le message et supprimer',
                                    'success'
                                )
                                setInterval(() => {

                                }, 1000);
                                window.location.href = "{{route('home')}}";
                            }
                        },
                        error: function(errr) {
                            console.log(errr);
                        }
                    });
                }
            })

        })
    });
</script>
@endsection
