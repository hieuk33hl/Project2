@extends('dashboard')
@section('title','Thêm chức vụ')

@section('huyen')

    <div class="col-md-4">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">library_books</i>
            </div>
            <form action="{{ route('jobTitle.store') }}" method="post">
                @csrf
                <div class="card-content">
                    <h3 class="card-title">Thêm chức vụ</h3>
                    <div class="form-group">
                        <label class="label-control">Tên chức vụ</label>
                        <input type="text" class="form-control datetimepicker" name="nameJob"/>
                        <input value="1" readonly name="available" hidden/>
                    </div>
                    <button class="btn btn-rose">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection


