<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.7 Import Export Excel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 5.7 Import Export Excel
        </div>
        <div class="card-body">
            <form action="{{$url}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Data</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
