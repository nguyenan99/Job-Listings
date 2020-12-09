<?php

namespace App\Models;

use App\Models\Job;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    public $table = 'company';

    protected $fillable = [
        'name',
        'logo',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'user_id',
        'email',
        'phone',
        'website'
    ];
    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
