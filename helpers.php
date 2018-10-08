<?php
function redircet($thing){
   header("LOCATION:{$thing}");
   exit();
}