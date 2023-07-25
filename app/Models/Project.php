<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'title',
        'publish_date',
        'description',

        'type_id'
    ];

    use HasFactory;

    public function type() {

        return $this -> belongsTo(type :: class);
    }

    public function technologies()
    {
        return $this->belongsToMany(technology::class);
    }
}
