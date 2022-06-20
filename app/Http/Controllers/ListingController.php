<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Listing;
use App\Models\Booking;
use App\Models\Address;
use App\Models\ListingGallery;
use App\Models\ListingCapacity;
use App\Models\Amenity;
use App\Models\HostingRule;
use App\Models\ListingCalender;
use Illuminate\Support\Facades\Http;


class ListingController extends Controller
{
    public function index(){
        $data = ' {
            "data": [{
                    "id": 30,
                    "user_id": 3,
                    "name": "Hudson",
                    "description": "Temporibus voluptate officia repudiandae duis",
                    "picture": null,
                    "price_per_hour": 400,
                    "per_hour_rate": null,
                    "price_per_day": null,
                    "per_day_rate": null,
                    "review_stars": null,
                    "listing_capacity_id": 1,
                    "status": 1,
                    "half_day_discount": null,
                    "half_discount_rate": null,
                    "full_day_discount": null,
                    "full_discount_rate": null,
                    "hst_check": null,
                    "sale_tax": null,
                    "full_day_start_time": null,
                    "full_day_end_time": null,
                    "min_hour": "3hour",
                    "advance_notice": null,
                    "hosting_instruction": null,
                    "cleaning_fee": null,
                    "cleaning_fee_percent": null,
                    "step": 2,
                    "sync_token": null,
                    "is_first_listing": null,
                    "currency": null,
                    "listing_type": null,
                    "address_id": 28,
                    "created_at": "2022-03-30T12:47:11.000000Z",
                    "updated_at": "2022-03-30T12:47:22.000000Z",
                    "capacityNEW": {
                        "id": 1,
                        "icon": "",
                        "description": "5",
                        "min_people": 1,
                        "max_people": 5,
                        "created_at": null,
                        "updated_at": null
                    },
                    "address": {
                        "id": 28,
                        "listing_id": 30,
                        "formatted_address": "Cannada",
                        "postal_code": null,
                        "lat": "23.259933",
                        "lng": "77.412613",
                        "building_name": "Jhon",
                        "intersection_a": null,
                        "intersection_b": null,
                        "address": "Cannada",
                        "city": "Cannada",
                        "province": "Cannada",
                        "created_at": "2022-03-30T12:47:11.000000Z",
                        "updated_at": "2022-03-30T12:47:11.000000Z"
                    },
                    "listing_gallery": [{
                        "id": 21,
                        "listing_id": 30,
                        "picture_name": "austin-distel.jpg",
                        "preview_img": 1,
                        "picture": "imgpsh_fullsize_anim.785.png",
                        "picture_path": "C:\\xampp\\htdocs\\justboardrooms\\public/Images/",
                        "mobile_path": "C:\\xampp\\htdocs\\justboardrooms\\public/Images/",
                        "size": null,
                        "order": 0,
                        "created_at": "2022-03-23T11:22:35.000000Z",
                        "updated_at": "2022-03-23T11:22:35.000000Z"
                    }],
                    "listing_amenities": [{
                            "id": 2,
                            "name": "Air Conditioning",
                            "icon": "AC.png",
                            "description": "",
                            "icon_1": "air_conditioning",
                            "type": "building",
                            "created_at": null,
                            "updated_at": null,
                            "pivot": {
                                "listing_id": 30,
                                "amenity_id": 2
                            }
                        },
                        {
                            "id": 3,
                            "name": "Breakout Space",
                            "icon": "Breakout.png",
                            "description": "",
                            "icon_1": "Breakout",
                            "type": "boardroom",
                            "created_at": null,
                            "updated_at": null,
                            "pivot": {
                                "listing_id": 30,
                                "amenity_id": 3
                            }
                        },
                        {
                            "id": 5,
                            "name": "Reception",
                            "icon": "Reception.png",
                            "description": "",
                            "icon_1": "Reception",
                            "type": "building",
                            "created_at": null,
                            "updated_at": null,
                            "pivot": {
                                "listing_id": 30,
                                "amenity_id": 5
                            }
                        },
                        {
                            "id": 8,
                            "name": "Washroom",
                            "icon": "Washroom-icon.png",
                            "description": "",
                            "icon_1": "washroom",
                            "type": "building",
                            "created_at": null,
                            "updated_at": null,
                            "pivot": {
                                "listing_id": 30,
                                "amenity_id": 8
                            }
                        },
                        {
                            "id": 1,
                            "name": "Accessibility Friendly",
                            "icon": "Accessible.png",
                            "description": "",
                            "icon_1": "Accessible",
                            "type": "boardroom",
                            "created_at": null,
                            "updated_at": null,
                            "pivot": {
                                "listing_id": 30,
                                "amenity_id": 1
                            }
                        },
                        {
                            "id": 6,
                            "name": "Teleconference",
                            "icon": "Teleconference.png",
                            "description": "",
                            "icon_1": "Teleconference",
                            "type": "technology",
                            "created_at": null,
                            "updated_at": null,
                            "pivot": {
                                "listing_id": 30,
                                "amenity_id": 6
                            }
                        }
                    ],
                    "listing_capacity": {
                        "id": 1,
                        "icon": "",
                        "description": "5",
                        "min_people": 1,
                        "max_people": 5,
                        "created_at": null,
                        "updated_at": null
                    },
                    "pictures": [{
                        "id": 21,
                        "listing_id": 30,
                        "picture_name": "austin-distel.jpg",
                        "preview_img": 1,
                        "picture": "imgpsh_fullsize_anim.785.png",
                        "picture_path": "C:\\xampp\\htdocs\\justboardrooms\\public/Images/",
                        "mobile_path": "C:\\xampp\\htdocs\\justboardrooms\\public/Images/",
                        "size": null,
                        "order": 0,
                        "created_at": "2022-03-23T11:22:35.000000Z",
                        "updated_at": "2022-03-23T11:22:35.000000Z"
                    }]
                },
                {
                    "id": 31,
                    "user_id": 3,
                    "name": "Clara",
                    "description": "Temporibus voluptate officia repudiandae duis",
                    "picture": "austin-distel.jpg",
                    "price_per_hour": 200,
                    "per_hour_rate": null,
                    "price_per_day": null,
                    "per_day_rate": null,
                    "review_stars": null,
                    "listing_capacity_id": 1,
                    "status": 1,
                    "half_day_discount": null,
                    "half_discount_rate": null,
                    "full_day_discount": null,
                    "full_discount_rate": null,
                    "hst_check": null,
                    "sale_tax": null,
                    "full_day_start_time": null,
                    "full_day_end_time": null,
                    "min_hour": "1hour",
                    "advance_notice": null,
                    "hosting_instruction": null,
                    "cleaning_fee": null,
                    "cleaning_fee_percent": null,
                    "step": 2,
                    "sync_token": null,
                    "is_first_listing": null,
                    "currency": null,
                    "listing_type": null,
                    "address_id": 29,
                    "created_at": "2022-03-30T12:47:11.000000Z",
                    "updated_at": "2022-03-30T12:47:22.000000Z",
                    "capacityNEW": {
                        "id": 1,
                        "icon": "",
                        "description": "5",
                        "min_people": 1,
                        "max_people": 5,
                        "created_at": null,
                        "updated_at": null
                    },
                    "address": {
                        "id": 29,
                        "listing_id": 31,
                        "formatted_address": "Canada",
                        "postal_code": null,
                        "lat": "56.130366",
                        "lng": "-106.346771",
                        "building_name": "Jhon",
                        "intersection_a": null,
                        "intersection_b": null,
                        "address": "Cannada",
                        "city": "Canada",
                        "province": "Canada",
                        "created_at": "2022-03-30T12:47:11.000000Z",
                        "updated_at": "2022-03-30T12:47:11.000000Z"
                    },
                    "listing_gallery": [{
                        "id": 22,
                        "listing_id": 31,
                        "picture_name": "austin-distel.jpg",
                        "preview_img": 1,
                        "picture": "imgpsh_fullsize_anim (1).463.png",
                        "picture_path": "C:\\xampp\\htdocs\\justboardrooms\\public/Images/",
                        "mobile_path": "C:\\xampp\\htdocs\\justboardrooms\\public/Images/",
                        "size": null,
                        "order": 0,
                        "created_at": "2022-03-23T13:11:16.000000Z",
                        "updated_at": "2022-03-23T13:11:16.000000Z"
                    }],
                    "listing_amenities": [],
                    "listing_capacity": {
                        "id": 1,
                        "icon": "",
                        "description": "5",
                        "min_people": 1,
                        "max_people": 5,
                        "created_at": null,
                        "updated_at": null
                    },
                    "pictures": [{
                        "id": 22,
                        "listing_id": 31,
                        "picture_name": "austin-distel.jpg",
                        "preview_img": 1,
                        "picture": "imgpsh_fullsize_anim (1).463.png",
                        "picture_path": "C:\\xampp\\htdocs\\justboardrooms\\public/Images/",
                        "mobile_path": "C:\\xampp\\htdocs\\justboardrooms\\public/Images/",
                        "size": null,
                        "order": 0,
                        "created_at": "2022-03-23T13:11:16.000000Z",
                        "updated_at": "2022-03-23T13:11:16.000000Z"
                    }]
                }
            ],
            "address": [{
                    "lat": 23.259933,
                    "lng": 77.412613
                },
                {
                    "lat": 56.130366,
                    "lng": -106.346771
                }
            ]
        }';

