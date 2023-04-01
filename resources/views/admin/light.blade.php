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
                    <h4 class="card-title">Configuration</h4>
                    
                    <form action="{{ route('lightconf.update') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Value</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="value"
                                            class="form-control form-control-sm" max="100" min="1"
                                            step="1" value="{{$conf->value??0}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Critical Temperature</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="critical_temperature"
                                            class="form-control form-control-sm" max="100" min="1"
                                            step="1" value="{{$conf->critical_temperature??0}}">
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-12">
                                <div class="offset-sm-3 col-md-3">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lighting Logs</h4>
                    {{-- <p class="card-description">
                  Add class <code>.table-hover</code>
                </p> --}}
                    <div class="table-responsive">
                        <table class="dtt">
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
