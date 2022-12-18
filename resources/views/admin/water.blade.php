@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Tank Configurations</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Main Tank Height</label>
                                <div class="col-sm-9">
                                    <input disabled type="text" class="form-control form-control-sm" value="{{$conf->maintankheight??0}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Dispenser Tank Height</label>
                                <div class="col-sm-9">
                                    <input disabled type="text" class="form-control form-control-sm" value={{$conf->dispensertankheight??0}}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-md-3 col-md-9">
                            <button type="button" class="btn btn-primary" onclick="settank()">Set Tank Height</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Tank Criticals</div>
                    <form action="{{ route('water.update') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Dispenser Critical Level (%)</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="dispensertankcritical"
                                            class="form-control form-control-sm" max="100" min="1"
                                            step="1" value="{{ $conf->dispensertankcritical ?? 0 }}">
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
                        <table class="table table-hover">
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
    </script>
@endpush
