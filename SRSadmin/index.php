<?php 
include('header.php');
include('left-side.php');
include('../config.php');
?>  

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Three charts -->
    <!-- ============================================================== -->
    <div class="row">
        <?php 
        $main_cat = "SELECT * FROM `main_category`";
        $main_res = mysqli_query($conn, $main_cat);
        while($mainData = mysqli_fetch_array($main_res)){ ?>                    
        <div class="col-lg-4 col-md-12">
            <a href="category.php?mid=<?php echo $mainData['mid'];?>">
                <div class="white-box analytics-info">
                    <h3 class="box-title"><?php echo $mainData['main_cat'];?></h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <?php $mcat = $mainData['main_cat'];
                        $queQry = "SELECT COUNT(*) AS `count` FROM `que_tbl` WHERE main_cat = '$mcat'";
                        $que_res = mysqli_query($conn, $queQry);
                        $queData = mysqli_fetch_array($que_res);
                        $total_que =  $queData['count'];
                        ?>
                        <li class="ms-auto"><span class="counter text-success"><?php echo $total_que;?></span></li>
                    </ul>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->            
<?php include('footer.php'); ?>