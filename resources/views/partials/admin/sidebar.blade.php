<div class="widget stay-on-collapse" id="widget-sidebar">
    <nav role="navigation" class="widget-body">
        <ul class="acc-menu">
            <li class="nav-separator"><span>Administração</span></li>
            <li><a href="{{ route('admin.home') }}"><i class="ti ti-home"></i><span>Dashboard</span></a>
            </li>

            <li><a href="javascript:;"><i class="ti ti-view-list-alt"></i><span>Cadastros</span></a>
                <ul class="acc-menu">
                    <li><a href="{{ route('admin.posts') }}">Postagens</a></li>
                    <li><a href="{{ route('admin.persons') }}">Pessoas</a></li>
                    <li><a href="{{ route('admin.courses') }}">Eventos</a></li>
                    <li><a href="{{ route('admin.resources') }}">Recursos</a></li>
                </ul>
            </li>
            <li><a href="javascript:;"><i class="ti ti-view-list-alt"></i><span>Relatórios</span></a>
                <ul class="acc-menu">
                    <li><a href="{{ route('admin.report.index') }}">Matrículas por Evento</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>