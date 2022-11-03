class ModelCreateAd {
/**
 * 
 * @param {*} input 
 * @param {*} error 
 * @returns bool
 */
  validInputImg(input, error) {
    let message;
    if (!input.value || input.value.length === 0) {
      message = "Veuillez télécharger votre photo";
      error.textContent = message;
      return false;
    } else {
      error.textContent = "";
      return true;
    }
  }

  /**
   * 
   * @param {*} input 
   * @param {*} error 
   * @returns bool
   */
  validInputTitle(input, error) {
    let message;
    if (!input.value || input.value.length === 0) {
      message = "Veuillez renseigner ce champ";
      error.textContent = message;
      return false;
    } else if (input.value.length < 5) {
      message = "Ce champ accepte au minimum 5 caractères";
      error.textContent = message;
      return false;
    } else if (input.value.length > 23) {
      message = "Ce champ accepte au maximum 23 caractères";
      error.textContent = message;
      return false;
    } else if (/[0-9]/.test(input.value)) {
      message = "Ce champ n'autorise pas les chiffres";
      error.textContent = message;
      return false;
    } else {
      error.textContent = "";
      return true;
    }
  }

  /**
   * 
   * @param {*} input 
   * @param {*} error 
   * @returns bool
   */
  validInputLocation(input, error) {
    let message;
    if (!input.value || input.value.length === 0) {
      message = "Veuillez renseigner ce champ";
      error.textContent = message;
      return false;
    } else if (/[0-9]/.test(input.value)) {
      message = "Ce champ n'autorise pas les chiffres";
      error.textContent = message;
      return false;
    } else if (input.value.length < 2) {
      message = "Ce champ accepte au minimum 2 caractères";
      error.textContent = message;
      return false;
    } else if (input.value.length > 15) {
      message = "Ce champ accepte au maximum 10 caractères";
      error.textContent = message;
      return false;
    } else {
      error.textContent = "";
      return true;
    }
  }

  /**
   * 
   * @param {*} input 
   * @param {*} error 
   * @returns bool
   */
  validInputRoom(input, error) {
    let message;
    if (!input.value || input.value.length === 0) {
      message = "Veuillez renseigner ce champ";
      error.textContent = message;
      return false;
    } else if (/[a-z]/.test(input.value)) {
      message = "Ce champ n'accepte pas les lettres";
      error.textContent = message;
      return false;
    } else if (input.value.length > 3) {
      message = "Ce champ accepte au maximum 3 chiffres";
      error.textContent = message;
      return false;
    } else if (input.value <= 0) {
      message = "Veuillez renseigner un numéro supérieur à 0";
      error.textContent = message;
      return false;
    } else if (/[A-Z]/.test(input.value)) {
      message = "Ce champ n'accepte pas les lettres";
      error.textContent = message;
      return false;
    } else if (!/[0-9]/.test(input.value)) {
      message = "Veuillez rentrer le nombre de chambres";
      error.textContent = message;
      return false;
    } else {
      error.textContent = "";
      return true;
    }
  }

  /**
   * 
   * @param {*} input 
   * @param {*} error 
   * @returns bool
   */
  validInputArea(input, error) {
    let message;
    if (!input.value || input.value.length === 0) {
      message = "Veuillez renseigner ce champ";
      error.textContent = message;
      return false;
    } else if (/[a-z]/.test(input.value)) {
      message = "Ce champ n'accepte pas les lettres";
      error.textContent = message;
      return false;
    } else if (input.value.length > 4) {
      message = "Ce champ accepte au maximum 4 chiffres";
      error.textContent = message;
      return false;
    } else if (input.value <= 0) {
      message = "Veuillez renseigner un numéro supérieur à 0";
      error.textContent = message;
      return false;
    } else if (/[A-Z]/.test(input.value)) {
      message = "Ce champ n'accepte pas les lettres";
      error.textContent = message;
      return false;
    } else if (!/[0-9]/.test(input.value)) {
      message = "Veuillez rentrer la superficie";
      error.textContent = message;
      return false;
    } else {
      error.textContent = "";
      return true;
    }
  }

  /**
   * 
   * @param {*} input 
   * @param {*} error 
   * @returns bool
   */
  validInputPrice(input, error) {
    let message;
    if (!input.value || input.value.length === 0) {
      message = "Veuillez renseigner ce champ";
      error.textContent = message;
      return false;
    } else if (/[a-z]/.test(input.value)) {
      message = "Ce champ n'accepte pas les lettres";
      error.textContent = message;
      return false;
    } else if (input.value.length > 9) {
      message = "Ce champ accepte au maximum 9 chiffres";
      error.textContent = message;
      return false;
    } else if (input.value <= 0) {
      message = "Veuillez renseigner un numéro supérieur à 0";
      error.textContent = message;
      return false;
    } else if (/[A-Z]/.test(input.value)) {
      message = "Ce champ n'accepte pas les lettres";
      error.textContent = message;
      return false;
    } else if (!/[0-9]/.test(input.value)) {
      message = "Veuillez rentrer la prix";
      error.textContent = message;
      return false;
    } else {
      error.textContent = "";
      return true;
    }
  }

  /**
   * 
   * @param {*} input 
   * @param {*} error 
   * @returns bool
   */
  validInputDescription(input, error) {
    let message;

    if (!input.value || input.value.length === 0) {
      message = "Veuillez renseigner ce champ";
      error.textContent = message;
      return false;
    } else if (input.value.length < 20) {
      message = "Ce champ accepte au minimum 20 caractères";
      error.textContent = message;
      return false;
    } else if (input.value.length > 250) {
      message = "Ce champ accepte au maximum 250 caractères";
      error.textContent = message;
      return false;
    } else {
      error.textContent = "";
      return true;
    }
  }
}

export default new ModelCreateAd();
