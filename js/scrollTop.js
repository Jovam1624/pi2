//<![CDATA[
// le bouton dans le pied de page (scroll top), pour retourner en haut de la page
$(document).ready(function () {
	// cibler le bouton du retour en haut
    $('.btn-retour').click(function () {
    	// animer le body et le html
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });
});
// ]]>