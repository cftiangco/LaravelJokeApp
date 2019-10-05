<div class="col-sm-8">
            <div>
                <h1 class="" style="display:inline;">Jokes Lists</h1>
                <a href="/jokes/create" class="float-right" style="display:inline-block;line-height:60px">Post your Joke Here!</a>
            </div>
            <br/>
            <table class="table">
                <thead>
                    <tr>
                        <th>Author</th>
                        <th>Title</th> 
                        <th>Posted On</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jokes as $joke)
                    <tr>
                        <td>{{ $joke->user->name }}</td>
                        <td>{{ $joke->title }}</td>
                        <td>{{ $joke->created_at }}</td>
                        <td><a href="/jokes/{{ $joke->id }}" class="btn btn-info">Read</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>