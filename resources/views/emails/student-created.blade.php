<!DOCTYPE html>
<html>

    <head>
        {{-- <title>{{ $data['subject'] }}</title> --}}
    </head>

    <body>
        {{-- <h1>{{ $data['title'] }}</h1>
        <p>{{ $data['message'] }}</p> --}}

        <div>
            Email: {{ $email }}
        </div>

        <p>Thank you,<br>
            {{ config('app.name') }}</p>

    </body>

</html>
