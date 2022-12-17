<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = "transaction_detail";
    protected $guarded = [];

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function transactionHeader()
    {
        return $this->belongsTo(TransactionHeader::class);
    }
}