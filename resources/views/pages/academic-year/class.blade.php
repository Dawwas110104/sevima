@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Academic Year's Class</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('academic-year.class.store') }}">
                        @csrf
                        <input name="academic_id" type="hidden" value="{{ $academic_id }}">
                        <div class="row mb-3">
                            <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Add Class') }}</label>

                            <div class="col-md-6">
                                <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class') }}" required autocomplete="class" autofocus>

                                @error('class')
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
                                <th scope="col">Class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <th>{{ $item->name }}</th>
                                <th>
                                    <a href="{{ route('academic-year.class.schedule', $item->id) }}">
                                        <button type="button" class="btn btn-primary">Schedule</button>
                                    </a>
                                    <a href="{{ route('academic-year.class.delete', $item->id) }}">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
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