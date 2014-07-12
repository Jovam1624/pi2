<?php
/**
 * @class Coupechaine
 * ******************
 * @author Équipe3
 * @version beta
 */
//*********************
// fonction Coupechaine 
// Retourne une chaîne de 150 caractères ou moins
class Coupechaine {

    public static function coupeChaineArticle($chaine, $nbMaxCaracteres = 145) {
            
            if (strlen($chaine) > $nbMaxCaracteres) {
               
                while ($chaine{$nbMaxCaracteres} != ' ') {
                  $nbMaxCaracteres++;
                }
                return substr($chaine, 0, $nbMaxCaracteres);
            }
            else {
                return $chaine;
            }
	}
	// fonction Coupechaine 
	// Retourne une chaîne de 50 caractères ou moins
   	public static  function coupeChaineTitrePopul($chaine, $nbMaxCaracteres = 50) {
            
        if (strlen($chaine) > $nbMaxCaracteres) {
            while ($chaine{$nbMaxCaracteres} != ' ') {
                $nbMaxCaracteres++;
            }
                return substr($chaine, 0, $nbMaxCaracteres);
        }
        else {
                return $chaine;
        }
    }


}    