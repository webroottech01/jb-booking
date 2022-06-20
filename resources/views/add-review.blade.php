@extends('layouts.master')
@section('content')
<style>
   .rating {
        display: inline-block;
        position: relative;
        height: 50px;
        line-height: 50px;
        font-size: 35px;
    }

    .rating label {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        cursor: pointer;
    }

    .rating label:last-child {
        position: static;
    }

    .rating label:nth-child(1) {
        z-index: 5;
    }

    .rating label:nth-child(2) {
        z-index: 4;
    }

    .rating label:nth-child(3) {
    z-index: 3;
    }

    .rating label:nth-child(4) {
        z-index: 2;
    }

    .rating label:nth-child(5) {
        z-index: 1;
    }

    .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .rating label .icon {
        float: left;
        color: transparent;
    }

    .rating label:last-child .icon {
        color: #000;
    }

    .rating:not(:hover) label input:checked ~ .icon,
    .rating:hover label:hover input ~ .icon {
        color: #ff671e;
    }

    .rating label input:focus:not(:checked) ~ .icon:last-child {
        color: #000;
        text-shadow: 0 0 5px #ff671e;
    }

</style>
    <div class="container">
        <div class="card-body pb-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="list-img">
                        <img src="https://hostdev2.justboardrooms.com/Images/{{ $listing['picture'] }}"
                            alt="" height="160" width="220;" class="rounded-3" />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="list-dtl">
                        <p><b>{{ $listing['name'] }}</b></p>
                        <p class="quen">{{ $listing['address']['formatted_address'] }}</p><br/>
                        <p>July 22, 2021</p>
                        <p>9:00 AM - 5:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="review-details mt-4">
                <form action="" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <p><b>Overall Rating</b></p>
                        <div class="rating">
                            <label>
                                <input type="radio" class="star-radio" name="stars" value="1" {{ ($review != '') ? ($review['review_stars'] == 1 ? 'checked' : '') : '' }} />
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" class="star-radio" name="stars" value="2" {{ ($review != '') ? ($review['review_stars'] == 2 ? 'checked' : '') : '' }} />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" class="star-radio" name="stars" value="3" {{ ($review != '') ? ($review['review_stars'] == 3 ? 'checked' : '') : '' }} />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>   
                            </label>
                            <label>
                                <input type="radio" class="star-radio" name="stars" value="4" {{ ($review != '') ? ($review['review_stars'] == 4 ? 'checked' : '') : '' }}/>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" class="star-radio" name="stars" value="5" {{ ($review != '') ? ($review['review_stars'] == 5 ? 'checked' : '') : '' }}/>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                        </div>
                    </div><br/>
                    <div class="form-group mb-2">
                        <p><b>Add a headline</b></p>
                        <textarea name="headline" class="form-control" id="" cols="30" rows="3">{{ ($review != '') ? $review['headline'] : '' }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <p><b>Write your review</b></p>
                        <textarea name="review" id="" class="form-control" cols="30" rows="5">{{ ($review != '') ? $review['review'] : '' }}</textarea>
                    </div>
                    <input type="hidden" id="review-stars" name="reviewStars" value="{{ ($review != '') ? $review['review_stars'] : 0 }}">
                    <button class="btn btn-secondary">Submit</button>
                </form>
            </div>
        </div>
    </div>
<script>
    $('.star-radio:radio').change(function() {
        $('#review-stars').val(this.value);
    });
</script>
@endsection