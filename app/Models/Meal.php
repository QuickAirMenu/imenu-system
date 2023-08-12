<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function chsection()
    {
        return $this->belongsTo(Section::class,'parent_id');
    }

    public function childrenSection()
    {
        return $this->belongsTo(Section::class, 'children_id');
    }
}
