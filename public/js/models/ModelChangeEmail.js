class ModelSettings {
  /**
   * @param {*} inputOldEmail
   * @param {*} inputNewEmail
   * @param {*} errorNewEmail
   * @returns bool 
   */
  checkOldAndNewEamil(inputOldEmail, inputNewEmail, errorNewEmail) {
    if (inputOldEmail.value === inputNewEmail.value) {
      errorNewEmail.textContent =
        "La nouvelle adresse email doit être différente de l'ancienne";
      return false;
    } else {
      errorNewEmail.textContent = "";
      return true;
    }
  }
}

export default new ModelSettings();
