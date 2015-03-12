
<div class="main_container">
    <div class="history">
        <div class="container">

            <div class="row">
                    <div  style="border: 2px solid #ec6707;" class="col-lg-6">
                        
                       <div style="margin-top: 20px;" class="div_left left_reseller">
        <div style="position: relative; float: left; width: 200px;">
            <img height="200" width="180px" alt="" src="<?php echo $this->Html->url('/img/d.jpeg'); ?>">
        </div>
        <div style="position: relative; float: left; width: 295px;">
            <h3><?php echo ($products['Map']['title']); ?></h3>
            <table>
                <tbody><tr><td colspan="2"><?php echo __("Fantazi.dk")?></td></tr>
                <tr><td colspan="2"></td></tr>
                <tr><td colspan="2"> </td></tr>
                <tr><td><?php echo __("Tlf:")?></td><td><?php echo ($products['Map']['contactno']); ?></td></tr>
                <tr><td><?php echo __("Mobil:")?></td><td><?php echo ($products['Map']['mobno']); ?></td></tr>
                                <tr><td><?php echo __("Email:")?></td><td><a href="mailto:info@taeppemand.dk"><?php echo ($products['Map']['email']); ?></a></td></tr>
                <tr><td colspan="2"><a href="www.taeppemand.dk"><?php echo __("www.fantazi.dk")?></a></td></tr>
            </tbody></table>
        </div>
        <div style="clear: both; width: 480px; padding-left: 20px; border-top: 2px solid #ed1c24">
            <h3><?php echo __("Kontakt denne forhandler eller taeppemand.dk")?></h3>
              <?php echo $this->Form->create('Map',array('url'=>'/maps/partnerform/'.$id));?>
                <table border="0">
                    <tbody><tr><td><label for="name"><?php echo __("Navn")?></label></td><td><input type="text" name="data[Map][name]" class="text" size="53" id="name"></td></tr>
                        &nbsp;
                    <tr><td><label for="email"><?php echo __("Email")?></label></td><td><input type="text" name="data[Map][email]" class="text" size="53" id="email" ></td></tr>
                    <tr><td><label for="subject"><?php echo __("Subject")?></label></td><td><input type="text" name="data[Map][subject]" class="text" size="53" id="subject"></td></tr>
                    <tr><td style="vertical-align: top;"><label for="message"><?php echo __("Message")?></label></td><td><textarea rows="3" id="message" name="data[Map][message]"></textarea></td>
                    <tr><td style="text-align: right;" colspan="2"><input type="reset" class="button" value="Tøm felter">&nbsp;&nbsp;<input type="submit" class="button" value="sumit">
                           </td></tr>
                </tbody></table>
            </form>
            <?php echo $this->Form->end();?>
        </div>
    </div> 
                        
                        
                        
                    </div>
                        
                    <div  style="border: 2px solid #ec6707;margin-left: 20px;height:700px;" class="col-lg-5">
                        <div style="margin-top: 20px;" class="div_right right_reseller">
        <div style="height: 80px;">
          
            <p><?php echo __(" Fantazi.dk er et landsdækkende samarbejde mellem selvstændige fra den grafisk branche.")?></p>
<?php echo __("F@NTAZI ØSTFYN")?></br>
<?php echo __("Fantazi.dk")?></br>
<?php echo __("Tld. 2634 3546")?></br>

<p><?php echo __("Kontakt denne partner eller fantazi.dk
Find din lokale partner
Hold blot musen over dit lokale område
Bliv partner i f@ntazi.
F@ntazi konceptet tager udgangspunkt i det positive ved netværk, kædesamarbejde, individuel idekraft og det globale billede.")?></p></br>

<p><?php echo __("Vi søger partnere til distrikter i hele Danmark. Vi søger, at stille et fodboldhold, hvor teamwork er forudsætningen der giver den enkelte frihed til at udvikle sit individuelle talent.")?></P></br>

<p><?php echo __("Vi søger partner der kan samarbejde med hinanden, uden at F@ntazi.dk skal involvere sig - se det er rigtigt nerværks samarbejde.")?></p></br>

<p><?php echo __("Har du noget at byde ind med, kontakt venligst ")?></p>
<?php echo __("René Jensen")?></br>
<?php echo __("Tel. 2634 3546")?> </br>
</p></div>
        <div style="height: 180px;"></div>
    </div>
                    </div>
           </div>
       </div>
   </div>
</div>