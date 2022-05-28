@extends("layouts.app")

@section("page_title") Pack edit @endsection

@section("content")

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ $action }}" method="POST">
                            @method($method)
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><ion-icon name="briefcase-outline"></ion-icon></span>
                                        </div>
                                        <input type="text" name="name" value="{{ $pack->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Pack name">
                                        @error('name') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><ion-icon name="cash-outline"></ion-icon></span>
                                        </div>
                                        <input type="text" name="price" value="{{ $pack->price }}" class="form-control @error('price') is-invalid @enderror" placeholder="price">
                                        @error('price') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><ion-icon name="grid-outline"></ion-icon></span>
                                        </div>
                                        <input type="text" name="count" value="{{ $pack->count }}" class="form-control @error('count') is-invalid @enderror" placeholder="count">
                                        @error('count') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="companies[]" class="form-control select2bs4" multiple="multiple" style="width: 100%;">
                                            @foreach($companies as $company)
                                                <option @if($pack->companies()->where("id",$company->id)->exists()) selected @endif value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
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
