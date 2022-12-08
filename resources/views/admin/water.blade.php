@extends('layouts.admin')


@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>Tank Configurations</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tank Height</label>
                        <div class="col-sm-6">
                            <input disabled type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-primary" onclick="settank()">Set Tank Height</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-description">Tank Criticals</div>
            <form action="{{ route('water.update') }}" method="post">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dispenser Critical Level (%)</label>
                            <div class="col-sm-6">
                                <input type="number" name="dispensertankcritical" class="form-control form-control-sm" max="100" min="1"
                                    step="1" value="{{$conf->dispensertankcritical??0}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Main Tank Critical Level (%)</label>
                            <div class="col-sm-6">
                                <input type="number" name="maintankcritical" class="form-control form-control-sm" max="100" min="1"
                                    step="1" value="{{$conf->maintankcritical??0}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 text-right">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
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
