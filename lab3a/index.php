<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">User Registration</h1>
        <h2 class="subtitle">
            This is the IPT10 PHP Quiz Web Application Laboratory Activity. Please register
        </h2>
        <form method="POST" action="instructions.php">
            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" type="text" name="complete_name" placeholder="Complete Name" required />
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" name="email" type="email" required />
                </div>
            </div>

            <div class="field">
                <label class="label">Birthdate</label>
                <div class="control">
                    <input class="input" name="birthdate" type="date" required />
                </div>
            </div>

            <div class="field">
                <label class="label">Contact Number</label>
                <div class="control">
                    <input class="input" name="contact_number" type="tel" placeholder="123-456-7890" required />
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Proceed Next</button>
                </div>
            </div>
        </form>
    </div>
</section>
</body>
</html>
