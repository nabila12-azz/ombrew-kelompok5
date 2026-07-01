<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = [
        'order_code','customer_name','payment_method',
        'note','items','subtotal','discount','total','status'
    ];
    protected $casts = ['items' => 'array'];

    // Generate kode order otomatis
    public static function generateCode(): string {
        $last = static::latest('id')->first();
        $num  = $last ? ($last->id + 1) : 1;
        return 'ORD-' . str_pad($num, 3, '0', STR_PAD_LEFT);
    }
}