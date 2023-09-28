<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedProduct extends Model
{
    use HasFactory;

    protected $table = "deleted_products";

    protected $fillable = [
        "name_responsible",
        "document_responsible",
        "code_product",
        "name_product",
        "product",
    ];
}
