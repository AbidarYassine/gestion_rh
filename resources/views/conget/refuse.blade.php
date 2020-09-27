<div class="modal fade" id="modalRefuse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="form_refuse_conget" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier le conget</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="display:none" id="alertMessageR" class="alert" role="alert">
                    </div>
                    <input type="hidden" name="id_conget" id="id_congetR">
                    <div class="form-group">
                        <label for="raison" class="col-form-label">Raison:</label>
                        <textarea autofocus rows="5" cols="5" name="raison" type="text" id="raisonR" class="form-control @error('raison') is-invalid @enderror" required>
                            </textarea>
                        @error('raison')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnupdateCongetR" type="submit" class="btn btn-primary">Enregistre</button>
                </div>
            </div>
        </div>
    </form>
</div>
