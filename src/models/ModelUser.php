<?php

namespace App\models\ModelUser;


use PDO;


require_once('src/config/config.php');

class ModelUser
{

  public array $errorSendEmail = [
    "errorCategory" => "",
    "errorEmail" => "",
    "errorSubject" => "",
    "errorMessage" => ""
  ];

  /**
   * Check all input from contact.html
   * @param string $allInput
   * @return array $allInput
   */
  public function sanatizeSendEmail(array $allInput)
  {
    $allInput = filter_input_array(INPUT_POST, [
      "email" => FILTER_SANITIZE_EMAIL,
      "subject" => FILTER_SANITIZE_SPECIAL_CHARS,
      "message" => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);

    return $allInput ?? [];
  }

  /**
   * check form when user wants send email
   * @param $allInput
   * @return array $errorSendMail
   */
  public function checkAllInputSendEmail(array $allInput): array
  {
    //Permets de vérifier l'input email
    $this->checkEmail($allInput['email']);
    //Permets de vérificer l'input subject 
    $this->checkSubject($allInput['subject']);
    //Permets de vérifier l'input message
    $this->checkMessage($allInput['message']);

    return $this->errorSendEmail;
  }

  /**
   * check Input email
   * @param string $email
   * @return array $errorSendMail
   */
  public function checkEmail(string $email): array
  {

    if (!$email) {
      $this->errorSendEmail['errorEmail'] = ERROR_EMPTY;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->errorSendEmail['errorEmail'] = ERROR_EMAIL_NOT_VALID;
    }
    return $this->errorSendEmail;
  }

  /**
   * check input subject
   * @param string $subject
   * @return array errorSendEmail
   */
  public function checkSubject(string $subject): array
  {
    if (!$subject) {
      $this->errorSendEmail["errorSubject"] = ERROR_EMPTY;
    } elseif (mb_strlen($subject) < 3) {
      $this->errorSendEmail["errorSubject"] = "Ce champ accepte au minimum 3 caractères";
    } elseif (mb_strlen($subject) > 50) {
      $this->errorSendEmail["errorSubject"] = "Ce champ accepte au maximum 50 caractères";
    }

    return $this->errorSendEmail;
  }

  /**
   * check input message
   * @param string $message
   * @return array $errorSendEmail
   */
  public function checkMessage(string $message): array
  {

    if (!$message) {
      $this->errorSendEmail['errorMessage'] = ERROR_EMPTY;
    } elseif (mb_strlen($message) < 20) {
      $this->errorSendEmail['errorMessage'] = "Ce champ accepte au minimum 20 caractères";
    } elseif (mb_strlen($message) > 500) {
      $this->errorSendEmail['errorMessage'] = "Ce champ accepte au maximum 500 caractères";
    }

    return $this->errorSendEmail;
  }
}
