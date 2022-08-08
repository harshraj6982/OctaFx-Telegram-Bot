<?php

$servername = "localhost";
$username = "harsh";
$password = "harsh123";
$db="octafx";

$conn = mysqli_connect($servername,$username,$password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit"])) {


    $bot= mysqli_real_escape_string($conn,$_POST['bot']);
    $id = mysqli_real_escape_string($conn,$_POST['mastertraderid']);
    $mname = mysqli_real_escape_string($conn,$_POST['mastertradername']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    date_default_timezone_set('Asia/Kolkata');
    $timestamp=date('Y-m-d H:i:s');
    $status=mysqli_real_escape_string($conn,$_POST['status']);

    // echo $bot;
    // echo $id;
    // echo $mname;
    // echo $password;
    // echo $timestamp;
    // echo $status;

    if ($password=='SuperheroTarun'){
        $query = mysqli_query($conn,"UPDATE mastertraders SET mastertraderid='$id', mastertrader='$mname', Datetime='$timestamp',status='$status' WHERE bot='$bot';");
    
        if ($query) {
            echo "<center><h3>Successfully Updated!!!</h3></center><br><h4><center>Please Refresh<center></h4>";
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else{
            echo "<center><h3>Couldn't Update!!!</h3></center>";
        }
    }else{
        echo "<center><h4>Wrong Password</h4></center>";
    }

    

}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Control Panel</title>
</head>

<body>
    <div class="container">
        <h1 class='text-center'>OctaFX Bot Control Panel</h1>
    </div>
    <table class="table table-responsive table-hover table-dark">
        <thead class="">
            <tr>
                <th scope="col">Bot</th>
                <th scope="col">Mastertrader ID</th>
                <th scope="col">Mastertrader Name</th>
                <th scope="col">Status</th>
                <th scope="col">Last Updated</th>
            </tr>
        </thead>

        <tbody class="">
            <?php
                $servername = "localhost";
                $username = "harsh";
                $password = "harsh123";
                $db="octafx";

                $conn = mysqli_connect($servername,$username,$password,$db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $qry="SELECT bot,mastertraderid,mastertrader,Datetime,status FROM mastertraders";
                $run= mysqli_query($conn,$qry);

                while ($row=mysqli_fetch_array($run)){
                    $bot=$row['bot'];
                    $mastertraderid=$row['mastertraderid'];
                    $mastertraders=$row['mastertrader'];
                    $Datetime=$row['Datetime'];                
                    $status=$row['status'];    
                
            ?>
            <tr>
                <th scope="row"><?php echo $bot; ?></th>
                <td><?php echo $mastertraderid; ?></td>
                <td><?php echo $mastertraders; ?></td>
                <td class="<?php if ($status==1) {echo "text-success";} else{echo "text-danger";}?>"><?php if ($status==1) {echo "Active";} else{echo "Offline";} ?></td>
                <td><?php echo $Datetime; ?></td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
    <form method="POST" action="admin.php" style="margin-left: 5px; margin-right: 5px;">
        <div class="mb-3">
            <label for="bot">Bot:</label>
            <select required name="bot" title="Please Select the Bot" class="form-select" >
                <option hidden="" disabled="disabled" selected="selected" value="">Select Bot</option>
                <?php

                    $servername = "localhost";
                    $username = "harsh";
                    $password = "harsh123";
                    $db="octafx";

                    $conn = mysqli_connect($servername,$username,$password,$db);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $qry="SELECT bot FROM mastertraders";
                    $run= mysqli_query($conn,$qry);

                    while ($row=mysqli_fetch_array($run)){
                        $bot=$row['bot'];                
                ?>
                <option value="<?php echo $bot ?>"><?php echo $bot ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="mastertraderid" class="form-label">Mastertrader ID:</label>
            <input type="text" class="form-control" name="mastertraderid" title="Please Enter Mastertrader ID" required>
        </div>
        <div class="mb-3">
            <label for="mastertradername" class="form-label">Mastertrader Name:</label>
            <input type="text" class="form-control" name="mastertradername" title="Please Enter Mastertrader Name" required>
        </div>
        <div class="mb-3">
            <label for="status">Status:</label>
            <select required name="status" class="form-select">
                <option selected value="1">Activate</option>
                <option value="0">Deactivate</option>
            <select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password:</label>
            <input type="password" class="form-control" name="password" title="Please Enter Password" required>
        </div>
        <center><button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button></center>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>

</html>