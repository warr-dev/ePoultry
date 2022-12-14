@extends('layouts.admin')


@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lighting Logs</h4>
                    {{-- <p class="card-description">
                  Add class <code>.table-hover</code>
                </p> --}}
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>State</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lightlogs as $log)
                                <tr>    
                                    <td>{{ $log->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $log->created_at->format('H:i:s') }}</td>
                                    <td>{{ $log->state }}</td>
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
