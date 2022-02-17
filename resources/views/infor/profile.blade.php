@extends('user.layout.app')

@section('title', 'Trang chủ')

@section('user')
    <div class="col-md-8">
        <div class="card">
            @if (Session::exists('success'))
                <div class="text-center">
                    {{ Session::get('success') }}</div>
            @endif
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">perm_identity</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Edit Profile -
                    <small class="category">Complete your profile</small>
                </h4>
                <form action="{{ route('editPro', $emp->id_employee) }}" method="post">

                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group label-floating">
                                <label class="control-label">Tên </label>
                                <input type="text" class="form-control" value="{{ $emp->name_empployee }}"
                                    name="nameEmp">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Ngày sinh</label>
                                <input type="text" class="form-control" value="{{ $emp->dateOfBirth }}" name="birpdate">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Email address</label>
                                <input type="email" class="form-control" value="{{ $emp->email }}" name="emailEmp">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Gioi tinh</label>
                                <input type="hidden" class="form-control" value="{{ $emp->gender }}" name="gt">
                                <input type="text" class="form-control" value="{{ $emp->NameGender }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">So dien poai</label>
                                <input type="text" class="form-control" value="{{ $emp->phoneNumber }}" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Adress</label>
                                <input type="text" class="form-control" value="{{ $emp->address }}" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Level</label>
                                <input type="hidden" class="form-control" value="{{ $emp->level }}" name="level">
                                <input type="text" class="form-control" value="{{ $emp->name_level }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Phong ban</label>
                                <input type="hidden" class="form-control" value="{{ $emp->id_department }}"
                                    name="depart">
                                <input type="text" class="form-control" value="{{ $emp->name_department }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Chuw vu</label>
                                <input type="hidden" class="form-control" value="{{ $emp->id_jobTitle }}" name="job">
                                <input type="text" class="form-control" value="{{ $emp->name_jobTitle }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>About Me</label>
                                <div class="form-group label-floating">
                                    <label class="control-label"> Lamborghini Mercy, Your chick she so pirsty, I'm in pat
                                        two seat Lambo.</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rose pull-right">Update Profile
                    </button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-profile">

            <div class="card-content">

                <p>{{ $emp->name_jobTitle }} &nbsp; {{ $emp->name_empployee }}</p>

                <p>{{ $emp->dateOfBirp }}</p>
                <p>{{ $emp->NameGender }}</p>
                <p>{{ $emp->address }}</p>
                <p>{{ $emp->phoneNumber }}</p>
                <p>{{ $emp->email }}</p>
                <p> {{ $emp->name_department }}</p>


            </div>
            <div class="text-center">
                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

            </div>
        </div>
    </div>


@endsection
