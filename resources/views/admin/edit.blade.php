@extends('dashboard')
@section('title', 'Cập nhật Admin')
@section('huyen')
    <h1>Sửa thông tin adminnnn </h1>
    <form action="{{ route('admin.update', $admin->id_admin) }}" method="post">
        @csrf
        @method("PUT")
        Tên <input type="text" value="{{ $admin->name_admin }}" name="name_admin"> <br>
        Phone <input type="text" value="{{ $admin->phone_admin }}" name="phone_admin"><br>
        Email <input type="email" value="{{ $admin->email_admin }}" name="email_admin"><br>
        Pass <input type="text" value="{{ $admin->pass_admin }}" name="pass_admin"><br>
        Role <input type="text" value="{{ $admin->role }}" name="role"><br>
        <button>Sửa</button>
    </form>
@endsection
