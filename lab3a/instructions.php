<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Retrieve form data
$complete_name = htmlspecialchars($_POST['complete_name']);
$email = htmlspecialchars($_POST['email']);
$birthdate = htmlspecialchars($_POST['birthdate']);
$contact_number = htmlspecialchars($_POST['contact_number']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <script>
        function toggleStartQuizButton() {
            var checkbox = document.getElementById('termsCheckbox');
            var startQuizButton = document.getElementById('startQuizButton');
            startQuizButton.disabled = !checkbox.checked;
        }
    </script>
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">Instructions</h1>
        <h2 class="subtitle">
            Hello <?php echo explode(' ', $complete_name)[0]; ?>, please read the instructions first
        </h2>

        <form method="POST" action="quiz.php">
            <input type="hidden" name="complete_name" value="<?php echo $complete_name; ?>" />
            <input type="hidden" name="email" value="<?php echo $email; ?>" />
            <input type="hidden" name="birthdate" value="<?php echo $birthdate; ?>" />
            <input type="hidden" name="contact_number" value="<?php echo $contact_number; ?>" />

            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>

            <div class="field">
                <label class="label">Terms and conditions</label>
                <div class="control">
                    <textarea class="textarea" readonly>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <label class="checkbox">
                        <input type="checkbox" id="termsCheckbox" onchange="toggleStartQuizButton()">
                        I agree to the <a href="#">terms and conditions</a>
                    </label>
                </div>
            </div>

            <!-- Start Quiz button -->
            <button type="submit" id="startQuizButton" class="button is-link" disabled>Start Quiz</button>
        </form>
    </div>
</section>
</body>
</html>
