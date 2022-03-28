<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stock',
        'precio',
        'description',
        'provider_id',
        'photo',


     
    ];

    protected $guarded = ['id'];

    public function provider()
    {
        return $this->belongsTo(Provider::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGetDetalleAttribute()
    {
        return substr($this->detalle, 0, 65);

    }

    public function getGetPhotoAttribute()
    {
        if( $this->photo){
            return url("Storage/$this->photo");
        }
    }
}
