<x-layout>
    <x-container>
        <h1>Login</h1>
        <form class="my-3" action="/login" method="POST">
            @csrf
            <div class="form-group my-2">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                @error('email')
                <p class="form-text  text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                @error('password')
                <p class="form-text  text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <p>Already have an account? <a href="/login" class="text-primary text-decoration-none">Register</a></p>
            <button type="submit" class="btn btn-primary my-2">Login</button>
        </form>
    </x-container>

</x-layout>