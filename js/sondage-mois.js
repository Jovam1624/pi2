//<![CDATA[
$(document).ready(function () {
    // surveiller le click sur le bouton radio du poll (sondage)
    $('#sondage-mois').click(function (evt) {
        // recuperer le bouton radio choisi
        var sondage = $('input[type=radio][name=sondage]:checked'); //récuperation des boutons radios
        // recuperer l'ip de la connexion
        var monIp = $('#ip');
        //console.log(monIp.attr('value'));
        // le velu du bouton radio
        sondage = sondage.attr('value');
        // incrementer la valeur du value
        sondagePlus = parseFloat(sondage) + parseFloat(1);
        // recuperer tous les champs bouton
        var mesChBtn = $('input[type=radio][name=sondage]');
        // partie teste 
        var nbrVotants = 0;
        //parcourrir les champs bouton radio
        for (i = 0; i < mesChBtn.length; i++) {

            nbrVotants += parseFloat(mesChBtn[i].value);

        }

        // Objet Ajax pour envoyer la valeur du sondage radio 
        $.ajax({
            url: './ajaxControler.php',
            type: 'POST',
            data: {
                //la valeur du champ numéro du dossier
                //nArticle: parseInt(numeroArticle.value),
                sondage: sondagePlus
            },
            success: function (html) //si la requête a été exécutée avec succès
                {
                    //console.log('ok'); 
                }
        });

        //parseFloat($('input[type=radio][name=sondage]:checked').attr('value'))+parseFloat(1);

        //JQuery qui cache les classes pour afficher les résultats du sondage après le vote
        $('.form').addClass("form-sondage");
        $('.graphe').addClass("graphe-sondage");

        //JQuery qui affiche les résultats du sondage après le vote
        $(".chargement").each(function (index, element) {
            // mettre le text (nombre sondage) dans le graphique (rectangle)
            var pourcentage = parseInt($(element).text());
            // partie du loader qui va s'afficher entre le chargement debut et fin
            // mettre du fadein selon le temps qui faut pour que le tous se charge
            $('#spinner').addClass("icon-spinner").fadeIn(3000);
            // rajouter du fadeout
            $('#spinner').addClass("icon-spinner").fadeTo(2900, 0);
            //rajouter une rotaion
            $('#spinner').addClass("icon-spinner-rotation");
            // dessiner les rectangle dynamiquement (c'est une div)
            $(element).html('<div class="loading"></div>');
            // lui mettre du css pour 
            $(element).find('.loading').css({
                "width": "0px",
                "float": "left",
                "background-color": "#428BCA",
                "color": "white",
                "text-align": "center",
                "height": "100%"
            });

            // Anime l'affichage des résultats du graphique
            // cette partie va animer les rectangle du sondage

            $(element).find('.loading').delay(1500).animate({
                width: ($(this).width() * pourcentage) / 100
            }, 500);

            // Ajoute la valeur dans le graphique (chaque rectangle)    
            if (pourcentage > 12) $(element).find('.loading').html('<span>' + pourcentage + '</span>');


        });


    });
});
// ]]>