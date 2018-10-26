<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test form</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="{{ url('handle-form') }}" method="POST" role="form">
        <legend>Test submit form</legend>
        {{ csrf_field()}}
        <div class="form-group">
            <label for="">label</label>
            <input type="text" name="name" class="form-control" id="" placeholder="Input field">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
