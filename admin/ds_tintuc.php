<?php
require('layouts/header.php'); ?>
<?php
require('./../connect.php'); ?>

<?php
  $search = "";
  $limit = 6;
  $page = 1;
  if(isset($_REQUEST['p']) && (int)$_REQUEST['p'] >= 1) {
    $page = (int) $_REQUEST['p'];
  }
  if(isset($_GET['txtsearch'])){
    $search = $_GET['txtsearch'];
  }

  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM posts WHERE title LIKE '%$search%'";
  $query = mysqli_query($conn ,$sql . " LIMIT $offset, $limit");
  $count = mysqli_num_rows(mysqli_query($conn ,$sql));
  $totalPage = ceil($count/$limit) ?? 0;
  $new_image_path = 'image\\'; 

?>
<header>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<style>
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
                 <td scope="row">ID</td>
                 <td scope="row">Tittle</td>
                 <td scope="row">Slug</td>
                 <td scope="row">Ảnh</td>
                 <td scope="row">Nội dung</td>
                 <td scope="row">Ngày tạo</td>
                 <td scope="row">Ngày sửa</td>
	            <td scope="row">Trạng thái</td>
                 <td class="them" scope="row" colspan="2"><a class="them" href="them_tintuc.php">Thêm</a></td>
              </tr>
            <thead>
<?php while($row=mysqli_fetch_array($query)): ?>
<tr class="thongso">
  <td><?php echo $row['id']; ?></td>
  <td class="limit-text"><?php echo $row['title']; ?></td>
  <td ><a href="<?php echo $row['slug']; ?>"><?php echo $row['slug']; ?></a></td>
  <td><?php echo '<img src="../image/'.$row['image'].'" width=170px;/>'; ?></td>
<td class="limit-text"><a href="<?php echo $row['content']; ?>"><?php echo $row['content']; ?></a></td>
  <td><?php echo $row['created_at']; ?></td>
  <td><?php echo $row['updated_at']; ?></td>
  <td><?php echo $row['status']; ?></td>
  <td class="sua"><a href="sua_tintuc.php?id=<?php echo $row['id']; ?>">Sửa</a></td>
  <td class="xoa"><a href="xoa_tintuc.php?id=<?php echo $row['id']; ?>">Xóa</a></td>
</tr>
<?php endwhile;?>
</table>

  <?php 
  for ($i=1; $i <= $totalPage; $i++)
    if($i == $page) {
      echo "<a href = 'ds_tintuc.php?p=$i' style='font-size: 20px; color: red; margin: 0px 4px;'> $i </a>";
    } else{
      echo "<a href = 'ds_tintuc.php?p=$i' style='margin: 0px 2px;'> $i </a>";
    }
  ?>
        </div>
      </div>

    </div>
  </section>
</div>

 
 <?php require('layouts/footer.php'); ?>

<style>
  .them{
    margin-left:20px;
    background:#4690ce;
    color:white;
  }
  .sua{
    background:#a3d981;

  }
  .sua a{
    color:black;
  }
  .xoa{
    background:#ff2a5c;
    color:black;
  }
 .xoa a{
  color:black;
 }
.sbutton {
color: #007bff;
}

h2{
 padding-top: 10px;
}
  
.form{
  border: 2px solid black;
  border-radius: 5px;
}


</style>