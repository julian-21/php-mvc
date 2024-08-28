
<div class="container">
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->idpost) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="datetime-local" id="date" name="date" class="form-control" value="{{ \Carbon\Carbon::parse($post->date)->format('Y-m-d\TH:i') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

