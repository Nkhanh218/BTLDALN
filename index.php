<?php
include_once('./master_layout/header.php');
require('./connect.php'); ?>
<div class="container blogging-style">
  <div class="page-header">

    <h1>Trang chủ</h1>
    
  </div>

  

  <div class="row">
    <div class="ind">
      <?php
      $sql = "SELECT * FROM posts ORDER BY id ASC";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_array($result)) {
        $idtin = $row['id'];
        $tieude = $row['title'];
        $category_id = $row['category_id'];
        $image = $row['image'];
        $time = $row['created_at'];
        $new_image_path = 'image\\' . $image; 

      ?>
        <div class="col">
          <li class=bantin>
            <?php echo "<a href='post-item-details.php?id=$idtin&category_id=$category_id'><img src='$new_image_path' width='180px' height='150px' /></a>";
            echo "<a href='post-item-details.php?id=$idtin&category_id=$category_id'><h4>$tieude</h4></a>";
            ?>
          </li>
        </div>
      <?php } ?>

    </div>
  </div>

  <!-- calendar start -->
  <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50">
    <div class="single pull-left"></div>
  </div>
  <!-- calendar end -->

</div>



<?php include_once('./master_layout/footer.php') ?>

<style>
  .header-toolbar,.sticky-header,.btm-sec{
    background-color: #8BC6EC;
    background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
    

}

.panel{
    border-radius: 15px !important;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    margin-top:15px !important;
    }
    
  
  .ind {
    width: 70%;
  }

  .col {
    float: left;
    
    width: 25%;
    padding: 20px;
  }

  .bantin {
    list-style-type: none;
  }
/* 
  .advertisements {
    float: right;
    width: 25%;
  } */

  h4{
    margin-top: 17px;
  }
  
</style>