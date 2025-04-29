// Toggle the dropdown visibility
function toggleDropdown() {
  const dropdown = document.getElementById('dropdown-menu');
  dropdown.classList.toggle('hidden');
}

// Add an event listener to the button
document.getElementById('profile-button').addEventListener('click', toggleDropdown);

// Close dropdown when clicking outside
document.addEventListener('click', (event) => {
  const button = document.getElementById('profile-button');
  const dropdown = document.getElementById('dropdown-menu');
  if (!button.contains(event.target) && !dropdown.contains(event.target)) {
    dropdown.classList.add('hidden');
  }
});
