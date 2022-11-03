<?php

namespace App\models\ModelErrorManagement;

require_once('src/config/config.php');


class ErrorManagement
{

  public array $errorCreateAd = [
    "errorTitle" => "",
    "errorLocation" => "",
    "errorRoom" => "",
    "errorArea" => "",
    "errorPrice" => "",
    "errorDescription" => "",
  ];

  public array $errorLogin = [
    "errorEmail" => "",
    "errorPassword" => ""
  ];

  public array $errorChangeEmail = [
    "errorOldEmail" => "",
    "errorNewEmail" => ""
  ];

  public string $errorImg = "";

  /**
   * check input login
   * @param array $allInput input post
   * @return array all input sanatize
   */
  public function sanatizeLoginAccount(array $allInput): array
  {
    $allInput = filter_input_array(INPUT_POST, [
      "email" => FILTER_SANITIZE_EMAIL,
      "password" => FILTER_SANITIZE_SPECIAL_CHARS
    ]);

    return $allInput ?? [];
  }

  /**
   * check input change email
   * @param array $allInput
   * @return array all input sanatize
   */
  public function sanatizeChangeEmail(array $allInput): array
  {
    $allInput = filter_input_array(INPUT_POST, [
      "oldEmail" => FILTER_SANITIZE_EMAIL,
      "newEmail" => FILTER_SANITIZE_EMAIL
    ]);

    return $allInput ?? [];
  }

  /**
   * @param array $userAccount data from user table
   * @param string $password
   * @param string $email
   * @return array login error
   */
  public function checkInputLogin($userAccount, string $password, string $email): array
  {
    if (!$userAccount || !$email) {
      $this->errorLogin['errorEmail'] = ERROR_EMAIL_NOT_EXIST;
    } elseif (!filter_var($userAccount["email"], FILTER_VALIDATE_EMAIL)) {
      $this->errorLogin['errorEmail'] = ERROR_EMAIL_NOT_VALID;
    }
    if (!password_verify($password, $userAccount['password'] ?? '')) {
      $this->errorLogin['errorPassword'] = ERROR_PWD;
    }
    if (!$password || !$userAccount) {
      $this->errorLogin['errorPassword'] = ERROR_EMPTY;
    }



    return $this->errorLogin;
  }

  /**
   * sanatize all input from form create ad
   * @param $allInput
   * @return array $allInput
   */
  public function sanatizeCreateForm(array $allInput): array
  {
    $allInput = filter_input_array(INPUT_POST, [
      "title" => FILTER_SANITIZE_SPECIAL_CHARS,
      "location" => FILTER_SANITIZE_SPECIAL_CHARS,
      "room" => FILTER_SANITIZE_SPECIAL_CHARS,
      "area" => FILTER_SANITIZE_SPECIAL_CHARS,
      "price" => FILTER_SANITIZE_SPECIAL_CHARS,
      "description" => FILTER_SANITIZE_SPECIAL_CHARS,
      "status" => FILTER_SANITIZE_SPECIAL_CHARS
    ]);

    return $allInput ?? [];
  }

