@extends("layouts.app")

@section("page_title") {{ $user->name }} @endsection

@section("content")
    <div class="container">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Register at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h4 class="mt-5">Subscraptions</h4>
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Count</th>
                        <th>Used</th>
                        <th>Price</th>
                        <th>Pack</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->id }}</td>
                            <td>{{ $subscription->created_at }}</td>
                            <td>{{ $subscription->count }}</td>
                            <td>{{ $subscription->used }}</td>
                            <td>{{ $subscription->price }}</td>
                            <td><a href="{{ route("admin.pack.show",$subscription->pack_id) }}">{{ $subscription->pack->name }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
