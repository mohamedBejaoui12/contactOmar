<?php
include "connect.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['family_name']) && isset($_POST['given_name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $family_name = $_POST['family_name'];
        $given_name = $_POST['given_name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $stmt = $con->prepare("INSERT INTO contactmessages (family_name, given_name, email, message) VALUES (:family_name, :given_name, :email, :message)");
        $stmt->bindParam(':family_name', $family_name);
        $stmt->bindParam(':given_name', $given_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        try {
            $stmt->execute();
            echo "<h2>Form Data:</h2>";
            echo "<p>First Name: $given_name</p>";
            echo "<p>Last Name: $family_name</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Message: $message</p>";
            echo "<p>Data has been successfully saved in the database.</p>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "You must filled all the inputs";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contacter_nous.css">
    <link rel="stylesheet" href="icons.css">
</head>
<body>

<div class="contact-section" id="contact">
    <div class="image-area"></div>
    <div class="form-area">
        <div class="form-wrap">
            <div class="title">
                <h1>CONTACT US</h1>
            </div>
            <img src="" alt="">
            <div class="contact-area">
                <div class="contact-info">
                    <h2>Information :</h2>
                    <div class="contact-address">
                        <span class="icon-map-marked-alt"></span>
                        <p>
                            B.P 248 2092, Tunis<br>
                        </p>
                    </div>
                    <div class="contact-mail">
                        <span class="icon-envelope"></span>
                        <p>chahbaniomar2@gmail.com</p>
                    </div>
                    <div class="contact-phone">
                        <span class="icon-phone-alt"></span>
                        <p>+216 27 106 156</p>
                    </div>
                </div>
                <form class="contact-form" method="POST">
                    <div class="name-field">
                        <div class="input-area">
                            <input type="text" name="family_name" id="family_name" autocomplete="off" required>
                            <label for="family_name">Family name</label>
                        </div>
                        <div class="input-area">
                            <input type="text" name="given_name" id="given_name" autocomplete="off" required>
                            <label for="given_name">Name</label>
                        </div>
                    </div>
                    <div class="input-area">
                        <input type="email" name="email" id="email" autocomplete="off" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="message-area">
                        <textarea name="message" id="message" required></textarea>
                        <label for="message">Message</label>
                    </div>
                    <div class="btn">
                        <button type="submit" name="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
