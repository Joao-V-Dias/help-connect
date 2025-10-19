const fotoInput = document.getElementById("foto");
const steps = document.querySelectorAll(".form-step");
const progressBar = document.getElementById("progressBar");
const passwordInput = document.getElementById("password");
const fotoPreview = document.getElementById("fotoPreview");
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

function teste() {
  console.log("teste");
}

function previewFoto(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      fotoPreview.src = e.target.result;
      fotoPreview.style.display = "block";
    };
    reader.readAsDataURL(file);
  } else {
    fotoPreview.src = "#";
    fotoPreview.style.display = "none";
  }
}

confirmPasswordInput.addEventListener("input", validatePasswords);
passwordInput.addEventListener("input", validatePasswords);
fotoInput.addEventListener("change", previewFoto);
