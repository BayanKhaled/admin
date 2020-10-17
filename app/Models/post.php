<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    
    protected $fillable = [
		'title', 'user_id',
	];
	
    public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo(\App\models\Admin::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(\App\models\tag::class, 'post_tag', 'post_id', 'tag_id');
    }

}
