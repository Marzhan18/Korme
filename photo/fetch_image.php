<?php

header("content-type:image/jpeg");

$host='localhost';
$user='root';
$pass=' ';

mysqli_connect($host, $user, $pass);

mysqli_select_db('demo');

$name=$_GET['name'];

$select_image="select * fromimage_table where imagename='$name'";

$var=mysql_query($select_image);

if($row=mysql_fetch_array($var))
{
 $image_name=$row["imagename"];
 $image_content=$row["imagecontent"];
}
echo $image;

?>