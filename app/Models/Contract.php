<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contract extends Model
{
    use HasFactory;

    public function monthlyPercentages(): BelongsToMany
    {
        return $this->belongsToMany(MonthlyPercentage::class)->orderBy('month');
    }
}
