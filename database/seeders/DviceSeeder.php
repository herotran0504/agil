<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merchants = \App\Models\Merchant::create([
            'f_name_ar'=>'التاجر',
            'l_name_ar'=>'الاب',
            'l_name_en'=>'asdas',
            'f_name_en'=>'ahmad',
            'm_name_ar'=>'بسيب',
            'm_name_en'=>'dlsa',
            'phone'=>'539254628',
            'is_active'=>1,
            'business_name'=>'مطعم الشيف',
            'commercial_registratio_n'=>'1234567891',
        ]);
        $branches = \App\Models\Branch::create([
            'name_ar'=>'فرع الرياض',
            'name_en'=>'riyadh',
            'merchant_id'=>$merchants->id,
            'is_main'=>1,
            // 'phone'=>'539254628',
            'is_active'=>1,
        ]);
        $dvice = \App\Models\Dvice::create([
              'username'=>'ahmad',
        'password'=>Hash::make('123456'),
            'branch_id'=>$branches->id,
            'is_active'=>1,
        ]);
    }
}
