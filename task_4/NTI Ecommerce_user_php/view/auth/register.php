<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;
use App\Mail\VerificationCodeMail;

$title = "Register";

include "../layouts/header.php";
include "../layouts/navbar.php";
include "../layouts/breadcrumb.php";

$validation = new Validation;
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST){
  $validation->setOldValues($_POST);
  $validation->setValue($_POST['first_name'] ?? "")->setValueName('first name')
  ->required()->between(2,32);
  $validation->setValue($_POST['last_name'] ?? "")->setValueName('last name')
  ->required()->between(2,32);
  $validation->setValue($_POST['email'] ?? "")->setValueName('email')
  ->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->unique('users','email');
  $validation->setValue($_POST['phone'] ?? "")->setValueName('phone')
  ->required()->regex('/^01[0125][0-9]{8}$/')->unique('users','phone');
  $validation->setValue($_POST['password'] ?? "")->setValueName('password')
  ->required()->regex("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/","Minimum 8 and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character:")->confirmed($_POST['password_confirmation']);
  $validation->setValue($_POST['password_confirmation'] ?? "")->setValueName('password confirmation')
  ->required();
  $validation->setValue($_POST['gender'] ?? "")->setValueName('gender')
  ->required()->in(['m','f']);
  if(empty($validation->getErrors())){
      $verification_code = rand(100000,999999);
      $user = new User;
      $user->setFirst_name($_POST['first_name'])
      ->setLast_name($_POST['last_name'])
      ->setEmail($_POST['email'])
      ->setPhone($_POST['phone'])
      ->setGender($_POST['gender'])
      ->setPassword($_POST['password'])
      ->setVerification_code($verification_code);

      if($user->create()){
          $subject = "Verification Mail";
          $body = "<p> Hello {$_POST['first_name']} {$_POST['last_name']}.</p>
          <p> Your Verification Code:<b style='color:blue;'>{$verification_code}</b></p>
          <p> Thank You</p>";
          $verificationMail = new VerificationCodeMail;
          if($verificationMail->send($_POST['email'],$subject,$body)){
            $_SESSION['verification_email'] = $_POST['email'];
            header('location:verification-code.php?redirect=1');die;
          }else{
            $error = "<div class='alert alert-danger' > Please Try Again Later </div>";
          }
      }else{
          $error = "<div class='alert alert-danger' > Something went wrong </div>";
      }
  }

}
 ?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">

                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4>register</h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?= $error ?? "" ?>
                                    <form action="#" method="post">
                                        <input type="text" name="first_name" placeholder="First Name"
                                            value="<?= $validation->getOldValue('first_name') ?>" />
                                        <?= $validation->getMessage('first name') ?>
                                        <input type="text" name="last_name" placeholder="Last Name"
                                            value="<?= $validation->getOldValue('last_name') ?>" />
                                        <?= $validation->getMessage('last name') ?>
                                        <input name="email" placeholder="Email Address" type="email"
                                            value="<?= $validation->getOldValue('email') ?>" />
                                        <?= $validation->getMessage('email') ?>
                                        <input name="phone" placeholder="Phone" type="number"
                                            value="<?= $validation->getOldValue('phone') ?>" />
                                        <?= $validation->getMessage('phone') ?>
                                        <input type="password" name="password" placeholder="Password" />
                                        <?= $validation->getMessage('password') ?>
                                        <input type="password" name="password_confirmation"
                                            placeholder="Password Confirmation" />
                                        <?= $validation->getMessage('password confirmation') ?>
                                        <select name="gender" class="form-control my-2" id="">
                                            <option <?= $validation->getOldValue('gender') == 'm' ? 'selected' : '' ?>
                                                value="m">Male</option>
                                            <option <?= $validation->getOldValue('gender') == 'f' ? 'selected' : '' ?>
                                                value="f">Female</option>
                                        </select>
                                        <?= $validation->getMessage('gender') ?>
                                        <div class="button-box my-3">
                                            <button type="submit"><span>Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include "../layouts/footer.php";
include "../layouts/scripts.php";
?>