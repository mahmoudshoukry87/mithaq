<?php
session_start();
 include '../dbconnect.php';
 if(!isset($_SESSION['Admin_name']))
 {
  header("Location: login.php");
 }
?>
<?php
$cmd = "select * from voters";
$result = mysqli_query($con,$cmd);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> قائمة المشاركين في الاستفتاء</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<style>
* {
    font-family: 'Cairo', sans-serif !important;
}

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    width: 100%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    direction: rtl;
}

.styled-table thead tr {
    background-color: #0F2C9D;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
</style>

<body>
    <div class="container" style="margin-top:50px">
        <p style="text-align:center">
            قائمة المصوتين
        </p>
        <button class="btn btn-danger">
            <a href="logout.php" style="color:white">
                تسجيل خروج
            </a>
        </button>

        <button class="btn btn-success">
            <a onclick="location.href='export.php?export=true'" style="color:white">
                تصدير
            </a>
        </button>
        <table class="styled-table">
            <thead>
                <tr class="active-row">
                    <th>رقم المصوت</th>
                    <th>أسم المصوت</th>
                    <th> الدائرة</th>
                    <th>تاريخ التصويت</th>


                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($result)){ ?>
                </tr>
                <th><?php echo $row['v_id']; ?></th>
                <th><?php echo $row['v_name']; ?></th>
                <th><?php echo $row['v_area']; ?></th>
                <th><?php echo $row['v_date']; ?></th>
                <tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </div>

    <script>
    function ExportUsres() {


    }
    </script>
</body>

</html>