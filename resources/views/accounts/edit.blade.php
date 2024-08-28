
<div class="container">
    <h1>Edit Account</h1>
    <form action="{{ route('accounts.update', $account->username) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $account->name }}" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role" class="form-control" required>
                <option value="admin" {{ $account->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="author" {{ $account->role == 'author' ? 'selected' : '' }}>Author</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

