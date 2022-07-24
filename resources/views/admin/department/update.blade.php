@extends('template.admin.master')
@section('main-content')
    <style>
        .update-department {
            text-align: center;
            width: 600px;
            margin: auto;
        }

    </style>
    @if (Session::has('failed'))
        <div class="alet alert-danger" style="padding-left: 689px">
            {{ Session::get('failed') }}
        </div>
    @endif

    <body>
        <div class="update-department">
            <h4>UPDATE</h4>
            <form action="{{ route('department.update', $departments['id']) }}" method="post">
                @csrf
                <label class="form-label" for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-lg"
                    value="{{ null !== old('name') ? old('name') : $departments->name }}" />
                <p class="help is-danger" style="color:red">{{ $errors->first('name') }}</p>
                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection
