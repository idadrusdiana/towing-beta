<?php

namespace App\Domain\MasterData\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Towing extends Model
{
    use HasFactory;

    protected $table = "towings";
    protected $fillable = [
        "name"
    ];
}
