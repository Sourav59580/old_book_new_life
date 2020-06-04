<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
</head>

<body>
    <div class='container-fluid mt-4'>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true"><i class='fa fa-code text-dark font-weight-bold'> </i>
                    Edit new blog</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false"><i
                        class='fa fa-eye text-dark font-weight-bold h1'>
                    </i> Preview</a>

            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                
                    <div id="summernote">
                        <p>Hello Summernote</p>
                    </div>
                    <div class='container text-center'>
                    <button class='btn btn-info m-4 publish'>Publish</button>
                    </div>

                    
                


            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container text">

                </div>

            </div>
        </div>
    </div>

    <div class="container showcase"></div>

    <script>
    $(document).ready(function() {
        $('#summernote').summernote();
        
    });

    //preview
    $("#nav-profile-tab").click(function(){
        var markupStr = $('#summernote').summernote('code');
        $(".text").html(markupStr);
        console.log(markupStr);        
    });

    //publish
    $(document).ready(function() {
        $(".publish").click(function(){
            var markupStr = $('#summernote').summernote('code');

            //var blogString = markupStr
            $.ajax({
                type : "POST",
                url : "./php/artical.php",
                data : {
                    blogString : markupStr
                },
                success : function (response) {
                    alert(response)
                  }
            })
        })
      })
  </script>

</body>

</html>