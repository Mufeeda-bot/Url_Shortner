<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<title>Shorten Link</title>
</head>
<body>
<div class='container mt-5'>
    <h1>Create</h1>
    @if(session('success'))
    <div class='alert alert-success'>{{session('success')}}</div>
    @endif
    <div class='card'>
        <div class='card-header'>
            <form method='post' action="{{route('generate.shorten.link.post')}}">
                @csrf
                <div class='input-group mb-3'>
                    <input type="text" name="link" class="form-control" placeholder="Enter URL">
                    <div class='input-group-append'>
                        <button class='btn btn-success' type="submit">Generate</button>
                    </div>
                </div>
                @error('link')<p class='m-0 p-0 text text-danger'>{{$message}}</p>@enderror
            </form>
        </div>
    </div>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Short Link</th>
                <th>Link</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($shortUrls as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td><a href="{{route('shorten.link',$row->code)}}" target="_blank">{{route('shorten.link',$row->code)}}</a></td>
                <td>{{ $row->link }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('view.link', $row->id) }}" class='btn btn-primary' ></style>View</a>
                        <a href="{{ route('edit.link', $row->id) }}" class="btn btn-warning">Edit</a>
                        <form method="post" action="{{ route('delete.shorten.link', $row->id) }}" onsubmit="return confirm('Are you sure you want to delete this short link?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
