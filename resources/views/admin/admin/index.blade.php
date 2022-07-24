@extends('template.admin.master')
@section('main-content')
@if (Session::has('message'))
<div class="alet alert-danger">
    {{ Session::get('message') }}
</div>
@endif
    <div class="content-container">
        <div class="row ml-5" id="mtr">
            <div>Admin</div>
        </div>
        <table class="table ml-5 mt-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <th scope="row">{{ $admin['id'] }}</th>
                        <td>{{ $admin['name'] }}</td>
                        <td>{{ $admin['email'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
