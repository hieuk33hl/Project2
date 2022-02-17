@extends('dashboard')
@section('title', 'Bảng chấm công')

@section('huyen')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content">
            <h3 class="card-title">Thông tin chấm công</h3>
            <button><a href="{{ route('check-all') }}">check all</a></button>
            {{-- <button><a href="{{ route('export') }}" method="get">Export</a></button> --}}
            <form action="{{ route('export') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="year" id="" class="selectpicker">
                                <option value="" disabled selected>chọn năm</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->value }}">{{ $year->value }}</option>
                                @endforeach
                            </select>
                            @error('year')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="month[]" id="month" multiple class="selectpicker">
                                <option disabled>chọn tháng</option>
                                <option value="">tất cả các tháng</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            @error('month')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="submit" value="Xuất chấm công">
            </form>
            {{-- <button><a href="{{ route('export') }}" method="get">Export</a></button> --}}
            <div class="table-responsive">
                <table class="table">
                    <th>Mã chấm công</th>
                    <th>Mã nhân viên</th>
                    <th>Tên nhân viên</th>
                    <th>Checkin</th>
                    {{-- <th>Checkout</th> --}}
                    <th>date</th>
                    <th>Phat</th>
                    <tbody>
                        @foreach ($listTime as $time)
                            <tr>
                                <td>{{ $time->id_timekeeping }}</td>
                                <td>{{ $time->id_employee }}</td>
                                <td>{{ $time->name_empployee }}</td>
                                <td>{{ $time->checkin }}</td>
                                {{-- <td>{{ $time->checkout }}</td> --}}
                                <td>{{ $time->date }}</td>
                                <td>{{ $time->phat }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $listTime->links('') }}

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function() {
        $('#month').find('option:disabled').prop('selected', true);
        $('#month').selectpicker('refresh');
    });
</script>
