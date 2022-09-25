<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mstic_userdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$nom = "";
$prenom = "";
$email = "";
$phone = "";
$niveau_etude = "";
$matiere = "";
$person = "";

if (isset($_POST["submit"])) {
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $niveau_etude = $_POST["niveau_etude"];
  $matiere = $_POST["matiere"];
  $person = $_POST["person"];

    $sql = "INSERT INTO mstic_user (nom, prenom, email, phone, niveau_etude, matiere, person)
    VALUES ('$nom', '$prenom', '$email', '$phone', '$niveau_etude', '$matiere', '$person')";
    
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('New record created successfully')</script>";
      echo "<script>window.open('../index.php','_self')</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="style.css" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <!-- <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" /> -->
    <div class="form">
      <div class="contact-info">
        <h3 class="title" style="color:blue; font-family: fantasy;">NOUS CONTACTER </h3>
        <p class="text">
          Vous avez une question?
          Une demande particulière?
          Écrivez-nous directectement à <span style="color:blue">agencemstic@gmail.com</span> ou via le formulaire de
          contact ci-contre.

          Nous vous répondrons dans les plus brefs délais.
        </p>

        <div class="info">
          <!-- <div class="information">
              <img src="img/location.png" class="icon" alt="" />
              <p>92 Cherry Drive Uniondale, NY 11553</p>
            </div> -->
          <div class="information">
            <img src="img/email.png" class="icon" alt="" />
            <p>agencemstic@gmail.com</p>
          </div>
          <div class="information">
            <img src="img/phone.png" class="icon" alt="" />
            <p> 228 98177711 <br>
              228 92459138</p>
          </div>
        </div>

        <div class="social-media">
          <p style="color: #00FF01; font-family:fantasy; font-size:large"> Restons connectés </p>
          <div class="social-icons">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <!-- <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a> -->
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <!-- <span class="circle one"></span>
          <span class="circle two"></span> -->

        <form action="" method="post" autocomplete="off">
          <!-- <h3 class="title">Contact us</h3> -->
          <div class="input-container">

            <input required type="text" name="nom" class="input" />
            <label for="">Nom</label>
            <span>Nom</span>
          </div>
          <div class="input-container">
            <label for="">Prénom</label>
            <input required type="text" name="prenom" class="input" />
            <span>Prénom</span>
          </div>
          <div class="input-container">
            <label for="">Votre email</label>
            <input required type="email" name="email" class="input" />
            <span>Votre email</span>
          </div>
          <div class="input-container">
            <label for="">Numéro de téléphone</label>
            <input required type="tel" name="phone" class="input" />
            <span>Numéro de téléphone</span>
          </div>
          <div class="input-container" id="test">



            <!-- <span>Niveau d'étude</span> -->
            <!-- <div class= "etude" style="border: 2px solid #fff;border-radius: 5px; padding:8px"> -->

            <select name="niveau_etude">
              <option>Selectionner un niveau d'étude</option>
              <optgroup>
                <option value="CP1">CP1</option>
                <option value="CP2">CP2</option>
                <option value="CE1">CE1</option>
                <option value="CE2">CE2</option>
                <option value="CM1">CM1</option>
                <option value="CM2">CM2</option>
              </optgroup>

              <optgroup>
                <!-- <option value="" selected>Collège</option> -->
                <option value="6ème">6ème</sup> </option>
                <option value="5ème">4ème</sup></option>
                <option value="4ème">4ème</sup></option>
                <option value="3ème">3ème</sup></option>
              </optgroup>
              <optgroup>
                <!-- <option value="" selected>Lycée</option> -->
                <option value="2nd">2nd</option>
                <option value="1ère">1ère</option>
                <option value="Tle">Tle</option>
              </optgroup>
            </select>

            <div class="input-container">
              <label for="">Matière</label>
              <input required type="matière à enseigner" name="matiere" class="input" />
              <span>Matière</span>
            </div>
            <!-- <br> <br> <br> <br> -->
            <div class="person">
              <label for="">Êtes-vous?:</label>
              Parent <input type="radio" value="parent" name="person">
              Répétiteur <input type="radio" value="répétiteur" name="person">
            </div>
            <input type="submit" name="submit" value="Soumettre" class="btn" />
        </form>
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>