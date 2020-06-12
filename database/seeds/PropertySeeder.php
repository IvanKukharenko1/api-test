<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new FastExcel)->import(storage_path('BackEndTest_TestData_v1.1.xlsx'), function ($line) {
            return Property::create([
                'suburb' => $line['Suburb'],
                'state' => $line['State'],
                'country' => $line['Counrty']
            ]);
        });
    }
}
