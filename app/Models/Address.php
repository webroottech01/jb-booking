<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
   
    protected $fillable = [
        'formatted_address',
        'postal_code',
        'lat',
        'lng',
        'building_name',
        'intersection_a',
        'intersection_b',
        'address',
        'city',
        'province'
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class);
     
    }
}
