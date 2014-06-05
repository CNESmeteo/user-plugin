<?php namespace CNESmeteo\User\Models;

use Model;

/**
 * State Model
 */
class State extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'cnesmeteo_user_states';

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
        'code' => 'required',
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'country' => ['CNESmeteo\User\Models\Country']
    ];

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

}