<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobNumber extends Model
{
    protected $table = 'job_numbers';
    
    protected $fillable = ['job_number', 'application', 'section', 'current_month', 'job_date', 'stats_output'];
    
    protected $dates = ['current_month','job_date'];
    
    public function entry_logs()
    {
        return $this->hasMany('App\UserLog','jobnumber_id')
        ->select('id')
        ->groupBy('action','user_id');
    }
}
