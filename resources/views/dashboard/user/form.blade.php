@extends("layouts.app")

@section("page_title") User edit @endsection

@section("content")

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ $action }}" method="POST">
                            @method($method)
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><ion-icon name="briefcase-outline"></ion-icon></span>
                                </div>
                                <input type="text" name="name" value="{{ $user->name ?? old("name") }}" class="form-control @error('name') is-invalid @enderror" placeholder="User name">
                                @error('name') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><ion-icon name="mail-outline"></ion-icon></span>
                                </div>
                                <input type="text" name="email" value="{{ $user->email ?? old("email")}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                @error('email') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><ion-icon name="key-outline"></ion-icon></span>
                                </div>
                                <input type="text" name="password" value="" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                @error('password') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><ion-icon name="person-circle-outline"></ion-icon></span>
                                    </div>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                                        <option selected>Select role</option>
                                        @foreach(\App\Models\User::ROLES as $role)
                                            <option @if($user->role == $role) selected @endif value="{{ $role }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                    @error('role') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                                </div>

                            <button class="btn btn-success float-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
