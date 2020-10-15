<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    use HasFactory;
    protected $table = 'movies';
    
    protected $fillable = [
		'title', 'desc', 'date', 'rate', 'actor_id',
	];
	
    public $timestamps = false;

	
	public function actor()
    {
        // return $this->belongsTo(\App\models\actor::class, 'actor_id', 'id');
        // return $this->belongsTo(\App\models\actor::class);

        // return $this->hasOne(\App\models\actor::class, 'id', 'actor_id');	//echo $movie->actor->name;
        // return $this->hasMany(\App\models\actor::class, 'id', 'actor_id');	//echo $movie->actor[0]->name;
        
        return $this->belongsTo(\App\models\actor::class);
    }

    /*
	public function actor(){
		return $this->hasOne(\App\models\actor::class, 'id', 'actor');
	}
	*/
}

