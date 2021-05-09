@extends('layouts.admin-layout')

@section('header-title')
    Website Activities
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-image">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Activity</th>
                                    <th>Time</th>
                                </tr>
                                </thead>

                                <tbody id="brands">
                                @foreach($items->items as $a)
                                    @component('pages.admin.components.activity', ['a' => $a])
                                    @endcomponent
                                @endforeach
                                </tbody>
                            </table>
                            <ul class="pagination" id="pagination">
                                @for($i = 1; $i <= $items->pagesCount; $i++)
                                    <li class="page-item"><a class="page-link" href="activities?page={{ $i }}">{{ $i }}</a></li>
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
