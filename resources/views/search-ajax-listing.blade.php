<style>
    p.gotosrchrslt i{
        color: #ff671d;
        font-size: 28px;
        margin-right: 7px;
        position: relative;
        bottom: -3px;
    }

    p.gotosrchrslt a {
        color: #7C7C7C;
        text-decoration: none;
    }
</style>
    <div class="container-fluid px-0">
        <div class="homerow">
            <div class="row mx-auto pb-4">
                <div class="col-lg-2 d-none d-md-block">
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="slideproducts">
                        <div class="row mb-4">
                           
                            <div class="col-md-6 col-sm-6" style="margin-top:2rem;">
                                <p class="gotosrchrslt"><i class="fa fa-angle-left"></i><a href="{{route('homepage')}}">Back<!--Top Rated Around You--></a></p>
                                <h6 class="py-">
                                    {{-- @if(count($listings) > 0 && count($listings) < 1)
                                        {{count($listings)-1}}+ boardrooms found 
                                    @endif --}}

                                    @if(count($listings) == 1)
                                        {{count($listings)}} boardroom found
                                    @endif

                                    @if (count($listings) > 1)
                                        {{count($listings)-1}}+ boardrooms found
                                    @endif

                                    @if(count($listings) == 0)
                                        No boardrooms found
                                    @endif
                                </h6>
                                <h2>Your top results</h2>
                            </div>
                            <div class="col-md-5 col-sm-5" style="margin-top:4rem;padding-right:1.5em;">
                                <div class="filterselect d-flex justify-content-start">
                                  {{--   <p>Filter:</p> --}}
                                    <select class="form-select" id="filter" onchange=" searchlisting();" aria-label="Default select example">
                                        <option value="2" {{$filter == 2 ? 'selected' : ''}} >Price - Low to High</option>
										<option value="5" {{$filter == 5 ? 'selected' : ''}} >Highest Rated</option>
                                        <option value="3" {{$filter == 3 ? 'selected' : ''}}>Price - High to Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="cardslider flex-wrap">
                            @foreach ($listings as $boardroom)
                                
                                    <div class="col-md-5 col-sm-5 col-11 mx-2 py-3 div-content">
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
                                                <a style="text-decoration: none;" href="{{ url('listing-details/' . $boardroom['id']) }}">
                                                <div class="carousel-inner" style="height: 10rem">

                                                    @php $key = 0;@endphp

                                                    @foreach ($boardroom['pictures'] as $images)
                                                        <div  class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                            <img src='https://hostdev2.justboardrooms.com/Images/{{ $images['picture_name'] }}'>

                                                        </div>
                                                        @php $key++;@endphp
                                                    @endforeach
                                                </div>
                                                </a>
                                                @if(count($boardroom['pictures']) > 1)
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
                                                <a class="rdybook">{{ $boardroom['listing_type'] == 1 ? 'REQUEST' : 'READY' }}
                                                    TO BOOK</a>
                                                 <a class="pprpln"><i class="fa fa-paper-plane-o"
                                                        aria-hidden="true"></i>&nbsp;{{round($boardroom['distance'],1)}}</a>
                                                <!-- <a id="likes"
                                                    onclick="saveboardroom('{{ $boardroom['id'] }}','{{ Session::get('userId') }}')"
                                                    class="likes"><i class="fa fa-heart"
                                                        aria-hidden="true"></i></a> -->
                                                <a id="likes" onclick="fakeSave('{{$boardroom['id']}}')" class="likes tolikes{{$boardroom['id']}}">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>  

                                            </div>
                                            <a class="text-decoration-none" href="{{ url('listing-details/' . $boardroom['id']) }}">
                                                <div class="card-body" style="font-family: 'Myriad Pro Semibold';">
                                                    <h5 class="card-title">{{ $boardroom['name'] }}</h5>
                                                    <p class="card-text">${{ $boardroom['price_per_hour'] }}/Hr
                                                        &emsp;
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
                                                        @foreach ($boardroom['reviews'] as $item)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @endforeach
                                                        
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                
                            @endforeach
                        </div>
                        <ul id="pagin">
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 ps-2 pt-5 pb-4">
                    <div id="map" style="width: 100%;height: 48rem;">

                    </div>
                </div>
            </div>
        </div>
    </div>
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

        var pageCount =  $(".div-content").length / pageSize;
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
            $(".div-content").hide();
            $(".div-content").each(function(n) {
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
        
        var mainCoords = locationArr[0];

        var mapOptions = {
            center: mainCoords,
            zoom: 9
        };

        const map = new google.maps.Map(document.getElementById('map'), mapOptions);
        const icon = {
            url: "https://hostdev2.justboardrooms.com/Images/LocationPointer.png", // url
            scaledSize: new google.maps.Size(35, 50), // scaled size
         
        };
        var allMarkers = [];
        for (var i = 0; i < locationArr.length; i++) {
            var myCoords = locationArr[i];

            var r = new google.maps.Marker({
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
    function fakeSave(bid,oClass = false){
            currEl = $('.tolikes'+bid).children('i');
            if(currEl.hasClass('active')){
                if(oClass == true){
                    currEl.removeClass('fa-heart');
                    currEl.addClass('fa-heart-o');
                }
                currEl.removeClass('active');
            }else{
                if(oClass == true){
                    currEl.removeClass('fa-heart-o');
                    currEl.addClass('fa-heart');
                }
                currEl.addClass('active');
            }
    }
    </script>

    
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&libraries=places&callback=initMap">
    </script>

