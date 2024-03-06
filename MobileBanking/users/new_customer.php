<?php
// Initialize the session
session_start();
require_once '../resources/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Sign Up to
        <?php echo $siteName ?>.com
    </title>
    <link rel="shortcut icon" href="../resources/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=DM+Serif+Display">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/menu.css?">
    <style>
        .body-bg {
            background-image: url('../resources/wavybg.svg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="container-fluid bg-dark mx-0 px-0 body-bg ">
    <div class="row mt-5 ">
        <div class=" col-lg-6 order-2 ">
            <!--Title-->
            <div class="my-3  d-flex justify-content-center align-items-center">
                <p class="text-center heading-text text-light h2 fw-bold ">
                    <?php echo $siteName ?>
                </p>
            </div>
            <!--Tagline-->
            <p class="text-light text-center tagline-text fw-bold">Customer Sign Up.</p>
        </div>
        <!--signup Card-->
        <div class="col-lg-6  order-2 bg-transparent ">
            <div class="d-flex justify-content-center align-items-center bg-transparent">
                <div class="card cardsignup bg-white shadow mb-4">
                    <div class="bg-white m-3 rounded card-body">
                        <p class="text-center  h2 fw-bold mt-2" style="color:#37517e;"> Sign Up</p>
                        <form class="container signupForm" method="post">
                            <div class="mb-3  ">
                                <div class="input-group mb-2 ">
                                    <div class="input-with-text mb-1 " style="min-width:300px;">
                                        <span class="custom-text ">First name</span>
                                        <input type="text" name="FIRSTNAME"
                                            class="form-control first_name shadow-none text-black  bg-light"
                                            placeholder="First Name" required style="height: 60px; outline: none;">
                                    </div>
                                </div>
                                <div class="input-group w-100 mb-2">
                                    <div class="input-with-text mb-1 " style="min-width:300px;">
                                        <span class="custom-text">Last Name</span>
                                        <input type="text" name="LASTNAME"
                                            class="bg-white form-control shadow-none rounded text-dark bg-light  last_name "
                                            placeholder="Last Name" required style="height:60px;outline: none;">
                                    </div>
                                </div>
                                <div class="mb-3  ">
                                    <div class="input-group mb-2 ">
                                        <div class="input-with-text mb-1 " style="min-width:300px;">
                                            <span class="custom-text ">Pin</span>
                                            <input type="password" name="PIN"
                                                class="form-control pin shadow-none text-black  bg-light"
                                                placeholder="Pin" required style="height: 60px; outline: none;">
                                            <span class=" hideshwpassword text-dark  bg-transparent text-dark"><i
                                                    class="fa fa-eye passtoggler"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group w-100 mb-2">
                                        <div class="input-with-text mb-1 " style="min-width:300px;">
                                            <span class="custom-text">Repeat Pin</span>
                                            <input type="password" name="REPEAT_PIN"
                                                class="bg-white form-control shadow-none rounded text-dark bg-light  repeat_pin "
                                                placeholder="Repeat Pin" required style="height:60px;outline: none;">
                                            <span class=" hideshwpassword text-dark  bg-transparent text-dark"><i
                                                    class="fa fa-eye passtoggler"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <!--horizontal line-->
                                <div class=" bg-white text-center  statusdiv "></div>
                                <div
                                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 
                                     border-bottom">
                                </div>
                                <div class="container border-0 d-flex justify-content-center">
                                    <input type="submit" type="button" role="button" name="submit"
                                        class="btn w-75 fw-bold bg- text-white  btn-transition text-center my-2 signupbtn "
                                        value="Sign Up" title="Sign Up"
                                        style="height:48px; border-radius:5px; background-color:#37517e;">
                                </div>
                        </form>
                        <!--horizontal line-->
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                        </div>
                        <div class="row">
                            <p class=" text-center text-dark  my-2"> Already have an Account?
                                <a href="login.php" class=" text-success btn-transition px-3 fw-bolder btn border-0"
                                    style="text-decoration: none;">
                                    Login </a>
                            </p>
                        </div>
                    </div>
                </div> <!--end of card-->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            //  custom display of acc_no and pin text
            $("input").focus(function () {
                $(this).siblings(".custom-text").show();
            });

            $("input").blur(function () {
                $(this).siblings(".custom-text").hide();
            });

            // toggling showing and hiding password
            $(".hideshwpassword").click(function () {
                if ($(".hideshwpassword").children(".passtoggler").hasClass("fa-eye")) {
                    $(this).siblings("input").attr("type", "text")
                    $(this).children(".passtoggler").removeClass("fa-eye text-dark").addClass("fa-eye-slash text-primary")
                } else {
                    $(this).siblings("input").attr("type", "password")
                    $(this).children(".passtoggler").removeClass("fa-eye-slash text-primary").addClass("fa-eye text-dark")
                }
            })


            $(".signupForm").submit(function (e) {
                e.preventDefault()
                // Validation
            var firstName = $(".first_name").val().trim();
            var lastName = $(".last_name").val().trim();
            var pin = $(".pin").val().trim();
            var repeatedPin = $(".repeat_pin").val().trim();
            if (firstName.length < 3 || lastName.length < 3 ) {
                $(".statusdiv").html('<p class="text-danger"><i class="fa fa-times"></i> First and Last Name should be at least 3 characters long.</p>');
                return;
            }
            if (pin.length < 4 || repeatedPin.length < 4) {
                $(".statusdiv").html('<p class="text-danger"><i class="fa fa-times"></i> PINs should be at least 4 characters long.</p>');
                return;
            }
            if (pin !== repeatedPin) {
                $(".statusdiv").html('<p class="text-danger"><i class="fa fa-times"></i> PINs do not match.</p>');
                return;
            }
            var action="register";
                $.ajax({
                    url: "../api/api.php",
                    method: "POST",
                    data: {action:action,firstName:firstName,lastName:lastName,pin:pin},
                    beforeSend: function () {
                        $(".signupbtn").removeClass('show').addClass("hide")
                        $(".statusdiv").html('<p class="text-primary"><i class="fa fa-spinner spin text-primary "> </i> Logging in ...</p>')
                    },
                    success: function (data, status) {
                        var parsedData = $.parseJSON(data);
                        if (parsedData.success) {//signup successful
                            $(".statusdiv").html('<p class="text-success"><i class="fa fa-check "> </i> Account Successfully Created </p>')
                            window.location.replace("home.php")
                        }
                        else {
                            $(".signupbtn").removeClass('hide').addClass("show")
                            $(".statusdiv").html('<p class="text-danger"><i class="fa fa-times "> </i> Error, Please the details </p>')
                            $(".pin,.repeat_pin").val("")
                        }
                    },
                    error: function () {
                        $(".signupbtn").removeClass('hide').addClass("show")
                        $(".statusdiv").html('<p class="text-danger"><i class="fa fa-times "> </i> Please Check connection and try again</p>')
                    }
                })//end of ajax

            })//end of form submit

            $("input").click(function () {
                $(".statusdiv").html('')
            })

        })//end of document ready
    </script>
    <script>
        $(document).ready(function () {
            window.history.replaceState('', '', window.location.href)
        });
    </script>
</body>

</html>