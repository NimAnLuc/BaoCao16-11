<?php
use App\Models\Product;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM category wher status!=0 and id=1 order by created_at desc

$list = Product::join('category', 'product.category_id', '=','category.id')
 ->join('brand', 'product.brand_id', '=','brand.id')
 ->where('product.status', '=', 0)
 ->orderBy('product.created_at', 'desc')
 ->select("product.*", "category.name as category_name", "brand.name as brand_name")
 ->get();
?>
<?php require_once "../views/backend/header.php";?>
<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
      <!-- CONTENT -->
      <form action="" method="post">
         <div class="content-wrapper">
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-12">
                        <h1 class="d-inline">Thùng rác sản phẩm</h1>
                     </div>
                  </div>
               </div>
            </section>
            <section class="content">
            <?php require_once "../views/backend/message.php"; ?>
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-6">
                        <a href="index.php?option=product">Tất Cả</a> |
                        <a href="index.php?option=product&cat=trash">Thùng rác</a>
                     </div>
                     <div class="col-md-6 text-right">
                        <a href="index.php?option=product" class="btn btn-sm btn-info">
                              <i class="fa fa-arrow-left" aria-hidden="true"></i>
                               Về sản phẩm
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
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th>Tên sản phẩm</th>
                                 <th>Tên thương hiệu</th>
                                 <th>Tên danh mục</th>
                                 <th>Tên slug</th>
                              </tr>
                           </thead>
                           <tbody>
                          <?php if(count($list) > 0) : ?>
                              <?php foreach($list as $item):?>
                              <tr class="datarow">  
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                 <img class="img-fluid" src="../public/images/product/<?=$item->image;?>" alt="<?=$item->image;?>">
                                 </td>
                                 <td>
                                    <div class="name">
                                      <?= $item->name ; ?> 
                                    </div>
                                    <div class="function_style">
                                       <a href="index.php?option=product&cat=restore&id=<?=$item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-undo"></i> Khôi Phục
                                       </a>
                                       <a href="index.php?option=product&cat=destroy&id=<?=$item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xoá Vĩnh Viễn
                                          
                                       </a>
                                    </div>
                                 </td>
                                 <td class="text-center"><?= $item->category_name; ?> </td>
                              <td class="text-center"><?= $item->brand_name; ?> </td>
                                 <td><?= $item->slug?></td>
                              </tr>
                              <?php endforeach;?>
                              <?php endif;?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            </section>
         </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>