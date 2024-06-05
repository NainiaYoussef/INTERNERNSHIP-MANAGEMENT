<?php
require_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="HOME.CSS">
    <title>Welcome page</title>
    <style>
        
        .transition-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background:linear-gradient(to left, #7c136b, #faf8f7);
            z-index: 9999; 
            animation: slide-down 2s forwards;
        }

        @keyframes slide-down {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(0);
            }
        }

        .big-title {
            position: absolute;
            top: 50%;
            left: 70%;
            transform: translate(-50%, -50%);
            font-size: 2em;
            color: purple;
            text-align: center;
            opacity: 0;
            animation: slide-up 2s forwards;
        }

        @keyframes slide-up {
            0% {
                transform: translate(-50%, 100%);
                opacity: 0;
            }
            100% {
                transform: translate(-50%, -50%);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <main>
        <div class="transition-bar"></div> 
        <div class="big-title">
            <h1>Welcome to Synergie Carriere</h1>
            <p>Your trusted partner for career solutions</p>
        </div>
        <div class="top-right-buttons">
            <button class="support-button">Support</button>
            <button class="media-button">Media</button>
            <button class="premium-button">Premium</button>
            <button class="apply-button">Apply</button>
            <a class="logout-button" href="logout.php">Log Out</a>
        </div>
        <a class="home-logout" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        <div class="container">
        
        </div>
        <section class="nav-items-container">
            <a href="departements.php" class="nav-item" data-tooltip="This section contains all departments.">
                <section>
                    <img src="Aestheticofficedesign.png" alt="">
                    <h3><?php echo "Departements"; ?></h3>
                </section>
            </a>

            <a href="interns.php" class="nav-item" data-tooltip="This section contains all interns.">
                <section>
                    <img src="intern.jpg" alt="">
                    <h3><?php echo "Interns"; ?></h3>
                </section>
            </a>

            <a href="internships.php" class="nav-item" data-tooltip="This section contains all internships.">
                <section>
                    <img src="INTERNSIP.jpg" alt="">
                    <h3><?php echo "Internships"; ?></h3>
                </section>
            </a>

            <a href="ABOUTUS.php" class="nav-item" data-tooltip="Learn more About US">
                <section>
                    <img src="SYNERGIE CARRIERE.jpeg" alt="">
                    <h3><?php echo "About Us"; ?></h3>
                </section>
            </a>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var navItems = document.querySelectorAll(".nav-item");

            navItems.forEach(function(item) {
                var tooltipText = item.getAttribute("data-tooltip");
                if (tooltipText) {
                    var tooltip = document.createElement("div");
                    tooltip.className = "tooltip";
                    tooltip.innerText = tooltipText;
                    item.appendChild(tooltip);
                }
            });
        });
    </script>
</body>
</html>
