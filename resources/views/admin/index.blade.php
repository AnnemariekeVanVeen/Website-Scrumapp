{{-- Admin Panel --}}

@extends('layouts.app')

@include('includes._error')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Users</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Order</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Admin</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- Create a counter --}}
                    @php
                        $i = 1;
                    @endphp
                    {{-- Load in all the users --}}
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- Change the value if the user is an admin --}}
                            <td>@php echo($user->is_admin ? 'Yes' :'No'); @endphp</td>
                            <td>
                                {{-- Check if the user is the same as the logged in user--}}
                                @if($user == auth()->user())
                                    <button class="prim-btn" title="You can't downgrade yourself" disabled>
                                        Downgrade
                                    </button>
                                @else
                                    <form method="post" action="{{ route('user.update', ['user' => $user]) }}">
                                        @csrf
                                        {{-- Change the method to PUT --}}
                                        @method('PUT')
                                        <input type="hidden" name="name" value="{{ $user->name }}">
                                        <input type="hidden" name="email" value="{{ $user->email }}">
                                        <input type="hidden" name="password">
                                        {{-- Change the value if the user is an admin --}}
                                        <input type="hidden" name="is_admin"
                                               value="@php echo($user->is_admin ? '0' : '1'); @endphp">
                                        {{-- Change the value if the user is an admin --}}
                                        <input type="submit" class="prim-btn"
                                               value="@php echo($user->is_admin ? 'Downgrade' : 'Upgrade'); @endphp">
                                    </form>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('user.destroy', ['user' => $user]) }}" method="post"
                                      class="form-group">
                                    @csrf
                                    {{-- Change the method to DELETE --}}
                                    @method('DELETE')
                                    <input class="danger-btn" type="submit" value="Delete"
                                           onclick="return confirm ('Are you sure you want to delete this account?')">
                                </form>
                            </td>
                        </tr>
                        {{-- Counter + 1 --}}
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
