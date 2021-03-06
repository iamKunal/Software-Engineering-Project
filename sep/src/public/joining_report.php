<?php
session_start();
?>

<head>
<!--script>
    function disabling()
    {
        if(document.getElementById("type_of_leave").value==="CL"){
            document.getElementById("presuf1").value = 0;
            document.getElementById("presuf2").value = 0;
            document.getElementById("presuf3").value = "No";
            document.getElementById("presuf1").disabled='false';
            document.getElementById("presuf2").disabled='false';
            document.getElementById("presuf3").disabled='false';
            
        }
        else{
            
            document.getElementById("presuf1").removeAttribute('disabled');
            document.getElementById("presuf2").removeAttribute('disabled');
            document.getElementById("presuf3").removeAttribute('disabled');
        }
        
    }
</script-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Submit Joining Report</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <?php include 'bars_internal.php' ?>
        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Joining Report After Availing Leave</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Fill Joining Report
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="../submit_join" method="post">
                                        <div class="form-group">
                                            <label>Name of Applicant</label>
                                            <input class="form-control" name="name"  value = "<?php echo $rec['name']?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>For Application ID</label>
                                            <input class="form-control" name="for_app_id" required value="<?php echo $rec['application_id']?>"readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input class="form-control" name="designation" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control" name="department" required>
                                                <?php
                                                    while($depr = mysqli_fetch_assoc($dep)){
                                                ?>
                                                <option <?php if($rec['department'] == $depr['department']) echo 'selected'?>>
                                                <?php echo $depr['department'];?>
                                                </option>
                                                <?php
                                                    } 
                                                ?>
                                            </select>
                                        </div>
                                        
                                        
                                        <!--div class="form-group">
                                            <label>Recommending Authority</label>
                                            <select class="form-control" name="recommending_auth" required>

                                                <option>cse150001001@iiti.ac.in</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div-->
                                        
                                        
                                        
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Period of Leave</label>
                                            <br><label>From: </label>
                                            <input type="date" id="some" class="form-control" name="period_from" required>
                                            <label>To: </label>
                                            <input type="date" class="form-control" name="period_to" required>
                                        </div>
                                            
                                            <div class="form-group">
                                                <label>Report to duty with effect from: </label>
                                                <select class="form-control" name="report_from" required>

                                                <option>Forenoon</option>
                                                <option>Afternoon</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label>Nature of Leave</label>
                                            <input class="form-control" name="nature"  value ="<?php echo $rec['nature']?>" required readonly>
                                             
                                        </div>
                                            
                                       <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

</body>

</html>
