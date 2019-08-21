<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'user_id'];

    protected $dates = ['deleted_at'];

}
