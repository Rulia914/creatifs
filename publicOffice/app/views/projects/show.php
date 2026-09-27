<?php 
/** @var array $project 
 * @var array $creatif*/;
?>
<?php 
    $urlEditProject = "projects/" . $project['id'] . "/" . \Core\Helpers\slugify($project['titre']) . "/edit/form.html";
?>
    <h1><?php echo $project['titre'];?></h1>
    <p class="ct-byline">par <a href="#"><?php echo $project['pseudo'];?></a> · 17 août 2017</p>

    <div class="mb-4">
        <!-- routes: /projects/id/slug/edit/form.html — /projects/delete/id/slug.html -->
        <a href="<?php echo $urlEditProject;?>" class="ct-btn ct-btn--primary">Éditer le projet</a>
        <a href="projects/delete/<?php echo $project['id'];?>/slug.html" class="ct-btn ct-btn--danger" onclick="return confirm('Supprimer définitivement ce projet ?');">Supprimer le projet</a>
    </div>

    <article class="ct-card">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid mb-3 mb-md-0" src="images/<?php echo $project['image'];?>" alt="<?php echo $project['titre'];?>" />
            </div>
            <div class="col-md-6">
                <p class="lead" style="font-weight: 600">
                    Une frange tracée au feutre noir, parce que la vraie audace ne pousse pas en un jour.
                </p>
                <hr />
                <p>
                <?php echo $project['texte']?>
                </p>
                <hr />
                <!-- <ul class="ct-tags">
                    <li><a class="ct-tag" href="#">Vintage</a></li>
                    <li><a class="ct-tag" href="#">Abstract</a></li>
                </ul> -->
            </div>
        </div>
    </article>
