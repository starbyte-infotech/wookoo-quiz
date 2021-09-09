<?php 
include('header.php');
include('left-side.php');
include('../config.php');

/*SELECT DATA FROM DB*/
$mainCategories = "SELECT * FROM `main_category`";
$catRes1 = mysqli_query($conn, $mainCategories);

$subCategories = "SELECT * FROM `sub_category`";
$catRes2 = mysqli_query($conn, $subCategories);

/*INSERT MAIN CATEGORY*/
if(isset($_POST['add_main'])){ 
    $main_cat = $_POST['main_cat'];
    $main_img = $_FILES["main_cat_img"]["name"];
    $main_temp = $_FILES["main_cat_img"]["tmp_name"];   
    $folder = "catImg/".$main_img;
    $sql = "INSERT INTO `main_category`(`main_cat`, `image`) VALUES ('$main_cat','$main_img')";
    $res = mysqli_query($conn, $sql);  
    if($res){
        echo "<script>alert('Category Successfuly Added');</script>";
    }else{
        echo "<script>alert('Failed to Add Category');</script>";
    }
    if (move_uploaded_file($main_temp, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}

/*INSERT SUB CATEGORY*/
if(isset($_POST['add_sub']))
{ 
    $main_cat = $_POST['main_sel'];
    $main_cat_Id = "SELECT mid FROM `main_category` WHERE `main_cat` = '$main_cat'";
    $sel_main_res = mysqli_query($conn, $main_cat_Id);
    $fetch_dta = mysqli_fetch_array($sel_main_res);
    $mid = $fetch_dta['mid'];

    $sub_cat = $_POST['sub_cat'];
    $req_coin = $_POST['req_coin'];
    $sub_img = $_FILES["sub_cat_img"]["name"];
    $sub_temp = $_FILES["sub_cat_img"]["tmp_name"];   
    $subfolder = "catImg/".$sub_img;
    $sub_sql = "INSERT INTO `sub_category`(`mid`,`main_cat`,`sub_cat`, `image`,`coin`) VALUES('$mid','$main_cat','$sub_cat','$sub_img','$req_coin')";
    $sub_res = mysqli_query($conn, $sub_sql); 
    if($sub_res){
        echo "<script>alert('SubCategory Successfuly Added');</script>";
    }else{
        echo "<script>alert('Failed to Add SubCategory');</script>";
    } 
    if (move_uploaded_file($sub_temp, $subfolder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}

if(isset($_POST['edit_submit']))
{
    $id=$_POST['id'];
    echo $id;
    $subcat=$_POST['subcat'.$id];
    echo $subcat;
    $coin=$_POST['coin'.$id];
    $f2=$_FILES['image'.$id];
    $subfolder = "catImg/".$f2['name'];
    $name=$f2['name'];
    if(!empty($f2["name"]))
    {
        move_uploaded_file($f2["tmp_name"],$subfolder);
        $updqry =  "UPDATE sub_category SET sub_cat='$subcat', image='$name', coin='$coin' WHERE sid=".$id;
        $updres = mysqli_query($conn, $updqry);
    }
    else
    {
        $updqry =  "UPDATE sub_category SET sub_cat='$subcat', coin='$coin' WHERE sid=".$id;
        $updres = mysqli_query($conn, $updqry);

    }
}

/*UPDATE SUB CATEGORY*/
if(isset($_POST['update'])){
    $edited_cat = $_POST['upd_sub'];
    $sid = $_POST['hidden'];
    $coin = $_POST['coin'];
    $edit = mysqli_query($conn,"update sub_category set sub_cat='$edited_cat' where sid='$sid'");
}
?>
<style type="text/css">
    .trash-icon:before{ color:#ff0000; }
    .edit-icon:before{ color: #437eeb; }
</style>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Category</h4>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->

                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5><b>Main Category</b></h5>
                                <form method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Main categories</label>

                                        <div class="col-sm-12 border-bottom">
                                            <select name="man-cat" class="form-select shadow-none p-0 border-0 form-control-line">
                                        <?php
                                            while ($row = mysqli_fetch_array($catRes1)){ ?>
                                                <option value="<?php echo $row['main_cat']; ?>"><?php echo $row['main_cat']; ?></option>
                                        <?php } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Add New Category</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="main_cat" placeholder="Main Category"class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Add Image</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" name="main_cat_img" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <input type="submit" name="add_main" value="Add" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5><b>Sub Category</b></h5>
                                <form method="post" enctype="multipart/form-data" class="form-horizontal form-material">                                    
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Sub categories</label>

                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line">
                                        <?php
                                            while ($row2 = mysqli_fetch_array($catRes2)){ ?>
                                                <option><?php echo $row2['sub_cat']; ?></option>
                                        <?php } ?>   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Main categories</label>

                                        <div class="col-sm-12 border-bottom">
                                            <select name="main_sel" class="form-select shadow-none p-0 border-0 form-control-line">
                                            <option>--Select--</option>
                                        <?php
                                        $selmain = "SELECT * FROM `main_category`";
                                        $datamain = mysqli_query($conn, $selmain);
                                        while ($data = mysqli_fetch_array($datamain)){ ?>
                                            <option value="<?php echo $data['main_cat'];?>"><?php echo $data['main_cat']; ?></option>
                                        <?php } ?>    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Add New Sub Category</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="sub_cat" placeholder="Sub Category"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Add Require Coin</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="req_coin" placeholder="Require Coin"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Add Image</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" name="sub_cat_img" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <!-- <button class="btn btn-success">Add</button> -->
                                            <input type="submit" name="add_sub" value="Add" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                
                <div class="row">
                    <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <?php
                                        $mainCat1 = "SELECT * FROM `main_category`";
                                        $mres = mysqli_query($conn, $mainCat1);
                                        $i=1;
                                        while ($result = mysqli_fetch_array($mres))
                                        {  
                                            if($i==1)
                                            {    
                                        ?>

                                            <button class="nav-link " id="v-pills-<?php echo $result['mid']; ?>-tab" data-bs-toggle="pill"
                                                data-bs-target="#v-pills-<?php echo $result['mid']; ?>" type="button" role="tab"
                                                aria-controls="v-pills-<?php echo $result['mid']; ?>" aria-selected="true"  onclick="subcatval(<?php echo $result['mid'];?>);"><?php echo $result['main_cat']; ?></button>
                                                <?php
                                            }
                                            else{
                                                ?>

                                        <button class="nav-link" id="v-pills-<?php echo $result['mid']; ?>-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-<?php echo $result['mid']; ?>" type="button" role="tab"
                                            aria-controls="v-pills-<?php echo $result['mid']; ?>" aria-selected="false"  onclick="subcatval(<?php echo $result['mid'];?>);"><?php echo $result['main_cat']; ?></button>
                                            <?php }?>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                      </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <?php
                                        $mainCat1 = "SELECT * FROM `main_category`";
                                        $mres = mysqli_query($conn, $mainCat1);
                                        $i=1;
                                        while ($result = mysqli_fetch_array($mres))
                                        {  
                                            if($i==1)
                                            {    
                                        ?>
                                        <div class="tab-pane fade show active" id="v-pills-<?php echo $result['mid']; ?>" role="tabpanel"
                                            aria-labelledby="v-pills-<?php echo $result['mid']; ?>-tab">
                                            <div class="p-2">
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        else{
                                            ?>
                                        <div class="tab-pane fade" id="v-pills-<?php echo $result['mid']; ?>" role="tabpanel"
                                            aria-labelledby="v-pills-<?php echo $result['mid']; ?>-tab">

                                            <div class="p-2">
                                            </div>

                                        </div>
                                        <?php }?>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
<?php include('footer.php'); ?>
<script type="text/javascript">
function deleteSubCat(sid){
    var sid = sid;
    $.ajax({
        url: "loadsubCat.php", 
        type: "POST", 
        dataType:"json",            
        data: {action : 'deleteSubCategory', sid: sid},
        success: function(data) {
            if(data.status == 1){
                alert('Sub Category Deleted Successfully');
            }else if(data.status == 2){
                alert('Deleted Main & Sub Category');
            }else{
                alert("Failed to Delete!");
            }
            
        }
    });
}


</script>

