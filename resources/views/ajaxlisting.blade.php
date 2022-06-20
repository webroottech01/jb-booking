<div class="container-fluid px-0">
<div class="homerow">
    <div class="row mx-auto">
        <div class="col-xl-2 col-lg-1 d-none d-md-block">
        </div>
        <div class="col-xl-6 col-lg-7 col-md-12">
            <div class="slideproducts">
                <div class="row mb-4">
                    <div class="col-md-7 col-sm-7">
                        <h2>Top-rated around you</h2>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="filterselect d-flex justify-content-end">
                            <p>Filter:</p>
                            <select class="form-select" id="filter" onchange="getlisting();" aria-label="Default select example">
                                <option value="1" {{$filterValue == 1 ? 'selected' : ''}}>Nearest You</option>
								<option value="5" {{$filterValue == 5 ? 'selected' : ''}}>Highest Rated</option>
                                <option value="2" {{$filterValue == 2 ? 'selected' : ''}}>Price - Low to High</option>
                                <option value="3" {{$filterValue == 3 ? 'selected' : ''}}>Price - High to Low</option>
                            </select>
                        </div>
                    </div>
                </div>
                 {{-- dd($listings) --}} 
                <div class="cardslider flex-wrap" id="mainslid">
                    @foreach ($listings as $boardroom)
                        <a style="text-decoration: none;"
                            href="{{ url('listing-details/' . $boardroom['id']) }}">
                            <div class="col-md-4 col-sm-5 mx-2 py-3 line-content">
                                <div class="card">
                                    <div id="carouselExampleIndicators{{$loop->index}}" class="carousel slide" data-bs-interval="0"  data-bs-ride="carousel">
                                        <!-- <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators{{$loop->index}}"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators{{$loop->index}}"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators{{$loop->index}}"
                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div> -->
                                        <div class="carousel-inner" style="height: 10rem">

                                            @php $key = 0;@endphp

                                            @foreach ($boardroom['listing_gallery'] as $images)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <img src='https://hostdev2.justboardrooms.com/Images/{{$images['picture_name']}}'>
                                                    
                                                </div>
                                                @php $key++;@endphp
                                            @endforeach
                                        </div>
                                        @if(count($boardroom['listing_gallery']) > 1)
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleIndicators{{$loop->index}}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleIndicators{{$loop->index}}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        @endif
                                        @if($boardroom['half_day_discount'] == 1 || $boardroom['full_day_discount'] == 1)
                                            <a class="discavl">DISCOUNT AVAILABLE</a>
                                        @endif
                                        <a class="rdybook">{{($boardroom['listing_type'] == 1)? 'REQUEST':'READY'}} TO BOOK</a>
                                       <a class="pprpln"><i class="fa fa-paper-plane-o"
                                                aria-hidden="true"></i>&nbsp;{{ round($boardroom['distance'],1) }}km</a>
                                                <a id="likes" onclick="fakeSave('{{$boardroom['id']}}')" class="likes tolikes{{$boardroom['id']}}">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>  

                                    </div>
                                    <a class="text-decoration-none" href="{{ '/booking/public/listing-details/' . $boardroom['id'] }}">
                                        <div class="card-body" style="font-family: 'Myriad Pro Semibold';">
                                            <h5 class="card-title">{{ $boardroom['name'] }}</h5>
                                            <p class="card-text">${{ $boardroom['price_per_hour'] }}/Hr &emsp;
                                                ${{ $boardroom['price_per_day'] }}/Day</p>
                                            <?php 
                                               $address = $boardroom['address']['formatted_address'];
                                               $addressArr = explode(',',$address);
                                               $bedromm1 = isset($addressArr[0])?$addressArr[0]:'';
                                               $bedromm2 = isset($addressArr[1])?$addressArr[1]:'';
                                               $bedromm3 = isset($addressArr[2])?$addressArr[2]:'';
                                               $bedromm4 = isset($addressArr[3])?$addressArr[3]:'';
                                            
                                            ?>
                                            <h5 class="card-title"> {{ $bedromm1 }}, <br> {{ $bedromm2 }},  {{ $bedromm3 }},  {{ $bedromm4 }}</h5>


                                            <ul class="fivestars m-0 p-0">
                                                @php 
                                                    $reviews = $boardroom['reviews_avg_review_stars'];
                                                    if($reviews == ''){
                                                        $reviews = 0 ;
                                                    }
                                                @endphp
                                                @for($i = 1; $i <= $reviews; $i++)
                                                    <li><i class="fa fa-star"></i></li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </a> 
                    @endforeach
                </div>
                <ul id="pagin">
         
                </ul>

            </div>
        </div>
        

        <div class="col-xl-4 col-lg-4 col-md-12">
            <div id="map" style="height: 48rem; width:100%;">

            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> -->
