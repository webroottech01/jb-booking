@extends('layouts.search')
@section('content')
<div id="listing-section"></div>

<script>
        $(document).ready(function () {
            // alert('testing');
            searchlisting();
        });

        function searchlisting() {
           // var startDate = $('#datepickerFrom').val();
            // var endDate = $('#datepickerTo').val();
            var locationSearch = $("#location-search").val();
            // alert(locationSearch);
            var ListingCapacity = $("#listing-room-capacity").val();
            var ListingPriceRange = $("#listing-price-range").val();
            var ListingAmeneties = $("#listing-amenities").val();
         
            //var checkIn = $("#check_in").val();
            //var checkOut = $("#check_out").val();


            $.ajax({
                type: 'post',
                
                url: '{{route('getSearchListing')}}',
                data: {
                    _token : '{{csrf_token()}}',
                    ListingLocation: locationSearch,
                    ListingCapacity: ListingCapacity,
                    ListingPriceRange: ListingPriceRange,
                    ListingAmeneties: ListingAmeneties,
                    filter :$('#filter').val()
                },
                success: function(response) {
                    // alert(response);
                     $("#listing-section").html(response);
                }
            });
        }
   

      
</script>

@endsection
        
