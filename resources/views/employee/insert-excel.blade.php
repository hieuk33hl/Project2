@extends('dashboard')
@section('huyen')

    <div class="card">
        <h1>Thêm bằng excel</h1>
        <form action="{{ route('employee.insert-excel-process') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="excel"
                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
            <button>Thêm</button>
        </form>
        {{-- <form action="{{ url('import-csv') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">
            <button type="submit" class="btn btn-info">Thêm bằng file excel</button>
        </form> --}}
    </div>
@endsection
