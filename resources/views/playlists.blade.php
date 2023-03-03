<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jukebox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="padding-bottom:70px;">
    <div class="container">
        <div class="row">
            <div class="grid-2" style="margin-top:20px;">
            <a class="btn text-white bg-danger" style="margin-right:10px;" href="dashboard">Home Page</a>
                <h4 style="margin-top:20px;">Playlists Page</h4>
                <hr>
                @foreach ($playlists as $playlist)
                @if ($playlist->user_id == Session::get('loginId'))
                <div class="playlist">
                <h5 class="text-capitalize">{{$playlist->name}}</h5>

                <!-- Calculate duration for each playlist -->
                @php
                    $total = DB::select("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) FROM songs JOIN playlist_sessions ON songs.id=playlist_sessions.song_id && playlist_sessions.playlist_id = $playlist->id;");
                    $sumstring = 'SEC_TO_TIME(SUM(TIME_TO_SEC(duration)))';
                    $array = json_decode(json_encode($total[0]), true);
                    $arraySum = $array[$sumstring];
                @endphp

                <!-- Show duration -->
                <p class="duration text-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                    <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                    <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/></svg>
                    Duration: <?php echo $arraySum;?>
                </p>
                
                <!-- Delete playlist -->
                <div class="editList">
                <a href="{{url('delete-Playlists/'.$playlist['id'])}}" class="btn text-white bg-danger">Delete Playlist <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                </a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$playlist->id}}">
                Change Playlist Name
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <!-- Change playlist name -->
                        <form method="post" action="{{url('update-Playlists')}}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Change Name</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <label for="name">New Name:</label>
                                    <input type="text" name="name" id="name">
                                    <input type="hidden" name="id" id="hidden" value="{{$playlist->id}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Artist</th>
                        <th>Duration</th>
                        <th></th>
                    </thead>
                <tbody>
                    <!-- Print all songs in playlists -->
                    @foreach ($playlistsession as $sesh)
                    @foreach ($songs as $song)

                    @if ($sesh->song_id == $song['id'])
                    @if ($sesh->playlist_id== $playlist->id)
                <tr>
                    <td>{{$song['song_name']}}</td>
                    <td>{{$song['artist_name']}}</td>
                    <td>{{$song['duration']}}</td>
                    <td><a href="{{url('delete-Playlist-song/'.$song['id'].'/'.$playlist['id'])}}" class="btn text-white bg-danger">Delete <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg></a></td>
                </tr>
                    @endif
                    @endif
                    @endforeach
                    @endforeach 
                </tbody>
                </table>
                    @endif
                    @endforeach 
            </div>
        </div>
    </div>
    <footer class="footer text-white-50 text-center mt-auto py-2 bg-dark fixed-bottom">&copy; Gianni Ridwan</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>