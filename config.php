 <?php
$host="localhost";
$user="root";
$pass="";
$db="crud_fop";

//connection work

$conn = new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "connection failed ";
 }
//insert function below
 function insertData($table_name,$data){
    global $conn;
    $cols= implode(",",array_keys($data));
    $values = implode("','",array_values($data));

    $query = $conn-> query("insert into $table_name ($cols) values ('$values')");

    return $query;
 }
 // function for calling
   function callingData($table){
    global $conn;
    $query = $conn->query("select * from $table");

    $data = $query->fetch_all(MYSQLI_ASSOC);

    return $data;
   }

   
 //delete record function

 function deleteRecord($table,$cond){
    global $conn;
    $query = $conn->query("DELETE FROM $table WHERE $cond");

    return $query;
    
 }

 //redirect method

//  function redirect($page){
//    header("location:$page");
//  }

 

 ?>