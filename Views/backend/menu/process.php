<?php

use App\Models\Menu;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Post;
use App\Libraries\MyClass;
?>

<?php
if (isset($_POST['THEMBRAND'])) {
    if (isset($_POST['brandId'])) {
        $listid = $_POST['brandId'];
        foreach ($listid as $id) {
            $brand = Brand::find($id);
            $menu = new Menu;
            $menu->name = $brand->name;
            $menu->link = 'index.php?option=brand&cat=' . $brand->slug;
            $menu->type = 'brand';
            $menu->table_id = $brand->id;
            $menu->sort_order = 1;
            $menu->status = 2;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }
        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    } else {
        MyClass::set_flash('message', ['msg' => 'Lỗi', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
}
if (isset($_POST['THEMTOPIC'])) {
    if (isset($_POST['topicId'])) {
        $listid = $_POST['topicId'];
        foreach ($listid as $id) {
            $topic = Topic::find($id);
            $menu = new Menu;
            $menu->name = $topic->name;
            $menu->link = 'index.php?option=topic&cat=' . $topic->slug;
            $menu->type = 'topic';
            $menu->table_id = $topic->id;
            $menu->sort_order = 1;
            $menu->status = 2;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }

        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    } else {

        MyClass::set_flash('message', ['msg' => 'Lỗi', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
}
if (isset($_POST['THEMCATEGORY'])) {
    if (isset($_POST['categoryId'])) {
        $listid = $_POST['categoryId'];
        foreach ($listid as $id) {
            $category = Category::find($id);
            $menu = new Menu;
            $menu->name = $category->name;
            $menu->link = 'index.php?option=product&cat=' . $category->slug;
            $menu->type = 'category';
            $menu->table_id = $category->id;
            $menu->sort_order = 1;
            $menu->status = 2;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }

        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    } else {

        MyClass::set_flash('message', ['msg' => 'Lỗi', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
}
if (isset($_POST['THEMPAGE'])) {
    if (isset($_POST['pageId'])) {
        $listid = $_POST['pageId'];
        foreach ($listid as $id) {
            $page = Post::find($id);
            $menu = new Menu;
            $menu->name = $page->title;
            $menu->link = 'index.php?option=page&cat=' . $page->slug;
            $menu->type = 'page';
            $menu->table_id = $page->id;
            $menu->sort_order = 1;
            $menu->status = 2;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }

        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    } else {

        MyClass::set_flash('message', ['msg' => 'Lỗi', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
}
if (isset($_POST['THEMCUSTOM'])) {
    if (strlen($_POST['name'])>0 &&strlen($_POST['link'])>0) {
        $menu = new Menu;
        $menu->name = $_POST['name'];
        $menu->link = $_POST['link'];
        $menu->type = 'customer';
        $menu->sort_order = 1;
        $menu->status = 2;
        $menu->position = $_POST['position'];
        $menu->parent_id = 0;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = 1;
        $menu->save();
        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    }
    else {

        MyClass::set_flash('message', ['msg' => 'Lỗi', 'type' => 'danger']);
        header("location:index.php?option=menu");}
}
if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $menu = Menu::find($id);
    if ($menu == null) {
        MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
    $menu->name= $_POST ['name'];
    $menu->link= $_POST ['link'];
    $menu->position= $_POST ['position'];
    $menu->parent_id= $_POST ['parent_id'];
    $menu->level= $_POST ['level'];
    $menu->status= $_POST ['status'];


    $menu->updated_at = date('Y-m-d h:i:s');
    $menu->updated_by = (isset($_SESSION['menu_id'])) ? $_SESSION['menu_id'] : 1;

    var_dump($menu);
    $menu->save();
    MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
    header("location:index.php?option=menu");
}
