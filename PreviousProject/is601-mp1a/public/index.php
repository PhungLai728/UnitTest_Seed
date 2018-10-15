<?php
/**
 * Created by PhpStorm.
 * User: phunglai
 * Date: 9/25/18
 * Time: 3:01 PM
 */
<<<<<<< Updated upstream
echo 'test1234';
echo 'test';
=======

main::start("example.csv");

class main{
    static public function start($filename) {

        $records = csv::getRecords($filename);
        $table = html::generateTable($records);

    }
}



class csv {
    static public function getRecords($filename){
        $file = fopen($filename,"r");

        $fieldNames = array();

        $count = 0;

        while(! feof($file))
        {
            $record = fgetcsv($file);
            if($count == 0) {
                $fieldNames = $record;
            } else {
                $records[] = recordFactory::create($fieldNames, $record); //make array
            }
            $count++;
        }

        fclose($file);
        return $records;
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


class html { // Work on this for the project
    //go back to array function called getKey, get an array and store them for you
    //Reflection: querying your oject in your code
    //Use reflection library
    public static function generateTable($records){

        $count = 0;
        foreach ($records as $record) {
            if($count==0) {
                $array = $record->returnArray();
                $fields = array_keys($array);
                $values =array_values($array);
                print_r($fields);
                print_r($values);
            } else {
                $array = $record->returnArray();
                $values =array_values($array);
                print_r($values);
            }
            $count++;
//            print_r($record);

//            $reflect = new ReflectionClass($record);
//            $props   = $reflect->getProperties();
//            print_r($props);
////            $fields = get_object_vars($record);
////            $array = $record -> returnArray();
////            $keys = array_keys($array);
//            print_r($reflect);

        }
    }
}

//class system {
//    static public function printPage($page){
//        echo $page;
//    }
//}
//
//class Automobile
//{
//    private $vehicleMake;
//    private $vehicleModel;
//
//    public function __construct($make, $model)
//    {
//        $this->vehicleMake = $make;
//        $this->vehicleModel = $model;
//    }
//
//    public function getMakeAndModel()
//    {
//        return $this->vehicleMake . ' ' . $this->vehicleModel;
//    }
//}
//
//class AutomobileFactory
//{
//    public static function create($make, $model)
//    {
//        return new Automobile($make, $model);
//    }
//}
//
>>>>>>> Stashed changes
