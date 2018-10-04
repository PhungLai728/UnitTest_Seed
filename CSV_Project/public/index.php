<?php
/**
 * Created by PhpStorm.
 * User: phunglai
 * Date: 10/4/18
 * Time: 5:53 AM
 */

main::start();

class main {

    public static function start() {
        $records = csv::getRecords();
    }

}

class csv{}

class html {}

class system {}

