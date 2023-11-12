<title>ADMIN SYSTEM</title>
<style>
    /*set border to the form*/

    form {
        padding-right: 5px;
        padding-top: 40px;
        padding-left: 5px;
        margin: 0px 5px 0px 5px;
        border-radius: 20px;

    }


    .logo-top {
        width: 180px;
        padding-bottom: 20px;
    }

    /*assign full width inputs*/

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 10px;
        margin: 0 !important;
        display: inline-block;
        box-sizing: border-box;
        font-size: 14px;
        border: 0.5px solid #393939;
        border-radius: 10px;
    }

    /*set a style for the buttons*/



    /* set a hover effect for the button*/

    button:hover {
        opacity: 0.8;

    }

    body {
        background-color: #ECF0F3;
        overflow: hidden;
    }

    @font-face {
        font-family: NotoSansLaoUI-Light;
        src: url('<?= URL ?>public/NotoSansLaoUI-Light.ttf');
    }

    .laotext {
        font-family: NotoSansLaoUI-Light;
    }


    .bg-color {
        background: #191D8A
    }

    .text-align-center {
        text-align: -webkit-center;
    }

    .bg-form {
        background: white;
        color: #000;
        padding: 40px 40px 60px 40px;
        border-radius: 10px;
        width: 475px;
        margin-top: 120px;
    }

    .text-input {
        height: 45px;
        font-weight: 400;
        font-size: 16px !important;
    }

    .form-group {
        margin-bottom: 0rem;
        text-align-last: start !important;
    }



    .text-footer {
        font-size: 12px;
        margin-top: 25px;

    }

    .btn-black {
        background-color: #242AC2 !important;
        color: #fff;
    }



    .btn-lg {
        padding: .5rem 1rem;
        font-size: 1rem !important;
        line-height: 1.5;
        border-radius: 10px;
    }

    .header-form {
        display: grid;
    }
</style>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="<?= URL; ?>/public/css1/util1.css">
<link rel="stylesheet" type="text/css" href="<?= URL; ?>/public/css1/main1.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="<?= URL; ?>public/js/jquery.js"> </script>
<script src="<?= URL; ?>public/sweetalert2.all.min.js"></script>


<body class="bg-color">
    <Script>
        $(document).ready(function () {
            $("#login").submit(function () {
                $.ajax({
                    type: "POST",
                    url: <?php echo '"' . URL . '"'; ?> + "Home/LoginAccount",
                    data: $(this).serialize()
                })
                    .done(function (response) {
                        // fix cannot go to home page 
                        const resData = response
                        if (resData.success) {
                            // When login success, then save JWT token to local storage
                            localStorage.setItem('authToken', resData.token);
                            if (resData.redirectType == 'admin') {
                                window.location.href = <?php echo '"' . URL . '"'; ?> + "Request/ApproveRequest";
                            }
                            if (resData.redirectType == 'document') {
                                window.location.href = <?php echo "'" . URL . "Document/In'"; ?>
                            }
                        } else {
                            alert(resData.message);
                        }
                    })
                    .fail(function () {
                        alert("Posting failed.");
                    });
                return false;
                    
            });
        });
    </script>
    <?php
    if (empty($_SESSION['lang'])) {
        $_SESSION['lang'] = 'en';
    }

    if (isset($_POST['lang'])) {
        $_SESSION['lang'] = $_POST['lang'];
    }
    ?>
    <?php
    if ($_SESSION['lang'] == 'en') { ?>
        <script>
            $(document).ready(function () {

                $(".laotext").hide();
                $(".engtext").show();
            });
        </script>
        <?php
    } else {
        ?>
        <script>
            $(document).ready(function () {
                $(".laotext").show();
                $(".engtext").hide();
            });
        </script>
        <?php
    }

    ?>

    <div class="d-flex justify-content-center">
        <div class="login-main-text">
            <div class="bg-form">
                <div class="header-form">
                    <!--<div>-->
                    <!--    <a href="#" id="translate">-->
                    <!--        <img src="<?= URL; ?>public/assets/Vector.png" style="float:right;" width="30px">-->
                    <!--    </a>-->
                    <!--</div>-->
                    <div class="d-flex justify-content-center">
                        <img src="<?= URL; ?>public/img/aif_favicon.png" class="logo-top">
                    </div>
                    <!--<img src="<?= URL; ?>public/img/ams.png"  class="logo-top">-->
                    <span class="engtext d-flex justify-content-center" style="font-family:NotoSansLaoUI-Light">ADMIN SYSTEM</span>
                </div>
                <form id="login" method="POST" style="margin-top: -40px;">
                    <div class="form-group">
                        <label style=" color: #3E3E3E;float: left; margin:0px"
                            class="engtext mb-0"><b>Username</b></label>
                        <label style=" color: #3E3E3E;float: left; margin:0px"
                            class="laotext mb-0"><b>ຊື່ຜູ້ໃຊ້</b></label>
                        <input type="text" placeholder="Enter your User name" name="un"
                            class="form-control text-input lang" required>
                    </div>
                    <div class="form-group">
                        <label style=" color: #3E3E3E;float: left;  margin:10px 0px 0px 0px"
                            class="engtext"><b>Password</b></label>
                        <label style=" color: #3E3E3E;float: left;  margin:10px 0px 0px 0px"
                            class="laotext"><b>ລະຫັດຜ່ານ</b></label>
                        <input type="password" placeholder="Enter your password" name="pw"
                            class="form-control text-input lang" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-black btn-lg btn-block mt-2 py-sm-2">
                        <span class="engtext">Sign In</span>
                        <span class="laotext">ເຂົ້າ​ສູ່​ລະ​ບົບ</span>
                    </button>
                </form>

                <br>
                <br>
                <br>

                <!--add new -->
                <!-- <div > -->
                <!--<h4><b><span style="font-size:20px">Go to Main</span></b></h4> -->
                <!-- <p style="color:blue;font-weight:bold;"><a href="<?php echo URL; ?>"><h4><b><span style="font-size:20px;color:blue">Go to Main</span></b></h4></a></p>
                      </div> -->
                <!--</div>-->
                <!--add new -->
            </div>
        </div>
    </div>
</body>

</html>