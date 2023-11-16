<?php
use App\Models\Product;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM product wher status!=0 and id=1 order by created_at desc

$id=$_REQUEST['id'];
$product=Product::find($id);
if($product==null)
{
    header("location:index.php?option=product");
}
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thương hiệu</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-12 text-right">
                        <a href="index.php?option=product" class="btn btn-sm btn-info">
                              <i class="fa fa-arrow-left" aria-hidden="true"></i>
                               Về thương hiệu
                        </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Tên trường</th>
                                 <th>Giá trị</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>ID</td>
                                 <td><?=$product->id;?></td>
                              </tr>
                              <tr>
                                 <td>name</td>
                                 <td><?=$product->name;?></td>
                              </tr>
                              <tr>
                                 <td>Slug</td>
                                 <td><?=$product->slug;?></td>
                              </tr>
                              <tr>
                                 <td>Sắp xếp</td>
                                 <td><?=$product->sort_order;?></td>
                              </tr>
                              <tr>
                                 <td>Mô tả</td>
                                 <td><?=$product->description;?></td>
                              </tr>
                              <tr>
                                 <td>Hình</td>
                                 <td>  <img style="width:100px" src="../public/images/product/<?=$product->image;?>" alt="<?=$product->image;?>"></td>
                              </tr>
                              <tr>
                                 <td>Thời gian tạo</td>
                                 <td><?=$product->created_at;?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td><?=$product->created_by;?></td>
                              </tr>
                              <tr>
                                 <td>Thời gian nâng cấp</td>
                                 <td><?=$product->updated_at;?></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td><?=$product->updated_by;?></td>
                              </tr>
                              <tr>
                                 <td>Trạng thái</td>
                                 <td><?=$product->status;?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
</section>
      </div>

      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>