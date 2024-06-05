<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newdepartement.css">
    <title>New Departement</title>
</head>

<body>
    <main class="login-main">
        <div class="form-container">
            <form action="saveDepartement.php" method="post">
                <div class="input-group">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="name">
                </div>

                <div class="erreur">
                    <?php
                    if (isset($_GET['err'])) {
                        if ($_GET['err'] == 1) {
                            echo "Veuillez saisir un nom de département.";
                        } else {
                            echo "Erreur inconnue.";
                        }
                    }
                    ?>
                </div>
                <div class="input-group">
                    <button name="saveDepartement">save</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
