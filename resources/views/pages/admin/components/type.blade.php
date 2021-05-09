<tr>
    <td>{{ $type->name }}</td>
    <td>
        <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="POST">
            <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn btn-primary">Edit</a>
            @method('DELETE')
            @csrf
            <button class="btn btn-danger delete-product">Delete</button>
        </form>
    </td>
</tr>
