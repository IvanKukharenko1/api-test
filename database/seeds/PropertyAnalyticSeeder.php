<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\PropertyAnalytic;

class PropertyAnalyticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new FastExcel)->sheet(3)->import(storage_path('BackEndTest_TestData_v1.1.xlsx'), function ($line) {
            return PropertyAnalytic::create([
                'property_id' => $line['property_id'],
                'analytic_type_id' => $line['anaytic_type_id'],
                'value' => $line['value']
            ]);
        });
    }
}
