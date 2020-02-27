<?php
require("./database/database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contribute:Books</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body>
    <?php
    include_once("./design/navbar.php");
    ?>

    <div class="container-fluid" style="margin-top:-25px;">
        <div class="row" style="background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%);">
            <div class="col-md-3 col-sm-6 d-flex align-items-center">
                <img src="./photos/32701-7-students-learning.png" width="100%">
            </div>
            <div class="col-md-1 d-md-block d-none"></div>
            <div class="col-md-5 col-sm-6 py-4">
                <h3 class="p-0" style="color:#ff165d">50 <span class="text-dark"> Libraries</span></h3>
                <h3 class="p-0" style="color:#ff165d">50 <span class="text-dark"> Government Schools</span></h3>
                <h3 class="p-0" style="color:#ff165d">5000 <span class="text-dark"> Children!</span></h3>
                <div class=" my-2">
                    <hr>
                    <h5 style="color:#ff165d">Support 'The Kids' Sustainable School Challenge'</h5>
                    <hr>
                </div>
            </div>
            <div class="col-md-3 d-md-block d-none d-md-flex align-items-center">
                <img src="./photos/32793-5-students-learning-transparent-background.png" class="w-100">
            </div>
        </div>
        <!--start container of page coding-->
        <div class="container-fluid">

            <div class="row p-3">
                <div class="col-md-5 p-4 mb-2" style="box-shadow:0px 0px 2px 2px #ccc;">
                    <h4 class="my-2">Book Details Upload : </h4>
                    <hr>
                    <form class="book-sell">
                        <div class="form-group">
                            <label for="book-image">Book Image<span class="text-danger">*</span></label>
                            <input type="file" class="form-control mb-3" name="book-image" id="book-image" required='required'>
                        </div>
                        <div class="form-group">
                            <label for="book-title">Book Title<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-3 text-uppercase" name="book-title" id="book-title" required='required'>
                        </div>
                        <div class="form-group">
                            <label for="book-author">Book Author<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-3" name="book-author" id="book-author" required='required'>
                        </div>
                        <div class="form-group">
                            <label for="book-category">Book Category<span class="text-danger">*</span></label>
                            <select class="custom-select w-100" name="book-category" id="book-category" required='required'>
                                <option>Select Categoy</option>
                                <option value="ArtsMusic">Arts & Music</option>
                                <option value="Biographies">Biographies</option>
                                <option value="Business">Business</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Medical">Medical</option>
                                <option value="Sports">Sports</option>
                                <option value="Others">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="coustomer-name">Your Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-3" name="coustomer-name" id="coustomer-name" required='required'>
                        </div>


                        <div class="form-group">
                            <label for="book-description">Book Description<span class="text-danger">*</span><span class="book-description-count"> 0</span><span>/700</span></label>
                            <textarea class="form-control mb-3" name="book-description" id="book-description" rows="5" maxlength="700"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="author-description">Author Description<span class="text-danger">*</span><span class="author-description-count"> 0</span><span>/700</span></label>
                            <textarea class="form-control mb-3" name="author-description" id="author-description" rows="5" maxlength="700"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6" style="box-shadow:0px 0px 2px 2px #ccc;">
                    <h4 class="my-4">Book Preview : </h4>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-3 p-2">
                            <div class="book-image-container">Book Image</div>
                        </div>
                        <div class="col-md-4 pt-4">
                            <div>
                                <h4 class="book-title">Book Title</h4>
                            </div>
                            <div>
                                <p class="book-author">Book Author</p>
                            </div>
                            <div><span class="text-primary">Sold by </span><span class="text-primary coustomer-name">Customer Name</span></div>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <h5>Book Description</h5>
                            <div>
                                <p class="book-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged. It was popularised in
                                    the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                    and more recently with desktop publishing software like Aldus PageMaker including
                                    versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h5>Author Description</h5>
                            <div>
                                <p class="author-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged. It was popularised in
                                    the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                    and more recently with desktop publishing software like Aldus PageMaker including
                                    versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <?php include_once("./design/footer.php") ?>

    <script>
        //book image upload 
        $(document).ready(function() {
            $("#book-image").on("change", function() {
                $('.book-image-container').html("");
                var file = this.files[0];
                var url = URL.createObjectURL(file);
                var img = new Image();
                img.src = url;
                img.onload = function() {
                    img.style.width = "100%";
                    $('.book-image-container').append(img);
                };
            });
        });

        //book title
        $(document).ready(function() {
            $("#book-title").on("input", function() {
                var text = this.value;
                $(".book-title").html("<span class='text-uppercase'>" + text + "</span>");
            });
        });

        //book author 
        $(document).ready(function() {
            $("#book-author").on("input", function() {
                var text = this.value;
                $(".book-author").html(text);
            });
        });
        //coustomer name
        $(document).ready(function() {
            $("#coustomer-name").on("input", function() {
                var text = this.value;
                $(".coustomer-name").html(text);
            });
        });

        //book description
        $(document).ready(function() {
            $("#book-description").on("input", function() {
                var text = this.value;
                var length = this.value.length;
                $(".book-description-count").html(length);
                $(".book-description").html(text);
            });
        });
        //author description
        $(document).ready(function() {
            $("#author-description").on("input", function() {
                var text = this.value;
                var length = this.value.length;
                $(".author-description-count").html(length);
                $(".author-description").html(text);
            });
        });

        //submit product
        $(document).ready(function() {
            $(".book-sell").submit(function(e) {
                e.preventDefault();
                swal({
                    type: "error",
                    title: "Sorry, please login",
                    timer: 2000,
                    showConfirmButton: false
                });
                window.location.href = './signin.php';

            });
        });
    </script>

    <script src="./js/index.js"></script>
</body>

</html>