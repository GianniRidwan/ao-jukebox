<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jukebox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<main class="flex-shrink-0">
<div id="container">
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 justify-content-center">
	<span class="w-100 py-1 navbar-text font-weight-bold text-center text-white text-capitalize">
        Welcome {{$data->name}}! &nbsp;&nbsp;
        <a class="btn text-white bg-danger" style="margin-right:10px;" href="logout">Logout</a>
    </span>
</nav>