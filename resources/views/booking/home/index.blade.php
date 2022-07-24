@extends('template.home.master')

@section('content')
<div class="row ml-5" id="mtr">
  <div >ROOM LIST</div>
</div>
  <div class="card">
    <div class="card-header"></div>
    <div class="card-body">
      <form action="" method="get" id="form">
        <div class="row">
          <div class="col-sm-2">
          </div>
          <div class="col-sm-4">
            <!-- select -->
            <div class="form-group">
              <label>Date</label>
              <input type="date" name="date" id="date" class="form-control" value="{{ $selectDate }}">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Tìm kiếm</label>
              <input type="submit" name="submit" id="search" class="form-control search" value="Search">
            </div>
          </div>
          <div class="col-sm-4">
          </div>
        </div>
      </form>
    </div>
  </div>
  {{-- <div class="row mt-5"></div> --}}
  @foreach ($room_lists as $room_list)
    @php
      $slug = Str::slug($room_list->name);
      $url_book = route('home.book', ['id' => $room_list->id, 'date' => $selectDate]);
    @endphp
    <div class="row ml-2 mt-3 room">
      <div class="col-sm-2"></div>
      <div class="col-sm-8 mt-3">
        <div class="row">
          <div class="col-sm-6">
            <div class="tr mb-2">
              <a href="{{ $url_book }}" style="text-decoration: none">
                <h5>{{ $room_list->name }}</h5>
              </a>
            </div>
            <a href="{{ $url_book }}"><img src="/home/img/Screenshot_1.png" alt="" style="width: 100%"></a>
          </div>
          <div class="col-sm-4 gio1" id="listTime">
            @foreach ($room_list->room as $room)
                @if($room['date'] == $selectDate)
                  <div class="giocon">{{ Carbon\Carbon::parse($room->time_start)->format('H:i') }} - {{ Carbon\Carbon::parse($room->time_end)->format('H:i') }} - <i class="fas fa-user"></i> {{ $room->amount_of_people }}</div>
                @endif
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-sm-2"></div>
    </div>
  @endforeach
@endsection
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('#date').on('keyup', function(){
    alert('hello');
  })
  // $(document).ready(function () {
  //   $(document).on('keyup', '#date', function () {
  //     // var date = $(this).val();
  //     // var time_start = $(this).val();
  //     // var time_end = $(this).val();
  //     console.log('date');
  //     $.ajax({
  //       type: "get",
  //       url: "/search",
  //       data: {
  //         date:date,
  //         // time_start:time_start,
  //         // time_end:time_end,
  //       },
  //       dataType: "json",
  //       success: function (response) {
  //         $('#listTime').html(response);
  //       }
  //     });
  //   });
  // });
</script>