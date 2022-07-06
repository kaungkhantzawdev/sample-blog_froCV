    </div>


</div>
</section>

<script src="<?php echo $url;?>/assets/vendor/jquery-3.3.1.min.js"></script>
<script src="<?php echo $url;?>/assets/vendor/popper.js"></script>
<script src="<?php echo $url;?>/assets/vendor/bootstrap_5/js/bootstrap.bundle.js"></script>
<script src="<?php echo $url;?>/assets/vendor/way_point/jquery.waypoints.js"></script>
<script src="<?php echo $url;?>/assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url;?>/assets/vendor/chart_js/chart.min.js"></script>
<script src="<?php echo $url;?>/assets/css/datatable/datatable.js"></script>
<script src="<?php echo $url;?>/assets/css/datatable/datatableBootstrap5.js"></script>
<script src="<?php echo $url;?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url;?>/assets/vendor/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo $url;?>/assets/js/app.js"></script>


<script>
    $(document).ready(function() {
        $('#example').DataTable({
            'order':[[0,'desc']]
        });
        $('#summernote').summernote({
            height: 200,
            placeholder: 'Hello Human',
        });
    } );
</script>

    </body>
</html>