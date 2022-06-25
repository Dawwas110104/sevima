@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Academic Year') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('academic-year.update', $item->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="text" value="{{ $item->year }}" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" required autocomplete="year" autofocus>

                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="started_at" class="col-md-4 col-form-label text-md-end">{{ __('Started At') }}</label>

                            <div class="col-md-6">
                                <input id="started_at" type="date" value="{{ $item->started_at }}" class="form-control @error('started_at') is-invalid @enderror" name="started_at" value="{{ old('started_at') }}" required autocomplete="started_at" autofocus>

                                @error('started_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection