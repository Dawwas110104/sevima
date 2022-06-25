@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Academic Year's Schedule</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('academic-year.schedule.store') }}">
                        @csrf
                        <input name="class_id" type="hidden" value="{{ $class->id }}">  
                        <div class="row mb-3">
                            <label for="day" class="col-md-4 col-form-label text-md-end">{{ __('Day') }}</label>

                            <div class="col-md-6">
                                <input id="day" type="text" class="form-control" day="form-control @error('day') is-invalid @enderror" name="day" value="{{ old('day') }}" required autocomplete="day" autofocus>

                                @error('day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Subject') }}</label>

                            <div class="col-md-6">
                                <select name="subject" class="form-control">
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->academic_year_subjects_id }}">{{ $subject->name }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Teacher') }}</label>

                            <div class="col-md-6">
                                <select name="teacher" class="form-control">
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start_at" class="col-md-4 col-form-label text-md-end">{{ __('Start At') }}</label>

                            <div class="col-md-6">
                                <input id="start_at" type="time" class="form-control" start_at="form-control @error('start_at') is-invalid @enderror" name="start_at" value="{{ old('start_at') }}" required autocomplete="start_at" autofocus>

                                @error('start_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="end_at" class="col-md-4 col-form-label text-md-end">{{ __('End At') }}</label>

                            <div class="col-md-6">
                                <input id="end_at" type="time" class="form-control" end_at="form-control @error('end_at') is-invalid @enderror" name="end_at" value="{{ old('end_at') }}" required autocomplete="end_at" autofocus>

                                @error('end_at')
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
                <div class="card-header">{{ __('Data Schedule') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Day</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Teacher</th>
                                <th scope="col">Start At</th>
                                <th scope="col">End At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <th>{{ $item->day }}</th>
                                <th>{{ $item->subject_name }}</th>
                                <th>{{ $item->teacher_name }}</th>
                                <th>{{ $item->start_at }}</th>
                                <th>{{ $item->end_at }}</th>
                                <th>
                                    <form method="POST" action="{{ route('academic-year.schedule.delete', $item->schedule_id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('academic-year.meeting', $item->schedule_id) }}">
                                        <button type="button" class="btn tbn-primary">Meetings</button>
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
