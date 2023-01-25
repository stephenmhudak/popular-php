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
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Repository</th>
                    <th>Description</th>
                    <th>Creation Date</th>
                    <th>Last Push</th>
                    <th>Total Stars</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($repositories as $repository)
                    <tr>
                        <td class="w-1/5">
                            <p>
                                <a href="{{ $repository->url }}" target="_blank">{{ $repository->name }}</a>
                            </p>
                            <p>ID: {{ $repository->repo_id }}</p>
                            <p>Owner: {{ $repository->owner }}</p>
                        </td>
                        <td class="w-2/4">{{ $repository->description }}</td>
                        <td class="w-[10%]">{{ $repository->repo_create }}</td>
                        <td class="w-[10%]">{{ $repository->last_push }}</td>
                        <td class="w-[10%]">{{ $repository->stars }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>