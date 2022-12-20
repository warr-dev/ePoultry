@extends('layouts.admin')


@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">SMS Configurations</h4>
                    <p class="card-description">
                        using semaphore SMS API
                    </p>
                    <form action="{{ route('smsconf.update') }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SEMAPHORE API KEY</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="apikey"
                                            value="{{ $conf->apikey ?? 'N/A' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="number"
                                            value={{ $conf->number ?? 'Not Set' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-3 col-md-9">
                                <button type="submit" class="btn btn-primary">Set</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
