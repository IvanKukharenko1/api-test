<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\AnalyticType;

class AnalyticTypeSeeder extends Seeder
{
    /**
     * @param $fileName
     * @param $fastExcelObject
     */
    public function run($fileName, $fastExcelObject)
    {
        ($fastExcelObject)->sheet(2)->import(storage_path($fileName), function ($line) {
            return AnalyticType::create([
                'name' => $line['name'],
                'units' => $line['units'],
                'is_numeric' => $line['is_numeric'],
                'num_decimal_places' => $line['num_decimal_places']
            ]);
        });
    }
}
