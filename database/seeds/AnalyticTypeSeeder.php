<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\AnalyticType;

class AnalyticTypeSeeder extends Seeder
{
    /**
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     */
    public function run()
    {
        (new FastExcel)->sheet(2)->import(storage_path('BackEndTest_TestData_v1.1.xlsx'), function ($line) {
            return AnalyticType::create([
                'name' => $line['name'],
                'units' => $line['units'],
                'is_numeric' => $line['is_numeric'],
                'num_decimal_places' => $line['num_decimal_places']
            ]);
        });
    }
}
