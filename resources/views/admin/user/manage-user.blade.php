@extends('admin.master')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Manage User
        </div>
        <div class="card-body">
            <table id="datatablesSimple" style="vertical-align: middle">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @php $i=1 @endphp
                @foreach($users as $user)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('edit.user',['id'=>$user->id])}}" class="btn btn-secondary btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
