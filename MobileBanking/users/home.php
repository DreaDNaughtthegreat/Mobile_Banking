<?php
// Initialize the session
session_start();
require_once '../resources/config.php';
// Check if the Customer is not logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header('location: login.php');
    exit;
}

$user_id = clean($_SESSION['user_id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Home
        <?php echo $siteName ?>.com
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="shortcut icon" href="../resources/logo.jpg">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!--  CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/css/glightbox.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.css" />
    <script src="../resources/menu.js?v=10"></script>
    <link rel="stylesheet" href="../resources/menu.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="../resources/style.css?v=<?php echo time() ?>">
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

<body class="container-fluid bg-dark mx-0 px-0 body-bg" style="" data-userid="<?php echo $user_id ?>">
    <header id="header" class="fixed-top mt-0 pt-0">
        <div class="container-fluid px-1 mx-0 d-flex align-items-center">
            <h1 class="logo me-auto">
                <a href="#">
                    <img src="../resources/logo.png" class=" border-0"
                        style="height:50px;width:50px; border-radius:50%;" loading="lazy">
                    <span class=" menuFont mx-auto">
                        <?php echo $siteName ?>
                    </span>
                    </a>
            </h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto changepinmenu" href="#">Pin</a></li>
                    <li><a class="nav-link scrollto checkbalancemenu" href="#">Balance</a></li>
                    <li><a class="nav-link scrollto depositmenu" href="#">Deposit</a></li>
                    <li><a class="nav-link scrollto stopchequemenu" href="#">Stop Cheque</a></li>
                    <li><a class="nav-link scrollto tipsmenu " href="#">get Tips</a></li>
                    <li class="nav-link me-4 ">
                    <div class="dropdown me-4">
                        <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../resources/user.png" class="rounded-circle border border-2 border-info" style="height:30px;width:30px; border-radius:50%;" alt="" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item mx-3 px-3 btn text-danger" href="../resources/logout.php" id="logoutBtn">Logout</a></li>
                        </ul>
                    </div>
                </li>
                    </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>


    <section class="w-100">
        <div class="container">
            <div class="row">
                <div class=" col-md-6  ">
                    <div class="my-3  d-flex justify-content-center align-items-center">
                        <p class="text-center heading-text text-light h2 fw-bold ">
                            <?php echo $siteName ?>
                        </p>
                    </div>
                    <p class="text-light text-center tagline-text fw-bold user_name"></p>
                    <p class="text-light text-center tagline-text fw-bold accounts"></p>
                </div>
                <!-- where user actions are shown -->
                <div class="col-md-6 border-0 px-2 dataactionCenter">
                    <div class="card changepincard bg-white shadow d-none">
                        <div class="bg-white m-3 rounded card-body">
                            <p class="text-center  h2 fw-bold mt-2" style="color:#37517e;"> Change Pin</p>
                            <div class="mb-3 ">
                            <div class="input-group w-100 mb-3">
                                    <div class="input-with-text mb-3 " style="min-width:300px;">
                                        <span class="custom-text">Old Pin</span>
                                        <input type="password" 
                                            class="bg-white form-control shadow-none rounded text-dark bg-light  oldpin "
                                            placeholder="Old Pin" required style="height:60px;outline: none;">
                                        <span class=" hideshwpassword text-dark  bg-transparent text-dark" style="right:50px !important;">
                                        <i
                                                class="fa fa-eye passtoggler"></i></span>
                                    </div>
                                </div>
                                <div class="input-group w-100 mb-3">
                                    <div class="input-with-text mb-3 " style="min-width:300px;">
                                        <span class="custom-text">New Pin</span>
                                        <input type="password" 
                                            class="bg-white form-control shadow-none rounded text-dark bg-light  newpin "
                                            placeholder="New Pin" required style="height:60px;outline: none;">
                                        <span class=" hideshwpassword text-dark  bg-transparent text-dark" style="right:50px !important;"><i
                                                class="fa fa-eye passtoggler"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class=" bg-white text-center  pinstatusdiv "></div>
                            <div class="container border-0 d-flex justify-content-evenly">
                            <button class="btn bg-danger text-light closecard  btn-transition text-center m-2 fw-bold px-2" style="height:48px;">Exit</button>
                                                                
                             <button  type="button" role="button" 
                                    class="btn w-75 fw-bold text-white  btn-transition text-center m-2 changepinsubmitbtn "
                                     title="Change Pin"
                                    style="height:48px; border-radius:5px; background-color:#37517e;">Change Pin</button>
                            </div>
                        </div>
                    </div>
                    <!-- end of change pin -->

                    <!-- checking the balance -->
                    <div class="card checkbalancecard bg-white shadow d-none">
                        <div class="bg-white m-3 rounded card-body">
                            <p class="text-center  h2 fw-bold mt-2" style="color:#37517e;"> Accounts Balance</p>
                            <div class="mb-3  ">
                            <div class=" w-100 mb-3 showbalances">
                                   
                            </div>
                            <div class="container border-0 d-flex justify-content-center">
                            <button class="btn bg-danger text-light closecard  btn-transition text-center m-2 fw-bold px-2" 
                            style="height:48px;">Exit</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- end of check balance -->
                <!-- depositing -->
                <div class="card depositcard bg-white shadow d-none">
                        <div class="bg-white m-3 rounded card-body">
                            <p class="text-center  h2 fw-bold mt-2" style="color:#37517e;">Deposit Amount</p>
                            <div class="mb-3  ">
                            <div class="input-group w-100 mb-3">
                                    <select class="type mb-3 bg-white deposittype" style="width:90%;
                                    height:60px;outline: none;">
                                        <option value=""disabled selected>Deposit Type</option>
                                        <option value="CASH">CASH</option>
                                        <option value="CHEQUE">CHEQUE</option>
                                    </select>
                                </div>
                            <div class="input-group w-100 mb-3">
                                    <div class="input-with-text mb-3 " style="min-width:300px;">
                                        <span class="custom-text">Amount</span>
                                        <input type="text" 
                                            class="bg-white form-control shadow-none rounded text-dark bg-light  depositamount "
                                            placeholder="Amount" required style="height:60px;outline: none;">
                                    </div>
                                </div>
                                
                                <div class="input-group w-100 mb-3 d-none chequenumberdiv">
                                <div class="input-with-text mb-3 " style="min-width:300px;">
                                        <span class="custom-text">Cheque Number</span>
                                        <input type="text" 
                                            class="bg-white form-control shadow-none rounded text-dark bg-light cheque_no "
                                            placeholder="Cheque Number" required style="height:60px;outline: none;">
                                    </div>
                                </div>

                            <div class=" bg-white text-center  depositstatusdiv "></div>
                            <div class="container border-0 d-flex justify-content-evenly">
                            <button class="btn bg-danger text-light closecard  btn-transition text-center m-2 fw-bold px-2" 
                            style="height:48px;">Exit</button>
                            <button  type="button" role="button" 
                                    class="btn w-75 fw-bold text-white  btn-transition text-center my-2 depositsubmitbtn "
                                     title="Deposit"
                                    style="height:48px; border-radius:5px; background-color:#37517e;">Deposit </button >
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- end of deposit -->
                    <!-- handling cancel deposit -->
                <div class="card canceldepositcard bg-white shadow d-none">
                        <div class="bg-white m-3 rounded card-body">
                            <p class="text-center  h2 fw-bold mt-2" style="color:#37517e;">Stop Cheque</p>
                            <div class="mb-3  ">
                                <div class="input-group w-100 mb-3 ">
                                <div class="input-with-text mb-3 " style="min-width:300px;">
                                        <span class="custom-text">Cheque Number</span>
                                        <input type="text" 
                                            class="bg-white form-control shadow-none rounded text-dark bg-light cancelcheque_no "
                                            placeholder="Cheque Number" required style="height:60px;outline: none;">
                                    </div>
                                </div>

                            <div class=" bg-white text-center  canceldepositstatusdiv "></div>
                            <div class="container border-0 d-flex justify-content-evenly">
                            <button class="btn bg-danger text-light closecard  btn-transition text-center m-2 fw-bold px-2" 
                            style="height:48px;">Exit</button>
                            <button   type="button" role="button" 
                                    class="btn w-75 fw-bold text-white  btn-transition text-center m-2 canceldepositsubmitbtn "
                                    value="Stop Cheque" title="Stop Deposit"
                                    style="height:48px; border-radius:5px; background-color:#37517e;">Stop Cheque </button >
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- end of stop deposit -->
                    <!-- getting financial tips -->
                       <div class="card tipscard bg-white shadow d-none" >
                        <div class="bg-white m-3 rounded card-body">
                            <p class="text-center  h2 fw-bold mt-2" style="color:#37517e;"> 
                            Financial Tips</p>
                            <div class="mb-3  ">
                            <div class=" w-100 mb-3 tipsarea " style="max-height:300px; overflow-y:scroll;">
                                   
                            </div>
                            <div class="container border-0 d-flex justify-content-center py-2">
                            <button class="btn bg-danger text-light closecard  btn-transition text-center mb-2 fw-bold px-2" 
                            style="height:48px;">Exit</button>
                            
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- end of tips -->


                    </div>
                </div>
        </div>
    </section>

    <!--  JS Files -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../resources/main.js"></script>
    <script>
        $(document).ready(function () {
    const userId = $('body').attr('data-userid'); 
      // Call the fetchUserDetails function with the user ID
      fetchUserDetails(userId);
    //  custom display 
    $("input").focus(function () {
        $(this).siblings(".custom-text").show();
    });

    $("input").blur(function () {
        $(this).siblings(".custom-text").hide();
    });
// toggling password show 
    $(".hideshwpassword").click(function () {
    if ($(".hideshwpassword").children(".passtoggler").hasClass("fa-eye")) {
        $(this).siblings("input").attr("type", "text")
        $(this).children(".passtoggler").removeClass("fa-eye text-dark").addClass("fa-eye-slash text-primary")
    } else {
        $(this).siblings("input").attr("type", "password")
        $(this).children(".passtoggler").removeClass("fa-eye-slash text-primary").addClass("fa-eye text-dark")
    }
})

// Event listener for the Change Pin button
$('.changepinsubmitbtn').on('click', function () {
    const oldPin = $('.oldpin').val().trim();
    const newPin = $('.newpin').val().trim();
    if (oldPin.length !== 4 || newPin.length !== 4) {
        $('.pinstatusdiv').html('<p class="text-danger">PINs must be 4 characters long.</p>');
        return; 
    }
    if (oldPin === newPin) {
        $('.pinstatusdiv').html('<p class="text-danger">New PIN cannot be the same as the old PIN.</p>');
        return; 
    }
    changePin(oldPin, newPin);
});

// change pin menu is clicked
$(".changepinmenu").on("click",function(){
    $(".changepincard").toggleClass("d-none")
    hideOtherCards(".changepincard");
})     
    

// checking the balance
$('.checkbalancemenu').on('click', function () {
    $(".checkbalancecard").toggleClass("d-none")
    hideOtherCards(".checkbalancecard");
    checkBalances();
})
// checking the balance
$('.tipsmenu').on('click', function () {
    $(".tipscard").toggleClass("d-none")
    hideOtherCards(".tipscard");
    getTips();
})
// checking the balance
$('.depositmenu').on('click', function () {
    $(".depositcard").toggleClass("d-none")
    hideOtherCards(".depositcard");
})

// cancel deposit
$('.stopchequemenu').on('click', function () {
    $(".canceldepositcard").toggleClass("d-none");
    hideOtherCards(".canceldepositcard");
});

// depositing--choosing deposit type
$('.deposittype').on('change', function () {
    const selectedType = $(this).val().trim();
    if (selectedType === 'CASH') {
        $('.chequenumberdiv').addClass('d-none');
        $('.cheque_no').val(''); // Clear cheque number input
    } else if (selectedType === 'CHEQUE') {
        $('.chequenumberdiv').removeClass('d-none');
    }
});

// depositsubmitbtn click
$('.depositsubmitbtn').on('click', function () {
    handleDeposit();
});



// Stop Deposit submit button
$('.canceldepositsubmitbtn').on('click', function () {
    const chequeNumber = $('.cancelcheque_no').val().trim();
    if (!chequeNumber || chequeNumber<7) {
        $('.canceldepositstatusdiv').html('<p class="text-danger">Please enter Cheque Number</p>');
        return;
    }
    stopDeposit(chequeNumber);
});



// the deposit handling function
function handleDeposit() {
    const selectedType = $('.deposittype').val().trim();
    const amount = $('.depositamount').val().trim();
    const chequeNumber = selectedType === 'CHEQUE' ? $('.cheque_no').val() : '';
    // Validation 
    if (chequeNumber !== "" && chequeNumber.length < 7) {
        $('.depositstatusdiv').html('<p class="text-danger">Invalid Cheque Number</p>');
        return;
    }
    if (!selectedType || !amount) {
        $('.depositstatusdiv').html('<p class="text-danger">Missing required fields</p>');
        return;
    }
    const action = 'deposit';
    const depositData = {
        action: action,
        userId:userId, 
        amount: amount,
        amountType: chequeNumber ? 'CHEQUE' : 'CASH',
        chequeNumber: chequeNumber,
    };
    $.ajax({
        url: '../api/api.php',
        method: 'POST',
        data: depositData,
        beforeSend:function(){
            $('.depositstatusdiv').html('<i class="text-primary fa fa-spinner fa-spin"></i>');
        },
        success: function (data) {
            var result = $.parseJSON(data);
            if (result.success) {
                // Deposit successful
                $('.depositstatusdiv').html('<p class="text-success">Deposit successful!</p>');
                clearInputsInCard(".depositcard") 
            } else {
                $('.depositstatusdiv').html('<p class="text-danger">Error depositing. Please try again.</p>');
                console.error('Error:', result.error);
            }
        },
        error: function (error) {
            // Handle AJAX error
            $('.depositstatusdiv').html('<p class="text-danger">Error depositing. Please try again.</p>');
            console.error('Please check your connection');
        },
    });
}

// fetch useer details on load
    function fetchUserDetails(userId) {
        const apiUrl = '../api/api.php';
        const data = {
            action: 'fetch_user_details',
            userId: userId,
        };

        $.ajax({
            url: apiUrl,
            method: 'GET',
            data: data,
             beforeSend:function(){
            $('.user_name,.accounts').html('<i class="text-primary fa fa-spinner fa-spin"></i>');
            },
            success: function (data) {
                var result = $.parseJSON(data);
                if (result.success) {
                        // Display user details 
                    $(".user_name").html(`<p class="fw-bold ">Welcome, 
                ${result.data.FIRST_NAME} ${result.data.LAST_NAME}.</p>`)
                    const accountNumber = result.data.accountNumber;
                    $('.accounts').html(` <p>${accountNumber.trim()}</p>`);
                } else {
                    console.error('Error:', result.error);
                }
            },
            error: function (error) {
                console.error('Please check your connection');
            },
        });
    }



     // changing the pin
    function changePin(oldPin, newPin) {
        const apiUrl = '../api/api.php';
        const data = {
            action: 'change_pin',
            userId: userId,
            oldPin: oldPin,
            newPin: newPin,
        };

        $.ajax({
            url: apiUrl,
            method: 'POST',
            data: data,
            beforeSend:function(){
            $('.pinstatusdiv').html('<i class="text-primary fa fa-spinner fa-spin"></i>');
            },
            success: function (data) {
                var result = $.parseJSON(data);
                if (result.success) {
                    // PIN changed successfully
                    $('.pinstatusdiv').html('<p class="text-success">PIN changed successfully!</p>');
                    clearInputsInCard(".changepincard") 
                } else {
                    $('.pinstatusdiv').html('<p class="text-danger">Error changing PIN. Please try again.</p>');
                    console.error('Error:', result.error);
                }
            },
            error: function (error) {
                // Handle AJAX error
                $('.pinstatusdiv').html('<p class="text-danger">Error changing PIN. Please try again.</p>');
                console.error('Please check your connection');
            },
        });
    }


     // fetching balances
     function checkBalances() {
        const apiUrl = '../api/api.php';
        const data = {
            action: 'check_balance',
            userId: userId,
        };

        $.ajax({
            url: apiUrl,
            method: 'GET',
            data: data,
            beforeSend:function(){
            $('.showbalances').html('<i class="text-primary fa fa-spinner fa-spin"></i>');
            },
            success: function (data) {
                var result = $.parseJSON(data);
                if (result.success) {
                    // balances fetched
                    let balancesHtml = '';
                        result.data.forEach(account => {
                            balancesHtml += `<h4 class="fw-bold text-center">Account: ${account.ACCOUNT_NO} </h4> 
                            <div class="text-center "> Ksh  ${account.BALANCE}</div>`;
                        });
                        $('.showbalances').html(balancesHtml);
                } else {
                    $('.showbalances').html('<p class="text-danger">Error getting balances. Please try again.</p>');
                    console.error('Error:', result.error);
                }
            },
            error: function (error) {
                $('.showbalances').html('<p class="text-danger">Error getting balances. Please try again.</p>');
                console.error('Please check your connection');
            },
        });
    }

     // fetching financial tips
     function getTips() {
        const apiUrl = '../api/api.php';
        const data = {
            action: 'get_financial_tips',
        };

        $.ajax({
            url: apiUrl,
            method: 'GET',
            data: data,
            beforeSend:function(){
            $('.tipsarea').html('<i class="text-primary fa fa-spinner fa-spin"></i>');
            },
            success: function (data) {
                var result = $.parseJSON(data);
                if (result.success) {
                    // balances fetched
                    let tipsHtml = '';
                        result.data.forEach(tip => {
                            tipsHtml += `<h4 class="fw-bold text-center text-muted "> ${tip["CATEGORY"]} </h4> 
                            <div class="text-center mb-3 text-dark"> Ksh  ${tip["TIP"]}</div>`;
                        });
                        $('.tipsarea').html(tipsHtml);
                } else {
                    $('.tipsarea').html('<p class="text-danger">Error getting balances. Please try again.</p>');
                    console.error('Error:', result.error);
                }
            },
            error: function (error) {
                $('.tipsarea').html('<p class="text-danger">Error getting balances. Please try again.</p>');
                console.error('Please check your connection');
            },
        });
    }




// Function to handle the Stop Deposit
function stopDeposit(chequeNumber) {
    const apiUrl = '../api/api.php';
    const data = {
        action: 'stop_cheque',
        chequeNumber: chequeNumber,
        userId:userId,
    };

    $.ajax({
        url: apiUrl,
        method: 'POST',
        data: data,
        beforeSend:function(){
            $('.canceldepositstatusdiv').html('<i class="text-primary fa fa-spinner fa-spin"></i>');
            },
        success: function (data) {
            var result = $.parseJSON(data);
            if (result.success) {
                // Stop Deposit successful
                $('.canceldepositstatusdiv').html('<p class="text-success">Stop Deposit successful!</p>');
                clearInputsInCard(".canceldepositcard") 
            } else {
                $('.canceldepositstatusdiv').html('<p class="text-danger">Error stopping deposit. Please try again.</p>');
                console.error('Error:', result.error);
            }
        },
        error: function (error) {
            // Handle AJAX error
            $('.canceldepositstatusdiv').html('<p class="text-danger">Error stopping deposit. Please try again.</p>');
            console.error('Please check your connection');
        },
    });
}

  // Function to hide other cards
  function hideOtherCards(excludeCard) {
        $(".dataactionCenter .card").not(excludeCard).addClass("d-none");
    }
 
    // function to hide other cards apart from the shown one
    $('.closecard').on('click', function () {
        // Get the closest parent card 
        $(this).closest('.card').toggleClass('d-none');
    }); 
          
    // clearing card inputs
    function clearInputsInCard(cardSelector) {
        $(cardSelector).find('input').val('');
    }

        });
    </script>

</body>

</html>
