<table class="table">
    <thead>
        <tr>
            <th>Mã chấm công</th>
            <th>Mã nhân viên</th>
            <th>Tên nhân viên</th>
            <th>Checkin</th>
            <th>Checkout</th>
            <th>date</th>
            <th>Phat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listTime as $time)
            <tr>
                <td>{{ $time->id_timekeeping }}</td>
                <td>{{ $time->id_employee }}</td>
                <td>{{ $time->name_empployee }}</td>
                <td>{{ $time->checkin }}</td>
                <td>{{ $time->checkout }}</td>
                <td>{{ $time->date }}</td>
                <td>{{ $time->phat }}</td>
                {{-- <td>
                    <a class="btn btn-sm btn-danger"
                        href="{{ route('timekeeping.hide', $time->id_timekipping ) }}">
                        <i class="fa fa-times"></i>Ẩn
                    </a>
                </td> --}}
            </tr>
        @endforeach
    </tbody>
</table>

{{-- thống kê --}}
<table class="table">


    <tr>
        <th>Mã</th>
        <th>Mã nhân viên</th>
        <th>Tên nhân viên</th>
        <th>Lương cơ bản</th>
        <th>Chức vụ</th>
        <th>Lương thực nhận</th>
        {{-- <th>Phạt</th> --}}
    </tr>

    <tbody>
        {{-- @if (count($idEmp) < 0)
            "k có data"
        @endif
        @if (count($idEmp) > 0)
        - --}}
        @php
            $i = 1;
        @endphp
        @foreach ($idEmp as $salary)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $salary['id_employee'] }}</td>
                <td>{{ $salary['ten_nv'] }}</td>
                <td>{{ $salary['salary_basic'] }}</td>
                <td>{{ $salary['job_title'] }}</td>
                <td>{{ $salary['salary'] }}</td>
                {{-- <td>{{ $salary['phat'] }}</td> --}}
            </tr>
        @endforeach
        {{-- @endif --}}


        <form action="">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tổng lương cơ bản </th>
                        <th>{{ $salary }}</th>
                    </tr>
                    <tr>
                        <th>Tổng lương thực nhận</th>
                        <th>{{ $idEmp }}</th>
                    </tr>
                    <tr>
                        <th>Tổng tiền phạt </th>
                        <th>{{ $phat }}</th>
                    </tr>
                </thead>
            </table>
        </form>
    </tbody>


</table>
