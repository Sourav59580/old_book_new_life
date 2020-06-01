<?php
require("./database/database.php");
session_start();
$username = $_SESSION['username'];
if (empty($username)) {
    header("Location:local_articles.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articals</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/animate.min.css">
    <style>
        #story-container .nav-link.active {
            color: red;
            background-image: url(./images/hover.png);
            background-repeat: no-repeat;
            background-position: bottom;
            padding-bottom: 15px;
            background-size: 0 0;
            -webkit-animation: hover 1s;
            -o-animation: hover 1s;
            -moz-animation: hover 1s;
            animation: hover 1s;
            animation-fill-mode: forwards;
        }

        @keyframes hover {
            0% {
                background-size: 0 0;
            }

            100% {
                background-size: 90% 15px;
            }
        }
    </style>
</head>

<body>
    <?php
    include_once("./design/navbar.php");
    ?>

    <div class="container-fluid p-0" style="margin-top:-25px;">
        <img src="./photos/blog-banner (1).jpg" class="w-100">
        <div class="" style="position:fixed;bottom:0px;right:10px;">
            <img src="./photos/21-woman-girl-png-image.png" width="250px;">
        </div>
    </div>
    <div class="container-fluid" style="height: 900px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 id="story-header" class="mb-4 mt-5">Blogs/Articles</h2>
                    <ul class="nav nav-tabs border-0" id="story-container">
                        <li class="nav-item"><a href="#overview" class="nav-link active border-0" data-toggle="tab">Overview</a></li>
                        <li class="nav-item"><a href="#founder" class="nav-link border-0" data-toggle="tab">Create blog</a></li>
                        <li class="nav-item"><a href="#mission" class="nav-link border-0" data-toggle="tab">Our Mission</a></li>
                    </ul>
                    <div class="tab-content py-4">
                        <div id="overview" class="tab-pane wow fadeIn active">
                            <div class="container artical-container">
                                <div class="row mb-2">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <img src="./images/programming-hero(moc).png" class="w-100">
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="container">
                                    <p class="mb-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type
                                        specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type
                                        specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type
                                        specimen book. <a href='#last_part' class="font-weight-bold bg-light" data-toggle="collapse">Read More....</a>
                                        <p class="collapse" id="last_part">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                            piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                                            McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                                            the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                                            the cites of the word in classical literature, discovered the undoubtable source. Lorem
                                            Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes
                                            of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                                            very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..",
                                            comes from a line in section 1.10.32.

                                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                                            Sections 1.10.32 and 1.10.33 from "de
                                            Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied
                                            by English versions from the 1914 translation by H. Rackham.</p>
                                    </p>

                                </div>
                            </div>

                        </div>
                        <div id="founder" class="tab-pane animated slideInRight">

                            <div class="container d-flex flex-column justify-content-center align-items-center p-4">
                                <h4>You Want to create your own blog and published,then it's best option for you</h4>
                                <a href='create_new_blog.php' class="btn btn-primary">Creat now</a>
                            </div>

                        </div>
                        <div id="mission" class="tab-pane animated zoomIn">

                            <div class="container text-center">
                                <img src="./images/7-business-woman-girl-png-image.png" class="w-50">
                                <br>
                                <img src="./images/vision-pic.jpg" class="w-25" style="z-index: -1;">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include_once("./design/footer.php") ?>

    <script src="./js/index.js"></script>
    <script src="./js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="https://cdn.tiny.cloud/1/w89h8f9glte9hogcmv1c8z8hi9rzowavktabxzk5xwvahguz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</body>

</html>