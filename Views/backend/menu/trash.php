<?php

use App\Models\Menu;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Post;

$list = Menu::where('status', '=', 0)->orderBy('created_at', 'DESC')
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<form action="index.php?option=menu&cat=process" method="post" enctype="multipart/form-data">
   <!-- CONTENT -->
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả menu</h1>
                  <div class="col-md-6">
                  <a class="btn btn-info btn xs" href="index.php?option=menu">Tất cả</a>
                     <a class="btn btn-danger btn xs" href="index.php?option=menu&cat=trash"><i class="fas fa-trash"></i>Thùng rác</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <?php require_once "../views/backend/message.php"; ?>
                  <div class="col-md-9">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox">
                              </th>
                              <th>Tên menu</th>
                              <th>Liên kết</th>
                              <th>Vị trí</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($list as $item) : ?>
                              <tr class="datarow">
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <div class="name">
                                       <?php echo $item->name; ?>
                                    </div>
                                    <div class="function_style">
                                    <a href="index.php?option=menu&cat=restore&id=<?=$item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-undo"></i> Khôi Phục
                                       </a>
                                       <a href="index.php?option=menu&cat=destroy&id=<?=$item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xoá Vĩnh Viễn
                                          
                                       </a>
                                    </div>
                                 </td>
                                 <td><?php echo $item->link; ?></td>
                                 <td><?php echo $item->position; ?></td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
   <!-- END CONTENT-->
   <?php require_once "../views/backend/footer.php"; ?>