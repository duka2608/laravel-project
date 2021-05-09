@extends('layouts.admin-layout')

@section('header-title')
    Products Table
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-image">
                                <thead>
                                <tr>
                                    <th>Brand</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Options</th>
                                </tr>
                                </thead>

                                <tbody id="products">
                                @foreach($products as $product)
                                    @component('pages.admin.components.product', ['product' => $product])
                                    @endcomponent
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.delete-product').click(deleteProduct);
        })

        function deleteProduct(e) {
            e.preventDefault();
            let productId = $(this).data('id');

            $.ajax({
                url: '/admin/products/' + productId,
                method: 'DELETE',
                dataType: 'json',
                success: function (data) {
                    displayProducts(data);
                },
                error: function (err, message, xhr) {
                    console.log(err);
                }
            })

            function displayProducts(products) {
                let html = "";
                products.forEach(function (product) {
                    html += displayProduct(product);
                })

                $('#products').html(html);
                $('.delete-product').click(deleteProduct);
            }

            function displayProduct(product) {
                console.log(product)
                let url = "{{ route('admin.products.edit', ['product' => ":id"]) }}";
                url = url.replace(':id', product.id);
                let imagePath = "{{ asset("/storage/assets/images/products") }}"  + `/${product.path}`;

                return `<tr>
                                <td>${ product.brandName }</td>
                                <td>${ product.name }</td>
                                <td>${ product.typeName }</td>
                                <td>${  product.price } $</td>
                                <td class="w-25" style="text-align: center">
                                    <img height="100px" src=${ imagePath } alt="${ product.brandName+" "+product.name }">
                                </td>
                                <td
                                   <a href="${url}" class="btn btn-primary">Edit</a>
                                   <a href="#" data-id="${ product.id }" class="btn btn-danger delete-product">Delete</a>
                                </td>
                            </tr>`
            }
        }
    </script>
@endsection
