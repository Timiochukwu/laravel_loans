@extends('admin.dashboard')


@section('content')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 16px;
        background-color: #ccc;
        border-radius: 17px;
        /* Make the slider rounded */
        transition: 0.4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        border-radius: 50%;
        /* Make the circle round */
        transition: 0.4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }
</style>

<div class="p-6 mx-auto max-w-xl">
    <div class="bg-white shadow-nd rounded-1g p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <img src="{{asset($user->image)}}" alt="User Profile" class="w-16 h-16 rounded-full">
                <div>
                    <h2 class="text-2x1 font-semibold">{{$user->name}}</h2>
                    <p class="text-gray-500">{{$user->role}}</p>
                </div>
            </div>
            <div>
                <b>Change Status</b>
                <form action="{{route('toggle.user.status', $user->id )}}" method="POST">
                                @csrf
                                <label class="switch">
                                    <input type="checkbox"  onchange="this.form.submit()" name="status" {{($user->status
                                    === 'active') ? 'checked' : ''
                                    }} >
                                    <span class="slider"></span>
                                </label>
                            </form>
            </div>
        </div>

        <hr class=" my-4 border-tborder-gray-300">
        <div>
            <h3 class="text-xl font-semibold ab-2"><u>User Details</u> </h3>
            <br>
            <h4 class="text-xl font-semibold ab-2">Email : {{$user['email']}}</h4>
            <h1 class="text-xl font-semibold ab-2">Phone Number : {{$user['phone']}} </h1>
            <h1 class="text-xl font-semibold ab-2">User Status : {{$user->status}} </h1>
            
        </div>

    </div>
</div>

@endsection