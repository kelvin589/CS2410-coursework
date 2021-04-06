<!DOCTYPE html>
<html>
    <head>
        <title>User {{ $user->id }}</title>
    </head>

    <body>
        <h1>Username: {{ $user->name }}</h1>
        <h1>Email: {{ $user->email }}</h1>
        <h1>Created at: {{ $user->created_at }} </h1>
    </body>
</html>