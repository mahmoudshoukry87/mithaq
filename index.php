<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>ميثاق وطن</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .container {
        margin-top: 5px;
        max-width: 500px;

        height: auto;
        border: 1px black;
        border-style: solid;
        padding: 20px;
        font-size: 1.5rem;
    }

    .submitButton {
        font-size: 1.3rem;
    }

    .background {
        background-image: url("assets/concrete_texture.jpg");
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        /* background-color: red; */
    }

    .logo {
        width: 100px;
        height: 100px;
    }
    </style>
</head>

<body>
    <div class="background">
        <img src="assets/logo_header.PNG" class="logo" alt="" />
        <form method="POST" action="preview.php" accept-charset="UTF-8">
            <div class="container">
                <div class="form-group row">
                    <div class="col-xs-9">
                        <input type="text" name="name" class="form-control" style="text-align:right" required>
                    </div>
                    <label for="staticEmail" class="col-xs-3 col-form-label ml-4">الاسم</label>
                </div>

                <div class="form-group row">
                    <div class="col-xs-9">
                        <input type="number" name="area" class="form-control" id="inputPassword"
                            style="text-align: right" required>
                    </div>
                    <label for="inputPassword" class="col-xs-3 col-form-label ml-4">الدائرة</label>
                </div>

                <input class="btn btn-primary submitButton" type="submit" value="اضغط هنا للحصول علي نسخة الميثاق">
            </div>
        </form>
    </div>
</body>

</html>