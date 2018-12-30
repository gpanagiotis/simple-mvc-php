<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<!-- Latest compiled and minified Locales wenzhixin -->
<!--<script src="--><?php //echo URL_PATH; ?><!--/node_modules/bootstrap-table/dist/bootstrap-table.min.js"></script>-->
<script src="<?php echo URL_PATH; ?>/node_modules/bootstrap-table/src/bootstrap-table.js"></script>


<!-- Latest compiled and minified Locales wenzhixin -->
<script src="<?php echo URL_PATH; ?>/node_modules/bootstrap-table/dist/locale/bootstrap-table-el-GR.min.js"></script>
<!-- Date Time Picker -->
<script type="text/javascript" src="<?php echo URL_PATH; ?>/bower_components/moment/min/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?php echo URL_PATH; ?>/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script>
    $(document).ready(function () {
        $("#paging_limit").change(function () {
            var htmlString = "<?php //echo $urlNoLimit; ?>";
            //console.log(htmlString);
            //window.alert(htmlString);
            //window.location = '<?php //echo $urlNoLimit . '&page=1' ?>&limit='+$('#paging_limit').val();
        });
    });
</script>