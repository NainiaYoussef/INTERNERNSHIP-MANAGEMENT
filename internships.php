<?php
require_once 'session.php';
require_once 'dbconnect.php';

class InternshipManager {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getInterships() {
        $sql = 'SELECT i.id AS intern_id, i.firstname AS intern_firstname, i.lastname AS intern_lastname, 
                       d.id AS departement_id, d.name AS departement_name, 
                       a.id AS admin_id, a.firstname AS admin_firstname, a.lastname AS admin_lastname, 
                       it.startsAt, it.endsAt 
                FROM internship it
                INNER JOIN intern i ON i.id = it.idintern 
                INNER JOIN departement d ON it.iddep = d.id 
                INNER JOIN admin a ON a.id = it.idadmin';

        $statement = $this->conn->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

$internshipManager = new InternshipManager($conn);
$interns = $internshipManager->getInterships();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="internships.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>List of Internships</title>
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
                            <li><a href="newinternship.php">New</a></li>
                            <li class="more-button">More
                                <ul class="more-menu">
                                    <li><a href="interns.php">Interns</a></li>
                                    <li><a href="departements.php">Departments</a></li>
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Departement</th>
                        <th>Admin</th>
                        <th>Starts At</th>
                        <th>Ends At</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($interns as $i) {
                        echo '<tr>';
                        echo '<td>' . $i['intern_firstname'] . '</td>';
                        echo '<td>' . $i['intern_lastname'] . '</td>';
                        echo '<td>' . $i['departement_name'] . '</td>';
                        echo '<td>' . $i['admin_firstname'] . ' ' . $i['admin_lastname'] . '</td>';
                        echo '<td>' . $i['startsAt'] . '</td>';
                        echo '<td>' . $i['endsAt'] . '</td>';
                        echo '<td>
                            <a href="deleteinternships.php?id_intern=' . $i['intern_id'] . '&id_dept=' . $i['departement_id'] . '&id_admin=' . $i["admin_id"] . '" 
                            onclick="return confirm(\'Are you sure you want to remove this internship?\');">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>';
                        echo '<td><a href="updateinternship.php?id_intern=' . $i['intern_id'] . '&id_dept=' . $i['departement_id'] . '&id_admin=' . $i["admin_id"] . '""><i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
                        echo '</tr>';
                    }
                    ?>
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
