<?php 
// Auteur: Maohua Fan
// Functie: Algemene functies tbv hergebruik

function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "LogIn";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo "Connected successfully";
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function GetData($sql, $params = array()){
    // Connect database
    $conn = ConnectDb();

    try {
        $query = $conn->prepare($sql);
        $query->execute($params);
        $result = $query->fetchAll();
        return $result;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function Overzicht(){
    if(!empty(isset($_SESSION["account"]))){
        $username = $_SESSION["account"];

        // Retrieve the username and password from the database using the session ID
        $sql = "SELECT * FROM account WHERE username = '$username'";
        $result = GetData($sql);
        if ($result !== null && count($result) > 0) {
            $password = $result[0]["password"];

            echo "<h2>Het spel kan beginnen</h2>";
            echo "<p>Je bent ingelogd met:</p>";
            echo "Username: $username <br>";
            echo "Password: $password";
        }
    } else{
        echo "<p>U bent niet ingelogd. Log in om verder te gaan.</p>";
    }

    echo "<br><br>";

    if(!empty(isset($_SESSION["account"]))){
        echo"   <form action='Logout.php' method='post'>
                    <button name='submit'>Log out</button>	 
                </form>";
    } else{
        echo "<a href='Login.php'>Log in</a>";
    }
}

function Login(){
    if(!empty(isset($_POST['username']) && isset($_POST['password']))){
        $sql = "SELECT * FROM account";
        $result = GetData($sql);

        $username = $_POST['username'];
        $password = $_POST['password'];

        foreach ($result as $row){
            if ($row["username"] == $username && $row["password"] == $password){
                $_SESSION["account"] = $row["username"];
                header("Location: index.php");
            }
        }

    } elseif(!empty(isset($_GET['username']) && isset($_GET['password']))){
        $sql = "SELECT * FROM account";
        $result = GetData($sql);

        $username = $_GET['username'];
        $password = $_GET['password'];

        foreach ($result as $row){
            if($row["username"] == $username && $row["password"] == $password){
                $_SESSION["account"] = $row["username"];
                header("Location: index.php");
            }
        }
    }
}

function Logout(){
    session_unset();
    header('Location: Index.php');
}

function Registration(){
    if(!empty(isset($_POST['username']) && isset($_POST['password']))){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Check if username already exists in the database
        $sql = "SELECT * FROM account WHERE username = :username";
        $existingUser = GetData($sql, [':username' => $username]);
    
        if (count($existingUser) > 0) {
            // Username already exists, handle the error (e.g., display a message or redirect back to the sign-up page)
            echo "Username already exists. Please choose a different username.";
        } else{
            // Username is available, proceed with account creation
            // Insert the new user into the database using prepared statements
            $sql = "INSERT INTO account (username, password) 
                    VALUES (:username, :password)";
            $params = [
                ':username' => $username,
                ':password' => $password
            ];
            GetData($sql, $params);
    
            // Redirect to the index page or any other desired location after successful sign-up
            $url = "Login.php?username=" . urlencode($username) . "&password=" . urlencode($password);
            header("Location: " . $url);
        }
    }
}

?>