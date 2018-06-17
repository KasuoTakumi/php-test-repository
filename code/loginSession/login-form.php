<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログインフォーム</title>
</head>

<body>
    <div id="content">
        <h1>Login Form</h1>
        <p>Login ID : User01</p>
        <p>Login Pass : Password</p>
        <div id="login-form">
            <form id="form" action="session.php" method="post">
                <input name="loginUser" type="text" placeholder="Login ID" maxlength="10">
                <input name="loginPass" type="password" placeholder="Login Pass" maxlength="10">
                <input name="Submit" type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>