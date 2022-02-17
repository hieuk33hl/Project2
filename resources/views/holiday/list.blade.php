@extends('dashboard')
@section('huyen')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content">
            <h3 class="card-title">Thông tin ngày nghỉ lễ</h3>
            <div class="table-responsive">
                <button><a href="{{ route('holiday.create') }}">Thêm ngay nghỉ</a></button>
                <table class="table">
                    <tr>
                        <th>Tên</th>
                        <th>Ngày</th>
                        <th></th>
                    </tr>
                    @foreach ($listHoliday as $holi)
                        <tr>
                            <td>{{ $holi->name_holiday }}</td>
                            <td>{{ $holi->date_holiday }}</td>
                            {{-- <td><a class="btn btn-sm btn-warning" href="{{ route('holiday.edit', $holi->id_holiday) }}">
                                    <i class="fa fa-edit"></i>
                                    Xoá
                                </a></td> --}}
                            <td>
                                <form action="{{ route('holiday.destroy', $holi->id_holiday) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="myFunction()">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
<script>
    function myFunction() {
        alert("Xoá thành công!!!");
    }
</script>
