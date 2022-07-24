@extends('template.admin.master')
@section('main-content')
    <style>
        .update-time {
            text-align: center;
            width: 600px;
            margin: auto;
            padding-left: 200px;
        }

    </style>
    @if (Session::has('failed'))
        <div class="alet alert-danger" style="padding-left: 689px">
            {{ Session::get('failed') }}
        </div>
    @endif

    <body>
        <div class="update-time">
            <h4>UPDATE</h4>
            <form action="{{ route('time.update', $times['id']) }}" method="post">
                @csrf
                <label class="form-label" for="name">Name</label>
                <input type="text" name="time" id="time" class="form-control form-control-lg"
                    value="{{ null !== old('name') ? old('name') : $times->name }}" />
                <p class="help is-danger" style="color:red">{{ $errors->first('time') }}</p>
                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection
