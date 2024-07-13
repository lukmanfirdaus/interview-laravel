<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTransaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
    public function block()
    {
        return $this->belongsTo(Block::class);
    }
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function uom()
    {
        return $this->belongsTo(Uom::class);
    }
    public function submitted_by()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }
    public function check_by()
    {
        return $this->belongsTo(User::class, 'check_by');
    }
    public function verified_by()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
