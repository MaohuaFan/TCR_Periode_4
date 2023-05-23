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

 function GetData($column, $table, $category, $filters){
    if(empty($column)){
        $column = "*";
    }
    if(empty($filters)){
        $filter = ""; // Full Syntax
        $category = ""; // raw category name // biercode
                        //filters = categoryid // filters = $biercode
    }else{
        $categoryparam =":".$category; // :biercode
        $filter = "WHERE ".$category." = ".$categoryparam; // WHERE biercode = :biercode
    }

    // Connect database
    $dbName = "bieren";
    $conn = ConnectDb($dbName);

    // Select data uit de opgegeven table methode query
    // Query: is een prepare en execute in 1 zonder placeholders
    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT $column FROM $table $filter");
    if(!empty($filter)){
        $query->bindParam("$categoryparam", $filters); // ":biercode",$biercode
    }
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }

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
}


function CrudBrouwer(){
    // Haal alle brouwer record uit de tabel 
    $result = GetData("", "brouwer");
    
    // Print table
    PrintCrudBrouwer($result);
 }

function PrintCrudBrouwer($result){
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
            "<form method='post' action='update_brouwer.php?brouwcode=$row[brouwcode]' >       
                    <button name='weizig'>Weizig</button>	 
            </form>" . "</td>";
        
        $table .= "<td>". 
            "<form method='post' action='delete_brouwer.php?brouwcode=$row[brouwcode]' >       
                    <button name='verwijder'>Verwijder</button>	 
            </form>" . "</td>";

        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function UpdateBrouwer(){
    echo '<h3> Update row </h3>';
    var_dump($_POST);
    echo '<br>';
    try {
        // Connect database
        $conn = ConnectDb();
        
        $brouwcode = $_POST['brouwcode'];
        $naam = $_POST['brouwernaam'];
        $land = $_POST['land'];
        // Update data uit de opgegeven table methode query
        // query: is een prepare en execute in 1 zonder placeholders
        
        // Update data uit de opgegeven table methode prepare
        $sql = "UPDATE `brouwer` 
                SET 
                    `naam` = '$naam', 
                    `land` = '$land' 
                WHERE `brouwer`.`brouwcode` = $brouwcode";
        $query = $conn->prepare($sql);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function DeleteBrouwer($brouwcode){
    echo 'Delete row <br>';
    var_dump($brouwcode);
    try {
        // Connect database
        $conn = ConnectDb();
        
        // Update data uit de opgegeven table methode query
        // Query: is een prepare en execute in 1 zonder placeholders
        
        $sql = "DELETE FROM brouwer WHERE `brouwer`.`brouwcode` = :brouwcode";
        $query = $conn->prepare($sql);
        $query->bindParam(':brouwcode', $brouwcode);
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

function insertBrouwer(){
    echo '<h3> Insert Brouwer </h3>';
    echo '<br>';
    try {
        // Connect database
        $conn = ConnectDb();
        
        $naam = $_POST['brouwernaam'];
        $land = $_POST['land'];
        
        $sql = "INSERT INTO `brouwer` 
        (`brouwcode`, `naam`, `land`) 
        VALUES ('', '$naam', '$land')";
        $query = $conn->prepare($sql);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>