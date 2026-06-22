<?php 
session_start();
include "./../includes/header.php";
include "./../config/dbconnect.php";


if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        $query = " SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($connection,$query) or die("Error in Query " . mysqli_error($connection));
        $user = mysqli_fetch_assoc($result);

        if($user &&  password_verify($password , $user['password']))
            {
                $_SESSION['name'] = $user['fname'] . ' '. $user['lname'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['login'] = true;

            }

            if($user['role'] == 'admin')
                {
                    header("location: ./../admin/dashboard.php");
                    exit;
                } else {

                header("location: ./../user/profile.php");
                    exit;

                }


    }


?>


<?php 
if(isset($_SESSION['login'])): 

    header("location: ./../admin/dashboard.php");
    exit;
endif;

?>

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 px-3 rounded-3">
                    <div class="card-body">
                        
                        <!-- Header -->
                        <div class="text-center my-4">
                            <h2 class="fw-bold">Welcome Back</h2>
                            <p class="text-muted text-sm">Please enter your details to sign in</p>
                        </div>

                        <!-- Form -->
                        <form action="" method="POST">
                            
                            <!-- Username Input -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" >
                                <label for="username">Username</label>
                            </div>

                            <!-- Password Input -->
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <label for="password">Password</label>
                            </div>

                            <!-- Utilities (Remember Me & Forgot Password) -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                    <label class="form-check-label text-secondary small" for="rememberMe">Remember me</label>
                                </div>
                                <a href="#" class="text-decoration-none small">Forgot password?</a>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 py-2 mb-3 fw-medium">Sign In</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    


