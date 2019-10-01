<?php
class DB
{
    private $SQL = NULL;
    function __construct()
    {
        $this->SQL = $this->connection();
    }
    private function connection(){
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if($mysqli->connect_error){
            exit('Error connection to database. Check your database config');
        }
        return $mysqli;
    }
    function query_manipulation($string,$type,$params = array()){

        if($string === NULL || $string === '') throw new Error('Please fill out the query string');

        $statement = $this->SQL->prepare($string);
        //bind params s = string, i = integer, d = double, b = BLOB
        $statement->bind_param($type,...$params);
        $statement->execute();
        $statement->close();
    }
    function query_result($string,$type = '',$params = array(),$result_type = 'object'){
        $results = array();

        if($string == NULL || $string === '') throw new Error('Please fill out the query string');

        $statement = $this->SQL->prepare($string);
        if($type != '' and count($params) != 0) $statement->bind_param($type,...$params);
        $statement->execute();
        $res = $statement->get_result();
        while($row = $res->fetch_assoc()){
            if($result_type == 'array') array_push($results,$row);
            //get default type is object
            else array_push($results,(object)$row);
        }
        $statement->close();
        if($result_type === 'json') return json_encode($results);
        return $results;

    }
    function count($count = '*',$table = NULL){
        if($table == NULL) new Error('Please select table to count');
        $string = "SELECT COUNT($count) FROM $table";
        $res = mysqli_query($this->SQL,$string);
        $counted = mysqli_num_rows($res);
        return $counted;
    }
}