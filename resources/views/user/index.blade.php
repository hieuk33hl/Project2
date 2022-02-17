@extends('user.layout.app')

@section('title', 'Trang chủ')

@section('user')
    <?php use Carbon\Carbon; ?>
    <div class="row">
        {{-- @foreach ($checks as $check) --}}
        {{-- @if ($check->checkin == null) --}}
        {{-- checkin --}}

        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">today</i>
                </div>
                @if (Session::exists('error'))
                    <div class="text-center">{{ Session::get('error') }}</div>
                @endif
                <form action="{{ route('timekeeping.store') }}" method="post">
                    @csrf
                    <div class="card-content">
                        <h3 class="card-title">Check in</h3>
                        <div class="form-group">
                            <input type="hidden" name="id_employee" value="@if (session('user')) {{ session('user')->id_employee }} @endif ">
                            <label class="label-control">Ngày/Giờ check in</label>
                            <input type="text" name="date" value="{{ Carbon::now('Asia/Ho_Chi_Minh')->toDateString() }}">
                            <input type="text" class="form-control datetimepicker"
                                value="{{ Carbon::now('Asia/Ho_Chi_Minh')->toTimeString() }}" name="checkin" />
                            <input type="hidden" name="available" value="1">
                        </div>
                        <button class="btn btn-primary">Check in</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- @endif --}}
        {{-- @if ($check->checkin == null) --}}
        {{-- checkout --}}
        {{-- <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="red">
                    <i class="material-icons">today</i>
                </div>
                <form action="{{ route('timekeeping.store') }}" method="post">
                    @csrf
                    <div class="card-content">
                        <h3 class="card-title">Check out</h3>
                        <div class="form-group">
                            {{-- @foreach ($timekeeping as $item)
                                <input type="text" name="id_timekeeping" value="{{ $item->id_timekeeping }}">
                            @endforeach --}}

        {{-- <input type="hidden" name="id_employee" value="@if (session('user')) {{ session('user')->id_employee }} @endif ">
        <label class="label-control">Ngày/Giờ check out</label>
        <input type="text" name="date" value="{{ Carbon::now('Asia/Ho_Chi_Minh')->toDateString() }}">
        <input type="hidden" name="available" value="1">
        <input type="text" class="form-control datetimepicker"
            value="{{ Carbon::now('Asia/Ho_Chi_Minh')->toTimeString() }}" name="checkout" />
    </div>
    <button class="btn btn-danger">Check out</button>
    </div>
    </form>
    </div>
    </div> --}}
        {{-- @endif --}}
        {{-- @endforeach --}}


    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">mail_outline</i>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Đơn xin nghỉ</h3>
                    <form method="post" action="{{ route('legalOff.store') }}">
                        @csrf
                        <div class="form-group label-floating">
                            {{-- <input type="hidden" name="id_employee" value="{{ session('user')->id_employee }}"> --}}
                            <label class="control-label">Tên </label>
                            <input type="hidden" name="name_emp" value="@if (session('user')) {{ session('user')->id_admin ?? session('user')->id_employee }} @endif ">
                            <input class=" form-control" name="" value="@if (session('user')) {{ session('user')->name_admin ?? session('user')->name_empployee }} @endif ">
                        </div>



                        <div class=" form-group label-floating ">
                            <label class=" control-label">Lý do</label>
                            <input type="text" class="form-control" name="reason">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Ghi chú</label>
                            <input type="text" class="form-control" name="note">
                        </div>
                        <div class="form-group label-floating">
                            <label>Nghỉ từ ngày</label>
                            <input type="date" class="form-control timepicker" name="start_time_off" />
                        </div>
                        <div class="form-group label-floating">
                            <label>Đến hết ngày ngày</label>
                            <input type="date" class="form-control datepicker" name="end_time_off" />
                        </div>
                        {{-- <div class="form-group label-floating">
                            <label>available</label>
                            <input type="hidden" class="form-control datepicker" name="available" value="1" />

                            <input type="hidden" class="form-control datepicker" name="available" value="1" />
                            <input type="hidden" class="form-control datepicker" name="available" />
                        </div> --}}
                        <button type="submit" class="btn btn-fill btn-primary">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
