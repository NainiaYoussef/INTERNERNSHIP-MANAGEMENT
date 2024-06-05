<?php
require_once('dbconnect.php');

$id_intern = isset($_GET['id_intern']) ? $_GET['id_intern'] : null;
$id_dept = isset($_GET['id_dept']) ? $_GET['id_dept'] : null;
$id_admin = isset($_GET['id_admin']) ? $_GET['id_admin'] : null;

if ($id_intern && $id_dept && $id_admin) {
    $stmt = $conn->prepare("SELECT * FROM internship WHERE idintern = :id_intern AND iddep = :id_dept AND idadmin = :id_admin");
    $stmt->execute([
        'id_intern' => $id_intern,
        'id_dept' => $id_dept,
        'id_admin' => $id_admin
    ]);
    $internship = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="updateinternship.css">
  <title>Update Internship</title>
</head>

<body>
  <main class="login-main">
    <div class="form-container">
      
      <form action="saveinternship.php?id_intern=<?php echo $id_intern ?>&id_dept=<?php echo $id_dept ?>&id_admin=<?php echo $id_admin ?>" method="post">
        <div class="input-group">
          <label for="iddep">Department ID</label>
          <input type="number" name="iddep" id="iddep" class="iddep" value="<?php echo $id_dept; ?>" readonly>
        </div>

        <div class="input-group">
          <label for="idintern">Intern ID</label>
          <input type="number" name="idintern" id="idintern" class="idintern" value="<?php echo $id_intern; ?>" readonly>
        </div>

        <div class="input-group">
          <label for="idadmin">Admin ID</label>
          <input type="number" name="idadmin" id="idadmin" class="idadmin" value="<?php echo $id_admin; ?>" readonly>
        </div>

        <div class="input-group">
          <label for="startsAt">Start Date</label>
          <input type="date" name="startsAt" id="startsAt" class="startsAt" value="<?php echo $internship['startsAt'] ?>">
        </div>

        <div class="input-group">
          <label for="endsAt">End Date</label>
          <input type="date" name="endsAt" id="endsAt" class="endsAt" value="<?php echo $internship['endsAt'] ?>">
        </div>

        <div class="input-group">
          <button name="updateInternship">Update</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>
