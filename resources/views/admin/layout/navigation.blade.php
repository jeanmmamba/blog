

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/back') }}"><img src="{{asset('/others')}}/{{ $shareData['admin_logo']}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{ url('/back') }}"><img src="{{asset('/others')}}/{{ $shareData['admin_logo']}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="./back"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                  @permission(['permission update', 'all','Permission'])
                    <li>
                        <a href="{{ url('/back/permission') }}"> <i class="menu-icon fa fa-laptop"></i>permissions </a>
                    </li>
                 @endpermission

                 @permission(['permission update', 'all']) 
                    <li>
                        <a href="{{ url('/back/role') }}"> <i class="menu-icon fa fa-laptop"></i>roles </a>
                    </li>
                    @endpermission  

                    @permission(['permission update', 'all'])
                    <li>
                        <a href="{{ url('/back/author') }}"> <i class="menu-icon fa fa-laptop"></i>authors </a>
                    </li>
                   
                    @endpermission


                    @permission(['category update', 'all'])
                    <li>
                        <a href="{{ url('/back/category') }}"> <i class="menu-icon fa fa-laptop"></i>categories </a>
                    </li>                   
                    @endpermission

                    @permission(['post list', 'all'])
                    <li>
                        <a href="{{ url('/back/post') }}"> <i class="menu-icon fa fa-laptop"></i>posts </a>
                    </li>                   
                    @endpermission
                    
                    @permission(['system setting', 'all'])
                    <li>
                        <a href="{{ url('/back/setting') }}"> <i class="menu-icon fa fa-laptop"></i>setting </a>
                    </li>                   
                    @endpermission



        </nav>
    </aside>
    