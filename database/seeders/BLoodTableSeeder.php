<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type_BLood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BLoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type__b_loods')->delete();

        $bgs = ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];

        foreach($bgs as  $bg){
            Type_BLood::create(['Name' => $bg]);
        }
    }
    }
