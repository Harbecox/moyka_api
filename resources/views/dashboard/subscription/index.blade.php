@extends("layouts.app")

@section("page_title") Subscription @endsection

@section("content")
    <div class="container">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Count</th>
                        <th>Used</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Pack</th>
                        <th>User</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->id }}</td>
                            <td>{{ $subscription->count }}</td>
                            <td>{{ $subscription->used }}</td>
                            <td>{{ $subscription->price }}</td>
                            <td>{{ $subscription->created_at }}</td>
                            <td><a href="{{ route("admin.pack.show",$subscription->pack_id) }}">{{ $subscription->pack->name }}</a></td>
                            <td><a href="{{ route("admin.user.show",$subscription->user_id) }}">{{ $subscription->user->name }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="card-footer bg-white clearfix float-right">
                    {{ $subscriptions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
