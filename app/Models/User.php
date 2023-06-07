<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use bcrypt;
use App\Models\Media;
use User\Models\Role;
use Pages\Models\Board;
use Pages\Models\Leave;
use User\Models\Employee;
use User\Models\Position;
use App\RelationshipsTrait;
use Pages\Models\Committee;
use Pages\Models\Outstation;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use RelationshipsTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->employeeDetails()->delete();
        });
    }

    protected $fillable = [
        'employee_code',
        'name',
        'email',
        // 'password',
        'address',
        'mobile_no',
        'contact_no',
        'joined_date'
    ];

    protected $append = ["profile_path"];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($value)
    {
        // Hash the password input before setting it in the model
        $this->attributes['password'] = bcrypt($value);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function employeeDetails()
    {
        return $this->hasOne(Employee::class);
    }
    public function outstations()
    {
        return $this->hasMany(Outstation::class);
    }
    public function media()
    {
        return $this->morphOne(Media::class, 'mediable');
    }
    public function leaves()
    {
        return $this->hasMany((Leave::class));
    }
    public function committees()
    {
        return $this->hasMany(Committee::class);
    }
    public function getIsAdminAttribute()
    {
        $isAdmin = $this->roles()
            ->where('title', 'admin')
            ->exists();
        return $isAdmin;
    }

    public function boards()
    {
        return $this->hasMany(Board::class);
    }
    public function getProfilePathAttribute()
    {

        return asset("/storage/" . $this->media->file_path);
    }
}
