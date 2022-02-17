<div class="wrapper">
    <div class="sidebar" data-active-color="rose" data-background-color="black"
        data-image="../../assets/img/sidebar-1.jpg">
        <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
        {{-- <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                hi
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Admin
            </a>
        </div> --}}
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{ Avatar::create(session('admin')->name_admin)->toBase64() }}" />s
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <span>
                            {{-- <td>Bùi Ngọc Huyền</td> --}}
                            @if (session()->exists('admin'))
                                <span class="text-center">
                                    {{ session('admin')->name_admin }}
                                </span>
                            @endif
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav">
                {{-- <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ route('statistics.index') }}">
                        <i class="material-icons">device_hub</i>
                        <p> Thống kê </p>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('statistics.create') }}">
                        <i class="material-icons">device_hub</i>
                        <p> Thống kê </p>
                    </a>
                </li>
                <li class="{{ Request::is('jobTitle') ? 'active' : '' }}">
                    <a href="{{ route('jobTitle.index') }}">
                        <i class="material-icons">event_seat</i>
                        <p> Chức vụ</p>
                    </a>
                </li>
                <li class="{{ Request::is('employee') ? 'active' : '' }}">
                    <a href="{{ route('employee.index') }}">
                        <i class="material-icons">portrait</i>
                        <p> Nhân viên</p>
                    </a>
                </li>
                <li class="{{ Request::is('legalOff') ? 'active' : '' }}">
                    <a href="{{ route('legalOff.index') }}">
                        <i class="material-icons">content_paste</i>
                        <p> Đơn xin nghỉ </p>
                    </a>
                </li>
                <li class="{{ Request::is('timekeeping') ? 'active' : '' }}">
                    <a href="{{ route('timekeeping.index') }}">
                        <i class="material-icons">timer</i>
                        <p> Bảng chấm công</p>
                    </a>

                </li>
                <li class="{{ Request::is('department') ? 'active' : '' }}">
                    <a href="{{ route('department.index') }}">
                        <i class="material-icons">sort</i>
                        <p> Phòng ban</p>
                    </a>
                </li>
                <li class="{{ Request::is('level') ? 'active' : '' }}">
                    <a href="{{ route('level.index') }}">
                        <i class="material-icons">sort</i>
                        <p> Level</p>
                    </a>
                </li>
                @if (session('admin')->role == 0)
                    <li class="{{ Request::is('admin') ? 'active' : '' }}">
                        <a href="{{ route('admin.index') }}">
                            <i class="material-icons">assignment_ind</i>
                            <p> Kế toán </p>
                        </a>
                    </li>

                @endif

                <li class="{{ Request::is('salary') ? 'active' : '' }}">
                    <a href="{{ route('salary.index') }}">
                        <i class="material-icons">monetization_on</i>
                        <p> Lương </p>
                    </a>
                </li>

                <li class="{{ Request::is('holiday') ? 'active' : '' }}">
                    <a href="{{ route('holiday.index') }}">
                        <i class="material-icons">date_range</i>
                        <p> Nghỉ lễ </p>
                    </a>
                </li>
                <li class="{{ Request::is('calendal') ? 'active' : '' }}">
                    <a href="{{ route('calender') }}">
                        <i class="material-icons">date_range</i>
                        <p> Calender </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
