@extends('layouts.app')

@section('content')

<div class="row">
  <div class="left-column">
    <h4 style="color:orange;">Update Itinerary</h3>
  <div class="p-3"> Hotel Providers </div>
        <div class="btn-group">
        @foreach ($sources as $source)
        <button type="button" class="btn" onclick="getHotel('{{$source}}')"> {{ $source }}</button>
        @endforeach
        </div>
  </div>
  <div class="main-column">
  <!-- Hotel list goes here -->
  </div>
</div>



<script>

  const getHotel = (source) => {
    showloader();
    $.ajax({
        url: "{{ route('hotel-by-source') }}",
        dataType: "JSON",
        data:{
            source: source,
        },
        success: function(hoteldata) {
            if (hoteldata.length) {
                renderHotel(hoteldata);
            }
        },
        error: function(jq,status,message) {
        alert('A jQuery error has occurred. Status: ' + status + ' - Message: ' + message);
    }
    });
  }

  const renderHotel = (hotels) => {
      $(".main-column").empty();
    
      hotels.forEach(hotel => {
          info = hotel['info'][0];
          star = getStar(info['customerRating']['rating']);
          $(".main-column").append(
                 `
                 <div class="card m-3">
                  <div>

                  <div class="hotel">
                    <div class="hotel-name">${info['name']}</div>
                    <div class="hotel-id tiny">${info['hotelId']}</div>
                    <div class="tiny">${hotel['address']}</div>
                  </div>

                  <div class="hotel-price hotel">
                    <div class="price">${info['price']['finalPriceWithTaxes']} INR</div>
                    <div class="rating">${star}</div>
                  </div>

                  </div>
                </div>
                 `
               )
       })
    }

</script>

@endsection