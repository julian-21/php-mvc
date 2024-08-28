
<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Logout</button>
    </form>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->date }}</td>
                <td>{{ $post->username }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->idpost) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post->idpost) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

