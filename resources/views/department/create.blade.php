@extends('dashboard')
@section('title','Thêm phòng ban')

@section('huyen')
    {{-- <h1>Thêm Department</h1>
    <form action="{{ route('department.store') }}" method="post">
        @csrf
        tên : <input type="text" name="namePart">
        <input value="1" readonly name="available">
        <button>Thêm</button>
    </form> --}}
    <div class="col-md-4">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">library_books</i>
            </div>
            <form action="{{ route('department.store') }}" method="post">
                @csrf
                <div class="card-content">
                    <h3 class="card-title">Thêm phòng ban</h3>
                    <div class="form-group">
                        <label class="label-control">Tên phòng ban</label>
                        <input type="text" class="form-control datetimepicker"  name="namePart"/>
                        <input value="1" readonly name="available" hidden>
                    </div>
                    <button class="btn btn-rose">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
