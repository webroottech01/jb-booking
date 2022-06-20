<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ListingCapacity extends Model
{
    use HasFactory;
    protected $fillable =  [
        'icon',
        'description',
        'display',
        'min',
        'max'
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class,'listing_capacity_id');
    }
}