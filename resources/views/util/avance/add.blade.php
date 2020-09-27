<div class="modal fade" id="ModalAddAvance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="form_add_avance" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une avance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="display:none" id="alertMessage" class="alert" role="alert">
                    </div>
                    <div class="form-group">
                        <label for="employer_id" class="col-form-label">Employer:</label>
                        <select name="employer_id" id="employer_id" class="form-control @error('employer_id') is-invalid @enderror">
                            <option value="0">---</option>
                            @foreach($employers as $employer)
                            <option value="{{$employer->id}}">{{$employer->nom_employer}}</option>
                            @endforeach
                        </select>
                        @error('employer_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_affectation" class="col-form-label">Date Affectation:</label>
                        <input type="date" class="form-control @error('date_affectation') is-invalid @enderror" id="date_affectation" name="date_affectation">
                        @error('date_affectation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="montant" class="col-form-label">Montant:</label>
                        <input type="text" class="form-control @error('montant') is-invalid @enderror" id="montant" name="montant" placeholder="Montant">
                        @error('montant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnAddAvance" type="submit" class="btn btn-primary">Enregistre</button>
                </div>
            </div>
        </div>
    </form>
</div>
