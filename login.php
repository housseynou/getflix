<?php.include('server.php')?>
<DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="header">
        <h2>Log In</h2>
        </div>

        <form action="login.php" method="post">

        <div>
        <label forom="username">Username :</label>
        <input type="text" name="username" required>
        </div> 


        <div>
        <label forom="password">Password :</label>
        <input type="password" name="password_1" required>
        </div> 


        <button type="submit" name="login_user">Log In</button>

        <p>Not a user ?<a href="register.php"><b> Register here</b></a></p>

        </form>





    </div>
</body>
</html>