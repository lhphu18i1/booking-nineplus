@extends('template.admin.master')
@section('main-content')
    <style>
        .update-booking {
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
        <div class="update-booking">
            <h4>UPDATE</h4>
            <form action="{{ route('booking.update', $bookings['id']) }}" method="post">
                @csrf
                <label class="form-label" for="name">Title</label>
                <input type="text" id="title" class="form-control form-control-lg" name="title"
                    value="{{ null !== old('title') ? old('title') : $bookings->title }}" />
                <p class="help is-danger" style="color:red">{{ $errors->first('title') }}</p>

                <label class="form-label" for="lastName">Date</label>
                <input type="text" id="emailAddress" class="form-control form-control-lg" name="date"
                    value="{{ null !== old('date') ? old('date') : $bookings->date }}" />
                <p class="help is-danger" style="color:red">{{ $errors->first('date') }}</p>

                <label class="form-label" for="name">Time start</label>
                <input type="text" id="time_start" class="form-control form-control-lg" name="time_start"
                    value="{{ null !== old('time_start') ? old('time_start') : $bookings->time_start }}" />
                <p class="help is-danger" style="color:red">{{ $errors->first('time_start') }}</p>
                <br>
                <br>

                <label class="form-label" for="phoneNumber">Time end</label>
                <input type="text" id="phoneNumber" class="form-control form-control-lg" name="time_end"
                    value="{{ null !== old('time_end') ? old('time_end') : $bookings->time_end }}" />
                <p class="help is-danger" style="color:red">{{ $errors->first('time_end') }}</p>

                <label class="form-label" for="position">Amount Of People</label>
                <input type="text" id="amount_of_people" class="form-control form-control-lg" name="amount_of_people"
                    value="{{ null !== old('amount_of_people') ? old('amount_of_people') : $bookings->amount_of_people }}" />
                <p class="help is-danger" style="color:red">{{ $errors->first('amount_of_people') }}</p>

                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection
