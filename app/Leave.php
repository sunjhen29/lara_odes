<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Leave extends Model
{
    protected $table = 'leaves';
    
    protected $fillable = ['sick_leave', 'vacation_leave', 'paternity_leave', 'singleparent_leave', 
                            'emergency_leave', 'other_leave', 'leave_type', 'date_from', 'date_to', 
                            'no_days', 'reason', 'status'];
                            
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
                            
}
