<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>1000 Most Popular PHP Repositories on GitHub</title>
    @vite(['resources/css/app.css'])
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body>
    <div class="container">
        <h1>Popular PHP Repositories on GitHub</h1>
        <a class="btn btn-blue" href="{{ route('update') }}">Update Repo List</a>
    </div>
</body>
</html>