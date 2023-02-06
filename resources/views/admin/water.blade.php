@extends('layouts.admin')


@section('content')
    <div class="row gap-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Water Tank Configuration</div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Water Tank Height</label>
                                <div class="col-sm-9">
                                    <input disabled type="text" class="form-control form-control-sm" value="{{$conf->maintankheight??0}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary" onclick="settank()">Set Tank Height</button>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Waterer</label>
                                <div class="col-sm-6"><span>{{$latest->level??0}} %</span></div>
                                <div class="col-sm-3 text-center">
                                    {{-- <input disabled type="text" class="form-control form-control-sm" value="{{$conf->maintankheight??0}}"> --}}
                                    <button type="button" class="btn btn-primary" onclick="calibrate()">Calibrate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-title">Criticals</div>
                        <form action="{{ route('water.update') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Waterer Critical Level (%)</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="dispensertankcritical"
                                            class="form-control form-control-sm" max="100" min="1"
                                            step="1" value="{{ $conf->waterercritical ?? 0 }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Main Tank Critical Level (%)</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="maintankcritical" class="form-control form-control-sm"
                                            max="100" min="1" step="1"
                                            value="{{ $conf->maintankcritical ?? 0 }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-3 col-md-9"">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Refill Logs</div>
                    <div class="table-responsive">
                        <table class="dtt">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Tank</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                <tr>    
                                    <td>{{ $log->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $log->created_at->format('H:i:s') }}</td>
                                    <td>{{ $log->tank }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Waterer Level Logs</div>
                    <div class="table-responsive">
                        <table class="dtt">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($watererLevels as $log)
                                <tr>    
                                    <td>{{ $log->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $log->created_at->format('H:i:s') }}</td>
                                    <td>{{ $log->level }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Water Tank Level Logs</div>
                    <div class="table-responsive">
                        <table class="dtt">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tankLevels as $log)
                                <tr>    
                                    <td>{{ $log->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $log->created_at->format('H:i:s') }}</td>
                                    <td>{{ $log->level }}</td>
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
        function settank() {
            fetch('api/setmode?mode=setup').then(res => res.json()).then(json => {
                if (json?.status == 'success') {}
                window.location.href = '{{ route('water.settank') }}';
            })
        }
        function calibrate(){
            fetch('api/setmode?mode=calibrate').then(res => res.json()).then(json => {
                if (json?.status == 'success') {}
                window.location.href = '{{ route('water.calibrate') }}';
            })
        }
    </script>
@endpush
