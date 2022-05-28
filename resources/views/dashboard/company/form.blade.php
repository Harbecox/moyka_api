@extends("layouts.app")

@section("page_title") Company edit @endsection

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
                                <input type="text" name="name" value="{{ $company->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Company name">
                                @error('name') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><ion-icon name="call-outline"></ion-icon></span>
                                </div>
                                <input type="text" name="phone" value="{{ $company->phone }}" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                                @error('phone') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6"><div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><ion-icon name="flag-outline"></ion-icon></span>
                                        </div>
                                        <input name="lat" value="{{ $company->lat }}" type="text" class="form-control @error('lat') is-invalid @enderror" placeholder="Lat">
                                        @error('lat') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><ion-icon name="flag-outline"></ion-icon></span>
                                        </div>
                                        <input name="lng" value="{{ $company->lng }}" type="text" class="form-control @error('lng') is-invalid @enderror" placeholder="Lng">
                                        @error('lng') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success float-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
