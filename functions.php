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
            <div class="content-wrapper">
                <h1>Alliance Gaming Merch</h1>
                <nav>
                    <a href="/htdocs/home.html">home</a>
                    <a href="/htdocs/aboutus.html">about us</a>
                    <a href="/htdocs/career.html">career</a>
                    <a href="/htdocs/history.html">history</a>
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
        <footer>
            <div class="content-wrapper">
                <p>$year, Alliance Gaming</p>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>