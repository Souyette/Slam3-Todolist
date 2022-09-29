<link rel="stylesheet" href="/public/main.css" />

<div class="d-flex flex-column justify-content-center align-items-center vh-100 bg fullContainer">

    <div class="wrapper fadeInDown">
        <h1>S'inscrire</h1>
        <form action="./create" method="post" id="formContent">
            
            <?php if (!empty($erreur)){ ?>
                <div class="alert alert-danger" role="alert"><?= $erreur ?></div>
            <?php } ?>

            <!-- Login Form -->
            <form class="inscrire">
                <div><input type="text" id="login" class="fadeIn second" name="login" placeholder="Login"/></div>
                <div><input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"/></div>
                <div><input type="email" id="mail" class="fadeIn second" name="mail" placeholder="email"/></div>
                <input type="submit" class="fadeIn fourth" value="Sign in">
            </form>

        </form>
    </div>

</div>