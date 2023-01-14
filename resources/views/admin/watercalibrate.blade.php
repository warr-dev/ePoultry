@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Waterer Calibration</div>
                   <div class="row">
                    <div class="col-md-12">
                        <p>Current Water Level: <span id="water-level"></span>%</p>
                    </div>
                    <div class="col-md-12">
                        <p>If above value is wrong please calibrate:                                                </p>
                        <ul>
                            <li>Clear the waterer until sensor markings then click this <button onclick="set(0)">set 0%</button> <span id="setting0"></span></li>
                            <li>0% = <span id="val0">{{$conf->waterer0}}</span></li>
                            <li>Fill the waterer then click this <button onclick="set(100)">set 100%</button> <span id="setting100"></span></li>
                            <li>100% = <span id="val100">{{$conf->waterer100}}</span></li>
                            <li>go <a href="{{route('water')}}">back</a></li>
                        </ul>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let req;
        req=setInterval(() => {
            getwatererlevel()
        }, 2000);
        function getwatererlevel() {
            fetch('/api/getwatererlevel').then(res => res.json()).then(json => {
                json?.level && $('#water-level').text(json?.level)
            })
        }
        function set(percent){
            if(req) clearInterval(req)
            fetch('/api/setmode?mode=cal'+percent).then(res => res.json()).then(json => {
                if (json?.status == 'success') {
                    $('#setting'+percent).text('setting...')
                    let cmode=setInterval(() => {
                        fetch('/api/getwaterconf').then(res => res.json())
                        .then(json => {
                            if(json?.configuration?.mode !=='cal'+percent) {
                                $('#setting'+percent).text('done')
                                $('#val'+percent).text(json?.configuration['waterer'+percent])
                                clearInterval(cmode)
                            } 
                        })
                    }, 2000);
                    
                }
            })
        }
    </script>
@endpush
