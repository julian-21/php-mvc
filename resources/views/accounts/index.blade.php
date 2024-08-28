
<div class="container">
    <h1>Accounts</h1>
    <a href="{{ route('accounts.create') }}" class="btn btn-primary">Create Account</a>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Manage Posts</a>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Logout</button>
    </form>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
            <tr>
                <td>{{ $account->username }}</td>
                <td>{{ $account->name }}</td>
                <td>{{ $account->role }}</td>
                <td>
                    <a href="{{ route('accounts.edit', $account->username) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('accounts.destroy', $account->username) }}" method="POST" style="display:inline;">
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



