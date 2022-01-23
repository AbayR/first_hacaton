<?php 
session_start();
$mysqli = new mysqli('localhost', 'root','','hakaton') or die(mysqli_error($mysqli));

$update = false;
$name = '';
$id='';
	$fname = '';
	$otec = '';
	$iin ='';
	$city = '';
	$street = '';
	$hnum = '';
	$nkv = '';
	$knomer = '';
	$plowad = '';






if(isset($_POST['applymap'])){

	$city = $_POST['city'];
	$street = $_POST['street'];
	$hnum = $_POST['hnum'];
	$nkv = $_POST['nkv'];
	$knomer = $_POST['knomer'];
	$address = $city." , ".$street." , ".$hnum;
		$_SESSION['city'] = $city;
$_SESSION['street'] = $street;
$_SESSION['hnum'] = $hnum;
$_SESSION['nkv'] = $nkv;
$_SESSION['knomer'] = $knomer;
	$ch = curl_init('https://geocode-maps.yandex.ru/1.x/?apikey=c05c8b0a-98e8-4c59-8224-8fe3d45f94a7&format=json&geocode=' . urlencode($address));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);
 
$res = json_decode($res, true);
$coordinates = $res['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];
$coordinates = explode(' ', $coordinates);
$point=$coordinates[1].",".$coordinates[0];
$_SESSION['point'] = $point;
 header("Location: hakaton.php ");
}





if(isset($_POST['cleanmap'])){
	$city = '';
	$street = '';
	$hnum = '';
	$nkv = '';
	$knomer = '';
	$_SESSION['city'] = $city;
$_SESSION['street'] = $street;
$_SESSION['hnum'] = $hnum;
$_SESSION['nkv'] = $nkv;
$_SESSION['knomer'] = $knomer;
 header("Location: hakaton.php ");
}






if(isset($_POST['apply'])){
$id = $_POST['id'];
$fname = $_POST['fname'];
	$name = $_POST['name'];
	
	$otec = $_POST['otec'];
	$iin = $_POST['iin'];
	$city = $_POST['city'];
	$street = $_POST['street'];
	$hnum = $_POST['hnum'];
	$nkv = $_POST['nkv'];
	$knomer = $_POST['knomer'];
	$plowad = $_POST['plowad'];
	$address = $city." , ".$street." , ".$hnum;
 
$_SESSION['name'] = $name;
$_SESSION['fname'] = $fname; 
$_SESSION['otec'] = $otec;
$_SESSION['city'] = $city;
$_SESSION['iin'] = $iin;
$_SESSION['street'] = $street;
$_SESSION['hnum'] = $hnum;
$_SESSION['nkv'] = $nkv;
$_SESSION['knomer'] = $knomer;
$_SESSION['plowad'] = $plowad;
$ch = curl_init('https://geocode-maps.yandex.ru/1.x/?apikey=c05c8b0a-98e8-4c59-8224-8fe3d45f94a7&format=json&geocode=' . urlencode($address));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);
 
$res = json_decode($res, true);
$coordinates = $res['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];
$coordinates = explode(' ', $coordinates);
$point=$coordinates[1].",".$coordinates[0];
$_SESSION['point'] = $point;

	$mysqli->query("INSERT INTO `date` (`id`, `fname`, `name`, `othestvo`, `iin`, `city`, `street`, `house`, `flat`, `cadast`, `area`, `dop`,`coord`) VALUES (NULL, '$fname', '$name', '$otec', '$iin', '$city', '$street', '$hnum', '$nkv', '$knomer', '$plowad', '','$point')") or die($mysqli->error);
 header("Location: hakaton.php ");
	
}






if(isset($_POST['clean'])){
	$name = '';
	$fname = '';
	$otec = '';
	$iin ='';
	$city = '';
	$street = '';
	$hnum = '';
	$nkv = '';
	$knomer = '';
	$plowad = '';
	$_SESSION['name'] = $name;
$_SESSION['fname'] = $fname; 
$_SESSION['otec'] = $otec;
$_SESSION['city'] = $city;
$_SESSION['iin'] = $iin;
$_SESSION['street'] = $street;
$_SESSION['hnum'] = $hnum;
$_SESSION['nkv'] = $nkv;
$_SESSION['knomer'] = $knomer;
$_SESSION['plowad'] = $plowad;

 header("Location: hakaton.php ");
}




