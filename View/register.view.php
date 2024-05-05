<?php
require_once 'partials/header.php';
?>


<section class="vh-100 bg-image" style="background-color:beige; height: 100%;">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 position-relative">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <h2 class=" text-uppercase text-center mb-5 mt-4">Create an account<img width="40" height="40" src="https://img.icons8.com/3d-fluency/40/rocket.png" alt="rocket" /></h2>
                            <form id='myForm' action="" method="post">
                                <div class="d-flex">
                                    <div data-mdb-input-init class="form-outline mb-2 me-1 w-50">
                                        <label class="form-label" for="fname">First Name *</label>
                                        <input type="text" id="fname" class="form-control form-control-lg" name="fname" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-2 ms-1 w-50">
                                        <label class="form-label" for="lname">Last Name *</label>
                                        <input type="text" name="lname" id="lname" class="form-control form-control-lg" />
                                    </div>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-2">
                                    <label class="form-label" for="email">Your Email *</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-lg" required />
                                </div>
                                <div class="d-flex">
                                    <div data-mdb-input-init class="form-outline me-1 mb-2 w-50">
                                        <label class="form-label" for="password">Password *</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline ms-1 mb-2 w-50">
                                        <label class="form-label" for="password2">Confirm password *</label>
                                        <input type="password" name="password2" id="password2" class="form-control form-control-lg" />
                                    </div>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-2">
                                    <label class="form-label" for="phone">Phone *</label>
                                    <input type="tel" name="phone" id="phone" class="form-control form-control-lg" />
                                </div>

                                <div class="form-check d-flex justify-content-center mb-2">
                                    <input type="checkbox" class="me-2" name="terms" id="terms">
                                    <label class="form-check-label" for="terms">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u> *</a>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button onclick="register()" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary">Register</button>
                                    <button style="display: none;" type="submit" id="submit"></button>
                                </div>

                                <p class="text-center text-muted mt-2 mb-0">Have already an account? <a href="/Admin" class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>

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