
<?php
$url = $this->request->query('url');
if ($url == null) {
    throw new NotFoundException("Page not found...");
}
?>
<div class="area vc_area clearfix  vc_custom_1407843918532   ">
    <div class="masking">
        <div class="container-fluid">
            <div class="row vc_row wpb_row vc_row-fluid">
                <div class="vc_col-sm-12 wpb_column vc_column_container">
                    <div class="wpb_wrapper">
                        <iframe style="width:100%;height:1000px; " src="http://fantazi.dk/future/svg?url=<?php echo $url; ?>">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