if(isset($_GET['edit'])){
    $id = $_GET['edit'];	
    $_SESSION['id'] = $id;
    $result=$mysqli->query("SELECT * FROM `date` WHERE `id`=$id") or die($mysqli->error());

   	
    	$row = $result->fetch_array();
    	$name = $row['name'];
	$fname = $row['fname'];
	$otec = $row['othestvo'];
	$iin = $row['iin'];
	$city = $row['city'];
	$street = $row['street'];
	$hnum = $row['house'];
	$nkv = $row['flat'];
	$knomer = $row['cadast'];
	$plowad = $row['area'];
   $update=true;

$point=$row['coord'];
$_SESSION['name'] = $name;
$_SESSION['fname'] = $fname; 
$_SESSION['otec'] = $otec;
$_SESSION['city'] = $city;
$_SESSION['iin'] = $iin;
$_SESSION['street'] = $street;
$_SESSION['hnum'] = $hnum;
$_SESSION['nkv'] = $nkv;
$_SESSION['knomer'] = $knomer;
$_SESSION['plowad'] = $plowad;
$_SESSION['point'] = $point;
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    	$name = $_POST['name'];
	$fname = $_POST['fname'];
	$otec = $_POST['otec'];
	$iin = $_POST['iin'];
	$city = $_POST['city'];
	$street = $_POST['street'];
	$hnum = $_POST['hnum'];
	$nkv = $_POST['nkv'];
	$knomer = $_POST['knomer'];
	$plowad = $_POST['plowad'];
		$address = $city." , ".$street." , ".$hnum;
 $point=$row['coord'];
$_SESSION['name'] = $name;
$_SESSION['fname'] = $fname; 
$_SESSION['otec'] = $otec;
$_SESSION['city'] = $city;
$_SESSION['iin'] = $iin;
$_SESSION['street'] = $street;
$_SESSION['hnum'] = $hnum;
$_SESSION['nkv'] = $nkv;
$_SESSION['knomer'] = $knomer;
$_SESSION['plowad'] = $plowad;
$_SESSION['point'] = $point;
$ch = curl_init('https://geocode-maps.yandex.ru/1.x/?apikey=c05c8b0a-98e8-4c59-8224-8fe3d45f94a7&format=json&geocode=' . urlencode($address));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);
 
$res = json_decode($res, true);
$coordinates = $res['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];
$coordinates = explode(' ', $coordinates);
$point=$coordinates[1].",".$coordinates[0];
$_SESSION['point'] = $point;

$mysqli->query("UPDATE `date` SET fname = '$fname', name='$name', othestvo='$otec', iin='$iin', city='$city', street='$street', house='$hnum', flat='$nkv', cadast='$knomer', area='$plowad', dop='',coord='$point' WHERE `date`.`id`=$id") or die($mysqli->error);

 header("Location: hakaton.php ");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $result=$mysqli->query("SELECT * FROM `date` WHERE `id`=$id") ;

   	
    	$row = $result->fetch_array();
    	$name = $row['name'];
	$fname = $row['fname'];
	$otec = $row['othestvo'];
	$iin = $row['iin'];
	$city = $row['city'];
	$street = $row['street'];
	$hnum = $row['house'];
	$nkv = $row['flat'];
	$knomer = $row['cadast'];
	$plowad = $row['area'];
	$point = $row['coord'];

$mysqli->query("INSERT INTO `deleted` (`iddeleted`,`id`, `fname`, `name`, `otchestvo`, `iin`, `city`, `street`, `house`, `flat`, `cadast`, `area`, `dop`,`coord`) VALUES (NULL,'$id', '$fname', '$name', '$otec', '$iin', '$city', '$street', '$hnum', '$nkv', '$knomer', '$plowad', '','$point')") or die($mysqli->error);




    $mysqli->query("DELETE FROM date WHERE id=$id") or die($mysqli->error());
   	$name = '';
	$fname = '';
	$otec = '';
	$iin ='';
	$city = '';
	$street = '';
	$hnum = '';
	$nkv = '';
	$knomer = '';
	$plowad = '';
	$_SESSION['name'] = $name;
$_SESSION['fname'] = $fname; 
$_SESSION['otec'] = $otec;
$_SESSION['city'] = $city;
$_SESSION['iin'] = $iin;
$_SESSION['street'] = $street;
$_SESSION['hnum'] = $hnum;
$_SESSION['nkv'] = $nkv;
$_SESSION['knomer'] = $knomer;
$_SESSION['plowad'] = $plowad;

 header("Location: hakaton.php ");
}




?>


