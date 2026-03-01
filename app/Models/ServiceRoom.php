<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CaseInsensitiveRestore;

class ServiceRoom extends Model
{
    use HasFactory, SoftDeletes, CaseInsensitiveRestore;

    protected $table = 'service_rooms';
    protected $fillable = ['name'];
}
