<?php
    $array = array("prenom" => "" , "nom" => "", "email" => "", "telephone" => "", "message" =>"", "prenomError" => "", "nomError" => "", "emailError" => "", "telephoneError" => "", "messageError" => "", "isSuccess" => false);

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $array["prenom"]    = verifyInput($_POST["prenom"]);
        $array["nom"]       = verifyInput($_POST["nom"]);
        $array["email"]     = verifyInput($_POST["email"]) ;
        $array["telephone"] = verifyInput($_POST["telephone"]);
        $array["message"]   = verifyInput($_POST["message"]);
        $array["isSuccess"] = true;

        if(empty($array["prenom"]))
        {
            $array["prenomError"] = "Verifier votre prenom";
            $array["isSuccess"]   = false;
        }
        if(empty($array["nom"]))
        {
            $array["nomError"] = "Verifier votre nom";
            $array["isSuccess"] = false;
        }
        if(!isPhone($array["telephone"]))
        {
            $array["telephoneError"] = "des chiffres et des espaces sont seulement permis...";
            $array["isSuccess"] = false;
        }
        if(!isEmail($array["email"]))
        {
            $array["emailError"] = "votre email est invalide";
            $array["isSuccess"] = false;
        }
        if(empty($array["message"]))
        {
            $array["messageError"] = "Verifier votre message";
            $array["isSuccess"] = false;
        }

        //permet de renvoyer le tableau au fichier json
        echo json_encode($array, JSON_PRETTY_PRINT);
        
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
