@extends('dashboard')
@section('title', 'Salary')

@section('huyen')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content">
            <h3 class="card-title">Thông tin bảng lương</h3>
            <form action="{{ route('salary.luong') }}" method="get">
                <div>
                    <input type="date" name="date">

                    <button><i class="fa fa-edit">lương</i></button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table">
                    <th>Tên nhân viên</th>
                    <th>Từ ngày</th>
                    <th>Đến ngày</th>
                    <th>Level</th>
                    <th>Chức vụ</th>
                    <th>Lương</th>

                    <th></th>
                    <tbody>
                        @foreach ($listSalary as $salary)
                            <tr>
                                <td>{{ $salary->name_empployee }}</td>
                                <td>{{ $salary->fromdate }}</td>
                                <td>{{ $salary->todate }}</td>
                                <td>{{ $salary->id_level }}</td>
                                <td>{{ $salary->name_jobTitle }}</td>
                                <td>{{ $salary->salary }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
