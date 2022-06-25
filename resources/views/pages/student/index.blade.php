@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Jadwal</div>

                <div class="card-body">
                    <div class="card">
                        <div class="card-header">Senin</div>
        
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Subject</th>
                                        <th>Teacher</th>
                                        <th>Start At</th>
                                        <th>End At</th>
                                        <th>Meeting</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <th>{{ $item->day }}</th>
                                        <th>{{ $item->subject_name }}</th>
                                        <th>{{ $item->start_at }}</th>
                                        <th>{{ $item->end_at }}</th>
                                        <th>{{ $item->user_name }}</th>
                                        <th>
                                            <a href="#">
                                                <button class="btn btn primary">Meeting</button>
                                            </a>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Selasa</div>
        
                        <div class="card-body">
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Rabu</div>
        
                        <div class="card-body">
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Kamis</div>
        
                        <div class="card-body">
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Jumat</div>
        
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection