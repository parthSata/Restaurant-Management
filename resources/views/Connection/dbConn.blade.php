<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <?php
        if (DB::connection()->getPdo()) {
            $databaseName = DB::connection()->getDatabaseName();
            echo 'Successfully Connected to DB and DB Name is ' . $databaseName;
        }
        
        ?>
    </div>
</body>

</html>
