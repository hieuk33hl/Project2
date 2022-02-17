@extends('user.layout.app')

@section('title', 'Trang chủ')

@section('user')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (Session::exists('success'))
                    <div class="text-center">{{ Session::get('success') }}</div>
                @endif
                <form id="RegisterValidation" action="{{ route('changePaPro', $emp->id_employee) }}" method="post">
                    @csrf
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">mail_outline</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Thay đổi mật khẩu</h4>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Current Password
                                <small>*</small>
                            </label>
                            <input class="form-control" type="password" name="current_password" required="true" />
                            @if (Session::exists('error'))
                                <div>{{ Session::get('error') }}</div>
                            @endif
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                New Password
                                <small>*</small>
                            </label>
                            <input class="form-control" name="new_password" id="registerPassword" type="password"
                                required="true" />
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Confirm New Password
                                <small>*</small>
                            </label>
                            <input class="form-control" name="new_password_confirmation" id="registerPasswordConfirmation"
                                type="password" required="true" equalTo="#registerPassword" />
                            @if (Session::exists('error1'))
                                <div>{{ Session::get('error1') }}</div>
                            @endif
                        </div>
                        <div class="form-footer text-center">

                            <button type="submit" class="btn btn-rose btn-fill">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
