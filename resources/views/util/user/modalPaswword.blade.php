<div class="modal fade" id="modalPaswword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form id="form_changePassword" action="{{route('user.updatePassword')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier le mot de passe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" >
                        @if ($errors->any())
                        <div class="alert alert-danger" style="width: 100%;">
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                <li class="list-group-item mt-1">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div style="display:none" id="alertMessage" class="alert" role="alert">
                    </div>
                    <div class="form-group">
                        <label for="nvMotpasse" class="col-form-label">Nouveau mot de passe</label>
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        <div class="input-icone">
                            <input type="password" class="form-control" id="nvMotpasse" name="password">
                            <i id="hidenvMotpasse" style="display: none;" class="far  fa-eye-slash"></i>
                            <i class="fas fa-eye icon_show" id="shownvMotpasse"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nvMotpasse" class="col-form-label">Confirmer mot de passe</label>
                        <div class="input-icone">
                            <input type="password" class="form-control" id="confirmMotpasse" name="password_confirmation">
                            <i id="hideconfirmMotpasse" style="display: none;" class="far  fa-eye-slash"></i>
                            <i id="showconfirmMotpasse" class="fas fa-eye icon_show"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnAddAvance" type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </div>
        </div>
    </form>
</div>
