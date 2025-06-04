<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class GroupSchedule extends Model

{

use HasFactory;

protected $fillable = ['group_id', 'day_of_week'];

public function group()

{

return $this->belongsTo(Group::class);

}

}