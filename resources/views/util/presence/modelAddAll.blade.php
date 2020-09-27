<div class="modal fade" id="addALL" tabindex="-1" role="dialog" aria-labelledby="addALL" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addALL">Pointage des employers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formForAddAll" method="post">
                    @csrf
                    <input type="hidden" name="date_pointe" class="form-control @error('date_pointe') is-invalid @enderror" value="{{date('yy-m-d')}}">
                    @error('date_pointe')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <select style="display: none;" name="select_empl[]" id="select_empl" multiple="multiple">

                    </select>
                    <div class="form-group row">
                        <label for="heur_entreAll" class="col-md-4 col-form-label text-md-right">{{ __('Heure Entree') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="heur_entreAll" type="time" class="form-control @error('heur_entre') is-invalid @enderror" name="heur_entre" value="{{ old('heur_entre') }}" autocomplete="name" autofocus>
                            @error('heur_entre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="heur_sortitAll" class="col-md-4 col-form-label text-md-right">{{ __('Heure Sortie') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="heur_sortitAll" type="time" class="form-control @error('heur_sortit') is-invalid @enderror" name="heur_sortit" value="{{ old('heur_sortit') }}" autocomplete="name" autofocus>
                            @error('heur_sortit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="noteAll" class="col-md-4 col-form-label text-md-right">{{ __('Note') }}
                        </label>
                        <div class="col-md-6">
                            <textarea rows="4" id="noteAll" type="text" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('heur_sortit') }}" autocomplete="name" autofocus></textarea>
                            @error('heur_sortit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-primary">Enregistre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
