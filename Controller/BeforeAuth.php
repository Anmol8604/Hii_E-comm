<?php

class BeforeAuth
{
    public $obj;
    public $config;
    function __construct()
    {
        require_once 'Model/User.php';
        $this->config = require_once 'config.php';
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
            $user = $user->findByEmail($email);
            if ($user && password_verify($password, $user['password']) && $user['status'] == 0) {
                echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-info fade show" role="alert">
                    <strong>Info!</strong> Please verify your email And Complete your profile
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                require_once 'View/login.view.php';
            } else if ($user && password_verify($password, $user['password']) && $user['status'] == 1) {
                session_start();
                $_SESSION['email'] = $email;
                header("Location: /Admin/home");
                exit();
            } else {
                echo '
                <div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-danger fade show" role="alert">
                <strong>Error!</strong> ' . "Invalid Email or Password" . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                require_once 'View/login.view.php';
            }
        } else if (isset($_GET['msg'])) {
            if ($_GET['msg'] == 'NewUser') {
                echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
                <strong>Success!</strong> Account created successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            } elseif ($_GET['msg'] == 'logout') {
                echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
                <strong>Success!</strong> Logged out secondaryfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            } elseif ($_GET['msg'] == 'profileCompleted') {
                echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
                <strong>Success!</strong> Profile Completed Successfully, Login to continue
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            } elseif ($_GET['msg'] == 'linkSent') {
                echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
                <strong>Success!</strong> A password reset link has been sent to your email
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            } elseif ($_GET['msg'] == 'reset') {
                echo '<div id="popUp" class="alert position-absolute top-0 end-0 mt-4 me-4 alert-dismissible alert-success fade show" role="alert">
                <strong>Success!</strong> Password reset successfully! Login to continue
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            require_once 'View/login.view.php';
        } else {
            require_once 'View/login.view.php';
        }
    }

    public function register()
    {
        if (isset($_SESSION['error'])) {
            require_once 'View/register.view.php';
            unset($_SESSION['error']);
        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $phone = $_POST['phone'];

            if ($password != $password2 || !isset($_POST['terms'])) {
                echo "<div id='popUp' style='z-index:1; max-width: 400px; min-width: 300px;' class='modal-dialog position-absolute top-0 end-0 me-4'>";
                echo "<div class='modal-content'>";
                echo "    <div class='modal-header  d-flex justify-content-between'>";
                echo "        <h1 class='modal-title fs-5' id='exampleModalLabel'>Something went wrong!!!</h1>";
                echo "        <a href='Admin/register' class='btn-close' data-mdb-dismiss='modal' aria-label='Close'></a>";
                echo "    </div>";
                echo "</div>";
                echo "</div>";
                require_once 'View/register.view.php';
            } else if ($this->obj->validateName($fname) && $this->obj->validateName($lname) && $this->obj->validateEmail($email) && $this->obj->validatePassword($password) && $this->obj->validatePhone($phone)) {
                $user = new User($this->config, 1, $fname, $lname, $email, $phone, $password);
                $user->save();
                session_start();
                $link = "http://hiiecomm.test/Admin/completeProfile.php?user=$email";
                $_SESSION['link'] = $link;
                $_SESSION['email'] = $email;
                $_SESSION['user'] = $fname . " " . $lname;
                require_once 'Controller/signUp_Mail.php';
                session_unset();
                session_destroy();
                header("Location: /Admin?msg=NewUser");
                exit();
            } else {
                echo "<div id='popUp' style='z-index:1; max-width: 400px; min-width: 300px;' class='modal-dialog position-absolute top-0 end-0 me-4'>";
                echo "<div class='modal-content'>";
                echo "    <div class='modal-header  d-flex justify-content-between'>";
                echo "        <h1 class='modal-title fs-5' id='exampleModalLabel'>Something went wrong!!!</h1>";
                echo "        <a href='/register' class='btn-close' data-mdb-dismiss='modal' aria-label='Close'></a>";
                echo "    </div>";
                echo "</div>";
                echo "</div>";
                require_once 'View/register.view.php';
            }
        } else {
            require_once 'View/register.view.php';
        }
    }

    public function completeProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
        } else if (isset($_GET['user'])) {
            $user = new User($this->config);
            $user = $user->findByEmail($_GET['user']);

            if ($user && $user['status'] == 0) {
                require_once 'View/completeProfile.view.php';
            } else {
                require_once 'View/404.view.php';
                exit();
            }
        } else {
            require_once 'View/404.view.php';
        }
    }
}
