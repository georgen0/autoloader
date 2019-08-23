<!DOCTYPE html>
<html>

<head>
    <title>
        Autoloader
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php include SITE_ROOT . "./Templates/layouts/partials/header.tpl.php"; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4" style="background-color:lavender;"><?php echo $sidebar; ?></div>
        <div class="col-sm-8" style="background-color:lavenderblush;"><?php echo $content; ?></div>
    </div>
</div>
</body>
</html>