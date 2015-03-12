

<div class="main_container">
    <div class="container">
        <div class="toppro_menu">
            <ul>      
                <li><a href="#">Home</a><i class="fa fa-angle-right"></i></li>
                <li><a href="#">Design</a><i class="fa fa-angle-right"></i></li>
                <li><a href="#">Checkout</a></li>
            </ul>
        </div>

        <div class="cart">
            <div class="table-responsive">
                <table class="table" width="100%">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Unitprice</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ko foreach: items -->
                        <tr>
                            <td><img data-bind="attr:{'src':'<?php echo $this->Html->url('/');?>/'+Product().image} " src="img/cart1.jpg" alt=""></td>
                            <td data-bind="text:Product().Consumer_price ">195.00 DKK</td>
                            <td><div class="center">
                                    <div class="input-group">

                                        <input type="number" max="10" min="1" data-bind="value:qty" class="form-control input-number" name="quant[1]">

                                    </div>
                                </div>
                            </td>
                            <td data-bind="text: subtotal">$390.00</td>
                            <td><a data-bind="click:$root.removeLine" href="#"><i class="fa fa-remove"></i>Remove</a></td>
                        </tr>	

                        <!-- /ko -->


                        <tr class="rendom">
                            <td colspan="9">Redeem voucher code</td>
                        </tr>	           
                        <tr>
                            <td>Indtast kode: </td>
                            <td><input name="" data-bind="value:couponCode" type="text"></td>
                            <td><div class="add">
                                    <span data-bind="text:codeMsg"></span>
                                    <a data-bind="visible:codeLoading, click:getCode " href="#">Apply</a></div></td>
                            <td></td>
                            <td colspan="5"></td>
                        </tr>		
                        <tr class="rendom">
                            <td>Shipping</td>
                            <td colspan="7">Time</td>
                            <td>Price</td>
                        </tr>		
                        <tr>
                            <td>Post Denmark</td>
                            <td colspan="7">2-5 working days depending on the product</td>
                            <td data-bind="text:shipping">22.00 DKK</td>
                        </tr>			
                        <tr class="total_price">
                            <td colspan="7"></td>
                            <td>Sub Total</td>
                            <td data-bind="text:grandTotal">0.00</td>
                        </tr>		
                        <tr class="total_price">
                            <td colspan="7"></td>
                            <td>Discount</td>
                            <td data-bind="text:discountAm">-0</td>
                        </tr>			
                        <tr class="total_price">
                            <td colspan="7"></td>
                            <td>vat</td>
                            <td>0.00</td>
                        </tr>			
                        <tr class="total_price">
                            <td colspan="7"></td>
                            <td>Grand Total </td>
                            <td data-bind="text:FinalCost" class="total">1090.00</td>
                        </tr>				                                                                                                                                                                                  
                    </tbody>
                </table>
                <div class="cart_next">
                    <span><p> <a href="/new">Continue shopping</a></p></span>
                    <a href="javascript:void(0)"><span class="chk">Checkout</span></a>
                </div>
            </div>
        </div>
    </div>  	
</div>


<?php
echo $this->Html->script(array(
    '//cdnjs.cloudflare.com/ajax/libs/knockout/3.2.0/knockout-min.js',
    '//cdnjs.cloudflare.com/ajax/libs/knockout.mapping/2.4.1/knockout.mapping.js'
));
?>
<script type="text/javascript">
    var $Order = <?php echo json_encode($order['Order']); ?>;
    var $Items = <?php echo json_encode($order['Inlineitem']); ?>;
    var CartLine = function(p) {
        var self = this;
        self.p_id = ko.observable(parseInt(p.id));
        self.Product = ko.observable(p);
        self.qty = ko.observable(p.quantity);
        self.subtotal = ko.pureComputed(function() {
            var c1 = self.Product() ? self.Product().Consumer_price * parseInt("0" + self.qty(), 10) : 0;
            return c1;
        });
        self.qty.subscribe(function() {
            try {
                $Items /*localStorage.shp_cart*/ = ko.mapping.toJSON(cartObj.items);
                console.log('Updated...');
            } catch (e) {
            }
        });
    };

    var Cart = function() {
        // Stores an array of items, and from these, can work out the grandTotal
        var self = this;
        self.shipping = ko.observable(0);
        self.order = 
        self.items = ko.observableArray([]); // Put one line in by default
        self.items.subscribe(function() {
            try {
                /* localStorage.shp_cart */ $Items = ko.mapping.toJSON(cartObj.items);
                console.log('Root Updated...');
            } catch (e) {
            }
        });
        self.grandTotal = ko.pureComputed(function() {
            var total = 0;
            $.each(self.items(), function() {
                total += this.subtotal()
            })
            return total;
        });
        self.FinalCost = ko.pureComputed(function() {
            var price = self.grandTotal() + self.shipping();
            var c2 = self.grandTotal() + self.shipping();
            var v2 = eval(self.codeValue());
            var c3 = c2-v2;
            self.discountAm(c3.toFixed(2));
            return v2.toFixed(2);
        });

        // Operations
        self.addLine = function() {
            self.items.push(new CartLine())
        };
        self.removeLine = function(line) {
            $.post("<?php echo $this->Html->url("/inlineitems/removeitem/");?>"+line.p_id(),function(){
                self.items.remove(line);
            });
            
        };
        self.save = function() {
        };
        self.checkout = function() {
            $('#element_to_pop_up').bPopup();
        };
        self.codeLoading = ko.observable(true);
        self.couponCode = ko.observable('');
        self.codeMsg = ko.observable('');
        self.codeValue = ko.observable('price');
        self.discountAm = ko.observable('');
        self.getCode = function(){
            self.codeLoading(false);
            $.post("<?php echo $this->Html->url('/Coupans/get');?>",{code:self.couponCode()},function(d){
                self.codeLoading(true);
                if(d.count == 0){
                    self.codeMsg(d.data);
                    return;
                }
                self.codeMsg(d.data.Coupan.msg);
                self.codeValue(d.data.Coupan.value);
                
            });
        }
        
        
        self.init = function() {
            var d2 = $Items;//JSON.parse(localStorage.shp_cart);
            for (i in d2) {
                self.items.push(new CartLine(d2[i]));
            }
        };
        self.init();
    };

//    var d = <?php echo json_encode($products); ?>;
//    var d2 = JSON.parse(localStorage.shp_cart);
    var cartObj = new Cart();
    ko.applyBindings(cartObj);
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.chk').on("click",function(){
            var v=$('.total').html();
           localStorage.setItem("price",v);
           var price=localStorage.getItem("price");
   window.location.href="<?php echo $this->Html->url('/orders/checkout');?>";
        });
    });
</script>



