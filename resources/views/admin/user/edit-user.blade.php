@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit User</h3></div>
                    <div class="card-body">
                        <form action="{{route('update.user')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="userName" value="{{$user->name}}" type="text" name="name" placeholder="Enter user name" readonly/>
                                <label for="userName">User Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="userEmail" value="{{$user->email}}" name="email" type="email" placeholder="Enter user email" readonly />
                                <label for="userEmail">User Email</label>
                            </div>
                            @if(Auth::user()->id == $user->id)
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" name="password" type="password" placeholder="Enter brand name" />
                                <label for="password">Password</label>
                            </div>
                            @endif
                            <div class="mt-4 mb-0">
                                <input class="btn btn-primary" name="submit" type="submit"/>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
