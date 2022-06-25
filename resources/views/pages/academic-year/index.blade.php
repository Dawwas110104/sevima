@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Academic Year') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('academic-year.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" required autocomplete="year" autofocus>

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
                                <input id="started_at" type="date" class="form-control @error('started_at') is-invalid @enderror" name="started_at" value="{{ old('started_at') }}" required autocomplete="started_at" autofocus>

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
                                    {{ __('Register') }}
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
                            <th scope="col">#</th>
                            <th scope="col">Year</th>
                            <th scope="col">Started At</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <th>{{ $item->year }}</th>
                                <th>{{ $item->started_at }}</th>
                                <th>
                                    @if ($item->status == 1)
                                        Active
                                    @elseif ($item->status == 0)
                                        Non-Active
                                    @else
                                        Expired
                                    @endif
                                </th>
                                <th>
                                    @if ($item->status == 0)
                                        <a href="{{ route('academic-year.edit', $item->id) }}">
                                            <button type="button" class="btn btn-warning">edit</button>
                                        </a>
                                        <a href="{{ route('academic-year.delete', $item->id) }}">
                                            <button type="button" class="btn btn-danger">delete</button>
                                        </a>
                                        <form method="POST" action="{{ route('academic-year.publish', $item->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Publish</button>
                                        </form>
                                    @endif
                                    
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