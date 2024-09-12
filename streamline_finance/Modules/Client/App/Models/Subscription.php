<?php

namespace Modules\Client\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Client\Database\factories\SubscriptionFactory;

class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'client_id',
        'status',
        'payment_date',
        'expiry_date'
    ];

    //Add client relationship
    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
    
    protected static function newFactory(): SubscriptionFactory
    {
        //return SubscriptionFactory::new();
    }
}
