@extends('dashboard')
@section('title', 'Cập nhật thông tin nhân viên')
@section('huyen')
    <h1>Sửa thông tin nhân viên </h1>
    <form action="{{ route('employee.update', $employee->id_employee) }}" method="post">
        @csrf
        @method("PUT")
        Tên <input type="text" value="{{ $employee->name_empployee }}" name="name_emp"> <br>
        {{-- Lương 1 giờ <input type="text" value="{{ $employee->salaryPerHour }}" name="salaryperhouse"><br> --}}
        Giới tính :
        <input type="radio" name="gender" value="1" @if ($employee->gender == 1) checked @endif>Nữ
        <input type="radio" name="gender" value="0" @if ($employee->gender == 0) checked @endif>Nam<br>
        Ngày sinh <input type="text" value="{{ $employee->dateOfBirth }}" name="dateOfBirth"><br>
        Sđt <input type="text" value="{{ $employee->phoneNumber }}" name="phone"><br>
        Email <input type="email" value="{{ $employee->email }}" name="email"><br>
        Địa chỉ <input type="text" value="{{ $employee->address }}" name="address"><br>
        level <input type="text" value="{{ $employee->level }}" name="level"><br>
        Phòng ban <select name="id_department">
            @foreach ($listDep as $dep)
                <option value="{{ $dep->id_department }}" @if ($employee->id_department == $dep->id_department) selected @endif>
                    {{ $dep->name_department }}</option>
            @endforeach
        </select><br>
        Chức vụ :
        <select name="id_jobTitle">
            @foreach ($listJob as $job)
                <option value="{{ $job->id_jobTitle }}" @if ($employee->id_jobTitle == $job->id_jobTitle) selected @endif>
                    {{ $job->name_jobTitle }}</option>
            @endforeach
        </select><br>

        <button onclick="myFunction()">Sửa</button>
    </form>
@endsection
<script>
    function myFunction() {
        alert("Sửa thành công");
    }
</script>
