<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

require_once 'Controleur/ControleurAdmin.php';
/**
 * Contrôleur des actions liées aux billets
 *
 * @author Baptiste Pesquet
 */
class ControleurBillet extends Controleur {

    private $billet;
    private $commentaire;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function index() {
        
        $idBillet = $this->requete->getParametre("id");
        
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        
        $this->genererVue(
            array(
                'billet' => $billet, 
                'commentaires' => $commentaires
            ));
    }
    
      public function admin() {
        
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

    // Ajoute un commentaire sur un billet
    public function commenter() {
        
        $idBillet = $this->requete->getParametre("id");
        
        $auteur = $this->requete->getParametre("auteur");
        
        $contenu = $this->requete->getParametre("contenu");
        
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
    
    public function modifier() {
        
        $idBillet = $this->requete->getParametre("id");
        
        //$auteur = $this->requete->getParametre("auteur");
        
        $contenu = $this->requete->getParametre("contenu");
        
        $this->billet->modifierBillet( $contenu, $idBillet);
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        //$this->executerAction("index");
        $this->executerAction("admin");
    }
    
     public function ajouter() {
        
         
        $titre = $this->requete->getParametre("titre");
        
        $this->billet->ajouterBillet($titre);
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        //$this->executerAction("Admin/index");
        //var_dump($this);
        $this->executerAction("index");
    }
}

