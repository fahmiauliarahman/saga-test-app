<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasRole extends Model
{
    use HasFactory;

    protected $table = 'model_has_roles';
    protected $fillable = ['role_id', 'model_uuid', 'model_type'];
    public $timestamps = false;
}
