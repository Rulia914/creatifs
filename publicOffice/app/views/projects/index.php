<?php /** @var array $projects 
  * @var array $creatif*/ ?>

<?php foreach ($projects as $project):
    $urlProject = "projects/" . $project['id'] . "/" . \Core\Helpers\slugify($project['titre']) . ".html";
?>
<!-- Projet 1 -->
<article class="ct-card">
    <div class="row">
        <div class="col-md-4">
            <a href="<?php echo $urlProject;?>">
                <img class="img-fluid mb-3 mb-md-0" src="images/<?php echo $project['image'];?>" alt="<?php echo $project['titre'] ?>" />
            </a>
        </div>
        <div class="col-md-8">
            <h3><a href="<?php echo $urlProject;?>"><?php echo $project['titre'] ?></a></h3>
            <p class="ct-byline">par <a href="#"><?php echo $project['pseudo'];?></a> · <?php echo \Core\Helpers\dateFormator($project['dateCreation'], 'd'); ?> <?php echo \Core\Helpers\dateFormator($project['dateCreation'], 'M'); ?> <?php echo \Core\Helpers\dateFormator($project['dateCreation'], 'Y'); ?></p>
            <p><?php echo \Core\Helpers\truncate($project['texte'], 100);?></p>
            <a class="ct-btn ct-btn--primary ct-btn--sm" href="<?php echo $urlProject;?>">Voir le projet</a>
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