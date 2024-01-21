<?php
if(!isset($_POST['name']))
{
 header("Location: index.php");
}
else{
?>
<?php
include 'dbconnect.php';
session_start();
$voted = 0 ;
?>

<?php
if(!isset($_SESSION['voter_name']))
{
$v_name = $_POST['name'];
$v_area = $_POST['area'];
$cmd = "insert into voters (v_name,v_area) values ('$v_name','$v_area')";
$result = mysqli_query($con,$cmd);
$_SESSION['voter_name'] = $v_name;
$_SESSION['voter_area'] = $v_area;
}
else
{
    $voted = 1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
    <style>
    body {
        background-image: url("./assets/concrete_texture.jpg") !important;
    }

    .MainCover {
        margin-top: 100px;
        background-image: url("./assets/concrete_texture.jpg");
    }

    #mithaq {
        border: 15px solid #1f4e83;
        border-radius: 50px;
        text-align: center;
        padding-left: 20px;
        padding-right: 20px;
        background-image: url("./assets/concrete_texture.jpg");
    }

    #content {
        margin-top: 50px;
    }

    p {
        color: black;
        font-size: 1rem;
        font-weight: 700;
        direction: rtl;
        text-align: right;
    }

    img {
        margin-top: -100px;
        /* box-shadow: 20px 20px 20px #DADADA; */

    }

    #voters_num {
        font-weight: 700;
        direction: rtl;
        text-align: center;
        margin-top: 30px;
    }

    #cont {
        padding-top: 20px;
        padding-bottom: 20px;
        background-image: url("./assets/concrete_texture.jpg");
    }
    </style>
</head>

<body>
    <div id="cont">
        <div class="container MainCover">
            <div id="mithaq">
                <img src="./assets/logo_header.png">
                <div id="content">
                    <p>
                        إيماناً مني بأن الإصلاح السياسي ينطلق من بيت الأمة وأن لرئاسة مجلس الأمة دوراً هاماً
                        في
                        تخطي العقبات وتلبيةً لنداء الوطن، أتشرف بالتوقيع على "ميثاق وطن" والذي من خلاله أؤكد على:

                    </p>
                </div>

                <div>
                    <p>
                        دعم التوجهات التي تهدف لتغيير الرئيس السابق واختيار أعضاء مجلس الأمة للرئيس الجديد
                        استقراراً للمؤسسة التشريعية
                    </p>
                </div>

                <div style="direction:rtl">
                    <p>
                        الأسم :
                        <span style="color: blue;">
                            <?php
                        echo $_SESSION['voter_name'];
                                ?>
                        </span>

                    </p>
                </div>

                <div style="direction:rtl">
                    <p>
                        الدائرة:
                        <span style="color: blue;">
                            <?php
                        echo $_SESSION['voter_area'];
                        ?>
                        </span>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <div style="text-align: center;">
        <?php
        if($voted==1)
        {
        ?>
        <p style="font-weight: 700;color:red;text-align:center">
            لقد قمت بالتصويت من قبل
        </p>

        <?php

            }
            ?>
        <p id="voters_num">
            عدد المصوتين :
            <span>
                <?php
                $voters_cmd = "select * from voters";
                $voters_result = mysqli_query($con,$voters_cmd);
                $voters_count = mysqli_num_rows($voters_result);
                echo $voters_count;
                    ?>
            </span>
        </p>
        <button type="button" class="btn" id="capture" style="background-color:#F5830F">
            <a onclick="SaveCapture()">
                تحميل النسخة الخاصه بك من الميثاق
            </a>
        </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    </script>
    <script>
    function SaveCapture() {
        var node = document.getElementById('cont');
        var mithaq_name = <?php echo "'".$_SESSION['voter_name']."'"; ?>;

        domtoimage.toPng(node)
            .then(function(dataUrl) {
                var img = new Image();
                img.src = dataUrl;
                downloadURI(dataUrl, mithaq_name)
            })
            .catch(function(error) {
                console.error('oops, something went wrong!', error);
            });
    }

    function downloadURI(uri, name) {
        var link = document.createElement("a");
        link.download = name;
        link.href = uri;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        delete link;
    }
    </script>
</body>
<?php
}
?>