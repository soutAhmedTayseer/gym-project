<?php
$interval = date_diff(date_create(), date_create('2002-11-25'));
echo $interval->format("You are %Y Year, %M Months, %d Days Old");
?>