<?php /** @var array $projets */ ?>

<?php foreach ($projets as $projet): ?>
<!-- Projet 1 -->
<article class="ct-card">
    <div class="row">
        <div class="col-md-4">
            <a href="?projetId=<?php echo $projet["id"];?>">
                <img class="img-fluid mb-3 mb-md-0" src="images/<?php echo $projet['image'];?>" alt="Frange Kamikaze" />
            </a>
        </div>
        <div class="col-md-8">
            <h3><a href="?projetId=<?php echo $projet["id"];?>">Frange Kamikaze</a></h3>
            <p class="ct-byline">par <a href="#"><?php echo $projet['titre'];?></a> · <?php echo \Core\Helpers\dateFormator($projet['dateCreation'], 'd'); ?> <?php echo \Core\Helpers\dateFormator($projet['dateCreation'], 'M'); ?> <?php echo \Core\Helpers\dateFormator($projet['dateCreation'], 'Y'); ?> 2017</p>
            <p><?php echo \Core\Helpers\truncate($projet['texte'], 100);?></p>
            <a class="ct-btn ct-btn--primary ct-btn--sm" href="?projetId=<?php echo $projet["id"];?>">Voir le projet</a>
        </div>
    </div>
</article>
<?php endforeach;?>

<nav aria-label="Navigation entre les pages de projets">
    <ul class="pagination ct-pagination" style="justify-content: center">
        <li class="page-item"><a class="page-link" href="#">Précédent</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
    </ul>
</nav>