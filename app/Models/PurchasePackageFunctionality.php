<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePackageFunctionality extends Model
{
    use HasFactory;

    public function toggleIsActiveF()
    {
        $this->status = !$this->status;
        return $this;
    }
}
