<?php
use App\Models\Contact;
$list = Contact::where('status','!=',0)->orderBy('created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả liên hệ</h1>
                  </div>
                  <div class="col-md-6">
                  <a class="btn btn-info btn xs" href="index.php?option=contact">Tất cả</a>
                     <a class="btn btn-danger btn xs" href="index.php?option=contact&cat=trash"><i class="fas fa-trash"></i>Thùng rác</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
         <?php require_once "../views/backend/message.php"; ?>
            <div class="card">
               <div class="card-header text-right">
                  Noi dung
               </div>
               <div class="card-body">
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th>Họ tên</th>
                           <th>Điện thoại</th>
                           <th>Email</th>
                           <th>Tiêu đề</th>
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
                                       <?php if($item->status==1):?>
                                          <a class="btn btn-success btn xs" href="index.php?option=contact&cat=status&id=<?php echo $item->id; ?>Views/backend/contact/index.php">
                                          <i class="fas fa-toggle-on"></i>Hiện</a> |
                                       <?php else:?>
                                          <a class="btn btn-danger btn xs"href="index.php?option=contact&cat=status&id=<?php echo $item->id; ?>">
                                          <i class="fas fa-toggle-off"></i>Ẩn</a> |
                                       <?php endif;?>
                                       <a class="btn btn-primary btn xs" href="index.php?option=contact&cat=edit&id=<?php echo $item->id; ?>">
                                       <i class="fas fa-edit"></i>Chỉnh sửa

                                       </a> |   
                                       <a class="btn btn-info btn xs"   href="index.php?option=contact&cat=show&id=<?php echo $item->id; ?>">
                                       <i class="fas fa-eye"></i>Chi tiết</a> |
                                       <a class="btn btn-danger btn xs" href="index.php?option=contact&cat=delete&id=<?php echo $item->id; ?>">
                                       <i class="fas fa-trash"></i>Xoá</a>
                                    </div>
                           </td>
                           <td> <?php echo $item->phone; ?></td>
                           <td> <?php echo $item->email; ?></td>
                           <td> <?php echo $item->title; ?></td>
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