
    @extends('layouts.manage')
    @section('content')
        <div class="flex-container">
            <div class="columns m-t-10">
                <div class="column">
                    <h1 class="title">Create New Users</h1>
                </div>
                {{--<div class="column">--}}
                {{--<a href="{{route('users.create')}}" class="button is-primary is-pulled-right"><i class="fa--}}
                {{--fa-user-add"></i></a>--}}
                {{--</div>--}}
            </div>
            <hr class="m-t-0">

            <div class="columns">
                <div class="column">
                    <form action="{{route('users.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label for="name" class="label">Name :</label>
                                    <p class="control">
                                        <input type="text" class="input" name="name" id="name">
                                    </p>
                                </div>
                                <div class="field">
                                    <label for="email" class="label">Email :</label>
                                    <p class="control">
                                        <input type="text" class="input" name="email" id="email">
                                    </p>
                                </div>
                                <div class="field">
                                    <label for="password" class="label">Password :</label>
                                    <p class="control">
                                        <input type="text" class="input" name="password" id="password"
                                               v-if="!auto_password" placeholder="Manually give a  password to this user">
                                        <b-checkbox  name="auto_generate" class="m-t-15" v-model="auto_password"
                                        >Auto Generate
                                            Password</b-checkbox>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <button class="button is-success">Create User</button>
                    </form>
                </div>
            </div>
        </div>
            @endsection
@section('scripts')
<script>
    var app = new Vue({
        el: '#app',
        data: {
            auto_password: true
        }
    });
</script>

@endsection
