<?php
/**
 * Created by PhpStorm.
 * User: phunglai
 * Date: 10/4/18
 * Time: 5:53 AM
 */

main::start("example.csv");

class main {

    static public function start($filename) {

        $records = csv::getRecords($filename);
//        $table = html::generateTable($records);
//        system::printPage($table);
    }

}

class csv {

    static public function getRecords($filename) {

        $file = fopen($filename,"r");

        while(! feof($file))
        {
            $record = fgetcsv($file);
            $records[] = $record;
        }

        fclose($file);
        print_r($records);

    }
}

//class html {
//
//    static public function generateTable($records) {
//
//        $table = $records;
//        return $table;
//    }
//}
//
//class system {
//
//    static public function printPage($page) {
//
//        echo $page;
//    }
//}
//
