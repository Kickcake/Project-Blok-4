<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <div class="container">
            <div class="containerin">
                <div class="head">
                    <h1>inloggen</h1>
                </div>
                <form class="form" action="verwerk-inloggen.php" method="post">
                    <label for="txtEmail">E-mail:</label>
                    <input type="text" id="txtEmail" name="email" placeholder="E-mail" autofocus>

                    <label for="txtPass">Password:</label>
                    <input type="text" id="txtPass" name="password" placeholder="Password" autofocus>

                    <button class="formbutton" type="submit">log in</button>
                </form>
            </div>
        </div>
    </main>

</body>

</html>