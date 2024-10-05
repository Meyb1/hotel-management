<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINANCE PROTOTYPE</title>
    <link rel="stytlesheet" href="job_posting.css">
    <?php include 'header.php'; ?>
</head>
<body class="light-mode"> 
    <div class="job-posting-container">
        <h1>Jobs</h1>
        <form method="POST" action="job_connection_form.php">
            <input type="text" name="job_title" placeholder="Job Title" required>
            <textarea name="job_description" placeholder="Job Description" required></textarea>
            <button type="submit">Post Job</button>
        </form> 
    </div>
<script src="index.js"></script>
</body>
</html>
