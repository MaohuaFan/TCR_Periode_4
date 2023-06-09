<?php
// Auteur: MHF
// Functie: Algemene functies tbv hergebruik
function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bieren";   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        #echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
 
function GetData($table){
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode query
    // Query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function GetCRUD($biercode){
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode query
    // Query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM bier WHERE biercode = :biercode");
    $query->bindParam(':biercode', $biercode);
    $query->execute();
    $result = $query->fetch();

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

function CrudBieren(){
    // Haal alle bier record uit de tabel 
    $result = GetData("bier");
    
    // Print table
    PrintCrudBier($result);
}

function PrintCrudBier($result){
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
        #$table .= "</tr>";
        
        $ColumnId = "biercode";
        // Wijzig knopje
        $table .= "<td>". 
            "<form method='post' action='Update_CRUD.php?$ColumnId=$row[$ColumnId]' >       
                    <button name='weizig'>Weizig</button>	 
            </form>" . "</td>";

        // Delete knopje
        $table .= "<td>". 
            "<form method='post' action='Delete_CRUD.php?$ColumnId=$row[$ColumnId]' >       
                    <button name='verwijder'>Verwijder</button>	 
            </form>" . "</td>";

        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function UpdateCRUD($row){
    echo '<h3> Update CRUD Row </h3>';
    var_dump($row);
    echo '<br>';
    try {
        // Connect database
        $conn = ConnectDb();
        $table = "bier";
        $ColumnId = "biercode";
        // Update data uit de opgegeven table methode query
        // query: is een prepare en execute in 1 zonder placeholders
        
        
        // Update data uit de opgegeven table methode prepare
        $sql = "UPDATE `$table` 
                SET 
                    `naam` = '$row[biernaam]', 
                    `soort` = '$row[soort]', 
                    `stijl` = '$row[stijl]', 
                    `alcohol` = '$row[alcohol]'
                WHERE `$table`.`$ColumnId` = $row[$ColumnId]";
        $query = $conn->prepare($sql);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function DeleteCRUD($biercode){
    echo 'Delete CRUD Row <br>';
    var_dump($biercode);
    try {
        // Connect database
        $conn = ConnectDb();
        
        $table = "bier";
        $ColumnId = "biercode";

        // Update data uit de opgegeven table methode query
        // Query: is een prepare en execute in 1 zonder placeholders
        
        $sql = "DELETE FROM $table WHERE `$table`.`$ColumnId` = :$ColumnId";
        $query = $conn->prepare($sql);
        $query->bindParam(":$ColumnId", $biercode);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function dropDown($label, $data, $row_selected){
    $ColumnId = "brouwcode";
    $txt = "
    <label for='$label'>Choose a $label:</label>
    <select name='$label' id='$label'>";
    foreach($data as $row){
        if ($row["$ColumnId"] == $row_selected){
            $txt .= "<option value='$row[$ColumnId]' selected='selected'>$row[naam]</option>";
        } else {
            $txt .= "<option value='$row[$ColumnId]'>$row[naam]</option>";
        }
    }
    $txt .= "</select>";
    echo $txt;
}

function InsertCRUD(){
    echo '<h3> Insert CRUD Row </h3>';
    echo '<br>';
    try {
        // Connect database
        $conn = ConnectDb();
        
        $naam = $_POST['biernaam'];
        $soort = $_POST['soort'];
        $stijl = $_POST['stijl'];
        $alcohol = $_POST['alcohol'];
        $brouwcode = $_POST['brouwcode'];
        
        $sql = "INSERT INTO `bier` 
        (`biercode`, `naam`, `soort`, `stijl`, `alcohol`, `brouwcode`) 
        VALUES ('', '$naam', '$soort', '$stijl', '$alcohol', '$brouwcode')";
        $query = $conn->prepare($sql);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>