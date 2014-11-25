<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

/**
 * Contrôleur des actions d'administration
 *
 * @author Baptiste Pesquet
 */
class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;

    /**
     * Constructeur 
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    public function index()
    {
        $nbBillets = $this->billet->getNombreBillets();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        
        $billets = $this->billet->getBillets();
        
        $login = $this->requete->getSession()->getAttribut("login");
        
        $this->genererVue(array(
            'billets' => $billets,
            'nbBillets' => $nbBillets, 
            'nbCommentaires' => $nbCommentaires, 
            'login' => $login)
         );
    }
   
     // Affiche les détails sur un billet
    public function modifierArticle() {
        
        $idBillet = $this->requete->getParametre("id");
        
        $billet = $this->billet->getBillet($idBillet);
        //$commentaires = $this->commentaire->getCommentaires($idBillet);
        
        $this->genererVue(
                array(
                    'billet' => $billet
                ));
    }

}

