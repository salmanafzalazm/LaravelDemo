<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



// for his i havent create dthe migrqation
class Flight extends Model
{
    //

// this is used when i want a different name in the database table
    protected $table = 'my_flights';

//for allowing mass assign and other things.  or place it in a fillable 
    protected $guarded = ['id'];

//mass assign
protected $fillable = [
'name',
'email',
'password',
];

// assign auto increment primary key with custom column name
protected $primaryKey = 'flight_id';

// auto increment false
public $incrementing = false;


//  created and updated at  the we dont wnat to use  default fields
public $timestamp = false;


// if we want to change the defauklt created date column
const CREATED_AT = 'creation_date';




// to assign the column a default value
protected  $attributes = [
'name' => 'test default value',
// 'name' => null,
];


}
