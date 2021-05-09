<tr class="alert" role="alert">
    <td>
        <div class="img" style="background-image: url({{ asset('storage/assets/images/products/'.$cartEl->product->path) }});"></div>
    </td>
    <td>
        <div class="email">
            <span>{{ $cartEl->product->brandName." ".$cartEl->product->name }}</span>
        </div>
    </td>
    <td>${{ (int)$cartEl->product->price }}</td>
    <td class="quantity">
        <div class="input-group">
            <input type="text" name="quantity" class="quantity form-control input-number" data-product="{{ $cartEl->product->id }}" value="{{ $cartEl->quantity }}" min="1" max="100">
        </div>
    </td>
    <td data-total="{{ $cartEl->product->id }}">${{ $cartEl->product->price * $cartEl->quantity }}</td>
    <td>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-product="{{ $cartEl->product->id }}">
            <span aria-hidden="true"><i class="fa fa-close"></i></span>
        </button>
    </td>
</tr>
