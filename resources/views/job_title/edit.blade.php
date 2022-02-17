@extends('dashboard')
@section('title','Cập nhật chức vụ')

@section('huyen')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">library_books</i>
            </div>
            <form action="{{ route('jobTitle.update', $job->id_jobTitle) }}" method="post">
                @csrf
                @method("PUT")
                <div class="card-content">
                    <h4 class="card-title">Câp nhật thông tin chức vụ</h4>
                    <div class="form-group">
                        <label class="label-control">Tên chức vụ</label>
                        <input type="text" value="{{ $job->name_jobTitle }}" name="nameJob"/>
                    </div>
                    <button class="btn btn-rose">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
