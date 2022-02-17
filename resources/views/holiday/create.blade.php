@extends('dashboard')
@section('huyen')
    <?php use Carbon\Carbon; ?>
    <form action="{{ route('holiday.store') }}" method="post">
        @csrf

        tên: <input type="text" name="name_holiday">
        ngay: <input type="date" name="date_holiday">
        <button>Thêm</button>
    </form>
@endsection
