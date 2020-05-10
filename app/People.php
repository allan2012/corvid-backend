<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{

    protected $fillable = [
        'first_name',
        'surname',
        'last_name',
        'sex',
        'phone',
        'email',
        'date_of_birth',
        'notes',
        'contact_names',
        'contact_phone',
        'contact_relation',
        'occupation',
        'physical_address',
        'page_loaded',
        'confirmed_corvid'
    ];
    public function getFullNameAttribute($value)
    {
        return "{$this->first_name} {$this->surname} {$this->last_name}";
    }
}
