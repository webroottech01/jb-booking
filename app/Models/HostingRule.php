<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostingRule extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'hosting_rule',
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}