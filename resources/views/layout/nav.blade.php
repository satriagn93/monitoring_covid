<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
        <a href="{{url('/employee')}}" class="nav-link {{ request()->is('employee*') ? 'nav-item active' : '' }}">
            <i style="color: #FF4081;" class="nav-icon fas fa-book-reader"></i>
            <p>Data Karyawan</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{url('/covid')}}" class="nav-link {{ request()->is('covid*') ? 'nav-item active' : '' }}">
            <i style="color: #80ff80;" class="nav-icon fas fa-virus"></i>
            <p>Positif Covid</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{url('/vaksin')}}" class="nav-link {{ request()->is('vaksin*') ? 'nav-item active' : '' }}">
            <i style="color: #FFEB3B;" class="nav-icon fas fa-hospital"></i>
            <p>Data Vaksin</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{url('/report')}}" class="nav-link {{ request()->is('report*') ? 'nav-item active' : '' }}">
            <i style="color: #81e9e6;" class="nav-icon fas fa-book-reader"></i>
            <p>Report</p>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a href="{{url('/member')}}" class="nav-link {{ request()->is('member*') ? 'nav-item active' : '' }}">
            <i style="color: #0092ff;" class="nav-icon fas fa-book-reader"></i>
            <p>Member API</p>
        </a>
    </li> -->
    

</ul>