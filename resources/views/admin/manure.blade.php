@extends('layouts.admin')


@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="row">
        <div class="col-md-12 row">
            <div class="col-md-3">Status</div>
            <div class="col-md-3" id="heatstatus"></div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manual</h4>
                    
                    <form action="{{ route('heat.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Seconds</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="seconds"
                                            class="form-control form-control-sm" min="1"
                                            step="1" value="15">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 row">
                                <div class="offset-sm-3 col-md-3">
                                    <button type="submit" class="btn btn-success">Power</button>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-danger">Stop</button>
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
                    <h4 class="card-title">Heating Logs</h4>
                    {{-- <p class="card-description">
                  Add class <code>.table-hover</code>
                </p> --}}
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($heatlogs as $log)
                                <tr>    
                                    <td>{{ $log->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $log->created_at->format('H:i:s') }}</td>
                                    <td>{{ $log->duration }}</td>
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
@push('scripts')
    <script>
        setInterval(()=>{
            fetch('api/getheatstatus')
            .then(res=>res.json())
            .then(json=>{
                $('#heatstatus').html(json.heating==1?'Off':'On')
            })
        },1000)
    </script>
@endpush