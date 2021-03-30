<?php.include('server.php')?>
<DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="header">
        <h2>Register</h2>
        </div>

        <form action="index.php" method="post">

<?php include(error.php) ?>

        <div>
        <label forom="username">Username :</label>
        <input type="text" name="username" required>
        </div> 

        <div>
        <label forom="email">Email :</label>
        <input type="email" name="email" required>
        </div> 

        <div>
        <label forom="password">Password :</label>
        <input type="password" name="password_1" required>
        </div> 

        <div>
        <label forom="password">Confirm Password :</label>
        <input type="password" name="password_2" required>
        </div> 

        <button type="submit" name="reg_user">Submit</button>

        <p>Already a user ?<a href="login.php"><b> Log in</b></a></p>

        </form>





    </div>
</body>
</html>