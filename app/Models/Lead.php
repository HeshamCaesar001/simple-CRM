<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    public function sales()
    {
        return $this->belongsTo(User::class, 'sales_id');
    }
}
