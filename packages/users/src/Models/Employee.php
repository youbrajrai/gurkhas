<?php

namespace User\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Pages\Models\Board;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'branch_id',
        'department_id',
        'position_id',
        'order',
        'status'

    ];
    protected $table = 'employee_details';
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function position(){
        return $this->belongsTo(Position::class);
    }
    public function boards(){
        return $this->hasMany(Board::class);
    }
}
