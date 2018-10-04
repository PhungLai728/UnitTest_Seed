<?php
/**
 * Created by PhpStorm.
 * User: phunglai
 * Date: 10/4/18
 * Time: 5:53 AM
 */

main::start();

class main {

    static public function start() {

        $file = fopen("example.csv","r");

        while(! feof($file))
        {
            $record = fgetcsv($file);
            $records[] = $record;
        }

        fclose($file);
        print_r($records);



//        $records = csv::getRecords();
//        $table = html::generateTable($records);
//        system::printPage($table);
    }

}
//
//class csv {
//
//    static public function getRecords() {
//
//    }
//}
//
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
