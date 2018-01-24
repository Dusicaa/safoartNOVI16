<?php
/*ZA FORMU**/
session_start();

function lista_dan($d)
{
$rezultat = "";
for($i=1; $i<=31; $i++)
{
$rezultat .= ($i == $d) ? "<option value='".$i."' selected>".$i."</option>" : "<option value='".$i."'>".$i."</option>";
}
return $rezultat;
}
function lista_mesec($m)
{
$rezultat = "";
$meseci = array( 1 => "Jan",
2 => "Feb",
3 => "Mar",
4 => "Apr",
5 => "May",
6 => "Jun",
7 => "Jul",
8 => "Avg",
9 => "Sep",
10 => "Oct",
11 => "Nov",
12 => "Dec"
);
foreach($meseci as $k => $v)
{
$rezultat .= ($k == $m) ? "<option value='".$k."' selected>".$v."</option>" : "<option value='".$k."'>".$v."</option>";
}
return $rezultat;
}
function lista_godina($g)
{
$rezultat = "";
for($i=1970; $i<=2015; $i++)
{
$rezultat .= ($i==$g) ? "<option value='".$i."' selected>".$i."</option>" : "<option value='".$i."'>".$i."</option>";
}
return $rezultat;
}
function izbor_pol($p)
{
$rezultat = "";
if($p == "M")
$rezultat = "<option value='M' selected>Male</option><option value='F' >Female</option>";
else
$rezultat = "<option value='M' >Male</option><option value='F' selected>Female</option>";
return $rezultat;
}




?>