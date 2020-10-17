<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    
    protected $fillable = [
		'name', 
	];
	
    public $timestamps = false;

    public function posts()
    {
    	return $this->belongsToMany(\App\models\post::class, 'post_tag', 'tag_id', 'post_id');
    }
}
