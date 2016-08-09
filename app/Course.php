<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\CanResetPassword;
use DB;
class Course extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'courses';
    
    protected $fillable = [
        'name', 'email', 'address', 'city', 'state', 'zip',
        'website', 'phone', 'par1', 'par2', 'par3', 'par4', 'par5', 'par6', 'par7', 'par8', 'par9', 'par10', 'par11', 'par12', 'par13', 'par14', 'par15', 'par16', 'par17', 'par18', 'hdcp1', 'hdcp2', 'hdcp3', 'hdcp4', 'hdcp5', 'hdcp6', 'hdcp7', 'hdcp8', 'hdcp9', 'hdcp10', 'hdcp11', 'hdcp12', 'hdcp13', 'hdcp14', 'hdcp15', 'hdcp16', 'hdcp17', 'hdcp18', 'parin', 'parout', 'partotal', 'color1', 'color2', 'color3', 'color4', 'color5', 'color6'
        ]; 


    public function colors(){
        return $this->hasMany('App\Color');
    }


 
}
