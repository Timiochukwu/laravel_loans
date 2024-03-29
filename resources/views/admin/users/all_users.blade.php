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



<div class="p-6">
    <div class="bg-white shadow-nd rounded-lg p-4">
        <h2 class="text-2x1 font-semibold mb-4">User Management </h2>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4">Serial Number</th>
                        <th class="py-2 px-4">Name</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">User Type</th>
                        <th class="py-2 px-4">Make Admin</th>
                        <th class="py-2 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $key => $userValue)

                    <tr>
                        <td class="py-2 px-4">{{$key + 1}}</td>
                        <td class="py-2 px-4">{{$userValue['name']}}</td>
                        <td class="py-2 px-4">{{$userValue['email']}}</td>
                        <td class="py-2 px-4">{{$userValue->role}}</td>
                        <td class="py-2 px-4">
                            <form action="{{route('toggle.user.role', $userValue->id )}}" method="POST">
                                @csrf
                                <label class="switch">
                                    <input type="checkbox"  onchange="this.form.submit()" name="role" {{($userValue->role
                                    === 'admin') ? 'checked' : ''
                                    }} >
                                    <span class="slider"></span>
                                </label>
                            </form>
                        </td>
                        <td class="py-2 px-4">
                            <a href="{{route('user.details', $userValue->id)}}"
                                class="bg-blue-500 text-white py-1 px-3 rounded-nd hover:bg-blue-600 transition duration-200">
                                View Details
                            </a>

                            <button type="submit" onclick="confirmDelete({{$userValue->id}})"
                                class="bg-red-500 text-white py-1 px-3 rounded-nd hover:bg-red-600 transition duration-200 ">
                                Delete
                            </button>
                            <form action="{{route('admin.delete.users', $userValue->id)}}"
                                id="delete-form{{$userValue->id}}">
                                @csrf
                                @method('DELETE')

                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection