<?php
require_once('dbconnect.php');
$stmt = $conn->prepare("Select * from intern where id=:i");

$stmt->execute(
  ['i' => $_GET['id']]
);

$intern = $stmt->fetch();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="updateintern.css">
  <title>New Departement </title>
</head>

<body>
  <main class="login-main">
    <div class="form-container">
      <form action="saveIntern.php?id=<?php echo $_GET['id'] ?>" method="post">
        <div class="input-group">
          <label for="name">firstname</label>
          <input type="text" name="firstname" id="firstname" class="firstname" value="<?php echo $intern['firstname'] ?>">
        </div>

        <div class="input-group">
          <label for="name">lastname</label>
          <input type="text" name="lastname" id="lastname" class="lastname" value="<?php echo $intern['lastname'] ?>">
        </div>

        <div class="input-group">
          <label for="name">birthday</label>
          <input type="date" name="birthday" id="birthday" class="birthday" value="<?php echo $intern['birthday'] ?>">
        </div>


        <div class="input-group">
          <button name="updateIntern">update</button>
        </div>

      </form>
    </div>
  </main>
</body>

</html>