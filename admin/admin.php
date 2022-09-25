<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
    <title>Admin-Dashboard</title>
</head>
<body>
  <h1 class="text-center text-primary">Page de demande</h1>
    <table class="table table-bordered mt-5">
        <tr  class="text-center">
        <th>Id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Niveau D'étude</th>
        <th>Matiere</th>
        <th>Personnes</th>
        </tr>
    <?php 

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "mstic_userdb";
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
   
   $sql = "SELECT * FROM mstic_user";
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
    
     // output data of each row
     while($row = $result->fetch_assoc()) {
        ?>
        
        <tr class="bg-secondary text-light">
            <td><?=$row["id"]; ?></td>
            <td><?=$row["nom"]; ?></td>
            <td><?=$row["prenom"]; ?></td>
            <td><?=$row["email"]; ?></td>
            <td><?=$row["phone"]; ?></td>
            <td><?=$row["niveau_etude"]; ?></td>
            <td><?=$row["matiere"]; ?></td>
            <td><?=$row["person"]; ?></td>
        </tr>
        
        
        <?php
     }
     echo "</table>";
   } else {
     echo "0 results";
   }
   $conn->close();
   ?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>