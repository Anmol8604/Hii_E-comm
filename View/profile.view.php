<?php
require_once 'partials/header.php';
require_once 'partials/sideNav.php';
?>

<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 ">
        <div class="card d-flex">
            <div class="card-body p-4 d-flex justify-content-around">
                <table class="col-5">
                    <tr class="py-4">
                        <td class="px-4 py-2">
                            <label for="name">Profile Picture</label>
                        </td>
                        <td class="px-4 py-2">
                            <img style="max-height: 300px; max-width: 250px;" src="/View/assests/images/<?= $image ?>" alt="profile picture">
                        </td>
                    </tr>
                </table>

                <table class="col-5">
                    <tr class="py-2">
                        <td class="px-4 py-2">
                            <span for="name">Name</span>
                        </td>
                        <td class="px-4 py-2">
                            <span><strong><?= $name ?></strong></span>
                        </td>
                    </tr>
                    <tr class="py-4">
                        <td class="px-4 py-2">
                            <span for="mail">Email</span>
                        </td>
                        <td class="px-4 py-2">
                            <span><strong><?= $email ?></strong></span>
                        </td>
                    </tr>
                    <tr class="py-4">
                        <td class="px-4 py-2">
                            <span for="phone">Phone No.</span>
                        </td>
                        <td class="px-4 py-2">
                            <span><strong><?= $phone ?></strong></span>
                        </td>
                    </tr>
                    <tr class="py-4">
                        <td class="px-4 py-2">
                            <span for="gender">Gender</span>
                        </td>
                        <td class="px-4 py-2">
                            <span><strong><?= $gender ?></strong></span>
                        </td>
                    </tr>
                    <tr class="py-4">
                        <td class="px-4 py-2">
                            <span for="hobbies">Hobbies</span>
                        </td>
                        <td class="px-4 py-2">
                            <span><strong><?= $hobbies ?></strong></span>
                        </td>
                    </tr>
                    <tr class="py-4">
                        <td class="px-4 py-2">
                            <span for="address">Address</span>
                        </td>
                        <td class="px-4 py-2">
                            <span><strong><?= $address ?></strong></span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="p-4 d-flex justify-content-around">
                <a href='/Admin/update' class="btn btn-secondary">Update Profile</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'partials/endSideNav.php';
require_once 'partials/footer.php';
?>