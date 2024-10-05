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

    // Fetch existing job postings
    fetch('job_fetch_connection.php')
        .then(response => response.json())
        .then(jobs => {
            jobs.forEach(job => {
                addJobCard(job);
            });
        })
        .catch(error => console.error('Error fetching jobs:', error));
};

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
            addJobCard(data.job);
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});

function addJobCard(job) {
    const jobCard = document.createElement('div');
    jobCard.classList.add('job-card');
    jobCard.setAttribute('data-id', job.id);
    jobCard.innerHTML = `
        <h3>${job.job_title}</h3>
        <p>${job.job_description}</p>
        <small>Posted on: ${job.time_posted}</small>
        <button onclick="editJob(${job.id})">Edit</button>
        <button onclick="deleteJob(${job.id})">Delete</button>
    `;
    document.getElementById('jobsList').prepend(jobCard); 
}

function editJob(id) {
    const jobCard = document.querySelector(`[data-id="${id}"]`);
    const title = prompt("Enter new job title:", jobCard.querySelector("h3").textContent);
    const description = prompt("Enter new job description:", jobCard.querySelector("p").textContent);

    if (title && description) {
        fetch('job_edit_connection.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id, title, description })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                jobCard.querySelector("h3").textContent = title;
                jobCard.querySelector("p").textContent = description;
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

function deleteJob(id) {
    if (confirm("Are you sure you want to delete this job?")) {
        fetch('job_delete_connection.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                document.querySelector(`[data-id="${id}"]`).remove();
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
