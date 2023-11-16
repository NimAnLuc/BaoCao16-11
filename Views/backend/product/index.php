<?php
use App\Models\Product;

$listid = Product::join('category', 'product.category_id', '=','category.id')
 ->join('brand', 'product.brand_id', '=','brand.id')
 ->where('product.status', '!=', 0)
 ->orderBy('product.created_at', 'desc')
 ->select("product.*", "category.name as category_name", "brand.name as brand_name")
 ->get();

?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action="" method="post">
         <div class="content-wrapper">
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả sản phẩm</h1>
                        <a href="index.php?option=product&cat=create"  class="btn btn-sm btn-primary">Thêm sản phẩm</a>
                        <div class="col-md-6">
                        <a class="btn btn-info btn xs" href="index.php?option=product">Tất cả</a>
                     <a class="btn btn-danger btn xs" href="index.php?option=product&cat=trash"><i class="fas fa-trash"></i>Thùng rác</a>
                  </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
            <?php require_once "../views/backend/message.php"; ?>
               <div class="card">
                  <div class="card-header">
                     <select name="" id="" class="form-control d-inline" style="width:100px;">
                        <option value="">Xoá</option>
                     </select>
                     <button class="btn btn-sm btn-success">Áp dụng</button>
                  </div>
                  <div class="card-body">
                     <table class="table table-bordered" id="mytable">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox">
                              </th>
                              <th class="text-center" style="width:130px;">Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th>Tên danh mục</th>
                              <th>Tên thương hiệu</th>
                              <th>Số lượng</th>
                              <th>Giá bán</th>
                              <th>Giá sale</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php if (count($listid)>0):?>
                              <?php foreach($listid as $item) : ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td>
                                 <img class="img-fluid" src="../public/images/product/<?=$item->image;?>" alt="<?=$item->image;?>">
                              </td>
                              <td>
                                 <div class="name">
                                 <?=$item->name; ?>
                                 </div>
                                 <div class="function_style">
                                       <?php if($item->status==1):?>
                                          <a class="btn btn-success btn xs" href="index.php?option=product&cat=status&id=<?php echo $item->id;?>">
                                          <i class="fas fa-toggle-on"></i>Hiện</1a> |
                                       <?php else:?>
                                          <a class="btn btn-danger btn xs"href="index.php?option=product&cat=status&id=<?php echo $item->id;?>">
                                          <i class="fas fa-toggle-off"></i>Ẩn</a> |
                                       <?php endif;?>
                                       <a class="btn btn-primary btn xs" href="index.php?option=product&cat=edit&id=<?php echo $item->id; ?>">
                                       <i class="fas fa-edit"></i>Chỉnh sửa

                                       </a> |   
                                       <a class="btn btn-info btn xs"   href="index.php?option=product&cat=show&id=<?php echo $item->id; ?>">
                                       <i class="fas fa-eye"></i>Chi tiết</a> |
                                       <a class="btn btn-danger btn xs" href="index.php?option=product&cat=delete&id=<?php echo $item->id; ?>">
                                       <i class="fas fa-trash"></i>Xoá</a>
                                    </div>
                              </td>
                              <td class="text-center"><?= $item->category_name; ?> </td>
                              <td class="text-center"><?= $item->brand_name; ?> </td>
                              <td><?=$item->qty?></td>
                              <td><?=$item->price?></td>
                              <td><?=$item->pricesale?></td>
                           </tr>
                           <?php endforeach; ?>
                              <?php endif;?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </section>
         </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>