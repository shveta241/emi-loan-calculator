<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class EmiRepository
{
    public function dropAndCreateEmiDetailsTable(array $months)
    {
        DB::statement('DROP TABLE IF EXISTS emi_details');
        $columns = "`clientid` BIGINT";
        foreach ($months as $month) {
            $columns .= ", `$month` DECIMAL(10,2) DEFAULT 0.00";
        }
        DB::statement("CREATE TABLE emi_details ($columns)");
    }

    public function insertEmiDetails(array $rows)
    {
        foreach ($rows as $row) {
            DB::table('emi_details')->insert($row);
        }
    }

    public function getAll()
    {
        return DB::table('emi_details')->get();
    }
}