<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model {

    protected $table = 'publications';

    protected $fillable = [
        'usr_id',
        'title',
        'year',
        'location',
        'isbn',
        'issn',
        'score',
        'categoryScore',
        'querry_id'
    ];

}
