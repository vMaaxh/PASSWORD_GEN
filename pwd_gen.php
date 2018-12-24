<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PASSWORD GENERATOR</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="page">
		<form method="post">
			<input type="submit" name="gen" id="gen" value="Generate">
			<input type="text" name="pwd" id="pwd" value="<?php pwd_gen(15); if(isset($_SESSION['pwd_gen'])){ echo $_SESSION['pwd_gen'];}?>">
		</form>
		<?php
			function pwd_gen($pwd_length)
			{
				$accept = 
				[
					["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"],
					["0","1","2","3","4","5","6","7","8","9"],
					["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"]
				];
				$pwd = "";
				$selectLine = 0;

				for($i=1; $i <= $pwd_length; $i++) 
				{
					$selectLine = mt_rand(0,count($accept)-1);
					if ($selectLine == 0)
					{
						$selectMaj = mt_rand(0, count($accept[0])-1);
						$pwd = $pwd.$accept[0][$selectMaj];
					}
					if ($selectLine == 1)
					{
						$selectNb = mt_rand(0, count($accept[1])-1);
						$pwd = $pwd.$accept[1][$selectNb];
					}
					if ($selectLine == 2) 
					{
						$selectMin = mt_rand(0, count($accept[2])-1);
						$pwd = $pwd.$accept[2][$selectMin];
					}
				}
				$_SESSION['pwd_gen'] = $pwd;
			}

		?>
	</div>
</body>
</html>
