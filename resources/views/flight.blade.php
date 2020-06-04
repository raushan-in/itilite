@extends('layouts.app')

@section('content')

<div class="row">
  <div class="left-column">
    <h4 style="color:orange;">Update Itinerary</h3>
  <div class="p-3"> Maximum Stops </div>
        <div class="btn-group">
          <button type="button" class="btn" onclick="getFlight(0)">Non Stop</button>
          <button type="button" class="btn" onclick="getFlight(1)">Upto 1 stop</button>
          <button type="button" class="btn" onclick="getFlight(2)">Upto 2+ stops</button>
        </div>
  </div>
  <div class="main-column">
  <!-- flight list goes here -->
  </div>
</div>



<script>

  const getFlight = (stop) => {
    showloader();
    $.ajax({
        url: "{{ route('flight-list') }}",
        dataType: "JSON",
        success: function(flightdata) {
            if (flightdata.length) {
             displayFlight(flightdata, stop);
            }
        },
        error: function(jq,status,message) {
        alert('A jQuery error has occurred. Status: ' + status + ' - Message: ' + message);
    }
    });
  }

  const renderFlight = (flight_from, flight) => {
    let [dep_date, dep_time] = getDateTime(flight['departure_date_time']);
    let [arr_date, arr_time] = getDateTime(flight['arrival_date_time']);
    let cc = flight_from['policy']['cancellation_policy']['amount']
    let cancellation_charge = cc != undefined ? cc : 0;
    
               $(".main-column").append(
                 `
                 <div class="card m-3">
                  <div>

                  <div class="flight-deatil flight">
                    <div class="flight-name">${flight['carrier_name']}</div>
                    <div class="flight-id tiny">${flight['carrier_id']}</div>
                    <div class="flight-id tiny">${flight_from['class']}</div>
                    <div class="flight-id tiny">${flight_from['refund_status']}</div>
                  </div>

                  <div class="flight-departure flight">
                    <div class="depart-time">${dep_time}</div>
                    <div class="depart-city tiny">${flight['from']}</div>
                    <div class="flight-date tiny">${dep_date}</div>
                  </div>

                  <div class="flight-beggage flight">
                    <div class="duration tiny">${timeConvert(flight['flight_duration'])}</div>
                    <div class="stops"><hr></div>
                  </div>

                  <div class="flight-arrival flight">
                    <div class="arrival-time">${arr_time}</div>
                    <div class="arrival-city tiny">${flight['to']}</div>
                    <div class="arrival-date tiny">${arr_date}</div>
                  </div>

                  <div class="flight-price flight">
                    <div class="price">${flight_from['sale_price']} INR</div>
                    <div class="policy" title="cancellation charge: ${cancellation_charge}">Outside Policy</div>
                  </div>

                  </div>
                </div>
                 `
               )
            }

    const displayFlight= (flightdata, stop) =>{
      $(".main-column").empty();

      flightdata.forEach( flight_from =>{
        flights = flight_from['flights'];
        flights.forEach(flight =>{
          let via = flight['via']
          if (stop == 0 && via.length == stop){
                renderFlight(flight_from, flight);
          }else if(stop == 1 && via.length <= stop){
                renderFlight(flight_from, flight);
          }else{
                 renderFlight(flight_from, flight);
          }
        })
      }
    )
    } 
</script>

@endsection