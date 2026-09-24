<?php /** @var array $projets */ ?>

<?php foreach ($projets as $projet): ?>
<!-- Projet 1 -->
<article class="ct-card">
    <div class="row">
        <div class="col-md-4">
            <a href="projets/<?php echo $projet["id"];?>/<?php echo \Core\Helpers\slugify ($projet["titre"]);?>">
                <img class="img-fluid mb-3 mb-md-0" src="images/<?php echo $projet['image'];?>" alt="Frange Kamikaze" />
            </a>
        </div>
        <div class="col-md-8">
            <h3><a href="projet.html">Frange Kamikaze</a></h3>
            <p class="ct-byline">par <a href="#"><?php echo $projet['titre'];?></a> · <?php echo \Core\Helpers\dateFormator($projet['dateCreation'], 'd'); ?> <?php echo \Core\Helpers\dateFormator($projet['dateCreation'], 'M'); ?> <?php echo \Core\Helpers\dateFormator($projet['dateCreation'], 'Y'); ?> 2017</p>
            <p><?php echo $projet['texte'];?></p>
            <a class="ct-btn ct-btn--primary ct-btn--sm" href="projets/<?php echo $projet["id"];?>/<?php echo \Core\Helpers\slugify ($projet["titre"]);?>">Voir le projet</a>
        </div>
    </div>
</article>
<?php endforeach;?>