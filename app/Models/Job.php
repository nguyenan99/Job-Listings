<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    public $table = 'job';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'salary',
        'address',
        'top_rated',
        'company_id',
        'job_nature',
        'created_at',
        'updated_at',
        'deleted_at',
        'location_id',
        'category_id',
        'requirements',
        'full_description',
        'short_description',
        'benefit'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
