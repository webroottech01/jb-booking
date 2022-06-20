<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingCalender extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
   
    protected $fillable = [
        'startDate',
        'endDate    ',
        'days',
        'listing_id',
    ];

    /**
     * Get the user that owns the list.
    */
  

    public function listing()
    {
    	return $this->belongsTo(Listing::class);
    }


}