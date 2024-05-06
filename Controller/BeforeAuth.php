<?php

class BeforeAuth
{
    public $obj;
    public $config;
    function __construct()
    {
        require_once 'Model/User.php';
        require_once 'Model/User_details.php';
        $this->config = require_once 'config.php';
        $this->config = $this->config['HiiEComm'];
        session_start();
        if (isset($_SESSION['email'])) {
            header('Location: /Admin/home');
            exit();
        } else {
            session_destroy();
            require_once 'Controller/Validations.php';
            $this->obj = new Validations();
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new User($this->config);
            $detail = $user->findByEmail($email);
            if ($detail && password_verify($password, $detail['password']) && $detail['status'] == 0) {
                echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-info fade show" role="alert">
                    <strong>Info!</strong> Please verify your email And Complete your profile
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                require_once 'View/login.view.php';
            } else if ($detail && password_verify($password, $detail['password']) && $detail['status'] == 1) {
                session_start();
                $_SESSION['email'] = $email;
                header("Location: /Admin/home");
                exit();
            } else {
                echo '
                <div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
                <strong>Error!</strong> ' . "Invalid Email or Password" . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                require_once 'View/login.view.php';
            }
        } else if (isset($_GET['msg'])) {
            if ($_GET['msg'] == 'newuser') {
                echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
                <strong>Success!</strong> Account created successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            } elseif ($_GET['msg'] == 'logout') {
                echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
                <strong>Success!</strong> Logged out secondaryfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            } elseif ($_GET['msg'] == 'profilecompleted') {
                echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
                <strong>Success!</strong> Profile Completed Successfully, Login to continue
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            } elseif ($_GET['msg'] == 'linksent') {
                echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
                <strong>Success!</strong> A password reset link has been sent to your email
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            } elseif ($_GET['msg'] == 'reset') {
                echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
                <strong>Success!</strong> Password reset successfully! Login to continue
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            require_once 'View/login.view.php';
        } else {
            require_once 'View/login.view.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $phone = $_POST['phone'];

            if ($password != $password2 || !isset($_POST['terms'])) {
                echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-info fade show" role="alert">
                    <strong>Info!</strong> Something went wrong, Please check your details
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                require_once 'View/register.view.php';
            } else if ($this->obj->validateName($fname) && $this->obj->validateName($lname) && $this->obj->validateEmail($email) && $this->obj->validatePassword($password) && $this->obj->validatePhone($phone)) {
                $user = new User($this->config, 1, $fname, $lname, $email, $phone, $password);
                $user->save();
                session_start();
                $link = "http://hiiecomm.test/Admin/completeprofile?user=$email";
                $_SESSION['link'] = $link;
                $_SESSION['email'] = $email;
                $_SESSION['user'] = $fname . " " . $lname;
                require_once 'Controller/signUp_Mail.php';
                session_unset();
                session_destroy();
                header("Location: /Admin?msg=newuser");
            } else {
                echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-info fade show" role="alert">
                    <strong>Info!</strong> Something went wrong, Please fill all the details correctly
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                require_once 'View/register.view.php';
            }
        } else {
            require_once 'View/register.view.php';
        }
    }

    public function completeProfile()
    {
        if (isset($_GET['user'])) {
            $bool = false;
            $user = new User($this->config);
            $res = $user->findByEmail($_GET['user']);

            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($res && $res['status'] == 0) {
                    require_once 'View/completeProfile.view.php';
                } else {
                    require_once 'View/404.view.php';
                    exit();
                }
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $res;
            if ($id && $id['status'] == 0) {
                if ($this->obj->validateZip($_POST['zip']) && $this->obj->validateCity($_POST['city']) && $this->obj->validateState($_POST['state']) && $this->obj->validateGender( $_POST['gender']) && $this->obj->validateHobbies($_POST['hobbies'][0]) && $this->obj->validateHobbies($_POST['hobbies'][1]) && $this->obj->validateImage($_FILES['image']['name'][0])) {
                    $user_details = new User_details($this->config, $id['id'], $_FILES['image']['name'][0], $_POST['zip'], $_POST['city'], $_POST['state'], "", $_POST['gender'], $_POST['hobbies'][0], $_POST['hobbies'][1], "", "");
                    $user_details->save();
                    $user->updateStatus($id['email']);
                    header("Location: /Admin?msg=profilecompleted");
                    exit();
                } else {
                    echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-info fade show" role="alert">
                    <strong>Info!</strong> Something went wrong, Please fill all the details correctly
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                    require_once 'View/completeProfile.view.php';
                }
            } else {
                require_once 'View/404.view.php';
                exit();
            }
        } else {
            if($bool){
                require_once 'View/404.view.php';
            }
        }
    }

    public function forgot(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $email = $_POST['email'];
            $user = new User($this->config);
            $user = $user->findByEmail($email);
            if($user){
                $token = bin2hex(random_bytes(50));
                $user = new User($this->config);
                $user->updateToken($email, $token);
                $link = "http://hiiecomm.test/Admin/reset?token=".$token;
                require_once 'Controller/resetpass_Mail.php';
                header("Location: /Admin?msg=linksent");
                exit();
            } else {
                echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
                    <strong>Info!</strong> Email not found
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                require_once 'View/forgotpass.view.php';
            }
        }
        else {
            require_once 'View/forgotpass.view.php';
        }
    }

    public function reset(){
        if(isset($_GET['token']) && $_GET['token'] != ""){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $password = $_POST['pass1'];
                $password2 = $_POST['pass2'];
                if(! $this->obj->validatePassword($password)){
                    echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
                    <strong>Alert!</strong> Password be strong having atleast 8 characters, 1 A-Z, 1 a-z, 1 number and 1 special character
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                    require_once 'View/resetpass.view.php';
                    return;
                }
                if($password == $password2){
                    $user = new User($this->config);
                    $user->updatePassword($_GET['token'], $password);
                    header("Location: /Admin?msg=reset");
                    exit();
                } else {
                    echo '<div style="z-index: 1;" id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-info fade show" role="alert">
                    <strong>Info!</strong> Something went wrong, Please fill all the details correctly
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                    require_once 'View/resetpass.view.php';
                }
            } else {
                require_once 'View/resetpass.view.php';
            }
        } else {
            require_once 'View/404.view.php';
        }
    }
}
