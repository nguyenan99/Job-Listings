<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateCompany extends Model
{
    protected $table = 'candidate_company';
    protected $fillable = ['user_id','company_id','job_id'];

}
