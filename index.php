<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Kalkulator kredytowy</title>
	</head>
	<body>
		<?php
			require_once 'libs/Smarty.class.php';
			require_once dirname(__FILE__)."/config.php";
			session_start();
			$_SESSION['role'] = 'admin';
			$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

			//sprawdzenie czy wymagane jest logowanie
			if ( empty($role) ){
				include $conf->root_path.'/login/login.php';
				exit();
			}

			$smarty = new Smarty();

            $smarty -> display('app/calc.tpl');
		?>
	</body>
</html>