        $listing = json_decode(stripslashes($data),true);
       // dd($listing);

      
        return view('homepage',compact('listing') );  
    }

  

    public function getlisting(Request $request){
        $filterValue = $request->filter ?? 1;
        // dd($request,'from booking');
        $response = Http::post('https://hostdev2.justboardrooms.com/api/getlisting',['request'=>$request,'userId'=>Session::get('userId'), 'filtervalue'=>$filterValue])->json();
        // dd($response);
        $listings = $response['listings'];
        $locations = $response['locations'];

        Session::forget('isFullDay');
        // $locations = $request->locations;
        // dd($data); 
        
        
        
        // $jsonData = $response->json();

        Session::put('startdate', $request->input("startDate"));
        Session::get('startdate');
        Session::put('enddate', $request->input("endDate"));
        Session::put('time', $request->input("checkIn"));
        Session::put('timeout', $request->input("checkOut"));
        Session::put('checkInShow', $request->input("checkInShow"));
        Session::put('checkOutShow', $request->input("checkOutShow"));
       

  
        return view('ajaxlisting' ,compact('listings','locations','filterValue'))->render();

    }

    /* public function filterListing(Request $request){

        // dd($request,'from booking');
        $response = Http::post('https://hostdev2.justboardrooms.com/api/getlisting',['request'=>$request,'userId'=>Session::get('userId'),$request->order,$request->for])->json();

        // dd($response['listings']);
        $listings = $response['listings'];
        $locations = $response['locations'];
        // $locations = $request->locations;
        // dd($data);
        
        
        
        // $jsonData = $response->json();

        Session::put('startdate', $request->input("startDate"));
        Session::get('startdate');
        Session::put('enddate', $request->input("endDate"));
        Session::put('time', $request->input("checkIn"));
        Session::put('timeout', $request->input("checkOut"));
        Session::put('checkInShow', $request->input("checkInShow"));
        Session::put('checkOutShow', $request->input("checkOutShow"));
       

  
        return view('ajaxlisting' ,compact('listings','locations'))->render();

    } */

    public function get_listing_details(Request $request, $id)
    {
        $response = Http::get('https://hostdev2.justboardrooms.com/api/listing-details/'.$id.'/'.Session::get('userId'))->json();
        $reviews = Http::get('https://hostdev2.justboardrooms.com/api/getReviews?listing_id='.$id)->json();


        $listing = $response['listing'];
        $other_boardrooms = $response['other_boardrooms'];
        $reviews = $reviews['data'];
        // $reviews = $reviews['count'];
        // dd($listing);
        
        $startDate =  Session::get('startdate')." ".Session::get('time');
        $endDate = Session::get('enddate')." ".Session::get('timeout');
        $price = Session::get('totalPrice');
        // $totalPrice = Session::get('totalPrice');
        $discountPrice = Session::get('discountPrice');
        $calculate_rate = Session::get('calculate_rate');
        $hourdiff = round((strtotime($endDate) - strtotime($startDate))/3600, 1);
      
        /* $price_per_hours = $listing['price_per_hour'];
        $calculate_rate =  $price_per_hours * $hourdiff;
        $discountPrice = ($calculate_rate * $listing['full_day_discount'])/100 ;
        $totalPrice =  $calculate_rate - $discountPrice ; */
//    dd($price);
        // $price =  Session::put('totalPrice', $totalPrice);
        return view('listing_details' ,compact('listing', 'other_boardrooms', 'discountPrice','calculate_rate','hourdiff', 'startDate','reviews','price'));  
    }

    public function payment(Request $request){

        
        $response = Http::get('https://hostdev2.justboardrooms.com/api/listing-details/'.$request->listingId.'/'.Session::get('userId'))->json();

        $startDate =  Session::get('startdate')." ".Session::get('time');
        $endDate = Session::get('enddate')." ".Session::get('timeout');

        $hourdiff = round((strtotime($endDate) - strtotime($startDate))/3600, 1);

        $listing = $response['listing'];
        
        return view('payment' ,compact('request','listing','hourdiff'));  
    
        
    }

    public function paymentDeduct(Request $request){
        $data = $request->except('_token');
        $response = Http::post('https://hostdev2.justboardrooms.com/api/payment',$data)->json();
        //dd($response);
        $listingDetails = $response['listingdetails'];
        $bookingdetails = $response['bookingdetails'];

        return view('msg' ,compact('bookingdetails','listingDetails'));
    }


    public function wishlist(){
        $data = ' {
            "data": [{   
                    "id": 1,
                    "listing_id": 30,
                    "user_id": 3,
                    "created_at": null,
                    "updated_at": null,
                    "user": {
                    "id": 3,
                    "first_name": "Snehal",
                    "last_name": "raj",
                    "email": "admin@admin.com",
                    "email_verified_at": null,
                    "created_at": "2022-03-28T10:07:56.000000Z",
                    "updated_at": "2022-03-28T10:07:56.000000Z"
                    },
                    "listing": {
                    "id": 30,
                    "user_id": 3,
                    "name": "Hudson",
                    "description": "Temporibus voluptate officia repudiandae duis",
                    "picture": null,
                    "price_per_hour": 400,
                    "per_hour_rate": null,
                    "price_per_day": null,
                    "per_day_rate": null,
                    "review_stars": null,
                    "listing_capacity_id": 1,
                    "status": 1,
                    "half_day_discount": null,
                    "half_discount_rate": null,
                    "full_day_discount": null,
                    "full_discount_rate": null,
                    "hst_check": null,
                    "sale_tax": null,
                    "full_day_start_time": null,
                    "full_day_end_time": null,
                    "min_hour": "3hour",
                    "advance_notice": null,
                    "hosting_instruction": null,
                    "cleaning_fee": null,
                    "cleaning_fee_percent": null,
                    "step": 2,
                    "sync_token": null,
                    "is_first_listing": null,
                    "currency": null,
                    "listing_type": null,
                    "address_id": 28,
                    "created_at": "2022-03-30T12:47:11.000000Z",
                    "updated_at": "2022-03-30T12:47:22.000000Z"
                    }
                    ]
                }';
            
                $listing = json_decode(stripslashes($data),true);
                //dd($listing);
            
        return view('wishlist', compact('listing'));
    }

    public function addToWishlist(Request $request){
        $response = Http::post('https://hostdev2.justboardrooms.com/api/addToWishlist',$request->except('_token'))->body();
        return $response;
        // dd($response);
    }

    public function searchlistings(Request $request){
        // dd($request);
        // ($request->filter == 0)?$request->filter =2:$request->filter
        $response = Http::post('https://hostdev2.justboardrooms.com/api/searchlisting',$request->except('_token'))->json();
        // dd($response);
        // echo"<pre>";print_r($response);die;
        $listings = $response['listings'];
        $locations = $response['locations'];
       
       
        return view('search-listing',compact('listings','locations'));

    }

    public function getSearchListing(Request $request){
        $filter = $request->filter ?? 0;
        // dd($filter);
        $response = Http::post('https://hostdev2.justboardrooms.com/api/searchlisting',$request->except('_token'))->json();
        // echo"<pre>";print_r($response);die;
        $listings = $response['listings'];
        $locations = $response['locations'];
       
        return view('search-ajax-listing' ,compact('listings','locations','filter'))->render();

    }


    public function saved_boardroom(Request $request){
        
      /*   return response()->json([
            'save' => "Wishlist added",
        
    
            ], 200); */
            $listings = [
                0 => [
                    "id" => 11,
                    "user_id" => 7,
                    "name" => "Astra Ball",
                    "description" => "Eaque eius occaecat tempor et et qui est accusantium quo natus proident quasi est quis cupidatat ipsa consequatur",
                    "picture" => "download.181.jpg",
                    "price_per_hour" => 13,
                    "per_hour_rate" => "13",
                    "price_per_day" => 104,
                    "per_day_rate" => "104",
                    "review_stars" => null,
                    "listing_capacity_id" => 2,
                    "status" => 2,
                    "half_day_discount" => 1,
                    "half_discount_rate" => 12,
                    "full_day_discount" => 0,
                    "full_discount_rate" => 0,
                    "hst_check" => 0,
                    "sale_tax" => 0,
                    "full_day_start_time" => null,
                    "full_day_end_time" => null,
                    "min_hour" => "4",
                    "advance_notice" => "12",
                    "hosting_instruction" => "Temporibus quia fugit quam natus",
                    "cleaning_fee" => null,
                    "cleaning_fee_percent" => null,
                    "step" => 6,
                    "sync_token" => null,
                    "is_first_listing" => 1,
                    "currency" => "CAD",
                    "listing_type" => 1,
                    "address_id" => 11,
                    "created_at" => "2022-05-18T05:15:55.000000Z",
                    "updated_at" => "2022-06-01T13:29:38.000000Z",
                    "listing_gallery" => [
                    0 => [
                        "id" => 51,
                        "listing_id" => 11,
                        "picture_name" => "1072651426.jpg",
                        "preview_img" => 1,
                        "picture" => "download.635.jpg",
                        "picture_path" => "/var/www/vhosts/hostdev2.justboardrooms.com/httpdocs/public/Images/",
                        "mobile_path" => "/var/www/vhosts/hostdev2.justboardrooms.com/httpdocs/public/Images/",
                        "size" => null,
                        "order" => 0,
                        "created_at" => "2022-05-18T05:16:17.000000Z",
                        "updated_at" => "2022-05-18T05:16:17.000000Z",
                    ]
                    ],
                    "listing_amenities" => [
                    0 => [
                        "id" => 2,
                        "name" => "Air Conditioning",
                        "icon" => "Air conditioning.png",
                        "description" => "",
                        "icon_1" => "air_conditioning",
                        "type" => "building",
                        "created_at" => null,
                        "updated_at" => null,
                        "pivot" => [
                            "listing_id" => 11,
                            "amenity_id" => 2,
                            ],
                        ],
                    ],
                    "address" => [
                        "id" => 11,
                        "listing_id" => 11,
                        "formatted_address" => "Ottawa, ON, Canada",
                        "postal_code" => null,
                        "lat" => "45.4215296",
                        "lng" => "-75.69719309999999",
                        "building_name" => "Faith Cochran",
                        "intersection_a" => null,
                        "intersection_b" => null,
                        "address" => "Ottawa",
                        "city" => "Ottawa",
                        "province" => "Ontario",
                        "created_at" => "2022-05-18T05:15:55.000000Z",
                        "updated_at" => "2022-05-18T05:15:55.000000Z",
                    ],
                ]
            ];

        return view('saved_boardroom',compact('listings'));  
    
        
    }


    public function dashboard(Request $request){

        $getUserId = Session::get('userId');
        // dd($getUserId);
        $bookingDetails = Http::get('https://hostdev2.justboardrooms.com/api/bookings', [
            'userId'=> $getUserId,
        ])->json();

        $UserDetails = Http::get('https://hostdev2.justboardrooms.com/api/userDetails', [
            'userId'=> $getUserId,
        ])->json();

            // dd( $bookingDetails);
        $bookings = $bookingDetails['data'];
        $User = $UserDetails['data'];

        return view('dashboard' ,compact('bookings' , 'User'));

    }


    public function profile(Request $request){


        $getUserId = Session::get('userId');

        $UserDetails = Http::get('https://hostdev2.justboardrooms.com/api/userDetails', [
            'userId'=> $getUserId,
        ])->json();

        $users = $UserDetails['data']['user'];
        $user_detail = $UserDetails['data']['userDetails'];

    
        return view('profile' ,compact('users', 'user_detail'));

    }

    public function update_profile(Request $request){
        
        // No need of session user ID
        // $getUserId = Session::get('userId');
        
        // dd($request);

        $response = Http::post('https://hostdev2.justboardrooms.com/api/updateUserDetails',[
            'updatedData' => $request->except('_token'),
        ])->json();
        
        // dd($response);

        return $response;
       
    }

    public function get_messages(Request $request){
        
        $loggedInUser = Session::get('userId');

        $response = Http::post('https://hostdev2.justboardrooms.com/api/getConversations',[
            'user_id' => $loggedInUser,
        ])->json();

        // dd($response);
        $all_chat = $response['all_chat'];
        
        return view('allmessages',compact('all_chat'));
        
    }

    public function getSingleChat(Request $request){
        
        $loggedInUser = Session::get('userId');
        $chat_id = $request->chat_id;

        $response = Http::post('https://hostdev2.justboardrooms.com/api/getSingleChat',[
            'user_id' => $loggedInUser,
            'chat_id' => $chat_id,
        ])->json();

        return $response;
    }

    public function saveMessage(Request $request){
        
        $loggedInUser = Session::get('userId');
        $coversationId = $request->coversationId;
        $receiverId = $request->receiverId;
        $message = $request->message;

        $response = Http::post('https://hostdev2.justboardrooms.com/api/saveMessage',[
            'user_id' => $loggedInUser,
            'receiverId' => $receiverId,
            'coversationId' => $coversationId,
            'message' => $message,
        ])->json();

        return $response;
    }


    public function getMessagepartial(Request $request){
        
        $loggedInUser = Session::get('userId');
        $coversationId = $request->chatId;
        $lastmsgIdold = $request->lastmsgIdold;
        

        $response = Http::post('https://hostdev2.justboardrooms.com/api/getMessagepartial',[
            'user_id' => $loggedInUser,
            'lastmsgIdold' => $lastmsgIdold,
            'chatId' => $coversationId,
        ])->json();

        return $response;
    }

    public function readMessage(Request $request){

        $myId = $request->myId;
        $chat_id = $request->chat_id;

        $response = Http::post('https://hostdev2.justboardrooms.com/api/readAllMessages',[
            'myId' => $myId,
            'chat_id' => $chat_id,
        ])->json();

        return $response;

    }

    // public function 
    public function getdate(Request $request){

        $id = $request->input('listingId');
        $response = Http::get('https://hostdev2.justboardrooms.com/api/listing-details/'.$id.'/'.Session::get('userId'))->json();


       
        $listing = $response['listing'];

        // dd($listing);
        $selectedDay = explode('-',json_decode($listing['calender']['days'],true)[$request->selectedDay]);
        $TotalHoursOnThisDay  = Carbon::parse($selectedDay[1])->diffInHours(Carbon::parse($selectedDay[0]));
       
        // $selectedDayTo  = $selectedDay[1];
        
        Session::put('startdate', $request->input("startDate"));
        Session::get('startdate');
        Session::put('enddate', $request->input("endDate"));
        Session::get('enddate');
        Session::put('time', $request->input("checkIn"));
        Session::put('isFullDay', $request->input("isFullDay"));
        Session::put('timeout', $request->input("checkOut"));
        
        $startDate =  Session::get('startdate')." ".Session::get('time');
        $endDate = Session::get('enddate')." ".Session::get('timeout');
            

        
            //  $time = Session::get('time');
            // $timeout =  Session::get('timeout');

            $hourdiff = round((strtotime($endDate) - strtotime($startDate))/3600, 1);
        // dd($listing['data'][0]['price_per_hour']);
            if($request->isFullDay == 1){
                
                if(isset($listing['price_per_day']) && $listing['price_per_day'] !=''){
                    // dd($listing,'inside price per day');
                    $price = $listing['price_per_day'];
                    $calculate_rate = $listing['price_per_day'];
                    $discountPrice = ($price * $listing['full_discount_rate'])/100 ;
                    // dd($discountPrice);
                    Session::put('discount',$listing['full_discount_rate']);
                    $totalPrice =  $price - $discountPrice;
                    // dd($totalPrice);
                }else{
                    $price_per_hours = $listing['price_per_hour'];
                    $calculate_rate =  $price_per_hours * $hourdiff;
                    $discountPrice = ($calculate_rate * $listing['full_discount_rate'])/100 ;
                    $totalPrice =  $calculate_rate - $discountPrice ;
                    Session::put('discount',$listing['full_discount_rate']);
                }
               
            }else if($TotalHoursOnThisDay > $hourdiff && (($TotalHoursOnThisDay)/2) <= $hourdiff){
                // dd( $hourdiff);
                $price_per_hours = $listing['price_per_hour'];
                $calculate_rate =  $price_per_hours * $hourdiff;
                $discountPrice =  $discountPrice = ($calculate_rate * $listing['half_discount_rate'])/100 ;//half_discount_rate
                $totalPrice =  $calculate_rate - $discountPrice ;
                Session::put('discount',$listing['half_discount_rate']);
            }else{
                $price_per_hours = $listing['price_per_hour'];
                $calculate_rate =  $price_per_hours * $hourdiff;
                $discountPrice = 0;
                $totalPrice =  $calculate_rate - $discountPrice ;
                Session::put('discount',0);
            }
        
            // $price =  Session::put('totalPrice', $totalPrice);
        //    $request->session()->put('totalPrice', $totalPrice);
            // dd($calculate_rate,'rate');
            Session::put('totalPrice', $totalPrice);
            Session::put('discountPrice', $discountPrice);
            Session::put('calculate_rate', $calculate_rate);
            $price =  session(['totalPrice' => $totalPrice]);
        //    dd($price);


        return response()->json([
            'start_date' => $startDate,
            'end_date' => $endDate,
            'time' => Session::get('time'),
            'timeout' => Session::get('timeout'),
            'Hours' => $hourdiff,
            'totalPrice' => $totalPrice,
            'calculate_rate' => $calculate_rate,
            'price' => $price,
    
            ], 200);

    }

    public function logout(){
        Session::flush();
        return redirect('/loginGuest');
    }

    public function addReview(Request $request,$listingId){
        $response = Http::get('https://hostdev2.justboardrooms.com/api/listing-details/'.$listingId.'/'.Session::get('userId'))->json();
       // dd($response);
        $listing = $response['listing'];

        $checkIfExists = Http::get('https://hostdev2.justboardrooms.com/api/checkIfReviewExists?listing_id='.$listingId.'&user_id='.Session::get('userId'))->json();

        //dd($checkIfExists);
        if($checkIfExists == null || $checkIfExists['data'] == []){
            $review = '';
        }else{
            $review = $checkIfExists['data'];
        }


        if($request->isMethod('post')){
            $revArr = [
                'user_id' => Session::get('userId'),
                'listing_id' => $listingId,
                'review_stars' => $request->reviewStars,
                'headline' => $request->headline,
                'review' => $request->review,
            ];

            $addReview = Http::post('https://hostdev2.justboardrooms.com/api/addReview',$revArr)->json();
            return redirect('/dashboard');
        }
        return view('add-review',compact('listing','review'));
    }

}