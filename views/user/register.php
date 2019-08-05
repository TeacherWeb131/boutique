<?php
include '../header.php';
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <form>
                <h1>Inscription</h1>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nom</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre nom" name="last_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Prénom</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre prénom" name="first_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../footer.php';
?>