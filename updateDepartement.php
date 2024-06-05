<?php
require_once('dbconnect.php');

// Initialize $dep with an empty array
$dep = [];

// Check if $_GET['id'] is set and numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    try {
        // Prepare and execute the SQL statement to fetch department details
        $stmt = $conn->prepare("SELECT * FROM departement WHERE id=:i");
        $stmt->execute(['i' => $_GET['id']]);
        
        // Fetch the department details
        $dep = $stmt->fetch();
    } catch (PDOException $e) {
        // Display an error message if an exception occurs
        echo "Error fetching department details: " . $e->getMessage();
        exit; // Stop further execution
    }
} else {
    // Display an error message if $_GET['id'] is not set or not numeric
    echo "Invalid department ID.";
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="updatedepartement.css">
  <title>New Departement </title>
</head>

<body>
  <main class="login-main">
    <div class="form-container">
      <form action="saveDepartement.php?id=<?php echo $_GET['id'] ?>" method="post">
        <div class="input-group">
          <label for="name">name</label>
          <!-- Output department name, if available -->
          <input type="text" name="name" id="name" class="name" value="<?php echo isset($dep['name']) ? htmlspecialchars($dep['name']) : ''; ?>">
        </div>

        <div class="erreur">
          <?php
          // Check if error code is set in $_GET
          if (isset($_GET['err'])) {
              // Display corresponding error message
              if ($_GET['err'] == 1) {
                  echo "Veuillez saisir un login correct.";
              } else {
                  echo "Le mot de passe ne correspond pas au login saisi.";
              }
          }
          ?>
        </div>
        <div class="input-group">
          <button name="updateDepartement">update</button>
        </div>

      </form>
    </div>
  </main>
</body>

</html>
