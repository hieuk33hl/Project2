@extends('dashboard')
@section('title', 'Trang chủ')
@section('huyen')

    <div class="card">
        <div class="card-header card-header-icon" data-background-color="green">
            <i class="material-icons">&#xE894;</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Thống kê</h4>
            <h1>Thống kê tháng {{ $date }}</h1>
            {{-- tìm kiếm theo phòng ban --}}
            <form action="{{ route('statistics.index') }}">

                {{-- <input type="search" value="{{ $search }}" name="search"> --}}
                <input type="date" name="date" value="{{ $date }}">
                <select name="id-dep">
                    <option value="0">=====</option>
                    @foreach ($listDep as $dep)
                        <option value="{{ $dep->id_department }}" @if ($dep->id_department == $idDep) selected @endif>
                            {{ $dep->name_department }}</option>
                    @endforeach
                </select>

                <button>Tìm</button>
                <input type="submit" value="Xuất chấm công">

            </form>
            {{-- /xuất excel --}}

            <div class="table-responsive">
                <form action="">
                    <table class="table">


                        <tr>
                            <th>Mã</th>
                            <th>Mã nhân viên</th>
                            <th>Tên nhân viên</th>
                            <th>Lương cơ bản</th>
                            <th>Chức vụ</th>
                            <th>Lương thực nhận</th>
                            <th>Phạt</th>
                        </tr>

                        <tbody>
                            {{-- @if (count($idEmp) < 0)
                                "k có data"
                            @endif --}}
                            {{-- @if (count($idEmp) > 0) --}}
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
                                    <td>{{ $salary['phat'] }}</td>
                                </tr>
                            @endforeach
                            {{-- @endif --}}
                        </tbody>


                    </table>
                </form>

            </div>
        </div>
    </div>


@endsection
