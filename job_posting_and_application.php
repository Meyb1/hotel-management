<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINANCE PROTOTYPE</title>
    <?php include 'header.php'; ?>
</head>
<body class="light-mode"> 
    <div class="container">
        <h1>Jobs</h1>
        <form method="POST" action="job_insert_connection.ph">
            <input type="text" name="job_title" for="job_title" placeholder="Job Title" required>
            <textarea name="job_description" for="job_description" placeholder="Job Description" required></textarea>
            <button type="submit">Post Job</button>
        </form>
        <a href="index.php">Back to Home</a>
    </div>
<script src="index.js"></script>
</html>
