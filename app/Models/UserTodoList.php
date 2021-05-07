<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTodoList extends Model
{
    use HasFactory, SoftDeletes;

    
    protected $fillable = ['complated'];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function TodoItem(){
        return $this->hasMany(TodoItem::class);
    }
}
