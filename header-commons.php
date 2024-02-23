<link rel="shortcut icon" href="favicon.png" />

<script>
  function myNav() {
    var x = document.getElementById("myTopnav");
    if (x.className === "nav") {
      x.className += " responsive";
    } else {
      x.className = "nav";
    }
  }

  function closeNav() {
    var x = document.getElementById("myTopnav");
    if (x.className.includes("responsive")) {
      x.className = "nav";
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

// $ip_addr = getUserIP();
// $page_uri = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// $data = $ip_addr . '|' . date("Y-m-d H:i:s") . '|' . $page_uri . '' . PHP_EOL;
// $file = fopen('vis_log.txt', 'a+');
// fwrite($file, $data);
// fclose($file);
?>