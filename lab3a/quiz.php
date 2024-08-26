<?php

require "helpers.php";

// Check if the HTTP method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Retrieve form data
$complete_name = htmlspecialchars($_POST['complete_name']);
$email = htmlspecialchars($_POST['email']);
$birthdate = htmlspecialchars($_POST['birthdate']);
$contact_number = htmlspecialchars($_POST['contact_number']);
$agree = isset($_POST['agree']) ? htmlspecialchars($_POST['agree']) : ''; // Safely handle the 'agree' checkbox
$answers = $_POST['answers'] ?? []; // Array of answers

// Retrieve all questions
$questions = retrieve_questions();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <script>
        function submitForm() {
            document.getElementById('quizForm').submit();
        }

        // Automatically submit the form after 60 seconds
        window.onload = function() {
            setTimeout(submitForm, 60000); // 60000 milliseconds = 60 seconds
        };
    </script>
</head>
<body>
<section class="section">
    <h1 class="title">Quiz</h1>
    <h2 class="subtitle">Please answer all the questions below.</h2>

    <!-- Form to submit all answers -->
    <form id="quizForm" method="POST" action="result.php">
        <input type="hidden" name="complete_name" value="<?php echo $complete_name; ?>" />
        <input type="hidden" name="email" value="<?php echo $email; ?>" />
        <input type="hidden" name="birthdate" value="<?php echo $birthdate; ?>" />
        <input type="hidden" name="contact_number" value="<?php echo $contact_number; ?>" />
        <input type="hidden" name="agree" value="<?php echo $agree; ?>" />

        <!-- Hidden inputs to store answers -->
        <?php foreach ($questions['questions'] as $index => $question): ?>
            <input type="hidden" name="answers[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($answers[$index] ?? ''); ?>" />
        <?php endforeach; ?>

        <!-- Display all questions and options -->
        <?php foreach ($questions['questions'] as $index => $question): ?>
            <div class="box">
                <h3 class="title is-4"><?php echo htmlspecialchars($question['question']); ?></h3>
                <?php foreach ($question['options'] as $option): ?>
                    <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($option['key']); ?>" <?php echo ($answers[$index] ?? '') === $option['key'] ? 'checked' : ''; ?> />
                                <?php echo htmlspecialchars($option['value']); ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <!-- Submit button -->
        <button type="submit" class="button is-link">Submit</button>
    </form>
</section>
</body>
</html>
