<?php
use App\Libraries\MyClass;
use App\Models\Post;
$id=$_REQUEST['id'];
$post=Post::find($id);
if($post==null)
{    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=page");
}
use App\Models\topic;
$list_topic = topic::where('status','!=',0)->orderBy('created_at','DESC')
->get();
$topic_id_html='';
foreach($list_topic as $topic)
{
   $topic_id_html.="<option value='$topic->id'>$topic->name</option>";
}
?>

<?php require_once "../views/backend/header.php";?>
<form action="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chỉnh sửa Trang đơn</h1>
                  </div>
               </div>
            </div>
         </section>
         
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=page" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button class="btn btn-sm btn-success" type="sumbit" name="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="mb-3">
                        <input type="hidden" value="<?=$post->id;?>" name="id">
                        <input type="hidden" value="page" name="type">
                           <label>Tiêu đề bài viết (*)</label> 
                           <input type="text"  value="<?=$post->title;?>" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" value="<?=$post->slug;?>" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Chi tiết (*)</label>
                           <textarea name="detail" value="<?=$post->detail;?>"  rows="5" class="form-control"></textarea>
                        </div>
                     </div>
                     
                     <div class="col-md-3">
                        <div class="mb-3">
                           <label>Chủ đề (*)</label>
                           <select name="topic_id" class="form-control">
                              <option value="">None</option>
                              <?=$topic_id_html;?>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mô Tả</label>
                           <textarea name="description" value="<?=$post->description;?>" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" <?=($post->status==1)? 'select' :'';?>>Xuất bản</option>
                              <option value="2"<?=($post->status==2)? 'select' :'';?>>Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
  
      <?php require_once "../views/backend/footer.php";?>