<div class="modal fade" id="ModaleditAvance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="form_edit_avance" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit avance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="display:none" id="alertEMessage" class="alert" role="alert">
                    </div>
                    <input type="hidden" name="id_avance" id="id_avance">
                    <div class="form-group">
                        <label for="date_affectation" class="col-form-label">Date Affectation:</label>
                        <input type="date" class="form-control @error('date_affectation') is-invalid @enderror" id="date_affectation_e" name="date_affectation">
                        @error('date_affectation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="montant" class="col-form-label">Montant:</label>
                        <input type="text" class="form-control @error('montant') is-invalid @enderror" id="montant_e" name="montant" placeholder="Montant">
                        @error('montant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnEditAvance" type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </form>
</div>
