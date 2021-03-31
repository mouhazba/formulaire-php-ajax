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
    <script src="asset/js/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="div-rouge"></div>
        <div class="heading">
            <h2>Contactez-moi</h2>
        </div>
        <div class="row">
           <div class="col-lg-10 col-lg-offset-1">
               <form action="" method="post" id="contact-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nom">Nom <span class="pointbleu"> *</span></label>
                            <input type="text " name="nom"  class="form-control" id="nom">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="prenom">Prenom <span class="pointbleu"> *</span></label>
                            <input type="text " name="prenom"  class="form-control" id="prenom">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="telephone">Telephone </label>
                            <input type="tel " name="telephone"  class="form-control" id="telephone">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="email">email <span class="pointbleu"> *</span></label>
                            <input type="text " name="email"  class="form-control" id="email">
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-12">
                            <label for="message">message <span class="pointbleu"> *</span></label>
                            <textarea name="message" id="message" class="form-control" rows="4"></textarea>
                            <p class="comments"></p>
                        </div>
                        <div class="col-md-12">
                            <p class="pointbleu"><strong> * Ces informations sont requises</strong></p>
                        </div>
                        <div class="col-md-12">
                          <input type="submit" value="Envoyer" class="button1">
                        </div>
                    </div>
               </form>
           </div>
        </div>
    </div>
</body>
</html>