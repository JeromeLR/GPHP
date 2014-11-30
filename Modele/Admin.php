<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Admin extends Modele {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getBillets() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' order by BIL_ID desc';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getArticle($idBillet) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' where BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }
    
    public function MajArticle( $titreArticle, $contenu, $idBillet) {
      
        $sql = 'update T_BILLET set BIL_TITRE=?, BIL_CONTENU=? where BIL_ID=?';
        
        $this->executerRequete($sql, array( $titreArticle, $contenu, $idBillet));
    }
    
    public function delArticle( $idBillet) {
      
        $sql = 'delete from T_BILLET where BIL_ID=?';
        
        $this->executerRequete($sql, array( $idBillet));
    }
    
     /**
     * Mise à jour du contenu d'un article
     */
     public function addArticle( $titre  ) {
      
         
        $sql = 'insert into T_BILLET( BIL_DATE, BIL_TITRE)'
            . ' values(?, ?)';
        $date = date(DATE_W3C);
        
        $this->executerRequete($sql, array( $date, $titre));
         
    }

}