<div class="container p-3">
    <div class="card">
        <div class="card-body p-2">
            <!-- Action -->
            <form action="./create" method="post" id="formContent">

            <?php if (!empty($erreur)){ ?>
                <div class="alert alert-danger" role="alert"><?= $erreur ?></div>
            <?php } ?>
       
        </form>
            <form action="./ajouter" method="post" class="add">
                <div class="input-group">

                    <input id="id" name="id" type="text" class="form-control" placeholder="Prendre une note…" aria-label="My new idea" aria-describedby="basic-addon1"/>
                </div>
            </form>

            <!-- Liste -->
            <ul class="list-group pt-3">
                <?php
                foreach ($todos as $todo) {
                    ?>
                    <li class="list-group-item">
                        <div class="d-flex">
                            <div class="flex-grow-1 align-self-center"><?= $todo['texte'] ?></div>
                            <div>
                                <?php
                                if($todo['termine']=="1"){
                                    ?>
                                    <a href="./supprimer?id=<?= $todo['id'] ?>" class="btn btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                <?php }else {?>   
                                    <a href="./terminer?id=<?= $todo['id'] ?>" class="btn btn-outline-success">
                                        <i class="bi bi-check"></i>
                                    </a>
                                <?php } ?>

                              
                             
                            </div>
                        </div>
                    </li>
                    <?php
                

                if (sizeof($todos) == 0) {
                    ?>
                    <li class="list-group-item text-center">C'est vide !</li>
                    <?php
                }
                }
                ?>
            </ul>
        </div>
    </div>
</div>

