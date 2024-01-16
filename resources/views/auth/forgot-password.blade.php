<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Forget Password</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 w-full sm:w-96">
        <h1 class="text-2xl font-semibold mb-4">Forget Password</h1>
        <p class="text-gray-700 mb-4">Please enter your email address to recieve a password</p>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            @if($errors->has('email'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @if($errors->has('email'))
                    <li>{{$errors->first('email')}}</li>
                    @endif
                </ul>
            </div>
            @endif

            @if(session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
{{session('status')}}
            </div>
            @endif
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="Email"
                    class="p-2 mt-1 block w-full bg-gray-200 border">
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring">Email
                Password Reset Link</button>
        </form>
        <p class="mt-4 text-gray-600 text-sm text-center"> <a href="{{url('/')}}"
                class="text-blue-500 hover:underline">Back to login</a></p>
    </div>

</body>

</html>