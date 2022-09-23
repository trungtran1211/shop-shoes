<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
    	'prod_name'
    ];
    protected $table = 'vp_products';
    protected $primarykey = 'prod_id';
    protected $guarded = [];

    public function promotion()
    {
        return $this->belongsToMany(\App\Models\Promotion::class);
    }
}
