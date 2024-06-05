<?php
require_once 'session.php';
require_once 'dbconnect.php';

$sql = 'SELECT * FROM intern';
$statement = $conn->query($sql);
$interns = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="interns.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>List of interns</title>
</head>

<body>
    <main>
        <header>
            <div class="container">
                <div class="header-content">
                    <div class="logo">
                    𝚂𝚈𝙽𝙴𝚁𝙶𝙸𝙴 𝙲𝙰𝚁𝚁𝙸𝙴𝚁𝙴
                    </div>
                    <nav>
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="newintern.php">New</a></li>
                            <li class="more-button">More
                                <ul class="more-menu">
                                    <li><a href="interns.php">Interns</a></li>
                                    <li><a href="departement.php">Departments</a></li>
                                    <li><a href="internships.php">Internships</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="logged">
                        <span><?php echo $_SESSION['firstname'] . ' ' .  $_SESSION['lastname']; ?></span>
                        <span class="logout"><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></span>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Birthday</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($interns as $intern) { ?>
                        <tr>
                            <td><?php echo $intern['id']; ?></td>
                            <td><?php echo $intern['firstname']; ?></td>
                            <td><?php echo $intern['lastname']; ?></td>
                            <td><?php echo $intern['birthday']; ?></td>
                            <td>
                              <a href="deleteintern.php?id=<?php echo $intern['id']; ?>" onclick="return confirm('Are you sure you want to delete that intern?');">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                             </a>


                            <td><a href="updateintern.php?id=<?php echo $intern['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const moreButton = document.querySelector('.more-button');
            const moreMenu = document.querySelector('.more-menu');
            moreButton.addEventListener('click', function() {
                moreMenu.classList.toggle('open');
            });
        });
    </script>
</body>

</html>
