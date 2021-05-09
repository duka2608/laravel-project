@extends('layouts.admin-layout')

@section('header-title')
    Users Table
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-success">
                                <tr>
                                    <td>Name</td>
                                    <td>Username</td>
                                    <td>E - mail</td>
                                    <td>Role</td>
                                    <td>Operations</td>
                                </tr>
                                </thead>
                                <tbody id="table-body">
                                    @foreach($users->items as $user)
                                        @component('pages.admin.components.user', ['user' => $user])
                                        @endcomponent
                                    @endforeach
                                </tbody>
                            </table>
                            <ul class="pagination" id="pagination">
                                @for($i = 1; $i <= $users->pagesCount; $i++)
                                    <li class="page-item"><a class="page-link" data-page="{{ $i }}" href="#">{{ $i }}</a></li>
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
@section('scripts')
    <script>
        $(document).ready(function () {
            $("#submit").click(searchUsers);
            $("#clear").click(() => {
                $("#search-bar").val("");
            });
            $(".page-link").click(paginate);
            //(".delete-user").click(deleteUser)
        })
            function paginate(e) {
                e.preventDefault();
                let page = $(this).data('page');
                let keyword = $("#search-bar").val().trim();

                $.ajax({
                    url: 'users',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        page,
                        keyword
                    },
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function (data) {
                        fillTable(data);
                    },
                    error: function (xhr, error, message) {
                        console.log(error);
                    }
                })
            }

            function deleteUser(e) {
                e.preventDefault()
                let id = $(this).data('id');

                $.ajax({
                    url: '/admin/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        fillTable(data)
                        alert('User deleted successfully !')
                    },
                    error: function (xhr, error, message) {
                        console.log(error);
                    }
                })
            }

            function searchUsers(e) {
                e.preventDefault();
                let keyword = $("#search-bar").val().trim();

                $.ajax({
                    url: 'users',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        keyword
                    },
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function (data) {
                            fillTable(data);
                    },
                    error: function (xhr, error, message) {
                        console.log(error);
                    }
                })
            }
            function fillTable(data) {
                console.log(data);
                let html = "";

                data.items.forEach(user => {
                    html += tableRow(user)
                })

                let listHtml = '';
                for(let i = 1; i <= data.pagesCount; i++) {
                    listHtml += `<li class="page-item"><a class="page-link" data-page="${ i }" href="#">${ i }</a></li>`
                }
                $('#pagination').html(listHtml);
                $('#table-body').html(html);
                $('.page-link').click(paginate);
            }
            function tableRow(user) {
                let url = "{{ route('admin.users.edit', ['user' => ":id"]) }}";
                url = url.replace(':id', user.id);

                return `<tr>
                                <td>${ user.first_name+" "+user.last_name }</td>
                                <td>${ user.username}</td>
                                <td>${ user.email }</td>
                                <td>${ user.role_name }</td>
                                <td>
                                   <form action="${ url }" method="post">
                                   <a href="${url}" class="btn btn-primary">Edit</a>
                                    @method('DELETE')
                                    <button class="btn btn-danger delete-user">Delete</button>
                                    </form>
                                </td>
                          </tr>`
            }

    </script>
@endsection
