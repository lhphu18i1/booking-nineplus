@extends('template.admin.master')
@section('main-content')

    <body>
        <div class="formAdd">
            <h3>ADD USER</h3>
            <form action="{{ route('user.add') }}" method="post">
                @csrf
                <label class="form-label" for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Họ và tên" value="{{ old('name') }}"/>
                <p class="help is-danger" style="color:red">{{ $errors->first('name') }}</p>

                <label class="form-label" for="lastName">Email</label>
                <input type="email" name="email" id="emailAddress" class="form-control form-control-lg" placeholder="...@gmail.com" value="{{ old('email') }}"/>
                <p class="help is-danger" style="color:red">{{ $errors->first('email') }}</p>

                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Mật Khẩu"/>
                <p class="help is-danger" style="color:red">{{ $errors->first('password') }}</p>

                <h6 class="mb-2 pb-1">Gender: </h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female" checked />
                    <label class="form-check-label" for="femaleGender">Female</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male" />
                    <label class="form-check-label" for="maleGender">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="otherGender" value="Other" />
                    <label class="form-check-label" for="otherGender">Other</label>
                </div>
                <br>
                <label class="form-label" for="phoneNumber">Phone Number</label>
                <input type="tel" name="phone" id="phoneNumber" class="form-control form-control-lg" placeholder="Số Điện Thoại" value="{{ old('phone') }}"/>
                <p class="help is-danger" style="color:red">{{ $errors->first('phone') }}</p>

                <label class="form-label" for="phoneNumber">Position</label>
                <div>
                    <select class="form-control selectpicker" name="position">
                        <option value="">---Chức vụ---</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position['name'] }}">{{ $position['name'] }}</option>
                        @endforeach
                    </select>
                    <p class="help is-danger" style="color:red">{{ $errors->first('position') }}</p>
                </div>
                <br>
                <label class="form-label" for="phoneNumber">Department</label>
                <div>
                    <select class="form-control selectpicker" name="department">
                        <option value="">---Phòng ban---</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department['name'] }}">{{ $department['name'] }}</option>
                        @endforeach
                    </select>
                    <p class="help is-danger" style="color:red">{{ $errors->first('department') }}</p>
                </div>
                <br>

                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection

</html>
