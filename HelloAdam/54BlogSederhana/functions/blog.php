<?php
function read_data(){
    global $link;
    $query = 'select * from blog';
    $hasil = mysqli_query($link, $query) or die(mysqli_error($link));
    return $hasil;
}

function view_data_per_id($id){
    global $link;
    $query = "select * from blog where id = '$id'";
    $hasil = mysqli_query($link, $query) or die(mysqli_error($link));
    return $hasil;
}

function add_data($judul, $isi, $tag){
    $judul = escape($judul);
    $isi = escape($isi);
    $tag = escape($tag);
    $query = "insert into blog(judul, isi, tag) values('$judul','$isi','$tag')";
    return run_query($query);
}

function edit_data($judul, $isi, $tag, $id){
    $judul = escape($judul);
    $isi = escape($isi);
    $tag = escape($tag);
    $query = "update blog set judul = '$judul', isi = '$isi', tag = '$tag' where id = '$id'";
    return run_query($query);
}

function delete_data($id){
    $query = "delete from blog where id = '$id'";
    return run_query($query);
}

function search_data($data){
    global $link, $start, $per_halaman;
    $data = escape($data);
    $query = "select * from blog where judul like '%$data%' limit $start,$per_halaman";
    $hasil = mysqli_query($link, $query) or die(mysqli_error($link));
    return $hasil;
}

function cek_status($user){
    global $link;
    $query = "select role from users where username = '$user'";
    $data = mysqli_query($link, $query);
    if (mysqli_fetch_assoc($data)['role'] == 1) return true;
    else return false;

}

function run_query($query){
    global $link;
    if (mysqli_query($link, $query)) return true;
    else return false;
}

function excerpt($string){
    $string = substr($string, 0, 15);
    return $string . '...';
}

function escape($data){
    global $link;
    return mysqli_real_escape_string($link, $data);
}