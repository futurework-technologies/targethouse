<?php //print_r($products); ?>
<?php
$url = $this->request->query('url');
if ($url == null) {
    throw new NotFoundException("Page not found...");
}
?>

                <div class="vc_col-sm-12 wpb_column vc_column_container">
                    <div class="wpb_wrapper">
                        <iframe onload="onIfrLoad()" style="width:100%;height:1000px;" src="http://targethouse.dk/ifr?url=<?php echo $url; ?>">
                        </iframe>
                    </div>
                 </div>
                <button id="next-step" value="submit" >   <?php echo __("Next")?><button>
                        
                       <script type="text/javascript">
                            var onIfrLoad = function() {
                                console.log("loaded...");
                                jQuery('#next-step').on("click", function() {
                                    var str = jQuery('iframe')[0].contentWindow.window.svgCanvas.svgCanvasToString();
                                    jQuery.post("<?php echo $this->Html->url('/inlineitems/productimgs/'.$this->request->query('url')); ?>", {"data": str}, function(d) {
                                       window.location = "<?php echo $this->Html->url('/inlineitems/productimg'); ?>";
                                    });

                                });
                            }
                        </script>

