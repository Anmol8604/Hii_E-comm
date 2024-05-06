<?php
require_once 'partials/header.php';
?>

<section class="vh-100" style="background-color: beige;">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <h2 class=" text-uppercase text-center mb-4 mt-4">Sign In <img width="40" height="40" src="https://img.icons8.com/3d-fluency/40/rocket.png" alt="rocket" /></h2>
                            <form method="post">
                                <div data-mdb-input-init class="form-outline mb-2">
                                    <label class="form-label" for="email">Your Email *</label>
                                    <input type="email" name='email' id="email" class="form-control form-control-lg" />
                                    <span id="email" class="text-danger"></span>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-2">
                                    <label class="form-label" for="password">Password *</label>
                                    <input type="password" name='password' id="password" class="form-control form-control-lg" />
                                    <span id="pass" class="text-danger"></span>
                                </div>

                                <p class="text-end text-muted mb-0"><a href="/Admin/forgot" class="fw-bold text-body">Forgot Password?</a></p>
                                <div class="d-flex flex-column mt-3 align-items-center">
                                    <button onclick="login()" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary">Log In</button>
                                    <button style="display: none;" type="submit" id="submit"></button>
                                </div>
                                <p class="text-center text-muted mt-3 mb-0">Don't have an account? <a href="/Admin/register" class="fw-bold text-body"><u>SignUp here</u></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php
require_once 'partials/footer.php';
?>