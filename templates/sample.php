<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Web framework for making dev life easier" />
    <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="/assets/css/bootstrap-4.1.3.min.css" />
    <link rel="stylesheet" href="/assets/css/styles.css" />
    <title><?= $title ?></title>
</head>
<body>
<div id="sample-container" class="container">
    <div id="logo-container">
        <img src="/assets/images/logo.png" alt="<?= $title ?>" />
    </div>
    <div id="content-container">
        <h1>Welcome to <?= $title ?>!</h1>
        <p><em>A web framework built for making dev life a little easier.</em></p>
        <br />
        <h5>Your site is up and running! Ride strong!</h5>
    </div>
</div>
</body>
</html>