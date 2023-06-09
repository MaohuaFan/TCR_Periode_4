<?php
// Auteur: MHF
// Functie: Algemene functies tbv hergebruik
 function ConnectDb($dbName){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "$dbName";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        #echo "Connected successfully";
        #echo "Create Read Update Delete <br><br>";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
 }

 function GetData($table, $column, $filternaam, $filters){
    if(empty($column)){
        $column = "*";
    }
    if(empty($filters)){
        $filter = ""; // Full Syntax
        $filternaam = ""; // raw category name // biercode
                        //filters = categoryid // filters = $biercode
    }else{
        $filternaamparam =":".$filternaam; // :biercode
        $filter = "WHERE ".$filternaam." = ".$filternaamparam; // WHERE biercode = :biercode
    }

    // Connect database
    $dbName = "bieren";
    $conn = ConnectDb($dbName);

    // Select data uit de opgegeven table methode query
    // Query: is een prepare en execute in 1 zonder placeholders
    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT $column FROM $table $filter");
    if(!empty($filter)){
        $query->bindParam("$filternaamparam", $filters); // ":biercode",$biercode
    }
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }

 /*
// Function 'PrintTable' print een HTML-table met data uit $result.
function PrintTable($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table

    // Haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    // Print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // Print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}*/

function CrudFullCrudName(){
    // Haal alle crudnaam record uit de tabel 
    $result = GetData("", "CrudNaam");
    
    // Print table
    PrintFullCrudName($result);
 }

function PrintFUllCrudName($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table

    // Haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    } $table .= "<th bgcolor=gray> Weizig </th>"; $table .= "<th bgcolor=gray> Verwijder </th>";  

    // Print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // Print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        
        // Wijzig knopje
        $table .= "<td>". 
            "<form method='post' action='update_CrudNaam.php?CrudCode=$row[CrudCode]' >       
                    <button name='weizig'>Weizig</button>	 
            </form>" . "</td>";
        
        $table .= "<td>". 
            "<form method='post' action='delete_CrudNaam.php?CrudCode=$row[CrudCode]' >       
                    <button name='verwijder'>Verwijder</button>	 
            </form>" . "</td>";

        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function UpdateFullCrudName(){
    echo '<h3> Update row </h3>';
    var_dump($_POST);
    echo '<br>';
    try {
        // Connect database
        $conn = ConnectDb();
        
        $CrudCode = $_POST['CrudCode'];
        $naam = $_POST['CrudNaamnaam'];
        $land = $_POST['land'];
        // Update data uit de opgegeven table methode query
        // query: is een prepare en execute in 1 zonder placeholders
        
        // Update data uit de opgegeven table methode prepare
        $sql = "UPDATE `CrudNaam` 
                SET 
                    `naam` = '$naam', 
                    `land` = '$land' 
                WHERE `CrudNaam`.`CrudCode` = $CrudCode";
        $query = $conn->prepare($sql);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function DeleteFulLCrudName($CrudCode){
    echo 'Delete row <br>';
    var_dump($CrudCode);
    try {
        // Connect database
        $dbName ="bieren";
        $conn = ConnectDb($dbName);
        
        // Update data uit de opgegeven table methode query
        // Query: is een prepare en execute in 1 zonder placeholders
        
        $sql = "DELETE FROM CrudNaam WHERE `CrudNaam`.`CrudCode` = :CrudCode";
        $query = $conn->prepare($sql);
        $query->bindParam(':CrudCode', $CrudCode);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function dropDown($label, $data, $row_selected){
    $txt = "
    <label for='$label'>Choose a $label:</label>
    <select name='$label' id='$label'>";
    foreach($data as $row){
        if ($row['land'] == $row_selected){
            $txt .= "<option value='$row[land]' selected='selected'>$row[land]</option>";
        } else {
            $txt .= "<option value='$row[land]'>$row[land]</option>";
        }
    }
    $txt .= "</select>";
    echo $txt;
}

function InsertFullCrudName(){
    echo '<h3> Insert FullCrudName </h3>';
    echo '<br>';
    try {
        // Connect database
        $conn = ConnectDb();
        
        $naam = $_POST['CrudNaamnaam'];
        $land = $_POST['land'];
        
        $sql = "INSERT INTO `CrudNaam` 
        (`CrudCode`, `naam`, `land`) 
        VALUES ('', '$naam', '$land')";
        $query = $conn->prepare($sql);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>