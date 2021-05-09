@extends('layouts.admin-layout')

@section('header-title')
    Drink Types Table
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
                                        <th>Drink Type Name</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>

                                <tbody id="types">
                                @foreach($items->items as $type)
                                    @component('pages.admin.components.type', ['type' => $type])
                                    @endcomponent
                                @endforeach
                                </tbody>
                            </table>
                            <ul class="pagination" id="pagination">
                                @for($i = 1; $i <= $items->pagesCount; $i++)
                                    <li class="page-item"><a class="page-link" href="types?page={{ $i }}">{{ $i }}</a></li>
                                @endfor
                            </ul>
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
