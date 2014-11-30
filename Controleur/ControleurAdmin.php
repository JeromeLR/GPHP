<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Admin.php';
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
    private $admin;

    /**
     * Constructeur 
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
        
        $this->admin = new Admin();
    }

    /**
     * page principale Admin 
     */
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
   
    /**
     * Page de mofdification de l'Article selectionné
     */
    public function modifierArticle() {
        
        $idArticle = $this->requete->getParametre("id");
        
        $article = $this->admin->getArticle($idArticle);
        
        $this->genererVue(
                array(
                    'billet' => $article
        ));
        
    }
    
     /**
     * Article : Enregistrement du nouveau contenu
     */
     public function majArticle() {
        
        $idBillet = $this->requete->getParametre("id");
        
        $nomArticle = $this->requete->getParametre("titre");
        
        $contenu = $this->requete->getParametre("contenu");
        
        $this->admin->MajArticle( $nomArticle, $contenu, $idBillet);
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
    
     /**
     * Article : Supprimer
     */
     public function SupprimerArticle() {
        
        $idArticle = $this->requete->getParametre("id");
        
        $this->admin->delArticle( $idArticle);
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
    

    
    public function ajouterArticle() {
        
         
        $titre = $this->requete->getParametre("titre");
        
        $this->admin->addArticle($titre);
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        //$this->executerAction("Admin/index");
        //var_dump($this);
        $this->executerAction("index");
    }

}

