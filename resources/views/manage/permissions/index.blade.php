@extends('layouts.manage')
@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Permissions</h1>
            </div>
            <div class="column">
                <a href="{{route('permissions.create')}}" class="button is-primary is-pulled-right">
                    <i class="fa fa-user-plus m-r-10"></i>
                    Create New Permission
                </a>
            </div>
        </div>
        <hr class="m-t-0">

        <div class="card">
            <div class="card-content">
                <table class="table is-narrow">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <th>{{$permission->display_name}}</th>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->description}}</td>
                        <td class="has-text-right">
                            <a href="{{route('permissions.show', $permission->id)}}" class="button is-outlined is-small m-r-5">
                                View
                            </a>
                            <a href="{{route('permissions.edit', $permission->id)}}" class="button is-outlined is-small
                            ">
                                Edit
                            </a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop