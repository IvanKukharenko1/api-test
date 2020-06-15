<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\PropertyAnalytic;

class PropertyAnalyticSeeder extends Seeder
{
    /**
     * @param $fileName
     * @param $fastExcelObject
     */
    public function run($fileName, $fastExcelObject)
    {
        ($fastExcelObject)->sheet(3)->import(storage_path($fileName), function ($line) {
            return PropertyAnalytic::create([
                'property_id' => $line['property_id'],
                'analytic_type_id' => $line['anaytic_type_id'],
                'value' => $line['value']
            ]);
        });
    }
}