  /**
   * check if the image before downloading it
   * @param array $img img path
   * @return string error 
   */
  public function checkImgFile(array $img): string
  {
    $valideImgExtension = ["jpeg", "JPEG", "png", "PNG", "jpg", "JPG"];
    if (isset($img['img'])) {
      if ($img['img']['size'] > 2097152) {
        $this->errorImg = ERROR_IMG_SIZE;
      } elseif (empty(array_filter($valideImgExtension, fn ($el) => $el === pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION)))) {
        $this->errorImg  = ERROR_IMG_EXTENSION;
      }
    } else {
      $this->errorImg  = ERROR_IMG;
    }
    return   $this->errorImg;
  }

  /**
   * @param array $allInput
   * @return array $errorCreateAd
   */
  public function checkAllInputCreateAd(array $allInput): array
  {
    $title = $allInput['title'] ?? "";
    $location = $allInput['location'] ?? "";
    $room = $allInput['room'] ?? "";
    $area = $allInput['area'] ?? "";
    $price = $allInput['price'] ?? "";
    $description = $allInput['description'] ?? "";


    //Permet de vérifier la conformité du titre 
    $this->checkErrorTitle($title);
    //Permets de vérifier l'input location
    $this->checkErrorLocation($location);

    if (is_numeric($room)) {
      //Permets de vérifier input room
      $this->checkErrorRoom($room);
    } else {
      $this->errorCreateAd["errorRoom"] = "Veuillez rentrer un nombre entier";
    }

    if (is_numeric($area)) {
      // Permets de vérifier la superficie
      $this->checkErrorArea((int)$area);
    } else {
      $this->errorCreateAd["errorArea"] = "Veuillez rentrer un nombre entier";
    }

    if (is_numeric($price)) {
      //Permets de vérifier le prix
      $this->checkErrorPrice((float)$price);
    } else {
      $this->errorCreateAd["errorPrice"] = "Veuillez rentrer un nombre";
    }

    // Permets de vérifier la description
    $this->checkErrorDescription($description);

    return $this->errorCreateAd;
  }

  /**
   * check input title
   * @param string $title
   * @return array error title
   */
  public function checkErrorTitle(string $title): array
  {

    $number = preg_match('@[0-9]@', $title);

    if (!$title) {
      $this->errorCreateAd['errorTitle'] = ERROR_EMPTY;
    }

    if (mb_strlen($title) < 5) {
      $this->errorCreateAd['errorTitle'] = "Ce champ accepte au minimum 5 caractères";
    }

    if (mb_strlen($title) > 23) {
      $this->errorCreateAd['errorTitle'] = "Ce champ accepte au maximum 23 caractères";
    }

    if (is_numeric($title) || $number) {
      $this->errorCreateAd['errorTitle'] = ERROR_INPUT_NUMBER;
    }

    return $this->errorCreateAd;
  }

  /**
   * check input location
   * @param string $location
   * @return array error location
   */
  public function checkErrorLocation(string $location): array
  {
    $number = preg_match('@[0-9]@', $location);

    if (!$location) {
      $this->errorCreateAd['errorLocation'] = ERROR_EMPTY;
    }

    if ($number) {
      $this->errorCreateAd['errorLocation'] = ERROR_INPUT_NUMBER;
    }

    if (mb_strlen($location) < 2) {
      $this->errorCreateAd['errorLocation'] = "Ce champ accepte au minimum 2 caractères";
    }

    if (mb_strlen($location) > 15) {
      $this->errorCreateAd['errorLocation'] = "Ce champ accepte au maximum 15 caractères";
    }

    return $this->errorCreateAd;
  }

  /**
   * check input room
   * @param int $room
   * @return array error room
   */
  public function checkErrorRoom($room): array
  {

    if (!$room) {
      $this->errorCreateAd['errorRoom'] = ERROR_EMPTY;
    }

    if ($room <= 0) {
      $this->errorCreateAd['errorRoom'] = "Veuillez renseigner un numéro supérieur à 0";
    }

    if ($room > 999) {
      $this->errorCreateAd['errorRoom'] = "Ce champ accepte au maximum 3 chiffres";
    }

    return $this->errorCreateAd;
  }

  /**
   * check input area
   * @param int $area
   * @return array error area
   */
  public function checkErrorArea(int $area): array
  {

    if (!$area) {
      $this->errorCreateAd['errorArea'] = ERROR_EMPTY;
    }

    if ($area <= 0) {
      $this->errorCreateAd['errorArea'] = "Veuillez renseigner un numéro supérieur à 0";
    }

    if ($area > 9999) {
      $this->errorCreateAd['errorArea'] = "Ce champ accepte au maximum 4 chiffres";
    }

    return $this->errorCreateAd;
  }

  /**
   * check input price
   * @param int $price
   * @return array error price
   */
  public function checkErrorPrice(int $price): array
  {

    if (!$price) {
      $this->errorCreateAd['errorPrice'] = ERROR_EMPTY;
    }

    if ($price <= 0) {
      $this->errorCreateAd['errorPrice'] = "Veuillez renseigner un numéro supérieur à 0";
    }

    if ($price > 999999999) {
      $this->errorCreateAd['errorPrice'] = "Ce champ accepte au maximum 9 chiffres";
    }

    return $this->errorCreateAd;
  }

  /**
   * check input description
   * @param string $description
   * @return array error description
   */
  public function checkErrorDescription(string $description): array
  {
    if (!$description) {
      $this->errorCreateAd['errorDescription'] = ERROR_EMPTY;
    }

    if (mb_strlen($description) < 20) {
      $this->errorCreateAd['errorDescription'] = "Ce champ accepte au minimum 20 caractères";
    }

    if (mb_strlen($description) > 250) {
      $this->errorCreateAd['errorDescription'] = "Ce champ accepte au maximum 250 caractères";
    }

    return $this->errorCreateAd;
  }

  /**
   * @param string $oldEmail
   * @param string $oldUserEmail
   * @param string $newEmail
   * @return array $errorChangeEmail
   */
  public function checkErrorChangeEmail(string $oldEmail, string $oldUserEmail, string $newEmail): array
  {
    if ($oldEmail !== $oldUserEmail) {
      $this->errorChangeEmail['errorOldEmail'] = ERROR_EMAIL_WRONG;
    }

    if ($oldEmail === $newEmail) {
      $this->errorChangeEmail['errorNewEmail'] = ERROR_EMAIL_NOT_DIFF;
    }

    if (!filter_var($oldEmail, FILTER_VALIDATE_EMAIL)) {
      $this->errorChangeEmail['errorOldEmail'] = ERROR_EMAIL_NOT_VALID;
    }

    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
      $this->errorChangeEmail['errorNewEmail'] = ERROR_EMAIL_NOT_VALID;
    }

    return $this->errorChangeEmail;
  }

  /**
   * @param string $status
   * @return string $error
   */
  public function checkErrorStatus(string $status)
  {
    $validStatus = ['Available', 'Sold'];
    $error = "";
    if (!in_array($status, $validStatus, true)) {
      $error = ERROR_EMPTY;
    }

    return $error;
  }
}
