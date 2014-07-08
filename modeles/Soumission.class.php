<?php
/**
 * @class Soumission
 * @reference : http://pastebin.com/56btLT51
 * À adapter pour la version finale
 * @author : Équipe 3 (Code à partir de la référence)
 * @version Beta
 */
class Soumission
{
    private $membre_ID;
    private $date_soumis;
    private $brevet_No;
    private $categorie;
    private $titre;
    private $contenu;
  
    public function __construct($membre_ID = '', $date_soumis = '', $brevet_No = '', $categorie = '',
                                $titre = '', $contenu = '')
    {
        $this->membre_ID    = $membre_ID;
        $this->date_soumis  = $date_soumis;
        $this->brevet_No    = $brevet_No;
        $this->categorie    = $categorie;
        $this->titre        = $titre;
        $this->contenu      = $contenu;
    }
 
     public function toHTML()
     {
         $html = sprintf('<strong>Membre ID :</strong><em>%s</em><br />', 
                 htmlspecialchars($this->membre_ID))
              . sprintf('<strong>Date de soumission :</strong><em>%s</em><br />', 
                  htmlspecialchars($this->date_soumis))
              . sprintf('<strong>No. de brevet :</strong><em>%s</em><br />', 
                  htmlspecialchars($this->brevet_No))
              . sprintf('<strong>Catégorie :</strong><em>%s</em><br />', 
                  htmlspecialchars($this->categorie))
              . sprintf('<strong>Titre :</strong><em>%s</em><br />', 
                  htmlspecialchars($this->titre))
              . sprintf('<strong>Texte :</strong><em>%s</em><br />', 
                  htmlspecialchars($this->contenu));

         return $html;
      }
 
     public function formulaire()
     {
         $html = sprintf('<label>Membre ID :         <input type="text" name="membre_ID" value="%s"/></label><br />', 
                 htmlspecialchars($this->membre_ID))
               . sprintf('<label>Date de soumission :<input type="date" name="date_soumis" value="%s"/></label><br />', 
                   htmlspecialchars($this->date_soumis))
               . sprintf('<label>No. de brevet :     <input type="text" name="brevet_No" value="%s"/></label><br />', 
                   htmlspecialchars($this->brevet_No))
               . sprintf('<select>
                            <option value="sante">Santé</option>
                            <option value="environnement">Environnement</option>
                            <option value="education">Éducation</option>
                            <option value="technologie">Technologie</option>
                            <option value="insolite">Insolite</option>    
                        </select><br />', 
                   htmlspecialchars($this->categorie))
               . sprintf('<label>Titre :             <input type="text" name="titre" value="%s"/></label><br />', 
                   htmlspecialchars($this->titre))
              . sprintf('<textarea name="adresse" rows="8" cols="45"    name="contenu" value=%s"/></label><br />',
                  htmlspecialchars($this->contenu));
              
        return $html;
     }
 
     public function extraire_form()
     {        
         foreach($_REQUEST as $key => $value)
         {
            $this->{$key} = $value;
         }
     }
     
     private $membre_ID;
    private $date_soumis;
    private $brevet_No;
    private $categorie;
    private $titre;
    private $contenu;
    public function valider()
    {
        $this->extraire_form();
         
        foreach(get_object_vars($this) as $key => $value)
        {
            switch($key)
            {
                case 'membre_ID':
                    if(empty($value))
                    {
                        return false;
                    }
                    break;
                case 'date_soumis':
                    if(empty($value))
                    {
                        return false;
                    }
                    break;
                case 'brevet_No':
                    if(empty($value))
                    {
                        return false;
                    }
                    break;
                break;
                case 'categorie':
                    if(empty($value))
                    {
                        return false;
                    }
                    break;
               case 'titre':
                    if(empty($value))
                    {
                        return false;
                    }
                    break;
               case 'contenu':
                    if(empty($value))
                    {
                        return false;
                    }
                    break;
            }
        }

        return true;
    } 
}