<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklists extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function checklistItems()
    {
        return $this->hasMany(ChecklistItem::class);
    }
}
