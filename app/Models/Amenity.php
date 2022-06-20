<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Amenity extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $fillable =  [
        'icon',
        'description',
        'name'
    ];

     /**
     * The inventories that belong to the product.
     *
     * @return void
     */
    public function listing()
    {
        return $this->belongsToMany(Listing::class, 'listing_amenities', 'amenity_id', 'listing_id');
    }
}
