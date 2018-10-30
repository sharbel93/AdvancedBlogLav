@extends('layouts.manage')
@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Users</h1>
            </div>
            <div class="column">
                <a href="{{route('users.create')}}" class="button is-primary is-pulled-right">
                   <i class="fa fa-user-add m-r-10"></i> Create New User
                </a>
            </div>
        </div>
        <hr>
        <div class="columns m-t-10 is-centered">
            <div class="card">
                <div class="card-content">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th>{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->toFormattedDateString()}}</td>
                                <td class="has-text-right"><a href="{{route('users.show', $user->id)}}" class="button
                                is-outlined
                                m-r-5">View</a>
                                    <a href="{{route('users.edit', $user->id)}}" class="button ">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       {{$users->links()}}
    </div>
@endsection