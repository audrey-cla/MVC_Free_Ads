<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method='POST' action='/update/{{$user->id}}/done'>
        @csrf
        <label for='name'>name:</label><input type='name' name='name' id='' value='{{$user->name}}'>
        <label for='email'>Email:</label><input type='email' name='email' id='' value='{{$user->email}}'>
        <label for='password'>password:</label><input type='password' name='password' id='' value=''>
        <button type="submit">Changer</button>
    </form>
</body>

</html>