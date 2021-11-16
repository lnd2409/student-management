<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('template/admin') }}/assets/images/xs/avatar1.jpg" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown">John Doe</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                    role="button"> keyboard_arrow_down </i>
                <ul class="dropdown-menu slideUp">
                    <li><a href="profile.html"><i class="material-icons">person</i>Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li class="divider"></li>
                    <li><a href="sign-in.html"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
            <div class="email">john.doe@example.com</div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            @if (Auth::guard('quantri')->check())
            <li><a href="{{route('admin.subject.index')}}"><i class="zmdi zmdi-delicious"></i><span>Quản lý môn học</span> </a>
            </li>

            @endif
            <li><a href="{{route('review')}}"><i class="zmdi zmdi-delicious"></i><span>Quản lý điểm</span> </a>
            </li>
            @if(Auth::guard('sinhvien')->check())

            <li><a href="{{route('review')}}"><i class="zmdi zmdi-delicious"></i><span>Phúc khảo</span> </a></li>
            <li><a href="{{route('dang-ky-mon-hoc')}}"><i class="zmdi zmdi-delicious"></i><span>Đăng ký môn học</span> </a>
            </li>
            @endif
            @if(Auth::guard('giaovien')->check())
            <li><a href="{{ route('subject.by.teacher', ['id'=>Auth::guard('giaovien')->id()]) }}"><i class="zmdi zmdi-delicious"></i><span>Danh sách môn học</span> </a></li>
            <li><a href="{{route('stat')}}"><i class="zmdi zmdi-delicious"></i><span>Thống kê</span> </a></li>
            @endif


        </ul>
    </div>
    <!-- #Menu -->
</aside>
