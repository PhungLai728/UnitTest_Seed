<?php
/**
 * Created by PhpStorm.
 * User: phunglai
 * Date: 10/4/18
 * Time: 5:53 AM
 */

//main::start("SacramentoRealEstateTransactions.csv");
main::start("example.csv");

// Main: Read CSV file and print out
class main{

    static public function start($fileName) {

        $records = csv::getRecords($fileName);
        $table = html::generateTable($records);
        system::printPage($table);

    }
}

// csv: Read arbitrary CSV files
class csv {

    static public function getRecords($fileName) {

        $file = fopen($fileName,"r");

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

    public function __construct(Array $fieldNames = null, $values =null) {

        $record = array_combine($fieldNames, $values);

        foreach ($record as $property => $value) {
            $this->createProperty($property, $value);
        }

    }

    public function returnArray() {

        $array = (array) $this;

        return $array;

    }

    public function createProperty($name = 'first', $value = 'keith') {

        $this->{$name} = $value;

    }
}

class recordFactory {

    static public function create(Array $fieldNames = null, Array $value = null) {

        $record = new record($fieldNames, $value);

        return $record;

    }
}

// html: generate table from data in CSV file and print out
class html {

    static public function generateTable($records) {

        $body = '<html><head>';
        $body .= '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">';
        $body .= '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';;
        $body .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>';
        $body .= '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>';

        $body .= '<body><table class="table table-striped table-bordered">';

        $count = 0;

        foreach ($records as $record) {

            if($count==0) {

                $array = $record->returnArray();
                $fields = array_keys($array);
                $values = array_values($array);
                $body .= style::row($fields, "<th>",  "</th>");
                $body .= style::row($values, "<td>", "</td>");

            } else {

                $array = $record->returnArray();
                $values =array_values($array);
                $body .= style::row($values, "<td>", "</td>");

            }

            $count++;

        }

        $body .= "</table></body></head></html>";

        return $body;

    }

}

// system: print out a page
class system {

    static public function printPage($page) {

        echo $page;

    }
}

class style {

    static public function row($line, $style, $end_style) {

        $body = '<html><head>';
        $body .= "<tr>";
        foreach ($line as $word) {
            $body .= $style . htmlspecialchars($word) . $end_style;
        }
        $body .= "</tr>";

        return $body;

    }

}

