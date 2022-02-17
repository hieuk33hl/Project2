@extends('dashboard')
{{-- @section('title', 'Chi tiết') --}}

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
                    <th>{{ $legal->id_legal }}</th>
                    <tr>
                        <th>Tên nhân viên</th>
                        <td>{{ $legal->name_empployee }}</td>
                    </tr>
                    <tr>
                        <th>Lý do nghỉ</th>
                        <td>{{ $legal->reason }}</td>
                    </tr>
                    <tr>
                        <th>Ngày bắt đầu</th>
                        <td>{{ $legal->strat_time_off }}</td>
                    </tr>
                    <tr>
                        <th>Ngày kết thúc</th>
                        <td>{{ $legal->end_time_off }}</td>
                    </tr>
                    <tr>
                        <th>Ghi chú</th>
                        <td>{{ $legal->note }}</td>
                    </tr>
                    <tr>
                        <th>Tình trạng</th>
                        <td>{{ $legal->NameApprove }}</td>
                    </tr>
                    {{-- @if ($legal->NameApprove == 1)
                        <tr>
                            <td>
                                <a class="btn btn-xs btn-success" href="{{ route('legalOff.haha', $legal->id_legal) }}">
                                    <i class="material-icons">check</i> duyệt
                                </a>
                                <a class="btn btn-xs btn-danger" href="{{ route('legalOff.hihi', $legal->id_legal) }}">
                                    <i class="material-icons">close</i> từ chối
                                    <a>
                            </td>
                    @endif --}}
                    {{-- @if ($legal->NameApprove == 'Duyệt' || $legal->NameApprove == 'Từ chối')
                        <tr></tr>
                    @else --}}
                    <tr>
                        <td>
                            <a class="btn btn-xs btn-success" href="{{ route('legalOff.haha', $legal->id_legal) }}">
                                <i class="material-icons">check</i> duyệt
                            </a>
                            <a class="btn btn-xs btn-danger" href="{{ route('legalOff.hihi', $legal->id_legal) }}">
                                <i class="material-icons">close</i> từ chối
                                <a>
                        </td>
                    </tr>
                    {{-- @endif --}}
                    {{-- <tr>
                        <td>
                            <a class="btn btn-sm btn-danger" href="{{ route('legalOff.hide', $legal->id_legal) }}">
                                <i class="fa fa-times"></i>
                                Ẩn
                            </a>
                        </td>
                    </tr> --}}

                </table>
            </div>
        </div>
    </div>
@endsection
