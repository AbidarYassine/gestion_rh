<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pointage</h5>
                <button type="button" id="btnClose" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('presence.updateP')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input id="id_presence" type="hidden" name="id_presence">
                    <input id="id_employer" type="hidden" name="id_employer">
                    <input type="hidden" name="date_pointe" class="form-control @error('date_pointe') is-invalid @enderror" value="{{date('yy-m-d')}}">
                    @error('date_pointe')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group row">
                        <label for="heurE" class="col-md-4 col-form-label text-md-right">{{ __('Heure Entree') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="heurE" type="time" class="form-control @error('heur_entre') is-invalid @enderror" name="heur_entre" value="{{ old('heur_entre') }}" autocomplete="name" autofocus>
                            @error('heur_entre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="heur_sortit" class="col-md-4 col-form-label text-md-right">{{ __('Heure Sortie') }}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="heurS" type="time" class="form-control @error('heur_sortit') is-invalid @enderror" name="heur_sortit" value="{{ old('heur_sortit') }}" autocomplete="name" autofocus>
                            @error('heur_sortit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="note" class="col-md-4 col-form-label text-md-right">{{ __('Note') }}
                        </label>
                        <div class="col-md-6">
                        <textarea rows="4" id="noteS" type="text" class="form-control @error('noteS') is-invalid @enderror" name="noteS" value="{{ old('noteS') }}" autocomplete="name" autofocus></textarea>
                            @error('noteS')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a id="deleteBtn"  class="btn btn-danger">Supprimer</a>
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
