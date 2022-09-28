<link rel="stylesheet" href="/public/login.css" />

<div class="d-flex flex-column justify-content-center align-items-center vh-100 bg fullContainer">

    <div class="wrapper fadeInDown">
        <h1>S'inscrire</h1>
        <form action="./create" method="post" id="formContent">
            
            <?php if (!empty($erreur)){ ?>
                <div class="alert alert-danger" role="alert"><?= $erreur ?></div>
            <?php } ?>

            <!-- Login Form -->
            <form>
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Login"/>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"/>
                <input type="text" id="mail" class="fadeIn second" name="mail" placeholder="email"/>
                <input type="submit" class="fadeIn fourth" value="Sign in">
            </form>

        </form>
        <form action="./home">
            <input type="submit" value="Se connecter">
        </form>
    </div>

</div>