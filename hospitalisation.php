<?php
session_start();
include_once "config.php";
$num_secu=$_SESSION["num_secu"];
$query = "SELECT `Nom`, `Prénom` ,`ID` FROM `personnel` WHERE Metier = 1";
$stmt = $pdo->prepare($query);
$stmt->execute();
$result=$stmt->fetchAll();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type =  $_REQUEST['type'];
    $date =  $_REQUEST['date'];
    $heure =  $_REQUEST['heure'];
    $medecin =  $_REQUEST['medecin'];

    $sql="INSERT INTO `hospitalisation`(`Date`, `type`, `Num_secu`, `Heure`, `Chambre`, `Docteur`) VALUES ('$date','$type','$num_secu','$heure','1','$medecin')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    header('location:');}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="icon" type="image/png" sizes="32x32" href="https://ibb.co/XYBMjYG">
  <link href="LOGIN PAGE\principale.css" rel="stylesheet" />
</head>
<body>
<div class="mainscreen">
    <div class="card">
        <div class="leftside">
            <img src="LOGIN PAGE/IMG/4990224-removebg-preview.png" alt="">
        </div>
        <div class="rightside">
            <form method="POST">
                <h1>Inscrire un Patient</h1>
                <div class="nom">
               <div class="sec-2">
                <ion-icon name="accessibility-outline"></ion-icon>
                 <input type="text" name="num_secu" placeholder="Numero de sécurité social"/>
                </div>
              </div>

              <div class="prenom">
               <div class="sec-2">
                <ion-icon name="accessibility-outline"></ion-icon>
                <select name="type" id="type_pre">
                    <option value="">Type</option>
                    <option value="chirurgie">Ambulatoire chirurgie</option>
                    <option value="hospitalisation">Hospitalisation (au moins une nuit)</option>
                </select>
                </div>
              </div>

             <div class="nom">
                <label for="email"></label>
                <div class="sec-2">
                 <ion-icon name="accessibility-outline"></ion-icon>
                 <input type="date" id="date" name="date" value="">
                </div>
             </div>

             <div class="nom">
               <div class="sec-2">
                <ion-icon name="accessibility-outline"></ion-icon>
                    <input type="time" id="heure" name="heure" value="heure">
                </div>
              </div>

                <div class="nom">
                <div class="sec-2">
                    <ion-icon name="accessibility-outline"></ion-icon>
                        <select name="medecin" id="medecin">
                            <option value="">Choix</option>
                            <?php 
                                foreach ($result as $result){
                                    ?>
                                    <option value="<?php echo $result['ID'] ?>"><?php echo$result['Nom']?> </option> 
                                    <?php
                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="button">Suivant ></button>
            </form>

            <form method="POST" action="logout.php">
                <button type="submit" class="buttonn">Déconnexion</button>
            </form>
        </div>
    </div>
</div>
    

</body>
</html>