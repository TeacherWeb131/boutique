<?php
include '../header.php';

// Affichage d'erreurs
if ($error) : ?>
    <span> <?= $error ?> </span>
<?php endif ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post>
                    <h1>Inscription</h1>
                    <div class=" form-group">
                <label for="exampleInputPassword1">Nom</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre nom" name="last_name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Prénom</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre prénom" name="first_name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="valider">Valider</button>
        </form>
    </div>
</div>
</div>
<?php
include '../footer.php';
?>