<?php
// Auteur: Wigmans
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

 
 
 function GetData($dbName, $table, $columns, /*$filternaam,*/ $filter){
    if(empty($columns)){
        $columns = "*";
    }

    // Connect database
    $conn = ConnectDb($dbName);

    // Select data uit de opgegeven table methode query
    // Query: is een prepare en execute in 1 zonder placeholders
    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT $columns FROM $table $filter");
    //$query = $conn->prepare("SELECT bier.biercode, bier.naam AS biernaam, bier.soort, bier.stijl, bier.alcohol, brouwer.naam AS brouwernaam FROM `bier`,`brouwer` 
    //WHERE bier.brouwcode = brouwer.brouwcode;");
    
/*
    if(!empty($filter)){
        $query->bindParam("$filternaamparam", $filters); // ":biercode",$biercode
    }
*/

    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }
 
function CrudBieren(){
    $dbName = "bieren";
    $tables = " `bier`,`brouwer` ";
    $columns = " bier.biercode, bier.naam as biernaam, bier.soort, bier.stijl, bier.alcohol, brouwer.naam AS brouwernaam ";
    $filter = " WHERE bier.brouwcode = brouwer.brouwcode ";
/*
    if(empty($filters)){
        $filter = ""; // Full Syntax
        $filternaam = ""; // raw category name // biercode
                        //filters = categoryid // filters = $biercode
    }else{
        $filternaamparam =":".$filternaam; // :biercode
        $filter = "WHERE ".$filternaam." = ".$filternaamparam; // WHERE biercode = :biercode
    }
*/

    // Haal alle bier record uit de tabel 
    $result = GetData("$dbName","$tables","$columns", "$filter");
    
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
    } /*Edit*/ $table .= "<th bgcolor=gray> Weizig </th>"; $table .= "<th bgcolor=gray> Verwijder </th>";  

    // Print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // Print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        #$table .= "</tr>";
        
        // Wijzig knopje
        $table .= "<td>". 
            "<form method='post' action='update_bier.php?biercode=$row[biercode]&parameter1=testje' >       
                    <button name='weizig'>Weizig</button>	 
            </form>" . "</td>";

        // Delete via linkje href
        #$table .= '<td><a href="delete_bier.php?biercode='.$row["biercode"].'">Verwijder</a></td>';
        
        $table .= "<td>". 
            "<form method='post' action='delete_bier.php?biercode=$row[biercode]&parameter1=testje' >       
                    <button name='verwijder'>Verwijder</button>	 
            </form>" . "</td>";

        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function UpdateBier($row){
    echo '<h3> Update row </h3>';
    var_dump($row);
    echo '<br>';
    try {
        // Connect database
        $conn = ConnectDb();
        
        // Update data uit de opgegeven table methode query
        // query: is een prepare en execute in 1 zonder placeholders
        
        
        // Update data uit de opgegeven table methode prepare
        $sql = "UPDATE `bier` 
                SET 
                    `naam` = '$row[biernaam]', 
                    `soort` = '$row[soort]', 
                    `stijl` = '$row[stijl]', 
                    `alcohol` = '$row[alcohol]' 
                    /*`brouwcode` = '$row[brouwcode]'*/
                WHERE `bier`.`biercode` = $row[biercode]";
        #$conn->exec($sql);
        $query = $conn->prepare($sql);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function DeleteBier($biercode){
    echo 'Delete row <br>';
    var_dump($biercode);
    try {
        // Connect database
        $conn = ConnectDb();
        
        // Update data uit de opgegeven table methode query
        // Query: is een prepare en execute in 1 zonder placeholders
        
        
        $sql = "DELETE FROM bier WHERE `bier`.`biercode` = :biercode";
        #$conn->exec($sql);
        $query = $conn->prepare($sql);
        $query->bindParam(':biercode', $biercode);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

/*function OptionsBrouwcode(){
    $table = "bier";

    $conn = ConnectDb();
    
    $query = $conn->prepare("SELECT DISTINCT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();
    
    foreach($result as &$data){
        echo'<option value="'.$data['brouwcode'].'">'.$data['brouwcode'].'</option>';            
    }
}
*/
/*
function dropDown_($label, $data){
    $text = "<label for='$label'>Choose a $label:</label>

    <select name='$label' id='$label'>";
    foreach($data as $row){
        $text .="<option value='$row[brouwcode]'>$row[naam]</option>";
    }

    $text .= "</select>";
    echo "$text <br>";
}*/

function dropDown($label, $data, $row_selected){
    $txt = "
    <label for='$label'>Choose a $label:</label>
    <select name='$label' id='$label'>";
    foreach($data as $row){
        if ($row['brouwcode'] == $row_selected){
            $txt .= "<option value='$row[brouwcode]' selected='selected'>$row[naam]</option>";
        } else {
            $txt .= "<option value='$row[brouwcode]'>$row[naam]</option>";
        }
    }
    $txt .= "</select>";
    echo $txt;
}

function insertBier(){
    echo '<h3> Insert bier </h3>';
    echo '<br>';
    try {
        // Connect database
        $conn = ConnectDb();
        
        #$biercode = $_POST['biercode'];
        $naam = $_POST['biernaam'];
        $soort = $_POST['soort'];
        $stijl = $_POST['stijl'];
        $alcohol = $_POST['alcohol'];
        $brouwcode = $_POST['brouwcode'];
        
        
        $sql = "INSERT INTO `bier` 
        (`biercode`, `naam`, `soort`, `stijl`, `alcohol`, `brouwcode`) 
        VALUES ('', '$naam', '$soort', '$stijl', '$alcohol', '$brouwcode')";
        #$conn->exec($sql);
        $query = $conn->prepare($sql);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>