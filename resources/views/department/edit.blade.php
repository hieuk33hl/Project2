@extends('dashboard')
@section('title','Cập nhật phòng ban')

@section('huyen')
    {{-- <h1>Sửa department</h1>
    <form action="{{ route('department.update', $dep->id_department) }}" method="post">
        @csrf
        @method("PUT")
        Tên <input type="text" value="{{ $dep->name_department }}" name="name_dep"><br>
        <button>Sửa</button>
    </form> --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">mail_outline</i>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Cập nhật phòng ban</h3>
                    <form action="{{ route('department.update', $dep->id_department) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group label-floating">
                            <label class="control-label">Tên phòng ban</label>
                            <input type="text" class="form-control" value="{{ $dep->name_department }}" name="name_dep">
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
