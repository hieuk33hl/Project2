@extends('dashboard')
@section('title', 'Đơn xin nghỉ')

@section('huyen')
    {{-- <h1>Thông tin các đơn nghỉ</h1> --}}
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content">
            <h3 class="card-title">Thông tin các đơn nghỉ</h3>
            <div class="table-responsive">
                <table class="table">
                    <th>Mã đơn</th>
                    <th>Tên nhân viên</th>
                    <th>Tình trạng</th>
                    <th></th>
                    <th></th>
                    <tbody>
                        @foreach ($listLegal as $legal)
                            <tr>
                                <td>{{ $legal->id_legal }}</td>
                                <td>{{ $legal->name_empployee }}</td>
                                <td>{{ $legal->NameApprove }}</td>
                                {{-- <td>{{ $legal->reason }}</td> --}}
                                {{-- <td>{{ $legal->strat_time_off }}</td> --}}
                                {{-- <td>{{ $legal->end_time_off }}</td> --}}
                                {{-- <td>{{ $legal->note }}</td> --}}

                                {{-- <td>
                                    <a class="btn btn-xs btn-success"
                                        href="{{ route('legalOff.haha', $legal->id_legal) }}">
                                        <i class="material-icons">check</i> duyệt
                                    </a>
                                    <a class="btn btn-xs btn-danger"
                                        href="{{ route('legalOff.hihi', $legal->id_legal) }}">
                                        <i class="material-icons">close</i> từ chối
                                        <a>
                                </td> --}}
                                <td>
                                <td><a class="btn btn-sm btn-warning"
                                        href="{{ route('legalOff.show', $legal->id_legal) }}"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                {{-- <a class="btn btn-sm btn-danger" href="{{ route('legalOff.hide', $legal->id_legal) }}">
                                    <i class="fa fa-times"></i>
                                    Ẩn
                                </a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $listLegal->links('') }}
@endsection
