<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting</title>
    <?php include 'header.php'; ?>
</head>
<body class="light-mode"> 

    <div class="job-post-container">
        <h2>Post a Job</h2>
        <form id="jobForm">
            <input type="text" name="job_title" placeholder="Job Title" required>
            <textarea name="job_description" placeholder="Job Description" required></textarea>
            <button type="submit">Submit</button>
        </form>
        <div id="jobCardsContainer">
        </div>
    </div>

    <script src="index.js"></script>
    <script>
        document.getElementById('jobForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            
            const formData = new FormData(this);
            
            fetch('job_connection_form.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    addJobCard(data.job_title, data.job_description, data.time_posted);
                } else {
                    alert('Error: ' + data.error);
                }
            })
            .catch(error => console.error('Error:', error));
        });

        function addJobCard(jobTitle, jobDescription, timePosted) {
            const jobCardsContainer = document.getElementById('jobCardsContainer');
            const jobCard = document.createElement('div');
            jobCard.classList.add('job-card');
            jobCard.innerHTML = `
                <h3>${jobTitle}</h3>
                <p>${jobDescription}</p>
                <small>Posted on: ${timePosted}</small>
            `;
            jobCardsContainer.prepend(jobCard); // Add the new job card at the top
        }
    </script>
</body>
</html>
