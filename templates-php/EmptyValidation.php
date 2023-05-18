<?php
function checkEmpty($list)
{
    foreach ($list as $i) {
        if (empty($i)) {
            return array_search($i, $list);
        }
    }
    return null;
}
?>