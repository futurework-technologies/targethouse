<?php //print_r($products); ?>
<?php
$url = $this->request->query('url');
if ($url == null) {
    throw new NotFoundException("Page not found...");
}
?>
<div class="area vc_area clearfix  vc_custom_1407843918532   ">
    <div class="masking">
        <div class="container-fluid">
                <div class="vc_col-sm-12 wpb_column vc_column_container">
                    <div class="wpb_wrapper">
                        <iframe onload="onIfrLoad()" style="width:100%;height:1000px;" src="http://www.targethouse.dk/designyourself?url=<?php echo $url; ?>">
                        </iframe>
                    </div>
                 </div>
                <button id="next-step" value="submit" >Next<button>
                       </div>
    </div>
</div>
                        <script type="text/javascript">
                            var onIfrLoad = function() {
                                console.log("loaded...");
                                jQuery('#next-step').on("click", function() {
                                    var str = jQuery('iframe')[0].contentWindow.window.svgCanvas.svgCanvasToString();
                                    jQuery.post("<?php echo $this->Html->url('/inlineitems/productsvg/'.$this->request->query('url')); ?>", {"data": str}, function(d) {
                                        if(d.error == 0){
                                            window.location = "<?php echo $this->Html->url('/inlineitems/productsvg/'); ?>" + d.id;
                                        }else{
                                            console.log(d);
                                        }

                                    });

                                });
                            }
                        </script>

