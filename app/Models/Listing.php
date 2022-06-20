<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
   

    protected $fillable = [
        'description',
        'name',
        'capacity',
        'per_hour_rate',
        'per_day_rate',
        'listing_capacity',
        'price_per_hour',
        'price_per_day',
        'listing_type'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
 
    }

    public function pictures()
    {
        return $this->hasMany(ListingGallery::class);
    }

    public function listing_capacity()
    {
        return $this->belongsTo(ListingCapacity::class);
    }

    public function listing_amenities()
    {
        return $this->belongsToMany(Amenity::class,'listing_amenities');
    }

    
    public function hosting_rules()
    {
        return $this->hasMany(HostingRule::class);
    }

    public function calender()
    {
         return $this->hasOne(ListingCalender::class,'listing_id');
    }

}