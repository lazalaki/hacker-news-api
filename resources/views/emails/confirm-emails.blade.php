@component('mail::message')
Hello {{ $name }}. Please click on the link below to confirm your email

@component('mail::button', ['url' => $link])
    Clicke Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Dobrodosao {{$name}}</h1>
        <h2>Da bi se aktivirali pritisnite na link ispod</h2>
        <a href="{{ url($link) }}">Click Here!</a>
    </div>
</body>
</html> --}}
