<?php $this->titre = "Mon Blog - " . $this->nettoyer($billet['titre']); ?>

<article class="drop-shadow curved curved-hz-2"> 
    <header>
        <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
        <time><?= $this->nettoyer($billet['date']) ?></time>
    </header>
    <p><?= $this->nettoyer($billet['contenu']) ?></p>

    <div class="listeCommentaires">
    
        <header>
            <h2>
                Commentaires <?php /*<?= $this->nettoyer($billet['titre'])*/ ?>
            </h2>
        </header>

        <div class="row ">
            <?php foreach ($commentaires as $commentaire): ?>

                 <div class="flip-container col-md-8" ontouchstart="this.classList.toggle('hover');">
                        <div class="flipper">

                            <div class="front">
                                <div class="commentaire drop-shadow curved curved-hz-2">
                                     <p class="nomCommentaire"><?= $this->nettoyer($commentaire['auteur']) ?></p>
                                 </div>
                            </div>

                            <div class="back">
                                <div class="commentaire drop-shadow curved curved-hz-2">
                                     <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
                                 </div>
                            </div>

                        </div> <!-- flipper -->
                </div> <!-- flip-container -->

            <?php endforeach; ?>
         </div> <!-- row -->

        <div class="row ajoutComm">
            <h3>
                Ajouter un commentaire <?php /*<?= $this->nettoyer($billet['titre'])*/ ?>
            </h3>
           <form class="row" method="post" action="billet/commenter">

               <input id="auteur" name="auteur" type="text" placeholder="Nom" required />

               <br />

               <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire" required>

               </textarea>

               <br />

               <input type="hidden" name="id" value="<?//= $billet['id'] ?>" />

               <input onclick="recup_tinyMCE_contenu()" type="submit" value="Commenter" />

           </form>
       </div>
    </div>
</article>

