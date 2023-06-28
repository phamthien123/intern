<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Intern</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body>

    <x-app-layout>
        <div class="header">
            <h1 class="text">A joke a day keeps the doctor away</h1>
            <span class="text_p">
                <p>if you joke wrong way,your teeth have to pay. (Serious)</p>
            </span>
        </div>
        @if (session('alert'))
        <div class="alert alert-waring" style="text-align: center;margin-top:20px">
            {{ session('alert') }}
        </div>
        @endif
        <form action="{{url('next')}}" method="post">
            @csrf
            <div class="content">
                @foreach($jokes as $jokeDs)
                <p>{{$jokeDs->content}}</p>
            </div>
            <input type="hidden" name="joke" id="" value="{{$jokeDs->id}}">
            <input type="submit" class="btn btn-primary Fun" name="Fun" value="Funny!"></input>
            <input type="submit" class="btn btn-success notFun" name="NotFun" value="Not Funny!"></input>
            @endforeach
        </form>
    </x-app-layout>
    <footer>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis architecto dignissimos odit ipsa exercitationem
            error itaque asperiores ullam ex expedita.Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Blanditiis architecto dignissimos odit ipsa exercitationem error itaque asperiores ullam ex expedita.</p>
        <p class="fp">CopyRight 2023 HL5</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>