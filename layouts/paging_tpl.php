<?php

$utilites = new Utilities();
$urlNoLimit = $utilites->parse_url('&limit=', '&page=');

?>


<div>
    <ul class="pagination">
        <?php
        if ($data['totalRows'] >= 1) {
            for ($i = 1; $i <= $data['totalRows']; $i++) {
                $current = '';
                if (isset($_GET['page']) && intval($_GET['page']) == $i) {
                    $current = 'class="pagination-current"';
                }

                echo '<li>';
                $page_href = '<a href="' . $urlNoLimit . '&page=' . ($i) . '"' . $current . '>';

                if (isset($_GET['limit']) && intval($_GET['limit']) > 0) {
                    $newUrl = $urlNoLimit . '&page=' . $i . '' . '&limit=' . intval($_GET['limit']);
                    $page_href = '<a href="' . $newUrl . '". ' . $current . '>';
                }
                echo $page_href;
                echo($i + 0);
                echo '</a>';
                echo '</li>';
            }
        }
        ?>
    </ul>
</div>
<div>
    Work leave requests per page
    <select name="paging_limit" id="paging_limit">
        <?php
        for ($i = 1; $i <= PAGING_ITEMS; $i++) {
            $selected = '';
            if (isset($_GET['limit']) && intval($_GET['limit']) > 0) {
                if ($_GET['limit'] == $i) {
                    $selected = 'selected';
                }
            } else {
                if (PAGING == $i) {
                    $selected = 'selected';
                }
            }
            echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
        }
        ?>
    </select>
</div>


<?php
$pageNumber = '';
if (isset($_GET['page'])) {
    $pageNumber = '&page=' . $_GET['page'];
    //echo '<br> pageNumber = '.$pageNumber;
}
?>




