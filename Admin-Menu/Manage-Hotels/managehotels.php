<?php

include('../../config.php');
//delete
if(isset($_GET['delid'])){

    $rid = intval($_GET['delid']);
    
    if(isset($_GET['hotelpic'])) {
        $hotelpic = $_GET['hotelpic'];
        $ppicpath = "../../Images/hotelImages/{$hotelpic}";
        
        if(file_exists($ppicpath) && is_file($ppicpath)) {
            // Delete the file
            unlink($ppicpath);
        } else {
            echo "<script>alert('File not found');</script>";
        }
    }

    $sql = mysqli_query($conn,"DELETE FROM tblhotel WHERE id=$rid");
    if($sql) {
        echo "<script>alert('Successfully Data deleted');</script>"; 
    } else {
        echo "<script>alert('Failed to delete data');</script>";
    }
    
    echo "<script>window.location.href = 'managehotels.php'</script>";     
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Manage Hotels</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body {
                color: #566787;
                background: #f5f5f5;
                font-family: 'Roboto', sans-serif;
            }
            .table-responsive {
                margin: 30px 0;
            }
            .table-wrapper {
                min-width: 1000px;
                background: #fff;
                padding: 20px;
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }
            .table-title {
                font-size: 15px;
                padding-bottom: 10px;
                margin: 0 0 10px;
                min-height: 45px;
            }
            .table-title h2 {
                margin: 5px 0 0;
                font-size: 24px;
            }
            .table-title select {
                border-color: #ddd;
                border-width: 0 0 1px 0;
                padding: 3px 10px 3px 5px;
                margin: 0 5px;
            }
            .table-title .show-entries {
                margin-top: 7px;
            }
            .search-box {
                position: relative;
                float: right;
            }
            .search-box .input-group {
                min-width: 200px;
                position: absolute;
                right: 0;
            }
            .search-box .input-group-addon, .search-box input {
                border-color: #ddd;
                border-radius: 0;
            }
            .search-box .input-group-addon {
                border: none;
                border: none;
                background: transparent;
                position: absolute;
                z-index: 9;
            }
            .search-box input {
                height: 34px;
                padding-left: 28px;     
                box-shadow: none !important;
                border-width: 0 0 1px 0;
            }
            .search-box input:focus {
                border-color: #3FBAE4;
            }
            .search-box i {
                color: #a0a5b1;
                font-size: 19px;
                position: relative;
                top: 8px;
            }
            table.table tr th, table.table tr td {
                border-color: #e9e9e9;
            }
            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }
            table.table td:last-child {
                width: 130px;
            }
            table.table td a {
                color: #a0a5b1;
                display: inline-block;
                margin: 0 5px;
            }
            table.table td a.view {
                color: #03A9F4;
            }
            table.table td a.edit {
                color: #FFC107;
            }
            table.table td a.delete {
                color: #E34724;
            }
            table.table td i {
                font-size: 19px;
            }    
            .pagination {
                float: right;
                margin: 0 0 5px;
            }
            .pagination li a {
                border: none;
                font-size: 13px;
                min-width: 30px;
                min-height: 30px;
                padding: 0 10px;
                color: #999;
                margin: 0 2px;
                line-height: 30px;
                border-radius: 30px !important;
                text-align: center;
            }
            .pagination li a:hover {
                color: #666;
            }   
            .pagination li.active a {
                background: #03A9F4;
            }
            .pagination li.active a:hover {        
                background: #0397d6;
            }
            .pagination li.disabled i {
                color: #ccc;
            }
            .pagination li i {
                font-size: 16px;
                padding-top: 6px
            }
            .hint-text {
                float: left;
                margin-top: 10px;
                font-size: 13px;
            }

            
        </style>
    </head>
    <body>
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-5">
                                <h2>Manage Hotels Informations</h2>
                            </div>
                            <div class="col-sm-7" align="right">
                            <a href="insert.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Hotel</span></a>
                            <a href="../dashboard.php" class="btn btn-secondary"><span>Back to Dashboard</span></a>
                             </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Display Pic</th>
                                <th>Title</th>                       
                                <th>Description</th>
                                <th>Condition</th>
                                <th>Type</th>
                                <th>Location</th>                       
                                <th>Reviews Count</th>
                                <th>Price</th>
                                <th>Offer URL</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $ret=mysqli_query($conn,"select * from tblhotel");
                            $cnt=1;
                            $row=mysqli_num_rows($ret);
                            if($row>0){
                            while ($row=mysqli_fetch_array($ret)) {

                        ?>
                            <!--Fetch the Records -->
                            <tr>
                                <td><?php echo $cnt;?></td>
                                <td><img src="../../Images/hotelImages/<?php  echo $row['hotelpic'];?>" width="80" height="80"></td>
                                <td><?php  echo $row['title'];?></td>
                                <td><?php  echo $row['description'];?></td>                        
                                <td><?php  echo $row['hCondition'];?></td>
                                <td> <?php  echo $row['type'];?></td>
                                <td><?php  echo $row['location'];?></td>
                                <td><?php  echo $row['reviewsCount'];?></td>                        
                                <td><?php  echo $row['price'];?></td>
                                <td> <?php  echo $row['offerURL'];?></td>
                                <td>
                                    <a href="edit.php?editid=<?php echo htmlentities ($row['id']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="managehotels.php?delid=<?php echo ($row['id']);?>&&ppic=<?php echo $row['hotelpic'];?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                            <?php 
                            $cnt=$cnt+1;
                            } } else {?>
                            <tr>
                                <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                            </tr>
                            <?php } ?>                 
                                            
                        </tbody>
                    </table>
            
                </div>
            </div>
        </div>   

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </body>
</html>