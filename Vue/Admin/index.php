<?php $this->titre = "Mon Blog - Administration" ?>

</br>

<?php/*------------------------------
        Message accueil admin 
    --------------------------------*/?>

<div class="jaune drop-shadow curved curved-hz-2">
    <div class="row">
        <div class="col-md-6">

                <h2>Administration</h2>
                
                <h3>"<?= $this->nettoyer($login) ?>" connecté
                    <a id="lienDeco" title="Déconnexion" href="connexion/deconnecter">
                        <i class="fa fa-power-off  fa-2 txtGris2"></i> 
                    </a>
                </h3>

        </div>
        <div class="col-md-6">
               <h3>
                   <br/>
                    <?= $this->nettoyer($nbBillets) ?> Articles 
                    <br/>
                     <?= $this->nettoyer($nbCommentaires) ?> Commentaires
                </h3>
        </div>
   </div>
</div>

<?php/*------------------------------
       LISTE Articles
    --------------------------------*/?>
<div class="row"       >
    <div class="col-md-6">
            
        <!-- liste articles -->
        <div class=" jaune adminListeArticles drop-shadow curved curved-hz-2">
            <div class="row">
                <h3>LISTE DES ARTICLES</h3></div>
                <div class="row">

                        <div class="row titreArticle">

                            <div class="col-md-9 titreArticleInner">
                               TITRE
                            </div>


                            <div class="col-md-3">
                                Supprimer

                            </div>

                         </div>
                </div><!-- row -->
            
            <?php $numeroArticle = 1;
                foreach ($billets as $billet): 
             ?>


            <div class="row">

                    <div class="row titreArticle">

                        <div class="articleAppelAjax col-md-8 titreArticleInner" data-id="<?= $this->nettoyer($billet['id']) ?>">
                            <!--<a  href="<?//= "Admin/modifierArticle/" . $this->nettoyer($billet['id']) ?>">-->
                                <span class="nomArticle txtNoir">
                                    <?//= $numeroArticle++ ?> 
                                    <?= $this->nettoyer($billet['titre']) ?>
                                </span>
                            <!--</a>-->
                        </div>


                        <div class="col-md-4">
                            <div class="btn btn-modifier">
                                <!--<a title="Modifier" href="<?//= "Admin/modifierArticle/" . $this->nettoyer($billet['id']) ?>">-->
                                    
                                <!--</a>-->
                            </div>
                            <div class="btn btn-supprimer">
                                <a title="Supprimer" href="<?= "Admin/SupprimerArticle/" . $this->nettoyer($billet['id']) ?>">
                                    <i class="fa fa-trash  fa-2x txtGris2"></i> 
                                </a>
                            </div>
                        </div>

                     </div>
            </div><!-- row -->
      
 
            <?php/*------------------------------
                    AJOUT Articles
                 --------------------------------*/?>
            <?php endforeach;?>
            
             <form class=" ajoutArticle" method="post" action="admin/ajouterArticle">
                 
                <span class="txtAjoutArticle">Ajouter un Article :</span>
                
                <input id="titre" name="titre" type="text" placeholder="Titre" size="30" required />

                <button title="Ajouter" class="btn-ajouter" type="submit" value="Ajouter" >
                    <i class="fa fa-plus-square  fa-2x txtGris2"></i> 
                </button>
                    
            </form>
            
        </div> <!-- col-md-6 jaune adminListeArticles drop-shadow curved curved-hz-2 -->
        
    </div>
    
    <div id="modifArticle" class="col-md-6">
        <div class="blanc drop-shadow curved curved-hz-2 ">
            
            <div class="articleRetourAjax2" data-id="0"></div>
             <form id="formModifArticle" method="post" action="admin/majArticle">
                <div>
                    Titre
                    <input id="titreArticleForm" name="titre" value="TITRE DE L'ARTICLE" />
                    </br>
                </div>
                <div>
                    <textarea id="contenuArticleForm" class="mce" name="contenu" rows="10" required>
                            CONTENU DE L'ARTICLE
                    </textarea>
                </div>
                <div>
                    <input id="inputId" type="hidden" name="id" value="<?= $billet['id'] ?>" />
                    <input class="okbtn" onclick="recup_tinyMCE_contenu()" type="submit" value="Ok" />
               </div>
             </form>
                
    
        </div>
        </div>
    </div>
</div>

<script>

    
    // cacher le formulaire de modification au début
    $("#formModifArticle").hide();  
    
  
    $(document).ready(function(){
        
        // montrer/cacher le formulaire de modif
        $(".articleRetourAjax2").click(function(){
            $("#formModifArticle").toggle();
          });
                 
        /* Ajax liste Artilces */
        
         $( ".articleAppelAjax" ).click(function() {
            
            // recup id article cliqué dans le data-id
            var idArticle = $(this).data("id");
            
            // l'id sera envoyé par le formulaire
            $("#inputId").val(idArticle);

            // envoi ajax de l'id pour recup les info de l'article
            var ajaxArticle = $.post( 
                "Vue/Admin/ArticleAjax.php", 
                { id:idArticle } 
            );

            
            ajaxArticle.done(function( data ) {
                
                // copie de l'html recupéré
                $( ".articleRetourAjax2" ).empty().append( data );
                
                // copie du titre dans le formulaire dtitreArticleAjaxe modif
                var titreArticleAjax = $(".titreArticleAjax").html();
                $("#titreArticleForm").val(titreArticleAjax);
                
                // copie du contenu dans le formulaire de modif
                var contenuArticleAjax = $(".contenuArticleAjax").html();
                tinymce.activeEditor.setContent(contenuArticleAjax);
                
              });
             
         });
         

    });
    
    
</script>