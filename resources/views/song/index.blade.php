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
            <a class="btn text-white bg-danger" style="margin-right:10px;" href="/genre">Genre Page</a>
                <h4 style="margin-top:20px;">Songs Page</h4>
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Artist</th>
                        <th>Duration</th>
                    </thead>
                    <tbody>
                        <!-- Print all songs from selected genre -->
                        @foreach ($songs as $song)
                        @if ($song->genre_id == $id)
                        <tr>
                            <td>{{$song->song_name}}</td>
                            <td>{{$song->artist_name}}</td>
                            <td>{{$song->duration}}</td>
                            <!-- Button trigger modal -->
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$song->id}}">Add</button></td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Add song to temporary playlist -->
                                    <form method="post" action="{{url('add-Song')}}">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add song to playlist</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <label for="add">Add this song to the temporary playlist</label>                                    
                                            <input type="hidden" name="getSong" value="" id="hidden">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="add" value="add" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                                        </div>
                                    </form>

                                    <!-- Add song to existing playlist -->
                                    <form action="{{url('add-Song-to-playlist')}}" method="POST">
                                        <div class="modal-body">
                                            @csrf                            
                                            <label class="mb-2" for="add2">Add this song to the selected playlist:</label> 
                                            <input type="hidden" name="getSong2" value="" id="hidden2">
                                                <select class="mb-2" name="playlistId" id="">
                                                    @foreach($exPlayLists as $playlistNew)
                                                    @if ($playlistNew->user_id == Session::get('loginId'))
                                                    <option value="{{$playlistNew->id}}">{{$playlistNew->name}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" type="submit" value="add" name="add2">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script>
                            var btn = document.getElementById("{{$song->id}}");
                            var songId = document.getElementById("hidden2");

                            btn.onclick = function() {
                                document.getElementById('hidden').value = '{{$song->id}}';
                                songId.value = "{{$song->id}}";
                            }
                        </script>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="footer text-white-50 text-center mt-auto py-2 bg-dark fixed-bottom">&copy; Gianni Ridwan</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>