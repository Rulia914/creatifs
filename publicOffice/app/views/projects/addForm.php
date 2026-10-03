<?php

/** @var array $projects
 * @var array $project 
 * @var array $creatif
 * @var array $tags*/ ?>

<div class="col-lg-8 py-3">
    <!--
            Ce même gabarit visuel sert à la fois pour :
            /projects/add/form.html          (ajout — champs vides)
            /projets/id/slug/edit/form.html  (modification — champs pré-remplis par le contrôleur)
          -->
    <h1 class="mb-4"><?php echo !empty($project['id']) ? 'Modifier un projet' : 'Ajouter un projet'; ?></h1>

    <!--si un id entre dans l'équation, le formulaire sera prérempli, sinon un vide apparaît-->
    <form action="<?php echo !empty($project['id']) ? 'projects/' . $project['id'] . '/' . \Core\Helpers\slugify($project['titre']) . '/edit/update.html' : 'projects/add/insert.html'; ?>" method="post" enctype="multipart/form-data" class="ct-form-card">

        <label for="title">Titre du projet</label>
        <input
            type="text"
            name="title"
            id="title"
            class="form-control"
            value="<?php echo $project['titre']; ?>"
            placeholder="Ex : Frange Kamikaze" />

        <label for="text">Description</label>
        <textarea
            id="text"
            name="text"
            class="form-control"
            rows="5"
            placeholder="Racontez l'histoire (courageuse) de ce projet..."><?php echo $project['texte']; ?></textarea>

        <label for="creatif-file">Photo du résultat</label>
        <div class="ct-dropzone">
            ✂️ Glissez une image ou choisissez-la ci-dessous
            <input
                type="file"
                class="form-control-file"
                id="creatif-file"
                name="image" />
        </div>

        <label for="category">Créa'tif</label>
        <!-- Liste déroulante (select) envoyée au serveur sous le nom "creatif" pour correspondre à la colonne de la BDD -->
        <select id="category" name="creatif" class="form-control">
        <!-- Option disabled : pas de créatif attribué -->
            <option disabled <?php echo empty($project['creatif']) ? 'selected' : ''; ?>>Sélectionnez le créa'tif</option>
            <option value="1" <?php echo (int) $project['creatif'] === 1 ? 'selected' : ''; ?>>Mister Univ'Hair</option>
            <option value="2" <?php echo (int) $project['creatif'] === 2 ? 'selected' : ''; ?>>Leerdam'Hair</option>
            <option value="3" <?php echo (int) $project['creatif'] === 3 ? 'selected' : ''; ?>>Séda'Tifs</option>
            <option value="4" <?php echo (int) $project['creatif'] === 4 ? 'selected' : ''; ?>>Jupil'Hair</option>
        </select>

        <label>Tags <span style="font-weight:400;font-size:.8rem;color:#4a3a5a">(facultatif)</span></label>
        <?php foreach ($tags as $tag): ?>
    <div class="form-check">
        <input 
            class="form-check-input" 
            type="checkbox" 
            name="tags[]" 
            value="<?php echo $tag['id']; ?>" 
            id="tag-<?php echo $tag['id']; ?>"
            <?php echo !empty($tag['is_checked']) ? 'checked' : ''; ?>
        >
        <label class="form-check-label" for="tag-<?php echo $tag['id']; ?>">
            <?php echo $tag['nom']; ?>
        </label>
    </div>
<?php endforeach; ?>

        <div>
            <input class="ct-btn ct-btn--primary" type="submit" value="Enregistrer" />
            <input class="ct-btn ct-btn--ghost" type="reset" value="Réinitialiser" />
        </div>
    </form>
</div>