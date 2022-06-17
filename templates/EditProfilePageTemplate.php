<div class="container rounded bg-white mt-5 mb-5" method="POST">
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-md-5 border-right">
                <form class="p-3 py-5" method="POST">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First name</label><input type="text" class="form-control" value="<?= $current['name'] ?>" name='name'></div>
                        <div class="col-md-6"><label class="labels">Last name</label><input type="text" class="form-control" value="<?= $current['surname'] ?>" name='surname'></div>
                        <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" value="<?= $current['username'] ?>" name='username' required></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" value="<?= $current['email'] ?>" name='email' required></div>
                        <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" value="<?= $current['password'] ?>" name='password' required></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-check-label" for="flexCheckDefault">
                                Notifications
                            </label>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="allow_notifications" id="allow_radio1" autocomplete="off" value=0 <?php if ($current['allow_notifications'] == 0) echo ('checked') ?>>
                                <label class="btn btn-outline-primary" for="allow_radio1">No</label>

                                <input type="radio" class="btn-check" name="allow_notifications" id="allow_radio2" autocomplete="off" value=1 <?php if ($current['allow_notifications'] == 1) echo ('checked') ?>>
                                <label class="btn btn-outline-primary" for="allow_radio2">Yes</label>
                            </div>
                        </div>
                        <?php
                        if ($_SESSION['isAdmin']) { ?>
                            <div class="col-md-4">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Administrator
                                </label>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="is_admin" id="admin_radio1" autocomplete="off" value=0 <?php if ($current['is_admin'] == 0) echo ('checked') ?>>
                                    <label class="btn btn-outline-primary" for="admin_radio1">No</label>

                                    <input type="radio" class="btn-check" name="is_admin" id="admin_radio2" autocomplete="off" value=1 <?php if ($current['is_admin'] == 1) echo ('checked') ?>>
                                    <label class="btn btn-outline-primary" for="admin_radio2">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Active
                                </label>
                                <br>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="is_active" id="active_radio1" autocomplete="off" value=0 <?php if ($current['is_active'] == 0) echo ('checked') ?>>
                                    <label class="btn btn-outline-primary" for="active_radio1">No</label>

                                    <input type="radio" class="btn-check" name="is_active" id="active_radio2" autocomplete="off" value=1 <?php if ($current['is_active'] == 1) echo ('checked') ?>>
                                    <label class="btn btn-outline-primary" for="active_radio2">Yes</label>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="mt-5 text-center"><button class="btn btn-primary bg-primary" type="submit">Save Profile</button></div>
                        <?php
                        if ($_SESSION['isAdmin'] and $_SESSION['id'] != $current['id']) {
                        ?>
                            <a class="btn btn-danger" href="/delete-user/<?= $current['id'] ?>">Delete user <i class="bi bi-calendar-x-fill"></i></a>
                        <?php
                        }
                        ?>
                    </div>
                </form>
                <?php
                if (isset($errors)) {
                    foreach ($errors as $error) {
                        echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">>\n" .
                            "$error\n" .
                            "</div>\n";
                    }
                }
                if (isset($success) && strlen($success) > 0) {
                    echo "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">>\n" .
                        "$success\n" .
                        "</div>\n";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>