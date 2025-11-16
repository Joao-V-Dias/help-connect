$(document).ready(function () {
  const passwordInput = $("#password");
  const confirmPasswordInput = $("#confirmPassword");
  const submitButton = $('button[type="submit"]');

  function validarForm() {
    if ($("#nome").val().trim() == "") {
      currentStep = 0;
      updateStep();
      $("#nome").focus();
      alert("Preencha o nome");
      return false;
    }

    if ($("#cidade").val().trim() == "") {
      currentStep = 0;
      updateStep();
      $("#cidade").focus();
      alert("Preencha a cidade");
      return false;
    }

    if ($("#email").val().trim() == "") {
      currentStep = 1;
      updateStep();
      $("#email").focus();
      alert("Preencha o email");
      return false;
    }

    if ($("#telefone").val().trim() == "") {
      currentStep = 1;
      updateStep();
      $("#telefone").focus();
      alert("Preencha o telefone");
      return false;
    }

    if ($("#password").val().length < 8) {
      $("#password").focus();
      alert("Use uma senha maior com no mínimo 8 caracteres");
      return false;
    }

    return true;
  }

  $("#cadastroForm").on("submit", function (event) {
    if (!validarForm()) {
      event.preventDefault();
    }
  });

  $("#password, #confirmPassword").on("input", function () {
    if (passwordInput.val() !== confirmPasswordInput.val()) {
      confirmPasswordInput.css("border-color", "red");
      submitButton.prop("disabled", true);
    } else {
      confirmPasswordInput.css("border-color", "");
      submitButton.prop("disabled", false);
    }
  });
});
