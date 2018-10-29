<?
session_start();
if (!isset($_SESSION['useremail'])) {
    header("location:index.php");
}

define ('SITE_ROOT', realpath(dirname(__FILE__)));

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $file = '/tmp/sample-app.log';
  $message = file_get_contents('php://input');
  file_put_contents($file, date('Y-m-d H:i:s') . " Received message: " . $message . "\n", FILE_APPEND);
}
else
{
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>filebox Application</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster+Two" type="text/css">
    <link rel="icon" href="https://awsmedia.s3.amazonaws.com/favicon.ico" type="image/ico" >
    <link rel="shortcut icon" href="https://awsmedia.s3.amazonaws.com/favicon.ico" type="image/ico" >
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <section class="congratulations">
        <h1>FileBox</h1>
        <p>User's Private File Folder application is now running on a dedicated environment in the AWS&nbsp;Cloud</p>
        <? echo "Current php version".phpversion() ?>
    </section>

    <section class="instructions">
        <h2>Sign In</h2>
            <div id="frm">
                <form action="scheduled.php" method="POST">
                    <p>
                        <label>Email:</label>
                        <input type="text" id="useremail" name="useremail">
                    </p>
                    <p>
                        <label>password:</label>
                        <input type="password" id="password" name="password">
                    </p>
                    <p>
                        <input type="submit" id="btn" name="login">
                    </p>

                </form>    
            </div>
    </section>

    <!--[if lt IE 9]><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
</body>
</html>
<? 
} 
?>
