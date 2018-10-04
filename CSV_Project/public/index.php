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

class record {

    public function __construct(Array $fieldNames = null, $values =null)
    {

        $record = array_combine($fieldNames, $values);
//        $record = (object) $record; //record passes to function object, and function sends it over record

        foreach ($record as $property => $value) {
            $this->createProperty($property, $value);
        }

    }

    public function returnArray() {
        $array = (array) $this;
        return $array;
    }

    public function createProperty($name = 'first', $value = 'keith') {
        $this->{$name} = $value; //-> reference something
    }
}

class recordFactory {

    public static function create(Array $fieldNames = null, Array $value = null) {

        $record = new record($fieldNames, $value);

        return $record;

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
