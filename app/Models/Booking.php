<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
 


    protected $fillable = [
        'start_hour',
        'end_hour',
        'start_date',
        'end_date',
        'status',
        'note',
    ];

  

    public function listing()
    {
    	return $this->belongsTo(Listing::class);
    }


}