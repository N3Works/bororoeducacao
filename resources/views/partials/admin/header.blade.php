<div class="logo-area">
	<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
			<span class="icon-bg">
				<i class="ti ti-menu"></i>
			</span>
		</a>
	</span>

    <a class="navbar-brand" href="/">
        <img src="{{ asset('/images/logo-mini.png') }}" alt="" width="50" style="margin-top: -12px">
        Pantaneiro
    </a>

</div><!-- logo-area -->
<ul class="nav navbar-nav toolbar pull-right">
    <li class="dropdown toolbar-icon-bg">
        <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
            <img class="img-circle" src="{{ asset('assets/img/user.png') }}" alt=""/>
        </a>
        <ul class="dropdown-menu userinfo arrow">
            <li><a href="{{ url('/') }}"><i class="ti ti-desktop"></i><span>Ir para o site</span></a></li>
            <li><a href="/logout"><i class="ti ti-shift-right"></i><span>Sair</span></a></li>
        </ul>
    </li>
</ul>