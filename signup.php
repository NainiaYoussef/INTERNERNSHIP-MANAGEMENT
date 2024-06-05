<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="signup-form">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="family_name" placeholder="Family Name" required>
            <input type="date" name="birthday" id="birthday" required>
            <select name="country" required>
                <option value="" disabled selected>Select Country</option>
                <!-- 20 Randomly Selected Countries -->
                <option value="USA">United States</option>
                <option value="UK">United Kingdom</option>
                <option value="Canada">Canada</option>
                <option value="Australia">Australia</option>
                <option value="Germany">Germany</option>
                <option value="France">France</option>
                <option value="Italy">Italy</option>
                <option value="Spain">Spain</option>
                <option value="Japan">Japan</option>
                <option value="China">China</option>
                <option value="Brazil">Brazil</option>
                <option value="India">India</option>
                <option value="Mexico">Mexico</option>
                <option value="Russia">Russia</option>
                <option value="South Africa">South Africa</option>
                <option value="Argentina">Argentina</option>
                <option value="Sweden">Sweden</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Norway">Norway</option>
                <option value="Morocco">Morocco</option>
            </select>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
            <div id="age-error" style="display:none; color:red;">Sorry, but you must be at least 18 years old.</div>
        </form>
        <div class="privacy-policy">
            <button id="privacy-policy-btn">Privacy Policy</button>
            <div class="privacy-policy-popup" id="privacy-policy-popup">
                <!-- Your privacy policy content here -->
                This is the privacy policy.
            </div>
        </div>
    </div>
    <script src="signup.js"></script>
    <script>
        document.getElementById("signup-form").addEventListener("submit", function(event) {
            var birthday = new Date(document.getElementById("birthday").value);
            var today = new Date();
            var age = today.getFullYear() - birthday.getFullYear();
            var m = today.getMonth() - birthday.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) {
                age--;
            }

            if (age < 18) {
                event.preventDefault();
                document.getElementById("age-error").style.display = "block";
            }
        });
    </script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $first_name = $_POST["first_name"];
    $family_name = $_POST["family_name"];
    $birthday = $_POST["birthday"];
    $country = $_POST["country"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate and process the form data here
    // You can perform validation and database operations here

    // Example: Displaying submitted data
    echo "<div class='container'>";
    echo "<h2>Thank You for Signing Up!</h2>";
    echo "<p>First Name: $first_name</p>";
    echo "<p>Family Name: $family_name</p>";
    echo "<p>Birthday: $birthday</p>";
    echo "<p>Country: $country</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Phone: $phone</p>";
    echo "</div>";
}
?>
