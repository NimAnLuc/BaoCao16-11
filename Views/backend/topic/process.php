<?php

use App\Models\Topic;
use App\Libraries\MyClass;

if(isset($_POST['THEM'])){
    $topic= new Topic();
    $topic->name= $_POST ['name'];
    $topic->slug= (strlen($_POST['slug'])>0)? $_POST['slug']:MyClass :: str_slug($_POST['name']);
    $topic->metakey= $_POST ['metakey'];
    $topic->metadesc= $_POST ['metadesc'];
    $topic->status= $_POST ['status'];


    $topic->created_at= date('Y-m-d h:i:s');
    $topic->created_by= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    var_dump($topic);
    $topic->save();

    MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
    header("location:index.php?option=topic");
}   
if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $topic = topic::find($id);
    if ($topic == null) {
        MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
        header("location:index.php?option=topic");
    }
    $topic->name= $_POST ['name'];
    $topic->slug= (strlen($_POST['slug'])>0)? $_POST['slug']:MyClass :: str_slug($_POST['name']);
    $topic->metakey= $_POST ['metakey'];
    $topic->metadesc= $_POST ['metadesc'];
    $topic->status= $_POST ['status'];

    $topic->updated_at = date('Y-m-d h:i:s');
    $topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    var_dump($topic);
    $topic->save();
    MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
    header("location:index.php?option=topic");
}
