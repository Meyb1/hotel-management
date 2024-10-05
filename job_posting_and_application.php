<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINANCE PROTOTYPE</title>
    <link rel="stylesheet" href="job_posting.css" />
    <?php include 'header.php'; ?>
</head>
<body class="light-mode"> 
    <div class="job-posting-container">
        <h1>Jobs</h1>
        
        <!-- Job Posting Form -->
        <form method="POST" action="job_connection_form.php">
            <div class="job-title-container">
                <input type="text" name="job_title" placeholder="Job Title" required>
            </div>
            <div class="job-description-container">
                <textarea name="job_description" placeholder="Job Description" required></textarea>
            </div>
            <button type="submit">Post Job</button>
        </form> 
    </div>

    <!-- Job Postings Cards -->
    <div class="job-listings-container">
        <?php include 'job_posting_connection.php'?>
    </div>

<script src="index.js"></script>
</body>
</html>
