<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jukebox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="padding-bottom: 70px;">
<main class="flex-shrink-0">
<div id="container">
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 justify-content-center">
	<span class="w-100 py-1 navbar-text font-weight-bold text-center text-white text-capitalize">
        Welcome {{$data->name}}! &nbsp;&nbsp;
        <a class="btn text-white bg-danger" style="margin-right:10px;" href="logout">Logout</a>
    </span>
</nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <a class="btn text-white bg-danger" style="margin-right:10px;" href="genre">Genre Page</a>
                <a class="btn text-white bg-danger" style="margin-right:10px;" href="playlists">Playlist Page</a><br><br><hr>
                <h4>Jukebox</h4>
                    <div>
                        <form action="{{url('save-Playlist')}}" method="post">
                         @csrf
                            <label for="name">Create new playlist with selected songs: </label>
                            <input type="text" id="name" name="name">
                            <input type="submit" class="btn btn-block btn-success"  value="Submit" name="" id="">
                        </form>    
                    </div><br>
         
                @if(!empty($terminalsongs))
                <table class="table">
                    <thead>
                       <th>Name</th>
                       <th>Artist</th>
                       <th>Duration</th>
                       <th></th>
                    </thead>
                    <tbody>
                        <!-- Print all temporary songs -->
                        @foreach ($terminalsongs as $terminal)
                        @foreach ($songs as $song)
                        @if ($terminal == $song['id'])
                    <tr>
                        <td>{{$song['song_name']}}</td>
                        <td>{{$song['artist_name']}}</td>
                        <td>{{$song['duration']}}</td>
                        <td><a href="{{url('delete-Playlist/'.$terminal)}}" class="btn text-white bg-danger">Delete </a></td>
                    </tr>
                        @endif
                        @endforeach
                        @endforeach 
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
</main>
<footer class="footer text-white-50 text-center mt-auto py-2 bg-dark fixed-bottom">&copy; Gianni Ridwan</footer>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>