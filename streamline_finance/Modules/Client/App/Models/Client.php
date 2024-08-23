<?php

namespace Modules\Client\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Client\Database\factories\ClientFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name',
        'location',
        'client_email',
        'level',
        'billing_cycle',
        'contact_name',
        'contact_phone',
        'support_name',
        'support_phone',
        'support_email',
    ];
    
    protected static function newFactory(): ClientFactory
    {
        //return ClientFactory::new();
    }
}
