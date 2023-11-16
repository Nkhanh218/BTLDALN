<?php
require('layouts/header.php'); ?>
<?php
require('./../connect.php'); ?>

<?php
  $search = "";
  $limit = 2;
  $page = 1;
  if(isset($_REQUEST['p']) && (int)$_REQUEST['p'] >= 1) {
    $page = (int) $_REQUEST['p'];
  }
  if(isset($_GET['txtsearch'])){
    $search = $_GET['txtsearch'];
  }

  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM comments WHERE content LIKE '%$search%'";
  $query = mysqli_query($conn ,$sql . " LIMIT $offset, $limit");
  $count = mysqli_num_rows(mysqli_query($conn ,$sql));
  $totalPage = ceil($count/$limit) ?? 0;
?>
<header>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<style>
   .xoa{
    background:#ff2a5c;
    color:black;
    border-radius:10px;
    text-align:center;
  }
 .xoa a{
  color:black;
 }
.limit-text {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.limit-text1 {
    display: -webkit-box;
    -webkit-line-clamp: 0.5;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.danhmuc td{
    color:white;
  }
  .thongso{
    background:#e2e2af;
  }
  .danhmuc{
    background:#262734;
  }
.container-fluid{
    background-color: #e2e9f4 ;
  }
.container-search{
  border-radius:5px;
  height:60px;
  width:300px;
  box-shadow: -2px -2px 6px rgba(255, 255, 255, 0.6), 2px 2px 12px #c8d8e7;
  background: linear-gradient(-67deg, rgba(#c8d8e7, .7), rgba(255,255,255,.8)) !important;
}
.sbutton {
color: #007bff;
border-radius: 10px;
border:none;
height: 35px;
width: 35px;
}

.searchform{
  height:35px;
  border:none;
  border-radius:5px;
  margin-left:30px;
  margin-top:12px
}
.sbutton i {
    font-size: 22px; /* Điều chỉnh kích thước này theo ý muốn */
}
</style>

</header>
<div class="content-wrapper" style="min-height: 565px;">
     <section class="content">
     <div class="container-fluid">
        <h2>Danh sách tin tức</h2></br>
        <form  action="" method="GET">
          <div class="container-search">
           <input type="text" name="txtsearch" class='searchform'/>
           <button type="submit" class="sbutton">
    <i class="fas fa-search"></i>
</button>        </form>
</div></br>
    <div class="row">
        <div class="table-responsive">
            <table cellspacing="0" cellpadding="0" class="table" style="display: block !important; overflow-x: auto !important; width: 100% !important;">
              <thead>
                <tr class="danhmuc">
                   <td scope="row">Id</td>
                   <td scope="row">Content</td>
                   <td scope="row">Post_id1</td>
                   <td scope="row">Account_id1</td>
                   <td scope="row">Ngày tạo</td>
	               <td scope="row">Ngày cập nhật</td>
	               <td scope="row">Trạng thái</td>
                   <td scope="row">Post_id2</td>
                   <td scope="row">Account_id2</td>
                   <td scope="row">           </td>
                </tr>
             <thead>
<?php while($row=mysqli_fetch_array($query)): ?>
                <tr class="thongso">
                   <td><?php echo $row['id']; ?></td>
                   <td><?php echo $row['content']; ?></td>
                   <td><?php echo $row['post_id']; ?></td>
                   <td><?php echo $row['account_id']; ?></td>
                   <td><?php echo $row['created_at']; ?></td>
                   <td><?php echo $row['updated_at']; ?></td>
                   <td><?php echo $row['status']; ?></td>
                   <td><?php echo $row['post_id']; ?></td>
                   <td><?php echo $row['account_id']; ?></td>
                   <td class="xoa"><a href="xoa_binhluan.php?id=<?php echo $row['id']; ?>">Xóa</a></td>
                </tr>
             </thead>
<?php endwhile;?>
              </table>
          


</div>
  <?php 
  for ($i=1; $i <= $totalPage; $i++)
    if($i == $page) {
      echo "<a href = 'ds_binhluan.php?p=$i' style='font-size: 20px; color: red; margin: 0px 4px;'> $i </a>";
    } else{
      echo "<a href = 'ds_binhluan.php?p=$i' style='margin: 0px 2px;'> $i </a>";
    }
  ?>
      </div>
    </div>

   </div>
 </section>
</div>

<?php require('layouts/footer.php'); ?>

 
<style>

.sbutton {
color: #007bff;
border-radius: 10px;
}

h2{
 padding-top: 10px;
}
  
.form{
  border: 2px solid black;
  border-radius: 5px;
}



</style>