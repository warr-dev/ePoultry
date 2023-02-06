@extends('layouts.admin')

@push('head')
    <style>
      .card card-tale .card-0{
        color:black; 
        background: linear-gradient(to right,#d92525 20%, #F5F7FF 20%); border: 1px solid #e3e3e3;
      }
      .card-20{
        background: linear-gradient(to right,#d92525 20%, #F5F7FF 20%) !important; border: 1px solid #e3e3e3 ;
      }
      .card-40{
        background: linear-gradient(to right,#7DA0FA 40%, #F5F7FF 40%) !important; border: 1px solid #e3e3e3;
      }
      .card-60{
        background: linear-gradient(to right,#7DA0FA 60%, #F5F7FF 60%) !important; border: 1px solid #e3e3e3;"
      }
      .card-80{
        background: linear-gradient(to right,#7DA0FA 80%, #F5F7FF 80%) !important; border: 1px solid #e3e3e3;
      }
      .card-100{
        background: linear-gradient(to right,#7DA0FA 100%, #F5F7FF 100%) !important; border: 1px solid #e3e3e3;
      }
    </style>
@endpush

@section('content')
    <div class="row">    
      <!-- feeding -->
      <div class="col-md-6 grid-margin stretch-card">
        @if ($feederlevel>0)
          @if ($feederlevel < 20)
            <div class="card tale-bg card-0">
          @elseif  ($feederlevel  >= 20 &&  $feederlevel  < 40)      
            <div class="card tale-bg card-20">
          @elseif  ($feederlevel  >= 40 &&  $feederlevel  < 60)      
            <div class="card tale-bg card-40">
          @elseif  ($feederlevel  >= 60 &&  $feederlevel  < 80)      
            <div class="card tale-bg card-60">
          @elseif  ($feederlevel  >= 80 &&  $feederlevel  < 100)      
            <div class="card tale-bg card-80">
          @elseif  ($feederlevel == 100)      
            <div class="card tale-bg card-100">
          @endif
        @else
          <div class="card tale-bg">
        @endif
            <div class="card-body" >
                <b  ng-style ="font-size:30px;color: #F5F7FF;"> FEEDER  ({{$feederlevel}} %)</b>
                <p class="fs-30 m-2" >
                  @if($feedingcounts>0)
                    {{$feedingdone}}/{{$feedingcounts}} ({{($feedingdone/$feedingcounts)*100}}%) done today
                  @else
                    No feeding for today
                  @endif
                </p>
                <!-- <b  style ="font-size:60px; "> 3</b> -->
                <p >Previous Feeding Time : 16:02:00	</p>
              </div>    
          </div>
      </div>
      <!--end of feeding -->
        <div class="col-md-6 grid-margin stretch-card">
          @if ($waterlevel>0)
            @if ($waterlevel < 20)
              <div class="card tale-bg card-0">
            @elseif  ($waterlevel  >= 20 &&  $waterlevel  < 40)      
              <div class="card tale-bg card-20">
            @elseif  ($waterlevel  >= 40 &&  $waterlevel  < 60)      
              <div class="card tale-bg card-40">
            @elseif  ($waterlevel  >= 60 &&  $waterlevel  < 80)      
              <div class="card tale-bg card-60">
            @elseif  ($waterlevel  >= 80 &&  $waterlevel  < 100)      
              <div class="card tale-bg card-80">
            @elseif  ($waterlevel == 100)      
              <div class="card tale-bg card-100">
            @endif
          @else
            <div class="card tale-bg">
          @endif
              <div class="card-body" >
                  <b  ng-style ="font-size:30px;color: #F5F7FF;"> WATER  ({{$waterlevel}} %)</b>
                  @if ($refills>0)
                    <p class="fs-30 m-2" >
                      {{$refills}} Refills today
                    </p>
                    <p> last refill : {{$lastrefill}}	</p>
                  @else
                    <p class="fs-30 m-2" >
                      No refills done today
                    </p>
                    
                    <p>Waterer Level {{$watererlevel}} %</p>
                  @endif
                </div>    
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body" style="color:#030303 ;">
            <b  style ="font-size:15px;color: #F5F7FF;"> LIGHT</b><BR></BR>
            @if (strtolower($states['light'])=='on')
            <label style="color: white;margin-left:5%;font-size: 30px;">
              {{strtoupper($states['light'])}}
            </label>
            @else
            <label style="color: Red;margin-left:5%;font-size: 30px;">
              {{strtoupper($states['light'])}}
            </label>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-light-blue">
          <div class="card-body" style="color:#030303 ;">
            <b  style ="font-size:15px;color: #F5F7FF;"> FAN</b><BR></BR>
            @if (strtolower($states['fan'])=='on')
            <label style="color: white;margin-left:5%;font-size: 30px;">
              {{strtoupper($states['fan'])}}
            </label>
            @else
            <label style="color: Red;margin-left:5%;font-size: 30px;">
              {{strtoupper($states['fan'])}}
            </label>
            @endif
          </div>
          
        </div>
      </div>
    </div>

    <div class="row">
            {{-- <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Feeds Summary Report</p>
                  <p class="font-weight-500">The total kilogram  of feeds  within the date range.</p>
                  <div class="d-flex flex-wrap mb-5">                  
                    <div class="mt-3">
                      <p class="text-muted">Total feeds usage</p>
                      <h3 class="text-primary fs-30 font-weight-medium">25 kilogram</h3>
                    </div> 
                  </div>
                  <canvas id="order-chart"></canvas>
                </div>
              </div>
            </div> --}}
            {{-- <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="d-flex justify-content-between">
                  <p class="card-title">Water Tank Usage</p>
                  <a href="#" class="text-info">View all</a>
                 </div>
                  <p class="font-weight-500">The total usage of water within the date range. </p>
                  <div id="sales-legend1" class="chartjs-legend mt-4 mb-2">
                    <ul class="1-legend">
                      <li><span style="background-color: rgb(152, 189, 255);"></span>Main Tank</li><li><span style="background-color: rgb(75, 73, 172);"></span>Dispenser Tank</li></ul>
                  </div>
                  <canvas id="sales-chart"></canvas>
                </div>
              </div>
            </div> --}}
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">DHT Readings</p>
                  <canvas id="order-chart"></canvas>
                </div>
              </div>
            </div>
            {{-- <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="d-flex justify-content-between">
                  <p class="card-title">DHT Readings Grapph</p>
                  <a href="#" class="text-info">View all</a>
                 </div>
                  <p class="font-weight-500">last 10 readings </p>
                  <div id="sales-legend1" class="chartjs-legend mt-4 mb-2">
                    <ul class="1-legend">
                      <li><span style="background-color: rgb(152, 189, 255);"></span>Main Tank</li><li><span style="background-color: rgb(75, 73, 172);"></span>Dispenser Tank</li></ul>
                  </div>
                  <canvas id="sales-chart"></canvas>
                </div>
              </div>
            </div> --}}
          </div>
          
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            if ($("#order-chart").length) {
      var areaData = {
        labels: ['{!!join("','",array_column($dhtvalues,'created_at'))!!}'],
        datasets: [
          {
            data: [{{join(', ',array_column($dhtvalues,'humidity'))}}],
            borderColor: [
              '#4747A1'
            ],
            borderWidth: 2,
            fill: true,
            label: "humidity"
          },
          {
            data: [{{join(', ',array_column($dhtvalues,'temperature'))}}],
            borderColor: [
              '#F09397'
            ],
            borderWidth: 2,
            fill: true,
            label: "temperature"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            ticks: {
              display: true,
              padding: 10,
              fontColor:"#6C7383"
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              padding: 18,
              fontColor:"#6C7383"
            },
            gridLines: {
              display: true,
              color:"#f2f2f2",
              drawBorder: false
            }
          }]
        },
        legend: {
          display: true
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: .35
          },
          point: {
            radius: 0
          }
        }
      }
      var revenueChartCanvas = $("#order-chart").get(0).getContext("2d");
      var revenueChart = new Chart(revenueChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }
    if ($("#order-chart-dark").length) {
      var areaData = {
        labels: ["10","","","20","","","30","","","40","","", "50","","", "60","","","70"],
        datasets: [
          {
            data: [200, 480, 700, 600, 620, 350, 380, 350, 850, "600", "650", "350", "590", "350", "620", "500", "990", "780", "650"],
            borderColor: [
              '#4747A1'
            ],
            borderWidth: 2,
            fill: false,
            label: "Orders"
          },
          {
            data: [400, 450, 410, 500, 480, 600, 450, 550, 460, "560", "450", "700", "450", "640", "550", "650", "400", "850", "800"],
            borderColor: [
              '#F09397'
            ],
            borderWidth: 2,
            fill: false,
            label: "Downloads"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            ticks: {
              display: true,
              padding: 10,
              fontColor:"#fff"
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#575757'
            }
          }],
          yAxes: [{
            display: true,
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 200,
              min: 200,
              max: 1200,
              padding: 18,
              fontColor:"#fff"
            },
            gridLines: {
              display: true,
              color:"#575757",
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: .35
          },
          point: {
            radius: 0
          }
        }
      }
      var revenueChartCanvas = $("#order-chart-dark").get(0).getContext("2d");
      var revenueChart = new Chart(revenueChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }
        })(jQuery)
    </script>
@endpush
