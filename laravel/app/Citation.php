<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Citation extends Model {

    protected $table = 'citations';

    protected $fillable = [
        'pub_id',
        'name',
        'location',
        'score',
        'fromdb'
    ];

}
