<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <section class="auth-section">
        <div class="container">
            <form class="auth-form">
                <h2>Sign in</h2>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <div class="form-text">
                    <label for="remember">
                        <input type="checkbox" name="remember" id="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="#">Forget Password</a>
                </div>
                <button type="submit">Login</button>
                <div class="form-text">
                    <p>
                        Don’t have account?
                        <a href="../register-page/index.html">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </section>
</body>
</html>