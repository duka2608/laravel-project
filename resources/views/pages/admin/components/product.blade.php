<tr>
    <td>{{ $product->brandName }}</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->typeName }}</td>
    <td>{{ $product->price }} $</td>
    <td style="text-align: center">
        <img height="100px" src="{{ asset('/storage/assets/images/products/'.$product->path) }}" alt="{{ $product->brandName." ".$product->name }}">
    </td>
    <td>
        <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-primary">Edit</a>
        <a href="#" data-id="{{ $product->id }}" class="btn btn-danger delete-product">Delete</a>
    </td>
</tr>
