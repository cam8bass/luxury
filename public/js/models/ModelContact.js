class ModelContact {
  validSubject(inputSubject, errorSubjectText) {
    if (!inputSubject.value) {
      errorSubjectText.textContent = "Veuillez renseigner ce champ";
      return false;
    } else if (inputSubject.value.length < 3) {
      errorSubjectText.textContent = "Ce champ accepte au minimum 3 caractères";
      return false;
    } else if (inputSubject.value.length > 50) {
      errorSubjectText.textContent =
        "Ce champ accepte au maximum 50 caractères";
      return false;
    } else {
      errorSubjectText.textContent = "";
      return true;
    }
  }

  validMessage(inputMessage, errorMessageText) {
    if (!inputMessage.value) {
      errorMessageText.textContent = "Veuillez renseigner ce champ";
      return false;
    } else if (inputMessage.value.length < 20) {
      errorMessageText.textContent =
        "Ce champ accepte au minimum 20 caractères";
      return false;
    } else if (inputMessage.value.length > 500) {
      errorMessageText.textContent =
        "Ce champ accepte au maximum 500 caractères";
      return false;
    } else {
      errorMessageText.textContent = "";
      return true;
    }
  }
}

export default new ModelContact();
