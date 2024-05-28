<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePackageMarketplace extends Model
{
    use HasFactory;

    public function toggleIsActiveM()
    {
        $this->status = !$this->status;
        return $this;
    }
}
