@extends('dashboard')
@section('title', 'Thêm tài khoản Admin')
@section('huyen')
    {{-- <h1>Thêm Admin</h1>
    <form action="{{ route('admin.store') }}" method="post">
        @csrf

        Ten : <input type="text" name="name_admin"><br>
        Phone : <input type="text" name="phone_admin"><br>
        Email : <input type="text" name="email_admin"><br>
        Password : <input type="text" name="pass_admin"><br>
        Role : <input type="text" name="role_admin"><br>
        <input value="1" readonly name="available">
        <button>Thêm</button>
    </form> --}}

    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">contacts</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Thêm Admin</h4>
            <form action="{{ route('admin.store') }}" method="post">
                @csrf
                <div class="form-group label-floating is-empty">
                    <label>Tên Admin</label>
                    <input type="text" class="form-control" name="name_admin">
                    <span class="material-input"></span>
                </div>
                <div class="form-group label-floating is-empty">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="phone_admin">
                    <span class="material-input"></span>
                </div>
                <div class="form-group label-floating is-empty">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email_admin">
                    <span class="material-input"></span>
                </div>
                <div class="form-group label-floating is-empty">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass_admin">
                    <span class="material-input"></span>
                </div>
                <div class="form-group label-floating is-empty">
                    <label>Role</label>
                    <input type="text" class="form-control" name="role_admin">
                    <span class="material-input"></span>
                </div>
                <input value="1" readonly name="available" hidden>
                {{-- <div class="col-lg-5 col-md-6 col-sm-3">
                    <select class="selectpicker" data-style="select-with-transition" multiple title="Phân quyền"
                        data-size="4">
                        <option disabled> chọn quyền</option>
                        <option value="">Paris </option>
                        <option value="">Bucharest</option>
                    </select>
                </div> --}}
                <button type="submit" class="btn btn-fill btn-rose">Thêm</button>
            </form>
        </div>
    </div>
@endsection
