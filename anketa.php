</html>
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
</head>
<body>
<?php  require_once 'process.php';
$mysqli = new mysqli('localhost', 'root', '', 'hakaton') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM `date`") or die($mysqli->error);
?>
<div>	
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
				<a class="btn btn-dark" href="hakaton.php" style="width:150px; height:40px;">go to anketa</a>
			</div>
		   </div>
		</div>
<section id="rating" class="rating">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Kadastrovyi nomer</th>
                <th>Plowad</th>
                <th>Adress</th>
                
            </tr>
        </thead>
    
        <?php
    
    while ($row = $result->fetch_assoc()):?>
    <?php 
    
    
    
    ?>
        <tr><td><a href="hakaton.php?edit=<?php echo $row['id'];?>" ><?php echo $row['id']?></a></td>
            <td><a href="hakaton.php?edit=<?php echo $row['id'];?>" ><?php echo $row['fname']," ", $row['name']," ", $row['othestvo']?></a></td>
            <td><a href="hakaton.php?edit=<?php echo $row['id'];?>" ><?php echo $row['cadast']?></a></td>
            <td><a href="hakaton.php?edit=<?php echo $row['id'];?>" ><?php echo $row['area']?></a></td>
            <td><a href="hakaton.php?edit=<?php echo $row['id'];?>" ><?php echo $row['city']," ", $row['street']," ", $row['house']," ", $row['flat'] ?> </a></td>
            
            <td>
                
            </td>
        </tr>
    <?php endwhile; ?>
    
    <?php
    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
    ?>
  </section>
</body>
</html>