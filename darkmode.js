// Function to toggle the theme and store the preference in local storage
function toggleTheme() {
    const currentTheme = document.getElementById('theme-style').getAttribute('href');
    const newTheme = currentTheme.includes('light-mode.css') ? 'dark-mode.css' : 'light-mode.css';
    
    // Store the theme preference in local storage
    localStorage.setItem('theme', newTheme);
    
    // Update the theme
    document.getElementById('theme-style').setAttribute('href', 'css/' + newTheme);
}

// Function to load the theme preference from local storage
function loadTheme() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        document.getElementById('theme-style').setAttribute('href', 'css/' + savedTheme);
    }
}

// Call the loadTheme function when the page loads
window.onload = loadTheme;
