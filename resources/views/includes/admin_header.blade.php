<header class="main-header">
    <a href="javascript:void(0)" class="logo">
        <span class="logo-mini"><img src="{{asset('assets/img/logo-umiya.png')}}" class="user-image" alt="User Image"></span>
        <span class="logo-lg"><b>માતાજીની પધરામણી</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('assets/img/logo-umiya.png')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{isset(Auth::user()->first_name)?Auth::user()->first_name:''}} {{isset(Auth::user()->last_name)?Auth::user()->last_name:''}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{asset('assets/img/logo-umiya.png')}}" class="user-image" alt="User Image">
                            <p>
                                {{isset(Auth::user()->first_name)?Auth::user()->first_name:''}} {{isset(Auth::user()->last_name)?Auth::user()->last_name:''}}
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="javascript:void(0)" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('admin.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="Javascript:void(0)" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
