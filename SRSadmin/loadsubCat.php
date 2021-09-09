<?php 
include('../config.php');
if(isset($_POST['action']) && $_POST['action'] == 'load_sub_cat')
{
    if($_POST['id'])
    { ?>        
        <div class="p-2">
        <?php
        $subCat = "SELECT * FROM `sub_category` WHERE mid=".$_POST['id'];
        $subres = mysqli_query($conn, $subCat);
        while ($subresult = mysqli_fetch_array($subres))
        {   ?>
            <h4 class="mb-3"><?php echo $subresult['sub_cat'] ?>
                <span>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#<?php echo $subresult['sid'] ?>" onclick="opensubmodel(<?php echo $subresult['sid'] ?>);"><i class="fas fa-edit ml-2 edit-icon" aria-hidden="true"></i></a> ||
                    <a href="#" onclick="deleteSubCat(<?php echo $subresult['sid'] ?>);"><i class="fas fa-trash-alt trash-icon"></i></a>
                </span>
              
                <!-- Modal -->
                <div class="modal fade modalopen-<?php echo $subresult['sid'] ?>" id="modalopen-<?php echo $subresult['sid'] ?>"
                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    Edit details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <div class="modal-body">                                
                                    <label class="col-md-12 p-0">sub category name</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" class="form-control" value="<?php echo $subresult['sid']?>" id="id<?php echo $subresult['sid']?>" name="id<?php echo $subresult['sid']?>" hidden>
                                        <input type="text" name="subcat<?php echo $subresult['sid'] ?>" id="subcat" placeholder="<?php echo $subresult['sub_cat'] ?>" value="<?php echo $subresult['sub_cat'] ?>" class="modal-form-control p-0 border-0">
                                    </div>
                                    <label class="col-md-12 p-0 mt-3">coin</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" id="coin" placeholder="<?php echo $subresult['coin'] ?>" value="<?php echo $subresult['coin'] ?>" class="modal-form-control p-0 border-0" name="coin<?php echo $subresult['sid']?>">
                                    </div>
                                    <label class="col-md-12 p-0 mt-3">image</label>
                                    <img src="catImg/<?php echo $subresult['image']; ?>" width="70px"  name="sub_img">
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="file" class="modal-form-control p-0 border-0" name="image<?php echo $subresult['sid']?>">
                                    </div>                              
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="edit_submit" class="btn btn-secondary"
                                        onclick="submit_form(<?php echo $subresult['sid'];?>)">Update & Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </h4>
        <?php } ?>
        </div>
        <?php
    }

}

/*----------------------------------------------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'get_sub_by_main') {

    $maincat = $_POST['main_cat'];
    if ($maincat != '') {
       $sql1 = "SELECT * FROM sub_category WHERE main_cat ='$maincat'";
       $result1 = mysqli_query($conn,$sql1);
       echo "<select name='sub_cat' class='form-select shadow-none p-0 border-0 form-control-line'>";       
       while ($row = mysqli_fetch_array($result1)) {
          echo "<option value='" . $row['sub_cat'] . "'>" . $row['sub_cat'] . "</option>";}
       echo "</select>";
    }
    else
    {
        echo  'ss';
    }
}
/*------------------------------------------ Delete sub cat -------------------------------------------*/
if(isset($_POST['action']) && $_POST['action'] == 'deleteSubCategory')
{    
    $sid = $_POST['sid']; 

    $selMain = "SELECT `mid`, `main_cat` FROM `sub_category` WHERE sid='$sid'";
    $MainRes = mysqli_query($conn,$selMain);
    $rowMain = mysqli_fetch_array($MainRes);
    $main_id = $rowMain['mid'];

    $selRec = "SELECT * FROM `sub_category` WHERE mid='$main_id'";
    $Res = mysqli_query($conn,$selRec);
    $row2 = mysqli_fetch_array($Res);
    $row = mysqli_num_rows($Res);
    if($row = 1) {
        $del_qry = $sql = "DELETE FROM sub_category WHERE sid='$sid'";
        $delRes = mysqli_query($conn,$del_qry);
        if($delRes){
            $del_que = $sql = "DELETE FROM que_tbl WHERE sid='$sid'";
            $delQue = mysqli_query($conn,$del_que);
        }
       
        $del_main = $sql = "DELETE FROM main_category WHERE mid='$main_id'";
        $delMianRes = mysqli_query($conn,$del_main);
        if($delMianRes){
            $del_que1 = $sql = "DELETE FROM que_tbl WHERE mid='$main_id'";
            $delQue1 = mysqli_query($conn,$del_que1);
        }

        if($delRes && $delMianRes){       
           $response['status'] = 2;
           $response['sid'] = $sid;
           $response['mid'] = $main_id;
           echo json_encode($response);
        }        
    }else{
        $del_qry1 = $sql = "DELETE FROM sub_category WHERE sid='$sid'";
        $delRes1 = mysqli_query($conn,$del_qry1);
        if($delRes1){       
           $response['status'] = 1;
           $response['sid'] = $sid;
           echo json_encode($response);
        }
    }    
}