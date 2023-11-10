// Get the add and remove buttons for diplomas and experiences
const addDiplomaBtn = document.getElementById('addDiplomaBtn');
const removeDiplomaBtn = document.getElementById('removeDiplomaBtn');
const addExperienceBtn = document.getElementById('addExperienceBtn');
const removeExperienceBtn = document.getElementById('removeExperienceBtn');

// Get the textarea elements for diplomas and experiences
const diplomasTextarea = document.getElementById('diplomas');
const experiencesTextarea = document.getElementById('experiences');

// Disable the textareas initially
diplomasTextarea.disabled = true;
experiencesTextarea.disabled = true;

// Add event listener for adding a new diploma
addDiplomaBtn.addEventListener('click', () => {
  // Get the current value of the diplomas textarea
  const diplomas = diplomasTextarea.value.trim();

  // Prompt the user to enter a new diploma
  const newDiploma = prompt('Enter a new diploma');

  // Add the new diploma to the diplomas textarea
  if (newDiploma) {
    if (diplomas) {
      diplomasTextarea.value = diplomas + '\n' + newDiploma;
    } else {
      diplomasTextarea.value = newDiploma;
    }
  }
});

// Add event listener for removing the last diploma
removeDiplomaBtn.addEventListener('click', () => {
  // Get the current value of the diplomas textarea
  const diplomas = diplomasTextarea.value.trim();

  // Split the diplomas into an array
  const diplomasArray = diplomas.split('\n');

  // Remove the last diploma from the array
  diplomasArray.pop();

  // Join the remaining diplomas into a string
  const newDiplomas = diplomasArray.join('\n');

  // Update the diplomas textarea
  diplomasTextarea.value = newDiplomas;
});

// Add event listener for adding a new experience
addExperienceBtn.addEventListener('click', () => {
  // Get the current value of the experiences textarea
  const experiences = experiencesTextarea.value.trim();

  // Prompt the user to enter a new experience
  const newExperience = prompt('Enter a new experience');

  // Add the new experience to the experiences textarea
  if (newExperience) {
    if (experiences) {
      experiencesTextarea.value = experiences + '\n' + newExperience;
    } else {
      experiencesTextarea.value = newExperience;
    }
  }
});

// Add event listener for removing the last experience
removeExperienceBtn.addEventListener('click', () => {
  // Get the current value of the experiences textarea
  const experiences = experiencesTextarea.value.trim();

  // Split the experiences into an array
  const experiencesArray = experiences.split('\n');

  // Remove the last experience from the array
  experiencesArray.pop();

  // Join the remaining experiences into a string
  const newExperiences = experiencesArray.join('\n');

  // Update the experiences textarea
  experiencesTextarea.value = newExperiences;
});

// Enable the textareas when the respective "Add" buttons are clicked
addDiplomaBtn.addEventListener('click', () => {
  diplomasTextarea.disabled = false;
});

addExperienceBtn.addEventListener('click', () => {
  experiencesTextarea.disabled = false;
});





