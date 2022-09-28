<?php

$servername = "mysql-gaga.alwaysdata.net";
$username = "gaga";
$password = "lovelinam";
$dbname = "gaga_mstic";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Define variable
$nom = "";
$prenom = "";
$email = "";
$phone = "";
$niveau_etude = "";
$matiere = $person = "";
$nom_err = "";
$prenom_err = ""; 
$email_err = "";
$phone_err = "";
$niveau_etude_err = ""; 
$matiere_err = "";
$person_err = "";
$add_date = date('d-M-Y H:i', time());
date_default_timezone_set('Africa/Lome');

//Processing form data when form is submitted
if (isset($_POST["submit"])) {


  // Validate lastname
  if (empty(trim($_POST["nom"]))) {
    $nom_err = "Veuillez renseigner le champ nom ";
  } else {
    $nom = trim($_POST["nom"]);
  }

  // Validate firstname
  if (empty(trim($_POST["prenom"]))) {
    $prenom_err = "Veuillez renseigner le champ prénom";
  } else {
    $prenom = trim($_POST["prenom"]);
  }

  // Validate email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Veuillez entrer une adresse mail valide";
  } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
    $email_err = "Email non valide";
  } else {
    $email = trim($_POST["email"]);
  }

  // Validate phone number
  if (empty(trim($_POST["phone"]))) {
    $phone_err = "Veuillez entrez un numéro de téléphone";
  } elseif (!preg_match('/^\+?[1-9][0-9]{7,14}$/', trim($_POST["phone"]))) {
    $phone_err = "Veuillez entrer un numéro de téléphone valide";
  } else {
    $phone = trim($_POST["phone"]);
  }
  // Validate study level
  if (empty(trim($_POST["niveau_etude"]))) {
    $niveau_etude_err = "Veuillez entrer un niveau d'étude";
  } else {
    $niveau_etude = trim($_POST["niveau_etude"]);
  }

  // Validate lesson
  if (empty(trim($_POST["matiere"]))) {
    $matiere_err = "Veuillez entrer une matière";
  } else {
    $matiere = trim($_POST["matiere"]);
  }
  // // Validate person
  if (empty(trim($_POST["personne"]))) {
    $person_err = "Veuillez cocher soit parent ou soit répétiteur ";
  } else {
    $person = trim($_POST["personne"]);
  }

  // Check input errors before inserting in database
  if (empty($nom_err) && empty($prenom_err) && empty($email_err) && empty($phone_err) && empty($niveau_etude_err) && empty($matiere_err) && empty($person_err)) {

    // Prepare an insert into table
    $sql = "INSERT INTO mstic_user (nom, prenom, email, phone, niveau_etude, matiere, person, datecreation)
    VALUES ('$nom', '$prenom', '$email', '$phone', '$niveau_etude', '$matiere', '$person', '$add_date')";

    //Attempt to execute 
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('New record created successfully')</script>";
      echo "<script>window.open('../index.php','_self')</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
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
<style>
  .error {
    color: red;
  }
</style>

<body>
  <div class="container">
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

        <div class="information">
          <img src="img/email.png" class="icon" alt="" />
          <p>agencemstic@gmail.com</p>
        </div>
        <div class="information">
          <img src="img/phone.png" class="icon" alt="" />
          <p> 228 98177711 <br>
            228 92459138</p>
        </div>


        <div class="social-media">
          <p style="color: #00FF01; font-family:fantasy; font-size:large"> Restons connectés </p>
          <div class="social-icons">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>

            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="contact-form">

        <form action="" method="post" autocomplete="off">

          <div class="input-container">

            <input type="text" name="nom" class="input" />
            <label for="">Nom</label>
            <span>Nom</span>
            <p class="error"><?= $nom_err; ?></p>
          </div>

          <div class="input-container">
            <label for="">Prénom</label>
            <input type="text" name="prenom" class="input" />
            <span>Prénom</span>
            <p class="error"><?php echo $prenom_err; ?></p>

          </div>
          <div class="input-container">
            <label for="">Votre email</label>
            <input type="email" name="email" class="input" />
            <span>Votre email</span>
            <p class="error"><?php echo $email_err; ?></p>
          </div>

          <div class="input-container">
            <label for="">Numéro de téléphone</label>
            <input type="tel" name="phone" class="input" />
            <span>Numéro de téléphone</span>
            <p class="error"><?php echo $phone_err; ?></p>
          </div>


          <div class="etude" >
          

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
                <option value="5ème">5ème</sup></option>
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
            <p class="error"><?php echo $niveau_etude_err; ?></p>
          </div>

          <div class="input-container">
            <label for="">Matière</label>
            <input type="matière à enseigner" name="matiere" class="input" />
            <span>Matière</span>
            <p class="error"><?php echo $matiere_err; ?></p>
          </div>
          
          <div class="person">
            <label for="">Êtes-vous?:</label> <br>
            Parent <input type="radio" value="parent" name="personne">
            Répétiteur <input type="radio" value="répétiteur" name="personne">
          </div>
          <p class="error"><?php echo $person_err; ?> </p>


          <input type="submit" name="submit" value="Soumettre" class="btn" />
        </form>
      </div>
    </div>
  </div>

  <script src="app.js"></script>

      <!-- Section Footer -->
      <footer class="text-center text-lg-start text-white">

<hr>
<section class="p-3 pt-0">
    <div class="row d-flex align-items-center">

        <div class="col-md-7 col-lg-8 text-center text-md-start">

            <div class="p-3">
                © 2022 Copyright:
                <a class="text-white" href="#">MSTIC REPETITION</a>
            </div>


        </div>

        <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">

            <a href="https://goo.gl/maps/X4mYyaH4N8YecZPR8" class="btn btn-outline-light btn-floating m-1" target="_blank"><i class="bi bi-geo-alt"></i></a>
            <a href="https://mobile.twitter.com/MsticRepetition" class="btn btn-outline-light btn-floating m-1" class="text-white" role="button" target="_blank"><i class="bx bxl-twitter"></i></a>
            <a href="https://www.facebook.com/mstic.repetition" class="btn btn-outline-light btn-floating m-1" target="_blank"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.linkedin.com/in/agence-mstic-agence-mstic-071b2a1b8" class="btn btn-outline-light btn-floating m-1" target="_blank"><i class="bx bxl-linkedin"></i></a>

        </div>

    </div>
</section>
               
</footer>


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 <!-- Section footer end -->
</body>

</html>