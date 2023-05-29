<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'help';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];
}
