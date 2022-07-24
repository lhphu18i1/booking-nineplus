@extends('template.admin.master')
@section('main-content')

    <body>
        <div class="formAdd">
            <h3>ADD TIME</h3>
            <form action="{{ route('time.add') }}" method="post">
                @csrf
                <label class="form-label" for="name">Time</label>
                <input type="text" name="time" id="time" class="form-control form-control-lg" />
                <p class="help is-danger" style="color:red">{{ $errors->first('time') }}</p>
                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection

</html>
