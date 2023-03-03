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
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <a class="btn text-white bg-danger" style="margin-right:10px;" href="dashboard">Home Page</a>
                <h4 style="margin-top:20px;">Genres Page</h4>
                <!-- Print all genres -->
            @foreach ($genres as $gen)
                <div class="card my-3" style="width: 15rem; display:inline-block;">
                    <a href="{{url('song/'.$gen->id)}}" class="btn btn-success">
                        <div class="card-body" style="width: 15rem;">  
                            <h5 class="card-title text-center fw-bold">{{$gen->genre_name}}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <footer class="footer text-white-50 text-center mt-auto py-2 bg-dark fixed-bottom">&copy; Gianni Ridwan</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>