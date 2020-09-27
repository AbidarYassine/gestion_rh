<div class="col-md-12">

    <nav class="navbar navbar-expand-md navbar-dark primary-color mb-5 no-content">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <button type="button" id="sidebarCollapse" class="btn btn-white text-primary navbar-btn btn-sm">
                <i class="fas fa-bars "></i>
            </button>
        </div>
        <!-- Breadcrumb-->
        <div class="mr-auto">
            <nav aria-label="breadcrumb">
                <ol id="list_breadcrumb" class="breadcrumb clearfix d-none d-md-inline-flex pt-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{route('home')}}">Home</a>
                        <i class="far fa-hand-point-right mx-3 white-text" aria-hidden="true"></i>
                    </li>
                </ol>
            </nav>
        </div>
        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item dropdown" id="dropdown">
                <div id="notification" class="btn-group dropleft ">
                    <p class="mt-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-danger mt-2"> <i class="fa fa-bell" aria-hidden="true"></i>
                            @if(DB::table('contact_models')->where('id_societe',Auth::user()->id)->where('repondre',0)->count()>0)
                                <sup>{{DB::table('contact_models')->where('id_societe',Auth::user()->id)->where('repondre',0)->count()}}</sup></span>
                        @endif
                    </p>
                    @if(DB::table('contact_models')->where('id_societe',Auth::user()->id)->where('repondre',0)->count()>0)
                        <div class="dropdown-menu  " aria-labelledby="test">
                            @foreach(DB::table('contact_models')->where('id_societe',Auth::user()->id)->where('repondre',0)->get() as $contact)
                                <a href="{{route('contact.show',$contact->id)}}" class="dropdown-item">
                                    <p> {{substr($contact->subject,0,20)."..."}}
                                        <span id="nom">{{$contact->nom}}
                                            {{Carbon\Carbon::parse($contact->updated_at)->diffForHumans()}}</span>
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="test" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <img style="width: 35px;height: 35px" class="rounded-circle"
                         src="{{asset('images/'.Auth::user()->image)}}">
                    <span>{{Auth::user()->name}}</span>
                </a>
                <div class="dropdown-menu " aria-labelledby="test">
                    <a class="dropdown-item  text-info" href="{{route('user.profile',Auth::user()->id)}}"> <i
                            class="fas mr-1 fa-2x fa-user-circle"></i>Profile</a>
                    <a class="dropdown-item text-info" href="{{route('user.parametre',Auth::user()->id)}}"><i
                            class="fas mr-1 text-info fa-2x fa-user-cog"></i>Parametre</a>
                    <div class="dropdown-divider "></div>
                    <a class="dropdown-item text-info" href="{{ route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-2x text-info mr-1"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</div>
