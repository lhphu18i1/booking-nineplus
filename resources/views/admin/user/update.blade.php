@extends('template.admin.master')
@section('main-content')
    <style>
        .update-user {
            width: 600px;
            margin: auto;
            text-align: center;
            padding-left: 200px;
        }

    </style>
    @if (Session::has('failed'))
        <div class="alet alert-danger" style="padding-left: 689px">
            {{ Session::get('failed') }}
        </div>
    @endif

    <body>
        <div class="update-user">
            <h4>UPDATE</h4>
            <form action="{{ route('user.update', $users['id']) }}" method="post">
                @csrf
                <label class="form-label" for="name">Name</label>
                <input type="text" id="name" class="form-control form-control-lg" name="name"
                    value="{{ null !== old('name') ? old('name') : $users->name }}" />
                <p class="help is-danger" style="color:red">{{ $errors->first('name') }}</p>

                <label class="form-label" for="lastName">Email</label>
                <input type="email" id="emailAddress" class="form-control form-control-lg" name="email"
                    value="{{ null !== old('email') ? old('email') : $users->email }}" />
                <p class="help is-danger" style="color:red">{{ $errors->first('email') }}</p>

                <label class="form-label" for="name">Password</label>
                <input type="password" id="password" class="form-control form-control-lg" name="password" />
                <p class="help is-danger" style="color:red">{{ $errors->first('password') }}</p>


                <br>
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
                <br>

                <label class="form-label" for="phoneNumber">Phone Number</label>
                <input type="tel" id="phoneNumber" class="form-control form-control-lg" name="phone"
                    value="{{ null !== old('phone') ? old('phone') : $users->phone }}" />
                <p class="help is-danger" style="color:red">{{ $errors->first('phone') }}</p>

                <label class="form-label" for="position">Position</label>
                <div>
                    <select class="form-control selectpicker" name="position">
                        <option value="{{ $users->position }}">{{ $users->position }}</option>
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
                        <option value="{{ $users->department }}">{{ $users->department }}</option>
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
