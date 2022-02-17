@extends('dashboard')
@section('title', 'Nhân viên')

@section('huyen')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content">
            <h3 class="card-title">Thông tin nhân viên</h3>
            <form action="">
                {{-- <input type="search" value="{{ $search }}" name="search"> --}}
                <select name="id-dep">
                    <option value="">=====</option>
                    @foreach ($listDepa as $dep)
                        <option value="{{ $dep->id_department }}" @if ($dep->id_department == $idDep) selected @endif>
                            {{ $dep->name_department }}</option>
                    @endforeach
                </select>
                <button>Tìm</button>
            </form>
            <div class="table-responsive">
                {{-- <h1>Thông tin nhân viên</h1> --}}
                <button><a href="{{ route('employee.insert-excel') }}">Thêm bằng excel</a> <br></button>
                {{-- <a href="">Thêm nhân viên</a> --}}
                <table class="table">
                    <th>Tên nhân viên</th>
                    {{-- <th>Trạng thái</th> --}}
                    <th>Chi tiết</th>
                    <th></th>

                    @foreach ($listEmp as $emp)
                        <tr>
                            <td>{{ $emp->name_empployee }}</td>
                            {{-- <td>{{ $emp->NameStatus }}</td> --}}
                            <td><a class="btn btn-sm btn-warning" href="{{ route('employee.show', $emp->id_employee) }}"><i
                                        class="fa fa-edit"></i></a>
                            </td>
                            {{-- <td><a class="btn btn-sm btn-watch" href="{{ route('salary.detail', $emp->id_employee) }}"><i
                                        class="fa fa-edit">lương</i></a>
                            </td> --}}
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                {{ $listEmp->links('') }}
            </div>
        </div>
    </div>

@endsection
