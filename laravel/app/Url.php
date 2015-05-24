<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model {

    protected $table  = 'urls';

    protected $fillable = [
        'usr_id',
        'url',
        'type_url'
    ];

}
