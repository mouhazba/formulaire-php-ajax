<?php 
    $prenom = $nom = $email = $telephone = $message = "";
    $prenomerror = $nomerror = $emailerror = $telephoneerror = $messageerror = "";
    $issuccess = false;
    $emailTo = "bamahadiou@gmail.com";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $prenom     = verifyInput($_POST['prenom']);
        $nom        = verifyInput($_POST['nom']);
        $email      = verifyInput($_POST['email']) ;
        $telephone  = verifyInput($_POST['telephone']);
        $message    = verifyInput($_POST['message']);
        $issuccess  = true;
        $mailText   = "";

        if(empty($prenom))
        {
            $prenomerror = "Verifier votre prenom";
            $issuccess = false;
        }
        else{
            $mailText .= "Firstname : $prenom\n";
        }
        if(empty($nom))
        {
            $nomerror = "Verifier votre nom";
            $issuccess = false;
        }
        else{
            $mailText .= "Name : $nom\n";
        }
        if(!isPhone($telephone))
        {
            $telephoneerror = "des chiffres et des espaces sont seulement permis...";
            $issuccess = false;
        }
        else{
            $mailText .= "Telephone : $telephone\n";
        }
        if(!isEmail($email) )
        {
            $emailerror = "votre email est invalide";
            $issuccess = false;
        }
        else{
            $mailText .= "Email : $email\n";
        }
        if(empty($message))
        {
            $messageerror = "Verifier votre message";
            $issuccess = false;
        }
        else{
            $mailText .= "Message : $message\n";
        }
     
        if($issuccess){
                $header = "from: $prenom $nom <$email>\r\nReply-to: $email";
                mail($emailTo,"Un message de votre cv en ligne",$mailText,$header);
                $prenom = $nom = $email = $telephone = $message = "";
            }
    }

    // bind function
    function isPhone($val){
        return preg_match("/^[0-9 ]*$/", $val);
    }
        function isEmail($val){
            return filter_var($val,FILTER_VALIDATE_EMAIL);
        }
        function  verifyInput($var)
        {
              $var = trim($var);
              $var = stripslashes($var);
              $var = htmlspecialchars($var);
                return $var;
        }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Cours php</title>
</head>
<body>
    <div class="container">
        <div class="div-rouge"></div>
        <div class="heading">
            <h2>Contactez-moi</h2>
        </div>
        <div class="row">
           <div class="col-lg-10 col-lg-offset-1">
               <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ; ?>" method="post" id="contact-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nom">Nom <span class="pointbleu"> .</span></label>
                            <input type="text " name="nom" value="<?php echo $nom ; ?>" class="form-control">
                            <p class="comments"><?php echo $nomerror ; ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="prenom">Prenom <span class="pointbleu"> .</span></label>
                            <input type="text " name="prenom" value="<?php echo $prenom ; ?>" class="form-control">
                            <p class="comments"><?php echo $prenomerror ; ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="telephone">Telephone </label>
                            <input type="tel " name="telephone" value="<?php echo $telephone ; ?>" class="form-control">
                            <p class="comments"><?php echo $telephoneerror ; ?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="prenom">email <span class="pointbleu"> .</span></label>
                            <input type="text " name="email" value="<?php echo $email ; ?>" class="form-control">
                            <p class="comments"><?php echo $emailerror ; ?></p>
                        </div>
                        <div class="col-md-12">
                            <label for="message">message <span class="pointbleu"> .</span></label>
                            <textarea name="message" id="message" class="form-control" cols="4" rows="4"><?php echo $message ; ?></textarea>
                            <p class="comments"><?php echo $messageerror ; ?></p>
                        </div>
                        <div class="col-md-12">
                            <p class="pointbleu"><strong> . Ces informations sont requises</strong></p>
                        </div>
                        <div class="col-md-12">
                          <input type="submit" value="Envoyer" class="button1">
                        </div>
                    </div>
                    <p class="merci" style="display: <?php if($issuccess) echo "block" ; else echo "none"; ?>;">Votre message a bien été envoyé. Merci de m'avoir contacté</p>
               </form>
           </div>
        </div>
    </div>
</body>
</html>