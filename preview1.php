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

</head>

<body>
    <div class="MainCover">


        <div id="mithaq" class="cover">
            <img src="assets/cover.jpeg" alt="test" style="width:100%;height:80vh">
            <div id="cont">
                <div class="line3">إيماناً مني بأن الإصلاح السياسي ينطلق من بيت الأمة وأن لرئاسة مجلس الأمة دوراً هاماً
                    في
                    تخطي العقبات وتلبيةً لنداء الوطن، أتشرف بالتوقيع على "ميثاق وطن" والذي من خلاله أؤكد على: </div>
                <div class="line4">دعم التوجهات التي تهدف لتغيير الرئيس السابق واختيار أعضاء مجلس الأمة للرئيس الجديد
                    استقراراً للمؤسسة التشريعية</div>
                <div class="label1" style="direction:rtl">
                    الأسم :
                    <span style="color: blue;">
                        <?php
             echo $_SESSION['voter_name'];
                    ?>
                    </span>
                </div>
                <div class="label2" style="direction:rtl">
                    الدائرة:
                    <span style="color: blue;">
                        <?php
             echo $_SESSION['voter_area'];
                    ?>
                    </span>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <?php
        if($voted==1)
        {
        ?>
            <p style="font-weight: 700;color:red">
                لقد قمت بالتصويت من قبل
            </p>

            <?php

            }
            ?>
            <p style="font-weight: 700;direction:rtl">
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

        <div class="row">
            <div class="col m-5">

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    </script>
    <script>
    function SaveCapture() {
        var mithaq_name = <?php echo "'".$_SESSION['voter_name']."'"; ?>;
        var node = document.getElementById('mithaq');

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

<style scoped>
body {
    background-image: url("./assets/concrete_texture.jpg");
}

.MainCover {
    background-image: url("./assets/concrete_texture.jpg");
    /* width: 100vh;
        height: 100vh; */
    /* background-color: red; */

    height: 100vh;
}

.image {
    width: 100%;
    height: 100vh;
}

.test {
    /* background-color: red; */
    display: flex;
    margin: 50px;
    /* min-width: 250px;
        min-height: 250px; */
    min-height: 250px;
    width: auto;
    justify-content: flex-end;
    align-items: center;
    flex-direction: column;
    background-image: url("./assets/cover.jpeg");
    background-size: contain;
    background-repeat: no-repeat;
    border: 1px solid black;
}

.field1 {
    /* background-color: yellow; */
    width: 70%;
    min-height: 20px;
    padding: 5px;
}

.field2 {
    /* background-color: green; */
    width: 70%;
    min-height: 20px;
    padding: 5px;
}


/* Container holding the image and the text */
.cover {
    position: relative;
    text-align: center;
    color: white;
}

/* Bottom left text */
.bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
}

/* Top left text */
.top-left {
    position: absolute;
    top: 8px;
    left: 16px;
}

/* Top right text */
.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}

/* Bottom right text */
.bottom-right {
    position: absolute;
    bottom: 8px;
    right: 16px;
}

/* Centered text */
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.line1 {
    position: absolute;
    bottom: 45%;
    right: 10%;
    color: black;
    font-size: 1rem;
    font-weight: 600;
}

@media(max-width: 480px) {
    .line3 {
        width: 70%;
        word-wrap: break-word;
        bottom: 20%;
        right: 15%;
        color: black;
        font-size: 40px;
        font-weight: 700;
        direction: rtl;
        text-align: right;
    }

    .line4 {
        width: 70%;
        word-wrap: break-word;
        bottom: 30%;
        right: 15%;
        color: black;
        font-size: 1.5vw;
        font-weight: 600;
    }
}

.line2 {
    position: absolute;
    bottom: 40%;
    right: 10%;
    color: black;
    font-size: 1rem;
    font-weight: 700;
    direction: rtl;
    text-align: right;
}

.line3 {
    position: absolute;
    width: 70%;
    word-wrap: break-word;
    bottom: 40%;
    right: 15%;
    color: black;
    font-size: 1.5vw;
    font-weight: 700;
    direction: rtl;
    text-align: right;
}

.line4 {
    width: 70%;
    position: absolute;
    word-wrap: break-word;
    bottom: 30%;
    right: 15%;
    color: black;
    font-size: 1.5vw;
    font-weight: 600;
}

.label1 {
    position: absolute;
    bottom: 25%;
    right: 15%;

    color: black;
    font-size: 1.6vw;
    font-weight: 600;
    /* right: 40%; */
    /* transform: translate(-50%, -50%); */
}

.label2 {
    position: absolute;
    bottom: 20%;
    right: 15%;

    color: black;
    font-size: 1.6vw;
    font-weight: 600;
    /* right: 40%; */
    /* transform: translate(-50%, -50%); */
}
</style>

<?php
}
?>