<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
    <div class="slider">
      <div class="load"></div>
      <div class="forms-container">
        <div class="signin-signup">
          <!-- <form action="/register" method="POST"> -->
            <form action="./login-system/signin.php" class="sign-in-form" id="loginForm" method="post">
              <!-- <img src="../images/login.jpg" alt="" width="30%"> -->
              <!-- <h2 class="title">Sign in</h2> -->
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" class="name" name="name" placeholder="Name" id="name" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" class="pass" name="password" placeholder="Password" id="pass" required/>
              </div>
              
              <input id="loginBtn" type="submit" name="submit" class="btn solid" value="Sign in" >
              
              <p class="social-text">Or Sign in with social platforms</p>
              <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </div>
            </form>
          <!-- </form> -->
          <!-- <form action="/login" method="POST"> -->
            <form action="./login-system/signup.php" class="sign-up-form" id="regForm" method="post" enctype="multipart/form-data">
              <img src="../images/signup.jpg" alt="" width="30%">
              <!-- <h2 class="title">Sign up</h2> -->
              <div class="input-field">
                <i class="fas fa-image"></i>
                <input type="file" class="image" name="image" placeholder=" Image" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" class="name" name="name" placeholder=" Name" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" class="email" name="email" placeholder="Email" required/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" class="pass" name="password" placeholder="Password" required/>
              </div>
              <!-- <div class="input-field">
                Select user type: <select name="usertype">
                  <option value="admin">admin</option>
                  <option value="user">user</option>
              </div> -->
              <input id="regBtn" type="submit" name="submit" class="btn solid" value="Sign up" />
              <p class="social-text">Or Sign up with social platforms</p>
              <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </div>
            </form>
          <!-- </form> -->
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            
            <h3>Hello Friend</h3>
            <p>
              Enter your personal details and start journey with us.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
        </div>
          
        <div class="panel right-panel">
          <div class="content">
            <h3>Welcome Back!</h3>
            <p>
              To keep connected with us please login with your personal info
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
        </div>
      </div>

      
      
      </div>
    </div>


    
    <script>
      const sign_in_btn = document.querySelector("#sign-in-btn");
      const sign_up_btn = document.querySelector("#sign-up-btn");
      const container = document.querySelector(".container");

      sign_up_btn.addEventListener("click", () => {
        container.classList.add("sign-up-mode");
      });

      sign_in_btn.addEventListener("click", () => {
        container.classList.remove("sign-up-mode");
      });
    </script>
  </body>
</html>