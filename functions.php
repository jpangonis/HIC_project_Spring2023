<?php
function pdo_connect_mysql() {
    // connection variables
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'merch_inventory';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// Error Handling
    	exit('Failed to connect to database!');
    }
}

function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="stylepage.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div id="header-content">
                <div class="icon lnr lnr-heart">
			        <img src="logo1.png" height = 100% border-radius= 50px>
		        </div> 
                
                <nav class="toplinks">
                    <a href="/home.html">home</a>
                    <a href="/aboutus.html">about us</a>
                    <a href="/career.html">career</a>
                    <a href="/history.html">history</a>
                    <a href="index.php">merch store</a>
                    <a href="index.php?page=products">products</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i>
					</a>
                </div>
            </div>
        </header>
        <main>
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <br>
        <br>
        <hr>
        <footer id="footer">
	<div class="container">
		<div class="top">
			<div class="left">
				<dl>
					<dt class="t-gradient"> Welcome </dt>
					<dd><a href= "home.html"> Home </a></dd>
					<dd><a href= "about.html"> About </a></dd>
					<dd><a href= "history.html"> History </a></dd>
					<dd><a href= "career.html"> Careers </a></dd>
				</dl>
				<dl>
					<dt class="t-gradient"> Resources </dt>
					<dd><a href= "store.html"> Merch Store </a></dd>
					<dd><a href= "contactus.html"> Contact Us </a></dd>
					<dd><a href= "teams.html"> Teams </a></dd>
					<dd><a href= "projects.html"> Projects </a></dd>

				</dl>
				<dl>
					<dt class="t-gradient" style="background: white"> ~ </dt>
					<dd><a href= " ">  </a></dd>
					<dd><a href= " "> </a></dd>
					<dd><a href= " ">  </a></dd>
					<dd><a href= " "> Privacy Policy </a></dd>
				</dl>
			</div>
		</div>
		<div class="bottom">
			<div class="left">
				© 2012–2019 Alliance Gaming all rights reserved.
			</div>
		</div>
	</div>
</footer>
    </body>
</html>
EOT;
}


function template_headerproduct($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="stylepage.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div id="header-content">
                <div class="icon lnr lnr-heart">
			        <img src="logo1.png" height = 100% border-radius= 50px>
		        </div> 
                
                <nav class="toplinks">
                    <a href="/home.html">home</a>
                    <a href="/aboutus.html">about us</a>
                    <a href="/career.html">career</a>
                    <a href="/history.html">history</a>
                    <a href="index.php">merch store</a>
                    <a href="index.php?page=products">products</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i>
					</a>
                </div>
            </div>
        </header>
EOT;
}
?>