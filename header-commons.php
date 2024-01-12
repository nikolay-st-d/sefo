<link rel="shortcut icon" href="favicon.png" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200;300;400;600;800&display=swap"
  rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css">

<script>
  function myNav() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

  function closeNav() {
    var x = document.getElementById("myTopnav");
    if (x.className.includes("responsive")) {
      x.className = "topnav";
    }
  }
</script>

<?php
function getUserIP()
{
  $client = @$_SERVER['HTTP_CLIENT_IP'];
  $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
  $remote = $_SERVER['REMOTE_ADDR'];
  if (filter_var($client, FILTER_VALIDATE_IP)) {
    $ip = $client;
  } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
    $ip = $forward;
  } else {
    $ip = $remote;
  }
  return $ip;
}

// IP logger
$ip_addr = getUserIP();
$page_uri = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$page_uri = "$_SERVER[REQUEST_URI]";
$data = $ip_addr . '|' . date("Y-m-d H:i:s") . '|' . $page_uri . '' . PHP_EOL;
$file = fopen('vis_log.txt', 'a+');
fwrite($file, $data);
fclose($file);
?>