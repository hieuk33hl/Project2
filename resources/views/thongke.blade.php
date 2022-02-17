@extends('dashboard')
@section('title', 'Trang chủ')
@section('huyen')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="green">
            <i class="material-icons">&#xE894;</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Thống kê doanh số</h4>
            {{-- tìm kiếm theo phòng ban --}}
            <form action="">
                {{-- <input type="search" value="{{ $search }}" name="search"> --}}
                <input type="date" name="date">
                <button>Tìm</button>
            </form>


            <div class="table-responsive">
                <form action="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tổng lương cơ bản </th>
                                <th>{{ $salary }}</th>
                            </tr>
                            <tr>
                                <th>Tổng lương thực nhận</th>
                                <th>{{ $idEmp }}</th>
                            </tr>
                            <tr>
                                <th>Tổng tiền phạt </th>
                                <th>{{ $phat }}</th>
                            </tr>
                        </thead>
                    </table>
                </form>

            </div>

        </div>

    </div>

@endsection
