<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = "sales_order";

    protected $fillable = [
        "date_sale",
        "number_facture",
        "products",
        "responsible",
        "total",
    ];

}
