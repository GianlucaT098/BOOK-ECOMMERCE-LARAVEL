<?php
    //require_once 'auth.php';

    //if (checkAuth()) {
    //    header("Location: home.php");
     //   exit;
    //}   

    // Verifica l'esistenza di dati POST
    //if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && /*!empty($_POST["name"]) && 
    //    !empty($_POST["surname"]) &&*/ !empty($_POST["confirm_password"]) && !empty($_POST["allow"]))
    /*{
        $error = array();
        $conn = mysqli_connect("localhost", "root", "1965196919931998", "esercitazione1") or die(mysqli_error($conn));

        
        # USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido";
            //echo $error[0];
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            // Cerco se l'username esiste già o se appartiene a una delle 3 parole chiave indicate
            $query = "SELECT username FROM 
                ( SELECT username FROM cliente UNION ALL SELECT 'search' UNION ALL SELECT 'create' UNION ALL SELECT 'home' ) 
                AS u WHERE username = '$username'";
                //echo $query;
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
                //echo $error[0];
            }
        }
        # PASSWORD
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
            //echo $error[0];
        } 
        # CONFERMA PASSWORD
        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
            //echo $error[0];
        }
        # EMAIL
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
           //echo $error[0];
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            //echo $res;
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
                //echo $error[0];
            }
        }

        /*# UPLOAD DELL'IMMAGINE DEL PROFILO  
        if (count($error) == 0) { 
            if (isset($_FILES['avatar'])) {
                $file = $_FILES['avatar'];
                $type = exif_imagetype($file['tmp_name']);
                $allowedExt = array(IMAGETYPE_PNG => 'png', IMAGETYPE_JPEG => 'jpg', IMAGETYPE_GIF => 'gif');
                if (isset($allowedExt[$type])) {
                    if ($file['error'] === 0) {
                        if ($file['size'] < 7000000) {
                            $fileNameNew = uniqid('', true).".".$allowedExt[$type];
                            $fileDestination = 'images/'.$fileNameNew;
                            move_uploaded_file($file['tmp_name'], $fileDestination);
                        } else {
                            $error[] = "L'immagine non deve avere dimensioni maggiori di 7MB";
                        }
                    } else {
                        $error[] = "Errore nel carimento del file";
                    }
                } else {
                    $error[] = "I formati consentiti sono .png, .jpeg, .jpg e .gif";
                }
            }
        }*/

        # REGISTRAZIONE NEL DATABASE
        /*if (count($error) == 0) {
            //$name = mysqli_real_escape_string($conn, $_POST['name']);
            //$surname = mysqli_real_escape_string($conn, $_POST['surname']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            //$password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO cliente( password, username, email ) VALUES( '$password', '$username', '$email')";
            //echo $query;
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["id"] = mysqli_insert_id($conn);
                mysqli_close($conn);
                header("Location: home.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
                //echo($error[0]);
            }
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
        //echo($error[0]);
    }*/

?>


<html>
    <head>
        <link rel='stylesheet' href="{{ url('css/esame_signup.css')}}">
        <script src='signup.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--<link rel="icon" type="image/png" href="favicon.png">-->
        <meta charset="utf-8">

        <title>p - Iscriviti</title>
    </head>

    <div id="wrap">
    <div class="header">
        <a id=logo>Viviscuola</a>
        <a href="www.instagram.it">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="www.facebook.it">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="www.whatsapp.it">
          <i class="fa fa-whatsapp" aria-hidden="true"></i>
        </a>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="home.php">Home</a>
      <!--<a href="#news">News</a>-->
      <a href="#about">Informaioni</a>
      <a href="homeadd.php">Carrello</a>
      <a href='logout.php'>Esci dalla sessione</a>
      <a href='login.php'>Accedi</a>
      <a href='signup.php' class="active">Iscriviti</a>

      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>

    <body>
        <main>


            <h1>Registrati</h1>
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off" id="fo">
                @csrf
                <!--<div class="names">
                    <div class="name">
                        <div><label for='name'>Nome</label></div>-->
                        <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con 
                            i valori precedentemente inseriti -->
                        <!--<div><input type='text' name='name' <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> ></div>
                        <span>Nome strano</span>
                    </div>
                    <div class="surname">
                        <div><label for='surname'>Cognome</label></div>
                        <div><input type='text' name='surname' <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> ></div>
                        <span>Cognome strano</span>
                    </div>
                </div>-->
                <div class="f">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                </div>
                <div class="f">
                    <div><label for='email'>Email</label></div>
                    <div><input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>></div>
                </div>
                <div class="f">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                </div>
                <div class="f">
                    <div><label for='confirm_password'>Conferma Password</label></div>
                    <div><input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>></div>
                </div>
                <!--<div class="fileupload">
                    <div><label for='avatar'>Scegli un'immagine profilo</label></div>
                    <div>
                        <input type='file' name='avatar' accept='.jpg, .jpeg, image/gif, image/png' id="upload_original">
                        <div id="upload"><div class="file_name">Seleziona un file...</div><div class="file_size"></div></div>
                    </div>
                    <span>Le dimensioni del file superano 7 MB</span>
                </div>-->
                <div class="f"> 
                    <div><input type='checkbox' name='allow' value="1" <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>></div>
                    <div><label for='allow'>Accetto termini e condizioni</label></div>
                </div>
                <div class="f">
                    <input type='submit' value="Registrati" id="submit" class="buttoN">
                </div>
                @if($error == 'empty_fields')
                <section class = 'error'> Compilare tutti i campi.</section>
                @elseif($error=='bad_passwords')
                <section class = 'error'> Le password non corrispondono.</section>
                @elseif($error == 'existing')
                <section class = 'error'> Nome utente già esistente. </section>
                @endif 
                <?php

                    //if(isset($error))
                    //{
                    //    echo "<p class='errore'>";
                     //   echo $error[0];
                     //   echo "</p>";
                    //}
                ?>
            </form>
            <div class="signup">Hai un account? <a class="buttoN" href="{{ url('login') }}">Accedi</a> </div>

        </main>
        </body>

        <footer>
        <div id="logo">
        Viviscuola
        <div>
        <a href="www.instagram.it">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="www.facebook.it">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="www.whatsapp.it">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </a>
        </div>

        </div>
        <p>    
        Realizzato da Gianluca Trovato.<br/>
        Matricola: O46002295.
        </p>
        </footer>


    </div>
</html>