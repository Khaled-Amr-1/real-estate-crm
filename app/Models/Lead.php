<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['name', 'phone', 'source', 'assigned_to', 'status'];

    public function assignedTo() {
        return $this->belongsTo(User::class,'assigned_to');
    }

    public function activites() {
        return $this->hasMany(Activity::class);
    }
}
