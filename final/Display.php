<!DOCTYPE html>
<html>
<body>

    <h1>
         ORDER BY </h1>
         <form action="Display.php" method="get">
<select id="drop" name="drop">
  <option value="Age" selected>AGE</option>
  <option value="Gender">Gender</option>

  <option value="Cohort">Cohort</option>
</select>
<input type="submit" value="Submit!">
</form>
<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>Firstname</th><th>Lastname</th><th>Gender</th><th>Age</th><th>Phone Number</th><th>Cohort</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
     function __construct($it) { 
         parent::__construct($it, self::LEAVES_ONLY); 
     }

     function current() {
         return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
     }

     function beginChildren() { 
         echo "<tr>"; 
     } 

     function endChildren() { 
         echo "</tr>" . "\n";
     } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csv_db";



try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT  `First name`, `Last name`,Gender,Age,phone_number,Cohort FROM tbl_name ORDER BY  DESC"); 
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
         echo $v;
     }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>  

    
</body>
</html>