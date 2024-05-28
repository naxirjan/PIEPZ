<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePackageAddon extends Model
{
    use HasFactory;
    
    public function toggleIsActive()
    {
        $this->status = !$this->status;
        return $this;
    }
}
