<?php namespace CNESmeteo\User\Models;

use Model;

/**
 * Country Model
 */
class Country extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'cnesmeteo_user_countries';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name', 'code'];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'code' => 'unique:cnesmeteo_user_countries',
    ];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'states' => ['CNESmeteo\User\Models\State']
    ];

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

}