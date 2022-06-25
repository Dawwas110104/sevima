@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User's Class</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.class.update', ['id' => $user->id]) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Add Class') }}</label>

                            <div class="col-md-6">
                                <select name="role" class="form-control">
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <input name="user_id" type="hidden" value="{{  $item->id  }}"> --}}
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
                                    <a href="{{ route('user.class.delete', $item->id) }}">
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