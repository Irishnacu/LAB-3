<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Retrieve form data
$complete_name = htmlspecialchars($_POST['complete_name']);
$email = htmlspecialchars($_POST['email']);
$birthdate = htmlspecialchars($_POST['birthdate']);
$contact_number = htmlspecialchars($_POST['contact_number']);
$agree = isset($_POST['agree']) ? htmlspecialchars($_POST['agree']) : '';
$answers = $_POST['answers'] ?? [];

// Retrieve all questions
$questions = retrieve_questions();
$correct_answers = $questions['answers'];

// Debugging: Print questions array
echo '<pre>';
print_r($questions);
echo '</pre>';

// Compute score
$score = compute_score($answers);

// Format the birthdate
$birthdate_object = new DateTime($birthdate);
$formatted_birthdate = $birthdate_object->format('F j, Y');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
</head>
<body>
<section class="section">
    <h1 class="title">Your Score: <?php echo $score; ?></h1>
    <h2 class="subtitle">This is the IPT10 PHP Quiz Web Application Laboratory Activity.</h2>

    <div class="container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <tbody>
                <tr>
                    <th>Input Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Complete Name</td>
                    <td><?php echo $complete_name; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td><?php echo $formatted_birthdate; ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php echo $contact_number; ?></td>
                </tr>
            </tbody>
        </table>

        <h2 class="title is-4">Quiz Summary</h2>
        <table class="table is-bordered is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions['questions'] as $index => $question): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($question['question']); ?></td>
                        <td><?php echo htmlspecialchars($correct_answers[$index]); ?></td>
                        <td><?php echo htmlspecialchars($answers[$index] ?? 'N/A'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
</body>
</html>

