@extends('layouts.admin')

@push('head')
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
@endpush

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Feeding Time Management</h4>
                    {{-- <p class="card-description">
                  Add class <code>.table-hover</code>
                </p> --}}
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Duration</th>
                                    <th>Days</th>
                                    <th>Active</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedtimes as $feedtime)
                                    <tr data-feedtimeid="{{ $feedtime->id }}">
                                        <td>{{ $feedtime->time }}</td>
                                        <td>{{ $feedtime->duration }}</td>
                                        <td>
                                            @foreach ($feedtime->days as $day)
                                                {{ $days[$day] }}
                                            @endforeach
                                        </td>
                                        <td class=" text-center">
                                            <input type="checkbox" @if ($feedtime->isActive) checked @endif>
                                        </td>
                                        <td>
                                            <i class="mdi mdi-delete text-danger" onclick="deleteFeedingTime(event)"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end my-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Tank Configurations</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Feeds Tank Height</label>
                                <div class="col-sm-6">
                                    <input disabled type="text" class="form-control form-control-sm"
                                        value="{{ $conf->tankheight ?? 0 }}">
                                </div>
                                <div class="col-md-3">
                                  <buttton class="btn btn-primary" onclick="settank()">Set Tank Height</buttton>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <form action="{{route('feeding.settank')}}" method="POST" id="frm-settank"> 
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Feeds Tank Critical Level (%)</label>
                                    <div class="col-sm-6">
                                        <input type="number" name="tankcritical" class="form-control form-control-sm"
                                            max="100" min="1" step="1"
                                            value="{{ $conf->tankcritical ?? 0 }}">
                                    </div>
                                    <div class="col-md-3">
                                    <buttton onclick="$('#frm-settank').submit()" class="btn btn-primary">Set Critical (%)</buttton>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Time</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('feeding.addtime') }}" method="POST" class="w-full" id="form-addtime">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 stretch-card">
                                <div class="d-flex justify-content-between w-100">
                                    @foreach ($days as $ind => $day)
                                        <input type="checkbox" name="days[]" value="{{ $ind }}"
                                            id="{{ $day }}"><label
                                            for="{{ $day }}">{{ $day }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 stretch-card">
                                <div class="form-group w-100">
                                    <label>Time</label>
                                    <input type="time" name="time" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-12 stretch-card">
                                <div class="form-group w-100">
                                    <label>Duration</label>
                                    <input type="number" name="duration" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="$('#form-addtime').submit()" class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <x-form :url="route('feeding.delete', ':id')" method="delete" id="deleteFeedingTime" />
@endsection

@push('scripts')
    <script>
        const deleteFeedingTime = (e) => {
            if (confirm('are you sure to delete?')) {
                let url = $('#deleteFeedingTime')[0].action
                let id = e.target.closest('tr').dataset.feedtimeid
                $('#deleteFeedingTime')[0].action = url.replace(':id', id)
                $('#deleteFeedingTime')[0].submit()
            }
        }
        function settank() {
            fetch('api/feed/setmode?mode=setup').then(res => res.json()).then(json => {
                if (json?.status == 'success') {}
                window.location.href = '{{ route('feeding.setmode') }}';
            })
        }
    </script>
@endpush

@push('head')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">     --}}
@endpush
@push('scripts')
    <script script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endpush
