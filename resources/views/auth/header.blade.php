<!-- ============================================================== -->
<!-- navbar -->
<!-- ============================================================== -->
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="#">Company</a>        
        <button class="navbar-toggler mx-3 mb-1 text-dark border border-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars p-1"></i>
            {{-- <span style="font-size: 13px; padding: 0px">{{login_user_name() }}</span> --}}
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                {{-- <li class="nav-item">
                    <div id="custom-search" class="top-search-bar m-3">
                        <input class="form-control" type="text" placeholder="Search..">
                    </div>
                </li>               --}}
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span style="font-size: 14px"> Hi {{login_user_name()}}</span> <img  src="{{ asset('assets/images/lg.png') }}" alt="" class="user-logo rounded-circle ml-1"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">  
                            <h5 class="mb-0 text-white nav-user-name"> {{login_user_name()}} </h5>
                            <span class="status ml-2"></span>Available</span>
                        </div>
                        {{-- <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a> --}}
                        <a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none text-white" href="#" style="font-size: 18px">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">                                 
                        <a href="{{ route('auth_index') }}" class="nav-link active"><i class="fas fa-home"></i>Dashboard</a>
                    </li>
                     <li class="nav-item">                                 
                        <a href="{{ route('auth_usertrash') }}" class="nav-link"><i class="far fa-trash-alt"></i>Trash Bin</a>
                    </li>
                    <li class="nav-item">                                 
                        <a href="#" class="nav-link"><i class="fas fa-phone"></i>Contact</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-f fa-folder"></i>Some Links</a>
                        <div id="submenu-10" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link 2</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link 3</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">                                 
                        <a class="nav-link" href="{{route('logout')}}"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->