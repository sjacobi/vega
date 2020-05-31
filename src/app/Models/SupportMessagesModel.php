<?php

namespace SergeyJacobi\Vega\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupportMessagesModel extends Model
{
    use SoftDeletes;

    protected $table = 'vega_support_messages';
    protected $fillable = ['text'];

}