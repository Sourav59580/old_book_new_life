<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <style>
    input.empty {
        font-family: FontAwesome;
        font-style: normal;
        font-weight: normal;
        text-decoration: inherit;
    }
    </style>
</head>

<body>
    <?php
    include_once("./design/navbar.php");
    ?>
    <div class="container py-4" style="padding-left:150px;padding-right:150px;">

        <h3>What About Cookies?</h3>
        <ol>
            <li class="my-1">Cookies are alphanumeric identifiers that we transfer to your computer's hard drive through your Web
                browser to enable our systems to recognise your browser and to provide features such as Recommended for
                You, personalised advertisements on other Web sites (e.g., Amazon Associates with content served by
                Amazon.in) and storage of items in your Shopping Cart between visits.</li>
                <li class="my-1">The Help menu on the menu bar of most browsers will tell you how to prevent your browser from accepting new cookies, how to have the browser notify you when you receive a new cookie and how to disable cookies altogether. Additionally, you can disable or delete similar data used by browser add-ons, such as Flash cookies, by changing the add-on's settings or visiting the website of its manufacturer. However, because cookies allow you to take advantage of some of Amazon.in's essential features, we recommend that you leave them turned on. For instance, if you block or otherwise reject our cookies, you will not be able to add items to your Shopping Cart, proceed to Checkout, or use any Amazon.in products and services that require you to Sign in.</li>
                <li class="my-1">If you do leave cookies turned on, be sure to sign off when you finish using a shared computer.</li>
        </ol>




    </div>


    <?php include_once("./design/footer.php"); ?>
</body>

</html>