@extends('template.home.master')

@section('content')
<link rel="stylesheet" href="home/chitiet.css">
<link rel="stylesheet" href="home/home-page.css">
<div class="row ml-5" id="mtr">
    <div >BOOKING ROOM</div>
</div>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2><a href="{{ route('home.index') }}"><i class="fas fa-long-arrow-alt-left"></i></a> {{ $room_list->name }}</h2>
                    <div>
                        <img src="/home/img/Screenshot_1.png" alt="" style="width: 100%">
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-md-7" >
                                <div class="col-md-2"></div>
                                <div class="col-md-10" type="text-align:center">
                                    <h5>Create booking</h5>
                                    @if (Session::has('fail'))
                                        <div class="alet alert-danger">
                                            {{ Session::get('fail') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('home.book', $room_list->id) }}" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" name="date" id="date" class="form-control" readonly value="{{ $date }}">
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Time start</label>
                                            <select name="time_start" id="time_start" class="form-control">
                                                <option value="" selected hidden>Time start</option>
                                                @foreach ($times as $time)
                                                    <option {{ Carbon\Carbon::parse($time->time)->format('H:i') == old('time_start') ? 'selected' : '' }} value="{{ Carbon\Carbon::parse($time->time)->format('H:i') }}">{{ Carbon\Carbon::parse($time->time)->format('H:i') }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('time_start') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Time end</label>
                                            <select name="time_end" id="time_end" class="form-control">
                                                <option value="" selected hidden>Time end</option>
                                                @foreach ($times as $time)
                                                    <option {{ Carbon\Carbon::parse($time->time)->format('H:i') == old('time_end') ? 'selected' : '' }} value="{{ Carbon\Carbon::parse($time->time)->format('H:i') }}">{{ Carbon\Carbon::parse($time->time)->format('H:i') }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('time_end') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Nội dung cuộc họp" value="{{ old('title') }}">
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Amount of people</label>
                                            <input type="text" name="amount_of_people" class="form-control" placeholder="Số người tham gia" value="{{ old('amount_of_people') }}">
                                            <span class="text-danger">{{ $errors->first('amount_of_people') }}</span>
                                        </div>
                                        <input type="hidden" name="room_list_id" value="{{ $room_list->id }}">
                                        <button type="submit" class="btn btn-primary btn-block">Booking</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body col-md-5"  type="text-align:center">
                                <div class="gio">
                                    @foreach ($rooms as $room)
                                            <div class="giocon">{{ Carbon\Carbon::parse($room->time_start)->format('H:i') }} - {{ Carbon\Carbon::parse($room->time_end)->format('H:i') }} - <i class="fas fa-user"></i> {{ $room->amount_of_people }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>
                <div class="col-md-3"></div>
            </div>
            {{-- <div class="row">
                <div class="booking-form">
                    <div class="form-header">
                        <h1>{{ $room_list->name }}</h1>
                    </div>
                    @if (Session::has('fail'))
                        <div class="alet alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    <form action="{{ route('home.book', $room_list->id) }}" method="POST" autocomplete="off">
                        @csrf
                        
                        <!-- <h4 style="color:white;">Create booking</h4> -->
                        <div class="form-group">
                            <!-- <label for="title" style="color: white;">Title</label> -->
                            <input class="form-control" type="text" name="title" placeholder="Rent a room to...">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="date" class="form-control" type="date" min="2022-04-12">
                                    <span class="form-label">date</span>
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="date" required>
                                    <span class="form-label">Check out</span>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="amount_of_people" class="form-control" >
                                        <option value="0" selected hidden>emtpy people</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>>8</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                    <span class="form-label">Amount of people</span>
                                    <span class="text-danger">{{ $errors->first('amount_of_people') }}</span>
                                </div>
                                
                            </div>
                            <input type="hidden" name="room_list_id" value="{{ $room_list->id }}">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select  name="time_start" class="form-control" >
                                        <option value="0" selected hidden>start</option>
                                        @foreach ($times as $time)
                                            <option value="{{ date('h:i', strtotime($time->time)) }}">{{ date('h:i', strtotime($time->time)) }}</option>
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                    <span class="form-label">Start</span>
                                    <span class="text-danger">{{ $errors->first('time_start') }}</span>
                                </div>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="time_end" class="form-control" >
                                        <option value="0" selected hidden>End</option>
                                        @foreach ($times as $time)
                                            <option value="{{ date('h:i', strtotime($time->time)) }}">{{ date('h:i', strtotime($time->time)) }}</option>
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                    <span class="form-label">End</span>
                                    <span class="text-danger">{{ $errors->first('time_end') }}</span>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="form-btn">
                            <button type="submit" class="submit-btn">Book Now</button>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script>
    $('.form-control').each(function () {
        floatedLabel($(this));
    });

    $('.form-control').on('input', function () {
        floatedLabel($(this));
    });

    function floatedLabel(input) {
        var $field = input.closest('.form-group');
        if (input.val()) {
            $field.addClass('input-not-empty');
        } else {
            $field.removeClass('input-not-empty');
        }
    }
</script>
@endsection