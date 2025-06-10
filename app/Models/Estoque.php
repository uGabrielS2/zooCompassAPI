<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'stores';

    protected $fillable = [
        'name',      
        'amount',    
        'category',  
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // "Join" com a table StockCategory.
    public function stockCategory()
    {
        return $this->belongsTo(StockCategory::class, 'category', 'id')
                    ->select(['id', 'name']); // colunas id e name, utilizar para puxar somente colunas que quiser.
    }
}
