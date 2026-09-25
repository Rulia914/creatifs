<?php 
/** @var array $projet */;
?>

    <h1>Frange Kamikaze</h1>
    <p class="ct-byline">par <a href="#">Mister Univ'Hair</a> · 17 août 2017</p>

    <div class="mb-4">
        <!-- routes: /projets/id/slug/edit/form.html — /projets/delete/id/slug.html -->
        <a href="form.html" class="ct-btn ct-btn--primary">Éditer le projet</a>
        <a href="/projets/delete/<?php echo $projet['id'];?>/slug.html" class="ct-btn ct-btn--danger" onclick="return confirm('Supprimer définitivement ce projet ?');">Supprimer le projet</a>
    </div>

    <article class="ct-card">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid mb-3 mb-md-0" src="images/<?php echo $projet['image'];?>" alt="Frange Kamikaze" />
            </div>
            <div class="col-md-6">
                <p class="lead" style="font-weight: 600">
                    Une frange tracée au feutre noir, parce que la vraie audace ne pousse pas en un jour.
                </p>
                <hr />
                <p>
                <?php echo $projet['texte']?>
                </p>
                <hr />
                <!-- <ul class="ct-tags">
                    <li><a class="ct-tag" href="#">Vintage</a></li>
                    <li><a class="ct-tag" href="#">Abstract</a></li>
                </ul> -->
            </div>
        </div>
    </article>
