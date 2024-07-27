<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grouptask extends Model
{
    use HasFactory;
    public function Groups()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function todo()
    {
        return $this->belongsTo(todos::class, 'todo_id', 'id');
    }
}
