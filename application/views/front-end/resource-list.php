<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/18/2018
 * Time: 9:55 PM
 */
?>
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="add-inner-page-left-523x52">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-14.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="add-inner-page-right-523x52">
                    <a href=""><img src="<?php echo base_url().'application/views/';?>img/img-15.png" alt="" class="img-fluid"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="search-bar" style="border: none;margin-bottom: 0;padding-top: 0;">Resources</div>
                <div class="product-details" style="border: 0;padding-left: 0;">
                    <?php
                    foreach ($AllResources As $resource) {
                        echo '<div><a target="_blank" href="'.site_url('Resource/getResourceDetail').'?ResourceID='.$resource['ID'].'">'.$resource['Title'].'</a> </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
