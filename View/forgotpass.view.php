<?php
require_once 'partials/header.php';
?>

<div  style="background-color: beige; height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <img style="max-width: 100px; margin: auto; display: block;" src="https://assets.bootstrapemail.com/logos/light/square.png" />
                                    <div class="text-center mt-2">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                                    </div>
                                    <div class="px-4">
                                        <form class="user px-4" method="POST">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            </div>
                                            <button type="submit" name="reset" class="btn btn-primary btn-user btn-block">
                                                Reset Password
                                            </button>
                                        </form>
                                        <hr class="px-4">
                                        <div class="text-center">
                                            <a class="small" href="/Admin/register">Create an Account!</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="/Admin">Already have an account? Login!</a>
                                        </div>
                                    </div>
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
require_once 'partials/footer.php';
?>