<style>
.next{
    display: none;
}
</style>
<?php if(count($listings) > 12){ ?>
<script>
    $(document).ready(function () {
        pageSize = 12;
        incremSlide = 5;
        startPage = 0;
        numberPage = 0;

        var pageCount =  $(".line-content").length / pageSize;
        var totalSlidepPage = Math.floor(pageCount / incremSlide);
            
        for(var i = 0 ; i<pageCount;i++){
            $("#pagin").append('<li><a href="#">'+(i+1)+'</a></li> ');
            if(i>pageSize){
            $("#pagin li").eq(i).hide();
            }
        }

        var prev = $("<li/>").addClass("prev").html("Prev").click(function(){
        startPage-=5;
        incremSlide-=5;
        numberPage--;
        slide();
        });

        prev.hide();

        var next = $("<li/>").addClass("next").html("Next").click(function(){
        startPage+=5;
        incremSlide+=5;
        numberPage++;
        slide();
        });

        $("#pagin").prepend(prev).append(next);

        $("#pagin li").first().find("a").addClass("current");

        slide = function(sens){
        $("#pagin li").hide();
        
        for(t=startPage;t<incremSlide;t++){
            $("#pagin li").eq(t+1).show();
        }
        if(startPage == 0){
            next.show();
            prev.hide();
        }else if(numberPage == totalSlidepPage ){
            next.hide();
            prev.show();
        }else{
            next.show();
            prev.show();
        } 
        
            
        }

        showPage = function(page) {
            $(".line-content").hide();
            $(".line-content").each(function(n) {
                if (n >= pageSize * (page - 1) && n < pageSize * page)
                    $(this).show();
            });        
        }
            
        showPage(1);
        $("#pagin li a").eq(0).addClass("current");

        $("#pagin li a").click(function() {
            $("#pagin li a").removeClass("current");
            $(this).addClass("current");
            showPage(parseInt($(this).text()));
        });

      
});
</script>
<?php } ?>
<script>
    function initMap() {
        var locationArr = @json($locations);
        console.log(locationArr);

        var mainCoords = locationArr[0];
        console.log(mainCoords.lat);

        var mapOptions = {
            center: mainCoords,
            zoom: 9,
        };

        const map = new google.maps.Map(document.getElementById('map'), mapOptions);
        const icon = {
            url: "https://hostdev2.justboardrooms.com/Images/LocationPointer.png", // url
            scaledSize: new google.maps.Size(35, 50), // scaled size
         
        };
        var allMarkers = [];
        for (var i = 0; i < locationArr.length; i++) {
            var myCoords = locationArr[i];

            r = new google.maps.Marker({
                position: myCoords,
                map: map,
                icon:icon,
                url: @json(url('/listing-details'))+'/'+myCoords.listingId,                
            });

            allMarkers.push(r);

            
        }
        allMarkers.map((marker) => {
            marker.addListener("click", () => { window.location.href = marker.url; })
        });
    }

    
    function saveboardroom(listingId,userId) {
        // var wishlist = $('#wishlist').val();
        /* alert(listingId);
        alert(userId);
        return; */
        $.ajax({
            type: 'post',
            url: '{{route("add-wishlist")}}',
            data: {
                listingId: listingId,
                userId: userId,
                _token: '{{csrf_token()}}',

            },
            success: function(response) {
                // console.log(response);
                

            }
        });
    }

    /* $('#likes').click(function() {
        alert('worked')
    }); */
</script>

<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&libraries=places&callback=initMap">
</script>
