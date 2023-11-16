<?php
use App\Models\Menu;
use App\Models\category;
use App\Libraries\MyClass;

$list_menu = Menu::where([['table_id','=',$id],['type','=','category']])->get();
if (isset($_POST['THEM'])) {
    $category=new Category();
    //lấy từ form
    $category->name = $_POST['name'];
    $category->slug =(strlen($_POST['slug'])>0) ? $_POST['slug']: MyClass::str_slug($_POST['name']);
    $category->description = $_POST['description'];
    $category->status = $_POST['status'];
     //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/category/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$category->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $category->image =$filename;
        }
    }
    //tư sinh ra
    $category->created_at = date('Y-m-d H:i:s');
    $category->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($category);
    //luu vao csdl
    //ínet
    $category->save();
    
    MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
    header("location:index.php?option=category");
}

if (isset($_POST['CAPNHAT'])) {
    $id=$_POST['id'];
    $category= Category::find($id);
    if($category==null)
    {
        MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
        header("location:index.php?option=category");
    }
    $category->name= $_POST ['name'];
    $category->slug= (strlen($_POST['slug'])>0)? $_POST['slug']:MyClass :: str_slug($_POST['name']);
    $category->description= $_POST ['description'];
    $category->status= $_POST ['status'];



    if(strlen($_FILES['image']['name'])>0)
    {
        $target_dir = "../public/images/category/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$category->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $category->image =$filename;
        }
    }

    $category->updated_at= date('Y-m-d h:i:s');
    $category->updated_by= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    var_dump($category);
    if ($category->save()) {
        if (count($list_menu) > 0) {
            foreach ($list_menu as $menu) {
                $menu->save();
            }
        }
        MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
        header("location:index.php?option=category");
    }
}
