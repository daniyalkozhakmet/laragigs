<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('build/assets/app-bbd6a014.css')}}">
    <title>Document</title>
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <nav class=" navbar navbar-light bg-light shadow-sm p-3 mb-5 bg-white rounded">
        <x-container class="d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="/">Laragig</a>
            <div>
                @auth
                <div class="d-flex align-items-center gap-3">
                    <p class="navbar-brand text-primary m-0 cursor-pointer">{{auth()->user()->email}}</p>
                    <a href="/create" class="text-decoration-none">Create gig</a>
                    <a href="/gigs" class="btn btn-outline-primary">Gigs</a>
                    <a href="/gigs/mine" class="btn btn-outline-primary">My gigs</a>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="btn btn-outline-primary" type="submit">Logout</button>
                    </form>
                </div>

                @else
                <a href="/register" class="btn btn-outline-primary">Register</a>
                <a href="/login" class="btn btn-outline-primary">Login</a>
                @endif
            </div>
        </x-container>
    </nav>
    <main>
        {{$slot}}
    </main>
</body>

</html>