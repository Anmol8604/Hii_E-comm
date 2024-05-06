<?php
require_once 'partials/header.php';
?>

<div style="background-color: beige; height: 100vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <img style="max-width: 100px; margin: auto; display: block;" src="https://assets.bootstrapemail.com/logos/light/square.png" />
                                    <div class="text-center mt-2">
                                        <h1 class="h4 text-gray-900 mb-2">Reset your password</h1>
                                        <p class="mb-4">Input your registered email and your new password</p>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="password" name="pass1" class="form-control form-control-user my-2" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Your new Password...">
                                            <input type="password" name="pass2" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Confirm your new Password...">
                                        </div>
                                        <button type="submit" name="reset" class="btn btn-primary btn-user btn-block">
                                            Submit
                                        </button>
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
require_once 'partials/footer.php';
?>