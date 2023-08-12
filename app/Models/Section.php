<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function meals()
    {
        return $this->hasMany(Meal::class,'section_id');
    }
    public function chmeals()
    {
        return $this->hasMany(Meal::class,'section_id');
    }

    public function parent()
    {
        return $this->belongsTo(Section::class, 'parent_id')->withDefault([
                'name' => '-'
            ]);
    }

    public function children()
    {
        return $this->hasMany(Section::class, 'parent_id');
    }


}
