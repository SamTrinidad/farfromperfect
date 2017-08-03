<?php
// if($_SERVER["HTTPS"] != "on")
// {
//     header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
//     exit();
// }
?>

<form action="THIQQSUCC/connect" method="post">
    <div class="loginContainer">
        <label><b>THIQQLOGIN</b></label>
        <input type="text" placeholder="USER" name="uname" required><br>
        <label><b>SECRETPWORD</b></label>
        <input type="password" placeholder="PASS" name="pwd" required><br>
        <button type="submit">GET IN</button>
    </div>
</form>
