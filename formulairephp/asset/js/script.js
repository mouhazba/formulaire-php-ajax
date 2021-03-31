$(function() {
    $("#contact-form").submit(function(e) {
        e.preventDefault();
        //vider au debut tous les messages d'erreurs
        $('.comments').empty();
        var postdata = $('#contact-form').serialize(); // la valeur à renvoyer au php

        $.ajax({
            type: 'POST',
            url: 'contact.php',
            data: postdata,
            cache: false,
            //statusCode: true,
            //error: true,
            datatype: 'json',
            success: function(result) {
                //parser le resultat renvoyé par contact.php
                var jsdata = JSON.parse(result);
                //le result equivaut au $array renvoyer par script php
                if (jsdata.isSuccess) {

                    $("#contact-form").append("<p class='merci'>Votre message a bien été envoyé. Merci de m'avoir contacté</p>");
                    $("#contact-form")[0].reset();
                } else {
                    $("#nom       + .comments").html(jsdata.nomError); //msge d'erreur
                    $("#prenom    + .comments").html(jsdata.prenomError);
                    $("#email     + .comments").html(jsdata.emailError);
                    $("#telephone + .comments").html(jsdata.telephoneError);
                    $("#message   + .comments").html(jsdata.messageError);
                }
            }

        });
    });

})