<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;

class DatabaseSeeder extends Seeder
{
    const FILE_NAME = 'BackEndTest_TestData_v1.1.xlsx';

    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     */
    public function run()
    {
        $fastExcel = new FastExcel();

        $propertySeeder = new PropertySeeder();
        $propertySeeder->run(self::FILE_NAME, $fastExcel);

        $analyticTypeSeeder = new AnalyticTypeSeeder();
        $analyticTypeSeeder->run(self::FILE_NAME, $fastExcel);

        $propertyAnalyticSeeder = new PropertyAnalyticSeeder();
        $propertyAnalyticSeeder->run(self::FILE_NAME, $fastExcel);
    }
}
