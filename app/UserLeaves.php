<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class UserLeaves extends Model
{
    
    protected $table = 'user_leaves';
    
    protected $fillable = ['user_id', 'leave_type','date_from', 'date_to', 'no_days', 'reason', 'status', 'approved_by'];
                            
    public function setDateFromAttribute($date){
        if($date !== ''){
            $this->attributes['date_from'] = Carbon::createFromFormat('d/m/Y',$date);
        } else {
            $this->attributes['date_from'] = null;
        }
    }
    
    public function getDateFromAttribute($value){
       return $value !== null ? Carbon::parse($value)->format('d/m/Y') : '';
    }
    
    public function setDateToAttribute($date){
        if($date !== ''){
            $this->attributes['date_to'] = Carbon::createFromFormat('d/m/Y',$date);
        } else {
            $this->attributes['date_to'] = null;
        }
    }
    
    public function getDateToAttribute($value){
        return $value !== null ? Carbon::parse($value)->format('d/m/Y') : '';
    }
    
    /*public function setSickLeaveAttribute($leavetype){
        if($leavetype == 'SICK LEAVE'){
            $this->attributes['leave_type'] = Carbon::createFromFormat('d/m/Y',$date);
        } else {
            $this->attributes['date_from'] = null;
        }
    }
    
    public function getDateFromAttribute($value){
       return $value !== null ? Carbon::parse($value)->format('d/m/Y') : '';
    } */
    
}
