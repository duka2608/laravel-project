<tr>
    <td>{{ $brand->name }}</td>
    <td>
        <form action="{{ route('admin.brands.destroy', ['brand' => $brand->id]) }}" method="POST">
            <a href="{{ route('admin.brands.edit', ['brand' => $brand->id]) }}" class="btn btn-primary">Edit</a>
            @method('DELETE')
            @csrf
            <button class="btn btn-danger delete-product">Delete</button>
        </form>
    </td>
</tr>
