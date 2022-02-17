@extends('dashboard')
@section('title', 'Phòng ban')

@section('huyen')
    {{-- <h1>Thông tin phòng ban</h1> --}}
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content">
            <h3 class="card-title">Thông tin phòng ban</h3>
            <div class="table-responsive">
                <button><a href="{{ route('department.create') }}">Thêm phòng ban</a></button>
                <form action="">
                    <table class="table">
                        <th>Mã phòng ban</th>
                        <th>Tên phòng ban</th>
                        <th></th>
                        <th></th>
                        <tbody>
                            @foreach ($listPart as $depart)
                                <tr>
                                    <td>{{ $depart->id_department }}</td>
                                    <td>{{ $depart->name_department }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('department.edit', $depart->id_department) }}"><i
                                                class="fa fa-edit"></i> Sửa</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('department.hide', $depart->id_department) }}"><i
                                                class="fa fa-times"></i> Ẩn</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>



@endsection
