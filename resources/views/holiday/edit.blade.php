@extends('dashboard')
@section('huyen')
    <h1>Sửa ngày nghỉ</h1>
    <form action="{{ route('holiday.update', $holi->id_holiday) }}">
        @csrf
        @method("PUT")
        tên : <input type="text" value="{{ $holi->name_holiday }}" name="name_holiday">
        ngày: <input type="date" value="{{ $holi->date_holiday }}" name="date_holiday">
        <button>Sửa</button>
    </form>
@endsection
