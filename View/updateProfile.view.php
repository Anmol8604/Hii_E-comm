<?php
require_once 'partials/header.php';
require_once 'partials/sideNav.php';
?>

<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 card">
        <form class="row g-3 mt-4" method="post" enctype="multipart/form-data">
            <!-- Upload profile picture -->
            <div class="row">
                <div class="col-4 p-4 d-flex flex-column justify-content-between">
                    <div class="mb-2">
                        <label for="photo">Profile Image :</label><br>
                        <input type="file" name="image" id="imageupdate">
                        <img style="max-width:250px; max-height:250px; cursor: url(MyCss/Images/cursor.png),auto;" src="../MyCss/images/<?=  $heading ?>" class="uImg" alt="<?=  $heading ?>">
                        <span id='image'></span>
                    </div>
                    <div class="mb-2">
                        <label class="form-label" for="form3Example1cg">First Name</label>
                        <input type="text" id="form3Example1cg" value="<?= $heading ?>" class="form-control" name="fname" />
                        <span id='fname'></span>
                    </div>
                    <div class="">
                        <label class="form-label" for="form3Example2cg">Last Name</label>
                        <input type="text" name="lname" id="form3Example2cg" value="<?= $heading ?>" class="form-control" />
                        <span id='lname'></span>
                    </div>
                </div>
                <div class="col-4 p-4 d-flex flex-column justify-content-between">
                    <div class="mb-2">
                        <label class="form-label" for="form3Example4cg">Email</label>
                        <input type="mail" name="email" id="form3Example4cg" value="<?= $heading ?>" class="form-control" />
                        <span id='email'></span>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="form3Example4cdg">Phone No.</label>
                        <input type="tel" name="phone" id="form3Example4cdg" value="<?= $heading ?>" class="form-control" />
                        <span id='phone'></span>
                    </div>
                    <!-- City -->
                    <div class="mb-2">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" name="city" class="form-control" value="<?= $heading ?>" id="inputCity">
                        <span id='city'></span>
                    </div>

                    <!-- State -->
                    <div class="mb-2">
                        <label for="inputState" class="form-label">State</label>
                        <select id="inputState" name="state" class="form-select">
                            <option value="Choose...">Choose...</option>
                            <?php
                            // $states = [
                            //     "Arunachal Pradesh", "Andhra Pradesh", "Assam", "Bihar", "Chhattisgarh", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jharkhand", "Karnataka", "Kerala", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttarakhand", "Uttar Pradesh", "West Bengal"
                            // ];

                            // foreach ($states as $state) {
                            //     if ($state == $heading) {
                            //         echo "<option value=\"$state\" selected>$state</option>";
                            //     } else {
                            //         echo "<option value=\"$state\">$state</option>";
                            //     }
                            // }
                            ?>
                        </select>
                        <span id='state'></span>
                    </div>
                    <!-- Zip -->
                    <div class="">
                        <label for="inputZip" class="form-label">Zip</label>
                        <input type="text" name="zip" class="form-control" value="<?= $heading ?>" id="inputZip">
                        <span id='zip'></span>
                    </div>
                </div>
                <div class="col-4 p-4 d-flex flex-column justify-content-between">
                    <div class="">
                        <label class="form-label">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if ($heading == 'male') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" <?php if ($heading == 'female') {
                                                                                echo 'checked';
                                                                            } ?> name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other" <?php if ($heading == 'other') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                        <span id='gender'></span>
                    </div>
                    <div class="">
                        <label class="form-label">Select Any two Hobbies</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" <?php if ($heading == 'reading' || $heading == 'reading') {
                                                                                                    echo 'checked';
                                                                                                } ?> id="reading" value="reading">
                            <label class="form-check-label" for="reading">Reading</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="writing" value="writing" <?php if ($heading == 'writing' || $heading == 'writing') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="writing">Writing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="coding" value="coding" <?php if ($heading == 'coding' || $heading == 'coding') {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                            <label class="form-check-label" for="coding">Coding</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="singing" value="singing" <?php if ($heading == 'singing' || $heading == 'singing') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="singing">Singing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="dancing" value="dancing" <?php if ($heading == 'dancing' || $heading == 'dancing') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="coding">Dancing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="painting" value="painting" <?php if ($heading == 'painting' || $heading == 'painting') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="painting">Painting</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="cooking" value="cooking" <?php if ($heading == 'cooking' || $heading == 'cooking') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="coding">Cooking</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies[]" id="photography" value="photography" <?php if ($heading == 'photography' || $heading == 'photography') {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                            <label class="form-check-label" for="photography">Photography</label>
                        </div>
                        <span id='hobbie'></span>
                    </div>
                </div>
                <!-- Col 3 -->
                <!-- Butttons -->
                <div class="p-4 d-flex justify-content-around">
                    <button name='update' onclick="update1()" type="button" class="btn btn-secondary">Update</button>
                    <a href="profile.php" class="btn btn-secondary">Go Back</a>
                </div>
            </div>
            <!-- Submit button -->
        </form>
    </div>
</div>

<?php
require_once 'partials/endSideNav.php';
require_once 'partials/footer.php';
?>