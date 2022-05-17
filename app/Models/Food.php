<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Food extends Model
{
    use Sortable;
    protected $table = 'foods';
    public $sortable = ['name', 'typeId', 'price'];
    // public $timestamps = true;
}
