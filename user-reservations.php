<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reservation.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/travel.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Reservations</title>

    <?php
		require_once("classes/data_access.php");
		require_once("classes/reservation.php");
		require_once("classes/page_elements.php");
		DataAccess::CreateTables();
		session_start();
	?>
  </head>
  <body>
    <?php 

if(isset($_SESSION["user_id"])) {
    $fullname = $_SESSION["user_fname"] ." ". $_SESSION["user_lname"];
    $picture_url = $_SESSION["picture_url"];
    
    PageElements::get_header($fullname, $picture_url);
    
} else {
    header("Location: index.php");
}?>

    <section>
      <div class="container">
        <h1 class="title-1">My Reservations</h1>
        <hr />
        <div class="blurred-area">
        <?php echo Reservation::ShowReservations($_SESSION["user_id"]); ?>
        </div>
      </div>
    </section>
  </body>
</html>
