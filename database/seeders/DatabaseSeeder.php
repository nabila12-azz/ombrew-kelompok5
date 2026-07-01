<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run(): void {

        // ===== USERS =====
        User::create([
            'name'     => 'Admin Om Brew',
            'email'    => 'admin@ombrew.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
            'is_active'=> true,
        ]);
        User::create([
            'name'     => 'Kasir 1',
            'email'    => 'kasir@ombrew.com',
            'password' => Hash::make('kasir123'),
            'role'     => 'kasir',
            'is_active'=> true,
        ]);

        // ===== CATEGORIES =====
        $food  = Category::create(['name'=>'Food',  'icon'=>'egg-fried']);
        $drink = Category::create(['name'=>'Drink', 'icon'=>'cup-straw']);
        $snack = Category::create(['name'=>'Snack', 'icon'=>'bag']);

        // ===== PRODUCTS =====
        $products = [
            ['category_id'=>$food->id,  'name'=>'Ayam Penyet',   'description'=>'Ayam goreng empuk dengan sambal pilihan', 'price'=>25000,'rating'=>5,'status'=>'tersedia'],
            ['category_id'=>$food->id,  'name'=>'Sop Janda',     'description'=>'Sop sayuran segar bumbu rempah',          'price'=>18000,'rating'=>4,'status'=>'tersedia'],
            ['category_id'=>$food->id,  'name'=>'Sate Maranggi', 'description'=>'Sate sapi khas Purwakarta',               'price'=>35000,'rating'=>5,'status'=>'tersedia'],
            ['category_id'=>$drink->id, 'name'=>'Es Kopi Susu',  'description'=>'Kopi susu segar gula aren asli',          'price'=>15000,'rating'=>5,'status'=>'tersedia'],
            ['category_id'=>$drink->id, 'name'=>'Teh Tarik',     'description'=>'Teh manis creamy khas warung',            'price'=>8000, 'rating'=>4,'status'=>'tersedia'],
            ['category_id'=>$snack->id, 'name'=>'Pisang Goreng', 'description'=>'Pisang kepok goreng renyah',              'price'=>10000,'rating'=>4,'status'=>'habis'],
        ];
        foreach ($products as $p) { Product::create($p); }

        // ===== ORDERS (contoh) =====
        $sampleItems = [
            ['id'=>1,'name'=>'Ayam Penyet','price'=>25000,'qty'=>2],
            ['id'=>4,'name'=>'Es Kopi Susu','price'=>15000,'qty'=>2],
        ];
        Order::create([
            'order_code'     => 'ORD-001',
            'customer_name'  => 'Budi Santoso',
            'payment_method' => 'Cash',
            'note'           => '',
            'items'          => $sampleItems,
            'subtotal'       => 80000,
            'discount'       => 0,
            'total'          => 80000,
            'status'         => 'selesai',
        ]);
        Order::create([
            'order_code'     => 'ORD-002',
            'customer_name'  => 'Siti Rahayu',
            'payment_method' => 'Transfer Bank',
            'items'          => [['id'=>3,'name'=>'Sate Maranggi','price'=>35000,'qty'=>1]],
            'subtotal'       => 35000,'discount'=>0,'total'=>35000,
            'status'         => 'confirmed',
        ]);
        Order::create([
            'order_code'     => 'ORD-003',
            'customer_name'  => 'Andi Wijaya',
            'payment_method' => 'QRIS',
            'items'          => [['id'=>2,'name'=>'Sop Janda','price'=>18000,'qty'=>3]],
            'subtotal'       => 54000,'discount'=>0,'total'=>54000,
            'status'         => 'pending',
        ]);

        // ===== SETTINGS =====
        $settings = [
            ['key'=>'nama_toko',    'value'=>'Om Brew'],
            ['key'=>'alamat',       'value'=>'Jl. Contoh No.1, Kota'],
            ['key'=>'telepon',      'value'=>'+62 812-3456-7890'],
            ['key'=>'email',        'value'=>'ombrew@email.com'],
            ['key'=>'jam_buka',     'value'=>'07:00 - 22:00'],
            ['key'=>'deskripsi',    'value'=>'Warung makanan & minuman dengan cita rasa rumahan'],
        ];
        foreach ($settings as $s) {
            \App\Models\Setting::create($s);
        }
    }
}