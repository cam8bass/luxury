class ViewContact {
  _inputEmail = document.querySelector("#input-email");
  _inputSubject = document.querySelector("#input-subject");
  _inputMessage = document.querySelector("#input-message");
  _errorEmailText = document.querySelector("#error-email");
  _errorSubjectText = document.querySelector("#error-subject");
  _errorMessageText = document.querySelector("#error-message");
  _formSendEmail = document.querySelector("#form-sendEmail");
}

export default new ViewContact();
