<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:31 PM
 */
?>
<!-- bottom quote section -->
<div class="bottom-quote-section container home-bottom-quote-section">
    <div class="row">
        <div class="col-md-4 col-12 quote">
            <img src="<?php echo base_url().'application/views/';?>images/do-not-use.jpg" alt="">
        </div>
        <div class="col-md-4 col-12 quote">
            <img src="<?php echo base_url().'application/views/';?>images/visitor.jpg" alt="">
            <div class="visitor">
                <p>visitor</p>
                <p class="visitor-count"></p>
            </div>
        </div>
        <div class="col-md-4 col-12 quote">
            <img src="<?php echo base_url().'application/views/';?>images/do-not-use.jpg" alt="">
        </div>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="container d-flex justify-content-between align-items-center footer-wrapper">
        <p>© 2018 - MiMS Bangladesh</p>
        <div class="footer-logo logo-middle">
            <a href="<?php echo site_url()?>"><img id="footerLogo" src="<?php echo base_url().'application/views/';?>images/green-logo.png" alt=""></a>
        </div>
        <p>Design & Development by <a href="https://studiomaqs.com/index.html" target="_blank"><img class="dev-logo" src="<?php echo base_url().'application/views/';?>images/logo/studiomaqs_logo.svg"></a></p>
    </div>
</footer>

<script src="<?php echo base_url().'application/views/js/imageviewer.min.js';?>"></script>
<script src="<?php echo base_url().'application/views/js/ui.js';?>"></script>
<script>
    frontendCommonMethods.incrementVisitorCount();
    frontendCommonMethods.getNumberOfVisitor();
</script>
</body>

</html>
