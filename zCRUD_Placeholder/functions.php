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

function ConnectCurrentDb(){
    // Connect Current Database
    $dbName = "bieren"; // CHANGE the $dbName to the ACTUAL database
    return $dbName;
}

function GetData($table, $column, $filter){
    // Connect Current Database
    $dbName = ConnectCurrentDb();
    $conn = ConnectDb($dbName);

    if(empty($column)){
        $column = "*";
    }

    if(empty ($filter)){
        $filters = "";
    } else {
        $filters = "WHERE ".$filter;
    }

    # Select data uit de opgegeven table methode query
    # Query: is een prepare en execute in 1 zonder placeholders
    # Select data uit de opgegeven table methode prepare

    $query = $conn->prepare("SELECT $column FROM $table $filters");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function GetBier($biercode){
    $dbName = 'bieren';
    $table = 'bier';
    $column = 'biercode';

    // Connect Database
    $conn = ConnectDb("$dbName");
    $query = $conn->prepare("SELECT * FROM $table WHERE $column = $biercode");
    $query->execute();
    $result = $query->fetch();

    return $result;
 }

function CrudOverzicht(){
    // CHANGE table column filter to designated CRUD Overview 
    $table = " `bier`,`brouwer` ";
    $column = " bier.biercode, bier.naam as biernaam, bier.soort, bier.stijl, bier.alcohol, brouwer.naam AS brouwernaam ";
    $filter = " bier.brouwcode = brouwer.brouwcode ";

    # Haal alle bier record uit de tabel 
    $result = GetData("$table","$column","$filter");
    
    // CHANGE $ColumnId to ACTUAL ID
    $ColumnId = "biercode";

    # Print table
    PrintCrudOverzicht($result, $ColumnId);
}

function PrintCrudOverzicht($result, $ColumnId){
    # Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    # Print header table
        # Haal de kolommen uit de eerste [0] van het array $result mbv array_keys
        $headers = array_keys($result[0]);
        $table .= "<tr>";
        foreach($headers as $header){
            $table .= "<th bgcolor=gray>" . $header . "</th>";   
        } $table .= "<th bgcolor=gray> Weizig </th>"; $table .= "<th bgcolor=gray> Verwijder </th>";  

    # Print elke rij
        foreach ($result as $row) {
            $table .= "<tr>";
            # Print elke kolom
            foreach ($row as $cell) {
                $table .= "<td>" . $cell . "</td>";
            }
            
            # Wijzig knopje 
            $table .= "<td>". 
                "<form method='post' action='Update_CRUD.php?$ColumnId=$row[$ColumnId]' > 
                        <button name='weizig'>Weizig</button>	 
                </form>" . "</td>";

            # Delete knopje
            $table .= "<td>". 
                "<form method='post' action='Delete_CRUD.php?$ColumnId=$row[$ColumnId]' >       
                        <button name='verwijder'>Verwijder</button>	 
                </form>" . "</td>";

            $table .= "</tr>";
        }
        $table.= "</table>";
    echo $table;
}

function GetCRUD($variant, $ColumnId, $row){
    // $ColumnID > DELETE based on id
    // $row > GetData with filter for Update


    try {
        // Connect Current Database
        $dbName = ConnectCurrentDb();
        $conn = ConnectDb($dbName);
        $table = "bier"; // CHANGE Table Name

    switch ($variant) {
        case 0: // UPDATE
            $type = "UPDATE";
            $ColumnId = "biercode";

            # Update data uit de opgegeven table methode query
            # query: is een prepare en execute in 1 zonder placeholders
            # Update data uit de opgegeven table methode prepare
        
            // CHANGE the $sql and variable names
            $sql = "$type `$table` 
            SET 
                `naam` = '$row[naam]', 
                `soort` = '$row[soort]', 
                `stijl` = '$row[stijl]', 
                `alcohol` = '$row[alcohol]', 
                `brouwcode` = '$row[brouwcode]'
            WHERE `$table`.`$ColumnId` = $row[$ColumnId]"; 
            $query = $conn->prepare($sql);
            break;

        case 1: // DELETE
            $type = "DELETE";
            var_dump($ColumnId);

            # Update data uit de opgegeven table methode query
            # Query: is een prepare en execute in 1 zonder placeholders
            $sql = "$type FROM $table WHERE `$table`.`ColumnId` = :ColumnId";
            $query = $conn->prepare($sql);
            $query->bindParam(':ColumnId', $ColumnId);
            break;

        case 2: // INSERT
            $type = "INSERT";
            var_dump($_POST);
            echo"<br>";
            $naam = $_POST['naam'];
            $soort = $_POST['soort'];
            $stijl = $_POST['stijl'];
            $alcohol = $_POST['alcohol'];
            $brouwcode = $_POST['brouwcode'];
            
            // CHANGE the $sql and variable names
            $sql = "$type INTO `$table` 
            (id, naam, soort, stijl, alcohol, brouwcode) 
            VALUES ('', $naam, $soort, $stijl, $alcohol, $brouwcode)";
            $query = $conn->prepare($sql);
            break;

    }
        echo "<h3> $type CRUD Row </h3><br>";

        $query->execute();
    } catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function dropDown($label, $ColumnId, $data, $row_selected){
    $ColumnId = "$ColumnId";
    $txt = "
    <label for='$label'>Choose a $label:</label>
    <select name='$label' id='$label'>";
    foreach($data as $row){
        if ($row["$ColumnId"] == $row_selected){
            $txt .= "<option value='$row[$ColumnId]' selected='selected'>$row[naam]</option>"; // <-- CHANGE $row[naam] if required
        } else {
            $txt .= "<option value='$row[$ColumnId]'>$row[naam]</option>"; // <-- CHANGE $row[naam] if required
        }
    }
    $txt .= "</select>";
    echo $txt;
}
?>