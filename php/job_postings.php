<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINANCE PROTOTYPE</title>
    <?php include 'partials/header.php'; ?>
</head>
<div id="job-postings"></div>
<form action="php/job_operations.php" method="POST" onsubmit="event.preventDefault(); addJob();">
    <input type="text" name="job_title" placeholder="Job Title" required>
    <textarea name="job_description" placeholder="Job Description" required></textarea>
    <button type="submit">Add Job</button>
</form>

<script src="js/index.js"></script>
<script src="js/job_postings.js"></script>