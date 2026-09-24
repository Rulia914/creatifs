<!DOCTYPE html>
<html lang="fr">
<?php include '../app/views/partials/_head.php'; ?>

<body>
    <!-- Navigation -->
    <?php include '../app/views/partials/_nav.php'; ?>

    <!-- Bandeau d'intro -->
    <?php include '../app/views/partials/_header.php'; ?>

    <!-- Contenu -->
    <div class="container ct-content-wrap">
        <div class="row">
            <!-- Colonne principale -->
            <?php include '../app/views/partials/_main.php'; ?>

            <!-- Colonne latérale -->
            <?php include '../app/views/partials/_laterale.php'; ?>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include '../app/views/partials/_footer.php'; ?>

    <!-- Bootstrap core JavaScript -->
    <?php include '../app/views/partials/_script.php'; ?>
</body>

</html>