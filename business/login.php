<?php
require('../datastore/User_ds.php');
require ('../datastore/db_connect.php');
$username = trim($_POST['username']);
$password = trim($_POST['password']);

$db = db_connect();
$user = new User_ds($db);

$userArr = $user->selectSingle($username);

if ($userArr[1] != $username or $userArr[4] != $password) {
			echo "<p>The username or password you have entered does not match our records, please return to the <a href='index.html'>login page</a> and try again.</p>";
			?>
			<script type="text/JavaScript">
			<!--
			setTimeout("location.href = 'index.html';",1600);
			-->
			</script>
			<?php
		}
		else {
			echo "<p>Success!</p>";
			switch ($userArr[5]) {
                case "1":
                    //Remove the under construction message once we have a functioning faculty landing page. 
					echo "The faculty landing page is under construction.";
					/* Uncomment the code below and change the location.href pointer when we have a working faculty landing page
					echo "We appreciate your patience while we log you in.";*/
                    ?>
                    <!--
					<script type="text/JavaScript">
					<!--
					setTimeout("location.href = 'http://www.kittenwar.com';",1600);
					</script>
                    -->
					<?php
					break;
				case "2":
					echo "We appreciate your patience while we log you in.";
					?>
					<script type="text/JavaScript">
					<!--
					setTimeout("location.href = '../admin.html';",1600);
					-->
					</script>
					<?php
					break;
                case "3":
                    //Remove the under construction message once we have a functioning WebAdmin landing page.
					echo "The WebAdmin landing page is under construction.";
					/* Uncomment the code below and change the location.href pointer when we have a working faculty landing page
					echo "We appreciate your patience while we log you in.";*/
                    ?>
                    <!--
					<script type="text/JavaScript">
					<!--
					setTimeout("location.href = 'http://www.staggeringbeauty.com';",1600);
					</script>
                    -->
					<?php
					break;
                case "4":
                    //Remove the under construction message once we have a functioning Executive landing page.
					echo "The Executive landing page is under construction.";
					/* Uncomment the code below and change the location.href pointer when we have a working faculty landing page
					echo "We appreciate your patience while we log you in.";*/
                    ?>
                    <!--
					<script type="text/JavaScript">
					<!--
					setTimeout("location.href = 'http://www.rrrgggbbb.com';",1600);
					</script>
                    -->
					<?php
					break;
			}
		}


?>