@extends('layouts.admin')

@push('head')
    <style>
      .card-0{
        background: linear-gradient(to right,#d92525 0%, #F5F7FF 00%); border: 1px solid #e3e3e3;
      }
      .card-20{
        background: linear-gradient(to right,#d92525 20%, #F5F7FF 20%); border: 1px solid #e3e3e3;
      }
      .card-40{
        background: linear-gradient(to right,#4ccfb9 40%, #F5F7FF 40%); border: 1px solid #e3e3e3;
      }
      .card-60{
        background: linear-gradient(to right,#4ccfb9 60%, #F5F7FF 60%); border: 1px solid #e3e3e3;"
      }
      .card-80{
        background: linear-gradient(to right,#4ccfb9 80%, #F5F7FF 80%); border: 1px solid #e3e3e3;
      }
      .card-100{
        background: linear-gradient(to right,#4ccfb9 100%, #F5F7FF 100%); border: 1px solid #e3e3e3;
      }
    </style>
@endpush

@section('content')
    <div class="row">
    
        <div class="col-md-6 grid-margin stretch-card">
          @if ($lastdht)
            @if ($lastdht->temperature < 20)
              <div class="card tale-bg card-0">
            @elseif  ($lastdht->temperature  >= 20 &&  $lastdht->temperature  < 40)      
              <div class="card tale-bg card-20">
            @elseif  ($lastdht->temperature  >= 40 &&  $lastdht->temperature  < 60)      
              <div class="card tale-bg card-40">
            @elseif  ($lastdht->temperature  >= 60 &&  $lastdht->temperature  < 80)      
              <div class="card tale-bg card-60">
            @elseif  ($lastdht->temperature  >= 80 &&  $lastdht->temperature  < 100)      
              <div class="card tale-bg card-80">
            @elseif  ($lastdht->temperature == 100)      
              <div class="card tale-bg card-100">
            @endif
          @else
            <div class="card tale-bg">
          @endif

              <div class="card-body" >
                  <b  ng-style ="font-size:30px;color: #F5F7FF;"> FEEDS</b>
                  <p class="fs-30 mb-2" >@if ($lastdht){{$lastdht->temperature}} @endif %</p>
                  <b  style ="font-size:60px; "> 3</b>
                  <p >Previous Feeding Time : 16:02:00	</p>
                </div>    
            </div>
        </div>
     
        <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                @if ($lastdht->humidity < 20)
    <div class="card card-bg" style=" background: linear-gradient(to right,#d92525 20%, #F5F7FF 20%); border: 1px solid #e3e3e3;">
    @elseif  ($lastdht->humidity  > 20 and  $lastdht->humidity  < 50)      
    <div class="card card-tale" style=" background: linear-gradient(to right,#7DA0FA 30%, #F5F7FF 30%); border: 1px solid #e3e3e3;">
    @elseif  ($lastdht->humidity  > 50 and  $lastdht->humidity  < 70)      
    <div class="card card-tale" style=" background: linear-gradient(to right,#7DA0FA 50%, #F5F7FF 50%); border: 1px solid #e3e3e3;">
    @elseif  ($lastdht->humidity  > 70 and  $lastdht->humidity  < 90)      
    <div class="card card-tale" style=" background: linear-gradient(to right,#7DA0FA 70%, #F5F7FF 70%); border: 1px solid #e3e3e3;">
    @elseif  ($lastdht->humidity  > 90 and  $lastdht->humidity  < 100)      
    <div class="card card-tale" style=" background: linear-gradient(to right,#7DA0FA 90%, #F5F7FF 90%); border: 1px solid #e3e3e3;">
    @elseif  ($lastdht->humidity  == 100 )      
    <div class="card card-tale" style=" background: linear-gradient(to right,#7DA0FA 100%, #F5F7FF 100%); border: 1px solid #e3e3e3;">
    @endif




                     <div class="card-body" style="color:#030303 ;">
                      <b  style ="font-size:15px;color: #F5F7FF;"> WATER</b>
                    <p class="fs-30 mb-2" >@if ($lastdht){{$lastdht->humidity}} @endif %</p>
                    <b  style ="font-size:15px; ">Dispenser 70%</b>
                    <p >Previous Refill : 16:02:00	</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body" style="color:#030303 ;">
                      <b  style ="font-size:15px;color: #F5F7FF;"> LIGHT</b><BR></BR>
                      @if ($lastdht->id == 1)
                      <label style="color: white;margin-left:5%;font-size: 30px;">
                        ON
                      </label>
                      @elseif ($lastdht->id == 2)
                      <label style="color: Red;margin-left:5%;font-size: 30px;">
                        OFF
                      </label>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body" style="color:#030303 ;">
                      <b  style ="font-size:15px;color: #F5F7FF;"> FAN</b><BR></BR>
                      @if ($lastdht->id == 1)
                      <label style="color: white;margin-left:5%;font-size: 30px;">
                        ON
                      </label>
                      @elseif ($lastdht->id == 2)
                      <label style="color: Red;margin-left:5%;font-size: 30px;">
                        OFF
                      </label>
                      @endif
                    </div>
                   
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body" style="color:#030303 ;">
                      <b  style ="font-size:15px;color: #F5F7FF;"> HEATER</b><BR></BR>
                      @if ($lastdht->id == 1)
                      <label style="color: white;margin-left:5%;font-size: 30px;">
                        ON
                      </label>
                      @elseif ($lastdht->id == 2)
                      <label style="color: Black;margin-left:5%;font-size: 30px;">
                        OFF
                      </label>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>


        <!-- <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Water Main fghjklfgvbhnjmTank Level</p>
                            <p class="fs-30 mb-2">{{ $waterlevel }}%</p>
                            <p>{{ $refills ?? 0 }} refills today</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Feeding Times Today</p>
                            <p class="fs-30 mb-2">{{ $feedingcounts }}</p>
                            <p>{{ $feedingdone }} done today</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Number of Meetings</p>
                            <p class="fs-30 mb-2">34040</p>
                            <p>2.00% (30 days)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Number of Clients</p>
                            <p class="fs-30 mb-2">47033</p>
                            <p>0.22% (30 days)</p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div> -->
    </div>

    <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
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
            </div>
            <div class="col-md-6 grid-margin stretch-card">
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
            </div>
          </div>
         

          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Sensor Readings</p>
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Temperature</th>
                          <th>Humidity</th>
                        </tr>  
                      </thead>
                      
                  
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Feeding Time Management</h4>
									<div class="list-wrapper pt-2">
										<ul class="d-flex flex-column-reverse todo-list todo-list-custom">
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														16:05:00	0.10	Thu
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														16:05:00	0.10	Thu
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
                      <li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														16:05:00	0.10	Thu
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
                      <li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														16:05:00	0.10	Thu
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
												
										</ul>
                  </div>
                  <div class="add-items d-flex mb-0 mt-2">
										<input type="text" class="form-control todo-list-input"  placeholder="Add new task">
										<button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
									</div>
								</div>
							</div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Manure Dryier</p>
                  <div class="table-responsive">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th class="pl-0  pb-2 border-bottom">Date</th>
                          <th class="border-bottom pb-2">Time</th>
                          <th class="border-bottom pb-2">Duration</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="pl-0">2022-12-22</td>
                          <td class="text-muted">09:26:36</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">36</span></p></td>
                         
                        </tr>
                        <tr>
                          <td class="pl-0">2022-12-22</td>
                          <td class="text-muted">09:26:36</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">36</span></p></td>
                            </tr>
                        <tr>
                          <td class="pl-0">2022-12-22</td>
                          <td class="text-muted">09:26:36</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">36</span></p></td>
                            </tr>
                        <tr>
                          <td class="pl-0">2022-12-22</td>
                          <td class="text-muted">09:26:36</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">36</span></p></td>
                           </tr>
                        <tr>
                          <td class="pl-0">2022-12-22</td>
                          <td class="text-muted">09:26:36</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">36</span></p></td>
                            </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="row">
               
                <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                  <div class="card data-icon-card-primary">
                    <div class="card-body">
                      <p class="card-title text-white">SMS Configurations</p>                      
                      <div class="row">
                        <div class="col-8 text-white">
                          <h3>Using semaphore SMS API</h3>

                          <p class="text-white font-weight-500 mb-0">SEMAPHORE API KEY : f350f43d2731014a8a9df49cb16a7d98
                          </p>
                          <h4>09955713188</h4>
                        </div>
                        <div class="col-4 background-icon">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>




   
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            if ($("#order-chart").length) {
      var areaData = {
        labels: ['sda','dsad','label4','label5'],
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
              stepSize: 200,
              min: 200,
              max: 1200,
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
