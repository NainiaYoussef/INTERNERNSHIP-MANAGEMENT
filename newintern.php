
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="newintern.css">
  <title>New Departement </title>
</head>

<body>
  <main class="login-main">
    <div class="form-container">
      <form action="saveIntern.php" method="post">


        <div class="input-group">
          <label for="firstname">firstname</label>
          <input type="text" name="firstname" id="firstname" class="name">
        </div>

        <div class="input-group">
          <label for="lastname">lastname</label>
          <input type="text" name="lastname" id="firstname" class="name">
        </div>

        <div class="input-group">
          <label for="birthday">birthday</label>
          <input type="date" name="birthday" id="birthday" class="name">
        </div>

        <div class="input-group">
          <button name="saveIntern">save</button>
        </div>

      </form>
    </div>
  </main>
</body>

</html>