<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <br>
    <div class="col-lg-offset-4 col-lg-4">
        <center><h2>Upload Image</h2></center>
        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
