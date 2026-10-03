<?php /** @var array $projects 
        * @var array $creatif
        * @var array $totalPages
        * @var array $currentPage
        */ ?>

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
<?php if ($totalPages > 1): ?>
    <nav aria-label="Navigation des pages">
        <ul class="pagination ct-pagination" style="justify-content: center">
    
            <!-- Bouton Précédent -->
            <?php if ($currentPage > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= (int)$currentPage - 1; ?>">Précédent</a>
                </li>
            <?php endif; ?>
    
            <!-- Numéros de page -->
            <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                <li class="page-item <?= ($page === $currentPage) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?= $page; ?>"><?= $page; ?></a>
                </li>
            <?php endfor; ?>
    
            <!-- Bouton Suivant -->
            <?php if ($currentPage < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $currentPage + 1; ?>">Suivant</a>
                </li>
            <?php endif; ?>
    
        </ul>
    </nav>
    <?php endif; ?>
</nav>