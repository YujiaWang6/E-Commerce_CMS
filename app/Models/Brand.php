<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillablt = [
        'brandName'
    ];

    public function products(){
        return $this->hasMany(Project::class);
    }

}
