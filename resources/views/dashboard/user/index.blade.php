@extends("layouts.app")

@section("page_title") Users <a href="{{ route("admin.user.create") }}" class="btn btn-primary"><ion-icon name="add-outline"></ion-icon></a>@endsection

@section("content")
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-center"><ion-icon name="settings-outline"></ion-icon></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td class="text-center">
                                        <a href="{{ route("admin.user.show",$user) }}" class="text-success"><ion-icon name="eye-outline"></ion-icon></a>
                                        <a href="{{ route("admin.user.edit",$user) }}" class="text-red"><ion-icon name="create-outline"></ion-icon></a>
                                        <form class="d-inline" method="post" action="{{ route("admin.user.destroy",$user) }}">
                                            @method("delete")
                                            @csrf
                                            <a href="#" class="text-dark"><ion-icon name="trash-outline"></ion-icon></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer bg-white clearfix float-right">
                                {{ $users->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
@endsection
