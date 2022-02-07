<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Organization extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

    protected $guarded = [];

    // protected $appends = [
    //     'ContentCount'
    // ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    
}
