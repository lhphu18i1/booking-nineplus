@extends('template.home.master')

@section('content')
<div class="row ml-5" id="mtr">
    <div>LIST BOOKING</div>
</div>
<br />
<div>
  <div class="row">
    <form action="{{ route('list.booking') }}" method="get">
      <div class="input-group" style="margin-left: 20px;">
          <input type="date" name="date" class="form-control form-control-lg" placeholder="...">
          <div class="input-group-append">
              <button type="submit" name="submit" class="btn btn-primary">Search</button>
          </div>
      </div>
    </form>
  </div>
  <hr>
  <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Time start</th>
                  <th>Time end</th>
                  <th>Amount of people</th>
                  <th>user id</th>
                  <th>room list id</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rooms as $room)
                  <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->title }}</td>
                    <td>{{ $room->date }}</td>
                    <td><span class="tag tag-success">{{ Carbon\Carbon::parse($room->time_start)->format('H:i') }}</span></td>
                    <td>{{ Carbon\Carbon::parse($room->time_end)->format('H:i') }} </td>
                    <td>{{ $room->amount_of_people }} </td>
                    <td>{{ $room->user_id }} </td>
                    <td>{{ $room->room_list_id }} </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="text-center">
              {{ $rooms->appends(request()->all())->links() }}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
</div>
@endsection