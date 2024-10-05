// index.js

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
              const jobCard = document.createElement('div');
              jobCard.classList.add('job-card');
              jobCard.innerHTML = `
                  <h3>${job.job_title}</h3>
                  <p>${job.job_description}</p>
                  <small>Posted on: ${job.time_posted}</small>
              `;
              document.getElementById('jobsList').appendChild(jobCard);
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
          const jobCard = document.createElement('div');
          jobCard.classList.add('job-card');
          jobCard.innerHTML = `
              <h3>${data.job.title}</h3>
              <p>${data.job.description}</p>
              <small>Posted on: ${data.job.time_posted}</small>
          `;
          document.getElementById('jobsList').prepend(jobCard); 
      } else {
          alert(data.message);
      }
  })
  .catch(error => console.error('Error:', error));
});
