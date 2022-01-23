<?php
require_once 'process.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>HAKATON</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!--это мета тег для телефонов-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> <!--это сслыка на бутстарп-->
	<link rel="icon" type="image/x-icon" href="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/512x512/plain/knife_fork.png"> <!--favicon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--это для использования шрифта-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> <!--это для самого шрифта-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> <!--это для бутстрапа-->
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> <!--это для иконок-->
	<link href="style.css" rel="stylesheet"> <!--это для соединение css файла с этим-->
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<c05c8b0a-98e8-4c59-8224-8fe3d45f94a7>" type="text/javascript"></script>
    <script src="icon_customImage.js" type="text/javascript"></script>
	<style>
        #map {
            width: 100%; height: 100%; padding: 0; margin: 0;
        }
    </style>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container-fluid">
			<a href="#"><img class = "logo" src="https://images.pexels.com/photos/2922140/pexels-photo-2922140.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"></a>
			<style>
				.logo{
					   width: 70px;
					height: 60px;
					border-radius: 50%;
					cursor: pointer;	
					}
			</style>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span><!--font awesome впервые испольвазли здесь-->
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a href="#" class="nav-link" style="font-size: 20px;">Home</a>
					</li>
					<li class="nav-item active">
						<a href="#" class="nav-link" style="font-size: 20px;">About</a>
					</li>
					
				</ul>
			</div>
		</div>
	</nav>
    <div class="buttons" style=' float:right; width: 180px; margin-top: 10px;'>
		<div class="an">
			<div>
				<a class="btn btn-dark" href="anketa.php" style="width:150px; height:40px;">go to anketa</a>
			</div>
		   </div>
		</div>
	
	
<div id="mySidenav" class="sidenav">
	
<form class = "form-inline" action="process.php" method="POST" >
<input   class = "form-control" type="hidden" name="id" value="<?php echo  $_SESSION['id']?>">
<input class = "form-control" type="text" name="fname" value="<?php echo $_SESSION['fname']; ?>" placeholder="Surname">
<input class = "form-control" type="text" name="name" value="<?php echo $_SESSION['name']; ?>" placeholder="Name">
<input class = "form-control" type="text" name="otec"  value="<?php echo $_SESSION['otec']; ?>" placeholder="Batyaname">
<input class = "form-control" type="number" name="iin" value="<?php echo $_SESSION['iin']; ?>" placeholder="IIN">


<div class="form-group" style="margin-top:20px;">
<label for="exampleInputadress">Address</label>
<input class = "form-control" type="text" name="city" value="<?php echo $_SESSION['city']; ?>" placeholder="Город">
</div>
<div class = "form-group">
<input class = "form-control" type="text" name="street" value="<?php echo $_SESSION['street']; ?>" placeholder="Улица">
</div>
<div class = "form-group">
<input class = "form-control" type="text" name="hnum" value="<?php echo $_SESSION['hnum']; ?>" placeholder="Номер дома">
</div>
<div class = "form-group">
<input class = "form-control" type="text" name="nkv" value="<?php echo $_SESSION['nkv']; ?>" placeholder="Номер кв">
</div>



<div class = "form-group" style="margin-top: 20px;">
<label for="exampleInputadress">Dop info</label>
<input class = "form-control" type="text" name="knomer" value="<?php echo $_SESSION['knomer']; ?>" placeholder="Кадровый номер">
</div>
<div class = "form-group">
<input class = "form-control" type="text" name="plowad" value="<?php echo $_SESSION['plowad']; ?>" placeholder="Площадь">
</div>
<div class="form-group">
<input class = "form-control" type="text" style="width:300px; height:55px;" name="dop" value="<?php echo $dop; ?>" placeholder="Дополнительно">
</div>
<div class="form-group" style="margin-top: 20px;">
</div>

</div>

<div class="form-groupa">
	<style>
		.form-groupa{
			margin-left: 100px;
			
		}
	</style>
<?php
if ($update==true):
?>
	<button type="submit" name="update" class = "btn btn-primary">Update</button>
	<a href="hakaton.php?delete=<?php echo  $_SESSION['id'];?>" class = "btn btn-primary" >Delete</a>
	<?php
else: 
	?>
	<button type="submit" name="apply" class = "btn btn-primary">Apply</button>

<button type="submit" name="clean" class = "btn btn-primary">clean</button>
	<?php endif;

	?>
	</div>
</div>
</form>
<?php

?>
<div class="container">
	<style>
		.container {
		margin-top: 150px;
		margin-left: 500px;
		height: 450px;
	}
	</style>
<div id="map"></div>
</div>

<script type="text/javascript">
	ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
            center: [<?php echo $_SESSION['point'];?>],
            zoom: 18
        }, {
            searchControlProvider: 'yandex#search'
        }),

        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        ),

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: 'Собственный значок метки',
            balloonContent: 'Это красивая метка'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'images/myIcon.gif',
            // Размеры метки.
            iconImageSize: [30, 42],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-5, -38]
        }),

        myPlacemarkWithContent = new ymaps.Placemark([<?php echo $_SESSION['point'];?>], {
            hintContent: 'Собственный значок метки с контентом',
            balloonContent: 'А эта — новогодняя',
            iconContent: '12'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: 'images/ball.png',
            // Размеры метки.
            iconImageSize: [48, 48],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-24, -24],
            // Смещение слоя с содержимым относительно слоя с картинкой.
            iconContentOffset: [15, 15],
            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
        });

    myMap.geoObjects
        .add(myPlacemark)
        .add(myPlacemarkWithContent);
});
</script>
</body>
</html>