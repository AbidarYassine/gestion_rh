<!-- Sidebar Holder -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3 class=" text-white">RHAPP</h3>
        <strong>RH</strong>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a class="text-white" href="{{route('home')}}">
                <i class="fas fa-house-user"></i>
                Tableau de bord
            </a>
        </li>

        <li class="active">
            <a href="#employer" class="text-white" data-toggle="collapse" aria-expanded="false">
                <i class="fas fa-clipboard"></i>
                Employer <i class="fas fa-sort-down float-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="employer">
                <li>
                    <a href="{{route('employer.index')}}"><span>Employer </span></a>
                </li>
                <li>
                    <a href="{{route('contrat.index')}}"><span>Contart</span></a>
                </li>

            </ul>
        </li>
        <li class="active">
            <a href="#presence" class="text-white" data-toggle="collapse" aria-expanded="false">
                <i class="fas fa-clipboard"></i>
                présence<i class="fas fa-sort-down float-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="presence">
                <li>
                    <a href="{{route('presenceEmp.index')}}"><span>Pointage </span></a>
                </li>
                <li>
                    <a href="{{route('presence.historique')}}"><span>Historique</span></a>
                </li>

            </ul>
        </li>
        <li>
            <a class="text-white" href="{{route('index.avance')}}">
                <i class="fas fa-comment-dollar"></i>
                Avances
            </a>
        </li>
        <li>
            <a class="text-white" href="{{route('paie.index')}}">
                <i class="fas fa-paste"></i>
                paie
            </a>
        </li>
        <li>
            <a class="text-white" href="{{route('demandepaie.index')}}">
                <i class="fas fa-paste"></i>
                demande de paie
            </a>
        </li>
        <li>
            <a class="text-white" href="{{route('conget.index')}}">
                <i class="fas fa-house-user"></i>
                Conget
                @if(DB::table('congets')->where('id_societe',DB::table('societes')->where('user_id',Auth::user()->id)->value('id'))->where('status','en attend')->count()>0)
                    <span id="" class="badge badge-warning float-right ml-2">
                    {{(DB::table('congets')->where('id_societe',DB::table('societes')->where('user_id',Auth::user()->id)->value('id'))->where('status','en attend')->count())}}
                </span>
            @endif
            <!-- <span class="sr-only">unread messages</span> -->
            </a>
        </li>
        <li>
            <a class="text-white" href="{{route('para.index')}}">
                <!-- <i class="fas fa-cogs"></i> -->
                <i class="fas fa-trash-alt"></i>
                Corbeille
            </a>
        </li>
        <li>
            <a class="text-white" href="{{route('para-paie.index')}}">
                <!-- <i class="fas fa-cogs"></i> -->
                <i class="fas fa-cogs"></i>
                Parametre
            </a>
        </li>

        <li class="active">
            <a href="#outil" data-toggle="collapse" aria-expanded="false">
                <i id="appIdIcon" class="fas fa-border-none"></i>Outil <i class="fas fa-sort-down float-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="outil">
                <li>
                    <a href="{{route('admin.salire')}}"><span>SBG</span></a>
                </li>
                <li>
                    <a href="{{route('admin.ir')}}"><span>Calcul De IR</span></a>
                </li>
            </ul>
        </li>

    </ul>

</nav>

<!-- Page Content Holder -->
