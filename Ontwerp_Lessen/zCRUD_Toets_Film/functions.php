<?php

// Auteur: Maohua Fan
// Functie: Algemene functies tbv hergebruik

function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "3dplus";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// Selecteer de data uit de opgeven table

function GetData($sql, $params = array()){
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
        $query = $conn->prepare($sql);
        $query->execute($params);
        $result = $query->fetchAll();

        return $result;
}

 // selecteer de rij van de opgeven filmid uit de table film
 function GetFilm($filmid){
    $sql = "SELECT * FROM film WHERE filmid = :filmid";
    $params = [':filmid' => $filmid];
    
    $result = GetData($sql, $params);

    return $result;
}

function CrudFilm(){
    // Menu-item   insert
    $txt = "
    <h1>Crud Film</h1>
    <nav>
		<a href='Insert_Film.php'>Toevoegen nieuwe film</a>
    </nav>";
    echo $txt."<br>";

    // Haal alle film record uit de tabel 
    $sql = "SELECT * FROM film";
    $result = GetData($sql);

    //print table
    PrintCrudFilm($result);
    
 }

 // Function 'PrintCrudFilm' print een HTML-table met data uit $result en een wzg- en -verwijder-knop.
function PrintCrudFilm($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table
        // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
        $headers = array_keys($result[0]);
        $table .= "<tr>";
        foreach($headers as $header){
            $table .= "<th bgcolor=gray>" . $header . "</th>";   
        }
        $table .= "</tr>";

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";  
        }
        
        // Wijzig knopje
        $table .= "<td>". 
            "<form method='post' action='Update_Film.php?filmid=$row[filmid]' >       
                    <button name='wijzig'>Wijzig</button>	 
            </form>" . "</td>";

        // Delete knopje
        $table .= "<td>". 
        "<form method='post' action='Delete_Film.php?filmid=$row[filmid]' >       
                <button name='verwijder'>Verwijder</button>	 
        </form>" . "</td>";
        
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}

function UpdateFilm($row){
    try{
        // Connect database
        $conn = ConnectDb();
        
        // Update data uit de opgegeven table methode prepare
        $sql = "UPDATE film
        SET 
            `filmnaam` = '$row[filmnaam]', 
            `genreid` = '$row[genreid]', 
            `releasejaar` = '$row[releasejaar]', 
            `regisseur` = '$row[regisseur]', 
            `landherkomst` = '$row[landherkomst]',
            `duur` = '$row[duur]'
        WHERE filmid = $row[filmid]";
        $query = $conn->prepare($sql);
        $query->execute();
    } catch(PDOException $e) {
        echo "Update failed: " . $e->getMessage();
    }
}

function InsertFilm($Post){
    try {
        $conn = ConnectDb();
        var_dump($Post);
        echo"<br>";

        $sql = "INSERT INTO `film`
        (`filmnaam`, `genreid`, `releasejaar`, `regisseur`, `landherkomst`, `duur`) 
        VALUES (:filmnaam, :genreid, :releasejaar, :regisseur, :landherkomst, :duur)";

        $param = 
            ([
                ':filmnaam' => $Post['filmnaam'],
                ':genreid' => $Post['genreid'],
                ':releasejaar' => $Post['releasejaar'],
                ':regisseur' => $Post['regisseur'],
                ':landherkomst' => $Post['landherkomst'],
                ':duur' => $Post['duur']
            ]);

    $query = $conn->prepare($sql);

    $query->execute($param);
    } catch(PDOException $e) {
        echo "Insert failed: " . $e->getMessage();
    }
}

function DeleteFilm($filmid){
    echo "Delete row<br>";
    try{
        // Connect database
        $conn = ConnectDb();
        
        // Update data uit de opgegeven table methode prepare
        $sql = "DELETE FROM film
                WHERE filmid = '$filmid'";
                
        $query = $conn->prepare($sql);
        $query->execute();

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function dropDownGenre($label, $row_selected){
    $sql = "SELECT DISTINCT film.genreid, genre.genrenaam FROM film, genre WHERE film.genreid = genre.genreid";
    $result = GetData($sql);
    $txt = "
    <label for='$label'>Choose a $label:</label>
        <select name='$label' id='$label'>";
    foreach($result as $row){
        if ($row['genreid'] == $row_selected){
            $txt .= "<option value='$row[genreid]' selected='selected'>$row[genrenaam]</option>\n";
        } else {
            $txt .= "<option value='$row[genreid]'>$row[genrenaam]</option>\n";
        }
    }
    $txt .= "</select>";
    echo $txt."<br>";
}

function dropDownRegisseur($label, $row_selected){
    $sql = "SELECT DISTINCT regisseur FROM film";
    $result = GetData($sql);
    $txt = "
    <label for='$label'>Choose a $label:</label>
        <select name='$label' id='$label'>";
    foreach($result as $row){
        if ($row['regisseur'] == $row_selected){
            $txt .= "<option value='$row[regisseur]' selected='selected'>$row[regisseur]</option>\n";
        } else {
            $txt .= "<option value='$row[regisseur]'>$row[regisseur]</option>\n";
        }
    }
    $txt .= "</select>";
    echo $txt."<br>";
}

function dropDownLand($label, $row_selected){
    $sql = "SELECT DISTINCT landherkomst FROM film";
    $result = GetData($sql);
    $txt = "
    <label for='$label'>Choose a $label:</label>
        <select name='$label' id='$label'>";
    foreach($result as $row){
        if ($row['landherkomst'] == $row_selected){
            $txt .= "<option value='$row[landherkomst]' selected='selected'>$row[landherkomst]</option>\n";
        } else {
            $txt .= "<option value='$row[landherkomst]'>$row[landherkomst]</option>\n";
        }
    }
    $txt .= "</select>";
    echo $txt."<br>";
}

?>