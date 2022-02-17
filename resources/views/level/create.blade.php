@extends('dashboard')
@section('title', 'Thêm level')

@section('huyen')

    <div class="col-md-4">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">library_books</i>
            </div>
            <form action="{{ route('level.store') }}" method="post">
                @csrf
                <div class="card-content">
                    <h3 class="card-title">Thêm level</h3>
                    <div class="form-group">
                        <label class="label-control">Level</label>
                        <input type="text" class="form-control datetimepicker" name="name_level" />
                        <label class="label-control">Lương cơ bản</label>
                        <input type="number" class="form-control datetimepicker" name="basic_salary" />
                        <input value="1" readonly name="available" hidden />
                    </div>
                    <button class="btn btn-rose">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
