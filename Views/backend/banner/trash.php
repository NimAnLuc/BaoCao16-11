<?php
use App\Models\Banner;
$args=[
   ['status','=',0],
];
$list = Banner::where($args)->orderBy('created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thùng rác banner</h1>
                     <a href="index.php?option=banner" class="btn btn-sm btn-primary">Về danh sách</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  Noi dung
               </div>
               <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th>Tên banner</th>
                           <th>Liên kết</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php foreach($list as $item) : ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <div class="name">
                              <?php echo $item->name; ?>
                              </div>
                                    <div class="function_style">
                                       <a href="index.php?option=banner&cat=restore&id=<?=$item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-undo"></i> Khôi Phục
                                       </a>
                                       <a href="index.php?option=banner&cat=destroy&id=<?=$item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xoá Vĩnh Viễn
                                       </a>
                                    </div>
                           </td>
                           <td>lien-ket</td>
                        </tr>
                        <?php endforeach;?>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>   