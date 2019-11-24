<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part">
            <a class="logo" href="#"><b>
                    <img src="{{ asset('plugins/images/eliteadmin-logo.png') }}" alt="home" class="dark-logo" />
                    <img src="{{ asset('plugins/images/eliteadmin-logo-dark.png') }}" alt="home" class="light-logo" />
                </b>
                <span class="hidden-xs">
                    <img src="{{ asset('plugins/images/eliteadmin-text.png') }}" alt="home" class="dark-logo" />
                    <img src="{{ asset('plugins/images/eliteadmin-text-dark.png') }}" alt="home" class="light-logo" />
                </span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
            {{--<li>
                <form role="search" class="app-search hidden-xs">
                    <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
            </li>--}}
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">

            <!-- /.dropdown -->

            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
                    <img src="{{ asset('plugins/images/users/blank-profile-picture.png') }}" alt="user-img" width="36" class="img-circle">
                    <b class="hidden-xs">User Name</b>
                </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li><a href=""><i class="ti-user"></i> My Account</a></li>
                    <li role="separator" class="divider"></li>
                    <li>

                        <form id="logout-form-top" action="" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
