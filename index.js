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
  
    loadJobPostings();
  };
  
  document
    .getElementById("darkModeToggle")
    .addEventListener("click", toggleDarkMode);
  
  // Load job postings from server
  function loadJobPostings() {
    fetch('php/job_operations.php?action=fetch')
      .then(response => response.json())
      .then(data => {
        const postingsContainer = document.getElementById('job-postings');
        postingsContainer.innerHTML = '';
        data.forEach(posting => {
          const card = document.createElement('div');
          card.className = 'job-card';
          card.innerHTML = `
            <h3>${posting.job_title}</h3>
            <p>${posting.job_description}</p>
            <p>Posted on: ${posting.time_posted}</p>
            <button class="delete-btn" onclick="deleteJob(${posting.id})">Delete</button>
          `;
          postingsContainer.appendChild(card);
        });
      });
  }
  
  // Delete job posting
  function deleteJob(jobId) {
    fetch(`php/job_operations.php?action=delete&id=${jobId}`, {
      method: 'POST'
    })
    .then(response => response.text())
    .then(data => {
      if (data === 'success') {
        loadJobPostings(); // Refresh the job postings list
      } else {
        alert('Failed to delete the job posting');
      }
    });
  }
  