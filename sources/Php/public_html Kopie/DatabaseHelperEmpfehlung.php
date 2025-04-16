<?php

class DatabaseHelperEmpfehlung{
    const username = 'a12231169'; 
    const password = 'dbs23'; 
    const con_string = '//oracle19.cs.univie.ac.at:1521/orclcdb';

    //saves the databaseconnectionhandling
    protected $conn;

    //this object is used to interact with the database

    //constructor
    public function __construct(){
        try {
            // Create connection with the command oci_connect(String(username), String(password), String(connection_string))
            $this->conn = oci_connect(
                DatabaseHelperEmpfehlung::username,
                DatabaseHelperEmpfehlung::password,
                DatabaseHelperEmpfehlung::con_string
            );

            //check if the connection object is != null
            if (!$this->conn) {
                // die(String(message)): stop PHP script and output message:
                die("DB error: Connection can't be established!");
            }

        }catch (Exception $e) {
            die("DB error: {$e->getMessage()}");
        }
    }
    public function __destruct(){
        // clean up
        oci_close($this->conn);
    }
    public function selectEmpfehlung($Seriennummer){
        
        $empfhelung_array = array();
        $sql = "SELECT * FROM empfehlenX WHERE EmpfohleneProdukt = :Seriennummer";
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':Seriennummer', $Seriennummer);
        oci_execute($statement);
        if ($e = oci_error($statement)) {
            var_dump($e);
        }
        while ($row = oci_fetch_assoc($statement)) {
            array_push($empfhelung_array, $row);
        }
    //oci_fetch_all($statement, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);

        return $empfhelung_array;
    }

  
}

?>




