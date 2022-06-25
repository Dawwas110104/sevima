@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Material') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('material.store') }}">
                        @csrf
                        <input name="meeting_id" type="hidden" value="{{ $id }}">
                        <div class="row mb-3">
                            <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Link') }}</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}" required autocomplete="link" autofocus>

                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br>

        <div class="col-8">
            <div class="card">
                <div class="card-header">{{ __('Data') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Link</th>
                                <th scope="col">Type</th>
                                <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <th>{{ $item->material_name }}</th>
                                <th>{{ $item->material_link }}</th>
                                <th>{{ $item->type }}</th>
                                <th>
                                    <a href="{{ route('material.edit', $item->material_id) }}">
                                        <button type="button" class="btn btn-warning">Edit</button>
                                    </a>
                                    <form method="POST" action="{{ route('material.delete', $item->material_id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection