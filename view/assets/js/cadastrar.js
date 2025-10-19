const steps = document.querySelectorAll(".form-step");
const progressBar = document.getElementById("progressBar");
const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirmPassword");
const submitButton = document.querySelector("button[type='submit']");
let currentStep = 0;

function updateStep() {
  steps.forEach((step, index) => {
    step.classList.toggle("active", index === currentStep);
  });
  progressBar.style.width = `${((currentStep + 1) / steps.length) * 100}%`;
}

function nextStep() {
  if (currentStep < steps.length - 1) {
    currentStep++;
    updateStep();
  }
}

function prevStep() {
  if (currentStep > 0) {
    currentStep--;
    updateStep();
  }
}

function validatePasswords() {
  if (passwordInput.value !== confirmPasswordInput.value) {
    confirmPasswordInput.style.borderColor = "red";
    submitButton.disabled = true;
  } else {
    confirmPasswordInput.style.borderColor = "";
    submitButton.disabled = false;
  }
}

confirmPasswordInput.addEventListener("input", validatePasswords);
passwordInput.addEventListener("input", validatePasswords);
