<!-- Footer -->
<footer class="page-footer font-small bg-default pt-4  footer ">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1sy-7piir8PtXtCZCeD7hRCIIvfz8st4H" width="100%" height="100%"></iframe>
            </div>
            <div class="col-md-6">
                <center>
                    <h1>Contact</h1>
                </center>
                <form action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            @if(session()->has('cin'))
                            <input type="hidden" value="{{session()->get('cin')}}" name="cin">
                            @endif
                            <div class="form-group">
                                <input type="text" placeholder="Nom" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" value="{{old('nom')}}">
                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="sujet" resize="false" class="form-control @error('subject') is-invalid @enderror" value="{{old('subject')}}" name="subject" id="subject" cols="30" rows="5"></textarea>
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" id="btn_contact" class="btn btn-white">Envoyer</button>
                </form>
            </div>
        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© {{date('yy')}}Copyright:YS-APP
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
