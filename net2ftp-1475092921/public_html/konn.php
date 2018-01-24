<?php
  error_reporting(E_WARNING);

  $mysql_host = "mysql.hostinger.co.uk";
  $mysql_database = "u649158088_sajt";
  $mysql_user = "u649158088_duca";
  $mysql_password = "safoart2016";

  /* Povezivanje na bazu - konekcija. */
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password);
  if (!$conn)
  {
    exit("Povezivnje na bazu nije uspelo: " . $conn);
  }

  //echo("Povezivanje na bazu je uspelo.");

  /* Odabir baze. */
  $res = mysqli_select_db($conn,$mysql_database);

  if (!$res)
  {
    exit("Nije moguce izabrati bazu");
  }
  
  mysqli_query($conn,"SET character_set_client = 'utf8'");
mysqli_query($conn,"SET character_set_connection = 'utf8'");
mysqli_query($conn,"SET character_set_results = 'utf8'");
mysqli_query($conn,"SET character_set_server = 'utf8'");

  /* Zatvaranje konekcije. */
/*   if (PMA_MYSQL_INT_VERSION >  50503) {
           $default_charset = 'utf8mb4';
           $default_collation = 'utf8mb4_general_ci';
       } else {
           $default_charset = 'utf8';
           $default_collation = 'utf8_general_ci';
       } */
// mysql_close($conn);
?>
