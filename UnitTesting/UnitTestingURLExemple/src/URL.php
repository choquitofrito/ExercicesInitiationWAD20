<?php



class URL
{
   
    // Méthode pour créer une URL valide à partir d'un string.
	// Cette méthode remplace les caractères non-valides dans l'URL pour créer une URL valide
    public function preparerURL($string, $separator = '-', $maxLength = 96)
    {
        // convertir d'UTF à ASCII
        $title = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        // enlever les symboles listés de l'url
        $title = preg_replace("%[^-/+|\w ]%", '', $title);
        // remplacer les espaces par "-"
        $title = strtolower(trim(substr($title, 0, $maxLength), '-'));
        // remplacer les symboles listés indiqués entre crochets par un "-" quand ils ne connectent pas des éléments de l'url
        $title = preg_replace("/[\/_|+ -]+/", $separator, $title);

        return $title;
    }
	
    
}