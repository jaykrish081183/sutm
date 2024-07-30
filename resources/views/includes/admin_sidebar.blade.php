<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/img/logo-umiya.png')}}" class="user-image" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{isset(Auth::user()->first_name)?Auth::user()->first_name:''}} {{isset(Auth::user()->last_name)?Auth::user()->last_name:''}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="{{route('booking.index')}}"><i class="fa fa-dashboard"></i> Bookings</a></li>
        </ul>
    </section>
</aside>
