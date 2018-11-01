<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:31 PM
 */
?>
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
