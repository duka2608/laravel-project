<tr>
    <td>{{ $user->first_name." ".$user->last_name}}</td>
    <td>{{ $user->username }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role_name }}</td>
    <td>

        <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="post">
            @method('DELETE')
            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="btn btn-primary">Edit</a>
            <button class="btn btn-danger delete-user">Delete</button>
        </form>

    </td>
</tr>
