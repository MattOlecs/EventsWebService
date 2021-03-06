<div class="container h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4", method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" minlength="8" id="form3Example1c" name = login class="form-control" />
                      <label class="form-label" for="form3Example1c">Login</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" name = email class="form-control" />
                      <label class="form-label" for="form3Example3c">E-mail</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" minlength="3" id="form3Example4c" name = password class="form-control" />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" minlength="8" id="form3Example4cd" name = password_confirm class="form-control" />
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="false" id="form2Example3c" required/>
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="https://static.wikia.nocookie.net/starwars/images/f/fa/Declaration_of_Rebellion-SW_Propaganda.jpg/revision/latest?cb=20170306024043">Rules of the Rebel Alliance<i class="fa-solid fa-user-hair-buns"></i></a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
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