<?php session_start(); ?>
<!DOCTYPE html>
<!--[if !IE]><!-->
<script>
    if ( /*@cc_on!@*/ false) {
        document.documentElement.className += ' ie10';
    }
</script>
<!--<![endif]-->
<!--[if lt IE 9]><script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<!--[if IE 8 ]><html class="ie8"><![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bookstore</title>
    <meta name="description" content="fly to jquery plugin">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <link href="css/modal.css" rel="stylesheet" type="text/css" />
    <script>
        function logout() {
            $.ajax({
                type: "GET",
                url: "xllogout.php",
                success: function(kq) {
                    if (kq == 1) {
                        alert("Dang xuat thanh cong");
                        location.href = "index.php";
                    }
                }

            });

        }

        function moformlogin() {
            $("#myModal").css("display", "block");
        }

        function login() {
            var re = $.ajax({
                type: "POST",
                url: "xllogin.php",
                data: {
                    "email": $("#txtEmail").val(),
                    "pass": $("#txtPass").val()
                },
                dataType: "text",
                success: function(kq) {
                    //$("#kqlogin").html(kq);
                    if (kq == 0)
                        $("#kqlogin").html("Đăng nhập không thành công");
                    else {
                        alert("Đăng nhập thành công");
                        document.getElementById('myModal').style.display = "none";
                        $("#myBtn").html("Dang xuat");
                        $("#myBtn").unbind("click");
                        $("#myBtn").bind("click", logout);
                    }

                }
            });
            re.error(function() {
                alert("Có lỗi trong đăng nhập");
            });
        }
    </script>
</head>

<body>
    <?php
    include("config/config.php");
    include("classes/Db.class.php");
    include("classes/Loai.class.php");
    include("classes/Sach.class.php");
    include("include/mylib.php");
    ?>


    <!--  Free CSS Templates from www.templatemo.com -->
    <div id="templatemo_container">
        <div id="templatemo_menu">
            <ul>
                <li><a href="index.html" class="current">Home</a></li>
                <li><a href="subpage.html">Search</a></li>
                <li><a href="subpage.html">Books</a></li>
                <li><a href="subpage.html">New Releases</a></li>
                <li><a href="#">Company</a></li>
                <li><a href="#">Contact</a></li>
                <li>
                    <?php
                    if (isset($_SESSION['user'])) {
                        // echo "Xin chao ",$_SESSION['user'];
                        echo "<a href='#'' id='myBtn' onclick='logout()'>Đăng xuất</a></li>";
                    } else {
                    ?>
                        <a href="#" id="myBtn" onclick="moformlogin()">Đăng nhập</a>
                </li>
            <?php } ?>
            </ul>
            <div id="cartinfo"><?php
                                if (isset($_SESSION['cart']))
                                    echo count($_SESSION['cart']);

                                ?></div>
            <div id="cart-box">
                <a href="index.php?mo=cart"><img width="30" class="cart" src="images/cart-lrg.png" alt="Cart" /></a>

            </div>

        </div> <!-- end of menu -->

        <div id="templatemo_header">
            <div id="templatemo_special_offers">
                <p>
                    <span>25%</span> discounts for
                    purchase over $80
                </p>
                <a href="subpage.html" style="margin-left: 50px;">Read more...</a>
            </div>


            <div id="templatemo_new_books">
                <ul>
                    <li>Suspen disse</li>
                    <li>Maece nas metus</li>
                    <li>In sed risus ac feli</li>
                </ul>
                <a href="subpage.html" style="margin-left: 50px;">Read more...</a>
            </div>
        </div> <!-- end of header -->

        <div id="templatemo_content">

            <div id="templatemo_content_left">
                <?php
                include "loai.php"
                ?>
            </div> <!-- end of content left -->

            <div id="templatemo_content_right">
                <?php
                $mo = "sach";
                if (isset($_REQUEST['mo']))
                    $mo = $_REQUEST['mo'];
                if ($mo == "sach") {
                    if (isset($_REQUEST['ac'])) {
                        if ($_REQUEST['ac'] == "chitiet")
                            include "chitiet.php";
                        else if ($_REQUEST['ac'] == "sach1loai")
                            include "sach1loai.php";
                    } else
                        include("sach.php");
                } else if ($mo == "cart") {
                    include("xlcart.php");
                } else if ($mo == "login") {
                    include("login.php");
                }
                ?>
            </div> <!-- end of content -->
            <div id="templatemo_footer">

                <a href="subpage.html">Home</a> | <a href="subpage.html">Search</a> | <a href="subpage.html">Books</a> | <a href="#">New Releases</a> | <a href="#">FAQs</a> | <a href="#">Contact Us</a><br />
                Copyright © 2024 <a href="#"><strong>Your Company Name</strong></a>
                <!-- Credit: www.templatemo.com -->
            </div>
            <!-- end of footer -->
            <!--  Free CSS Template www.templatemo.com -->
        </div> <!-- end of container -->

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Đăng nhập</h2>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <input type="hidden" name="mo" value="login">
                        <table>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" id="txtEmail" name="txtEmail"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" id="txtPass" name="txtPass"></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="button" id="btnLogin" name="btnLogin" value="Dang nhap" onclick="login()">
                                </td>
                            </tr>
                        </table>
                        <div id="kqlogin"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <h3>Modal Footer</h3>
                </div>
            </div>
        </div>




        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/flyto.js"></script>


        <script>
            $('#templatemo_content_right').flyto({
                item: '.templatemo_product_box',
                target: '.cart',
                button: '.my-btn'
            });
            var modal = document.getElementById('myModal');
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0];

            function momodal() {
                modal.style.display = "block";
            }
            span.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
</body>

</html>