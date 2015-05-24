<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PubAuthor extends Model {

    protected $table = 'pubauthors';

    protected $fillable = [
        'pub_id',
        'name'
    ];

}
