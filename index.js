function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");
    if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("theme", "dark");
    } else {
        localStorage.setItem("theme", "light");
    }
}

window.onload = function () {
    const savedTheme = localStorage.getItem("theme");

    if (savedTheme === "dark") {
        document.body.classList.add("dark-mode");
    }

    fetch('job_fetch_connection.php')  
        .then(response => response.json())
        .then(jobs => {
            jobs.forEach(job => {
                createJobCard(job);
            });
        })
        .catch(error => console.error('Error fetching jobs:', error));
};

function createJobCard(job) {
    const jobCard = document.createElement('div');
    jobCard.classList.add('job-card');
    jobCard.innerHTML = `
        <h3>${job.job_title}</h3>
        <p>${job.job_description}</p>
        <small>Posted on: ${job.time_posted}</small>
        <div class="action-buttons">
            <button class="edit" onclick="editJob('${job.job_title}', '${job.job_description}')">Edit</button>
            <button class="delete" onclick="deleteJob('${job.job_title}')">Delete</button>
        </div>
    `;
    document.getElementById('jobsList').appendChild(jobCard);
}

function editJob(title, description) {
    const newTitle = prompt("Edit Job Title:", title);
    const newDescription = prompt("Edit Job Description:", description);
    if (newTitle !== null && newDescription !== null) {
        console.log(`Updated Job - Title: ${newTitle}, Description: ${newDescription}`);
    }
}

function deleteJob(title) {
    if (confirm(`Are you sure you want to delete the job titled "${title}"?`)) {
        console.log(`Deleted Job: ${title}`);
        const jobCards = document.querySelectorAll('.job-card');
        jobCards.forEach(card => {
            if (card.querySelector('h3').innerText === title) {
                card.remove();
            }
        });
    }
}

document.getElementById("darkModeToggle").addEventListener("click", toggleDarkMode);

document.getElementById('jobPostingForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
    const formData = new FormData(this); 
    fetch('job_connection_form.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            createJobCard(data.job);
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});
