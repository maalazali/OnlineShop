<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

class DatabaseHelper{
    const username = 'a12231169'; 
    const password = 'dbs23'; 
    const con_string = '//oracle19.cs.univie.ac.at:1521/orclcdb';

    //saves the databaseconnectionhandling
    protected $conn;

    //constructor
    public function __construct(){
        try {
            // Create connection with the command oci_connect(String(username), String(password), String(connection_string))
            $this->conn = oci_connect(
                DatabaseHelper::username,
                DatabaseHelper::password,
                DatabaseHelper::con_string
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

    public function selectAllProdukte(){
        $sql = "SELECT * FROM ProduktX ORDER BY SERIENNUMMER ASC";

        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);

        return $res;
    }

    public function selectAllKunde(){
        $sql = "SELECT * FROM KundeX";

        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);

        return $res;
    }

    public function selectAllDekos(){
        $sql = "SELECT * FROM KategorieX";

        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);

        return $res;
    }

    public function updateKunde($username, $email){
        $sql = "UPDATE KundeX SET username = :username WHERE email = :email";
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':username', $username);
        oci_bind_by_name($statement, ':email', $email);
        $result = oci_execute($statement);
        oci_error($statement); 
        oci_free_statement($statement);

        return $result;
    }


    public function searchProductName($produkt_name){
        $sql = "SELECT * FROM ProduktX
            WHERE produkt_name = ('{$produkt_name}')";

        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);

        return $res;
    }
    

    public function getUniqueZahlungsmethoden() {
        $sql = "SELECT DISTINCT Zahlungsmehtode FROM BestellungX";
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $result, 0, -1, OCI_FETCHSTATEMENT_BY_COLUMN);
        oci_free_statement($statement);
        return $result['ZAHLUNGSMEHTODE'];
    }

    public function getUniqueLieferadressen() {
        $sql = "SELECT DISTINCT Lieferadresse FROM BestellungX";
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $result, 0, -1, OCI_FETCHSTATEMENT_BY_COLUMN);
        oci_free_statement($statement);
        return $result['LIEFERADRESSE']; 
    }

    public function insertIntoCart($Seriennummer, $Produkt_name, $Preis_Produkt) {

        $sql = "INSERT INTO CartX (SERIENNUMMER,PREIS_PRODUKT,PRODUKT_NAME) VALUES ('{$Seriennummer}', '{$Preis_Produkt}', '{$Produkt_name}')";
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement);
        oci_free_statement($statement);

        return $success;
    }
    

    public function fetchCartItem(){
        $cartArray = array();
        $sql = "SELECT P.SERIENNUMMER, P.PRODUKT_NAME, P.PREIS_PRODUKT FROM CARTX C INNER JOIN PRODUKTX P ON C.SERIENNUMMER = P.SERIENNUMMER";
        //SELECT p.SERIENNUMMER, p.PRODUKT_NAME, P.Preis_Produkt from cartx C inner join produktx P on c.Seriennummer = p.seriennummer;     
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        
        return $res;
    }
        
    public function removeProduct($Seriennummer){
            $errorcode = 0;
            $Seriennummer = (int) $Seriennummer;
            $sql = "DELETE FROM CartX WHERE SERIENNUMMER = :SERIENNUMMER";
            $statement = oci_parse($this->conn, $sql);
            oci_bind_by_name($statement, ':SERIENNUMMER', $Seriennummer);
            $remove = oci_execute($statement);
            if (!$remove) {
                $e = oci_error($statement);
                error_log("Fehler beim Löschen: " . $e['message']);
                return false;
            }
            oci_free_statement($statement);
    
            return $remove;
        }

        public function getTotalCartAmount() {
            $totalAmount = 0; // Standardwert auf 0 setzen
            $sql = 'BEGIN GetTotalCartPrice(:p_total); END;';
            $statement = oci_parse($this->conn, $sql);
            
            // Binden des Ausgabeparameters
            oci_bind_by_name($statement, ':p_total', $totalAmount, 32);
            
            // Ausführen des Statements
            oci_execute($statement);
            oci_free_statement($statement);
            
            // Stellen Sie sicher, dass $totalAmount nicht null ist
            return $totalAmount === null ? 0 : $totalAmount;
        }
        
        
        
    }

 
   



?>



