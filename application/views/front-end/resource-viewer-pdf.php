<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 9/11/2018
 * Time: 11:14 PM
 */
if (isset($resource[0]['ResourcePath'])) {
    echo '<embed src="'.base_url().'ResourceFiles/'.$resource[0]['ResourcePath'].'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="100%" />';
} else {
    echo '<div> No Data Found.</div>';
}
?>