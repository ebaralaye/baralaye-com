<div class="page-body social stacked">
  <section class="social-media">
    <h1>Social</h1>
    <a href="http://facebook.com/baralaye" target="_blank">Facebook</a>
    <a href="http://twitter.com/baralaye" target="_blank">Twitter</a>
    <a href="http://instagram.com/baralaye" target="_blank">Instagram</a>
    <!--<a href="http://linkedin.com/in/baralaye" target="_blank">LinkedIn</a>-->
    <!--<a href="http://pinterest.com/baralaye" target="_blank">Pinterest</a>-->
    <!--<a href="http://baralaye.tumblr.com" target="_blank">Tumblr</a>-->
    <!--<a href="https://plus.google.com/112097083655390633396/about" target="_blank">Google+</a>-->
    <!--<a href="http://www.flickr.com/photos/baralaye/" target="_blank">Flickr</a>-->
    <!--<a href="http://www.youtube.com/user/baralaye/videos?flow=grid&amp;view=1" target="_blank">YouTube</a>-->
  </section>
  <section id="contact" class="contact">
    <h1>Contact</h1>
    <form id="contact-form" class="form-container form-row" action="/contact" method="post" data-success="<?php var_export($form_success) ?>">
      <div class="form-group">
        <p>info&#64;baralaye&#46;com / 646&#46;301&#46;6311</p>
      </div>
      <div class="row">
        <div class="form-group col-sm-5 col-xs-12 <?php if(! empty($form_errors['email'])){echo 'has-error';} ?>">
          <label class="control-label" for="email">Email Address <span class="asterisk">*</span></label>
          <input name="email" id="email" class="form-control required" type="text" value="<?php echo $form_values['email'] ?>" placeholder="Email Address *">
        </div>
        <div class="form-group col-sm-3 col-xs-6">
          <label class="control-label" for="first_name">First Name</label>
          <input name="first_name" id="first_name" class="form-control" type="text" value="<?php echo $form_values['first_name'] ?>" placeholder="First Name">
        </div>
        <div class="form-group col-sm-4 col-xs-6">
          <label class="control-label" for="last_name">Last Name</label>
          <input name="last_name" id="last_name" class="form-control" type="text" value="<?php echo $form_values['last_name'] ?>" placeholder="Last Name">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-xs-12 <?php if(! empty($form_errors['message'])){echo 'has-error';} ?>">
          <label class="control-label" for="message">Message <span class="asterisk">*</span></label>
          <textarea name="message" id="message" class="form-control required" rows="6" placeholder="Message *"><?php echo $form_values['message'] ?></textarea>
        </div>
      </div>
      <div class="form-captcha">
        <input type="text" name="captcha" id="captcha" tabindex="-1" value="" placeholder="address">
      </div>
      <div class="form-responses">
        <?php foreach($form_errors as $error): ?>
          <div class="response error"><?= $error ?></div>
        <?php endforeach; ?>
      </div>
      <div class="form-footer">
        <input type="submit" value="Submit" name="submit" class="btn submit">
      </div>
    </form>
    <div id="contact-form-success-modal" class="modal" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xs">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h2>Message Submitted.</h2>
          </div>
          <div class="modal-body">
            <p>Thank you. I will follow up with you shortly.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="mailing-list" class="mailing-list">
    <h1>Mailing List</h1>
    <!-- Begin MailChimp Signup Form -->
    <div id="mc_embed_signup">
      <form class="form-container form-row" action="http://baralaye.us3.list-manage.com/subscribe/post?u=0497c3e7f0db060ff7eae50ba&amp;id=7522fe55b6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div class="row">
          <div class="form-group mc-field-group col-xs-12 col-sm-4">
            <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label>
            <input name="EMAIL" id="mce-EMAIL" class="form-control required" type="email" value="" placeholder="Email Address *">
          </div>
          <div class="form-group mc-field-group col-xs-6 col-sm-4">
            <label for="mce-FNAME">First Name </label>
            <input name="FNAME"id="mce-FNAME" class="form-control" type="text" value="" placeholder="First Name">
          </div>
          <div class="form-group mc-field-group col-xs-6 col-sm-4">
            <label for="mce-LNAME">Last Name </label>
            <input name="LNAME" id="mce-LNAME" class="form-control" type="text" value="" placeholder="Last Name">
          </div>
        </div>
        <div id="mce-responses" class="form-responses">
          <div class="response error" id="mce-error-response" style="display:none"></div>
          <div class="response error" id="mce-success-response" style="display:none"></div>
        </div>
        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div class="form-captcha"><input type="text" name="b_0497c3e7f0db060ff7eae50ba_7522fe55b6" tabindex="-1" value=""></div>
        <div class="form-footer">
          <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn submit">
        </div>
      </form>
    </div>
    <script type="text/javascript">
    var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='radio';
    try {
        var jqueryLoaded=jQuery;
        jqueryLoaded=true;
    } catch(err) {
        var jqueryLoaded=false;
    }
    var head= document.getElementsByTagName('head')[0];
    if (!jqueryLoaded) {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = '//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
        head.appendChild(script);
        if (script.readyState && script.onload!==null){
            script.onreadystatechange= function () {
                  if (this.readyState == 'complete') mce_preload_check();
            }    
        }
    }

    var err_style = '';
    try{
        err_style = mc_custom_error_style;
    } catch(e){
        err_style = '#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}';
    }
    var head= document.getElementsByTagName('head')[0];
    var style= document.createElement('style');
    style.type= 'text/css';
    if (style.styleSheet) {
      style.styleSheet.cssText = err_style;
    } else {
      style.appendChild(document.createTextNode(err_style));
    }
    head.appendChild(style);
    setTimeout('mce_preload_check();', 250);

    var mce_preload_checks = 0;
    function mce_preload_check(){
        if (mce_preload_checks>40) return;
        mce_preload_checks++;
        try {
            var jqueryLoaded=jQuery;
        } catch(err) {
            setTimeout('mce_preload_check();', 250);
            return;
        }
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
        head.appendChild(script);
        try {
            var validatorLoaded=jQuery("#fake-form").validate({});
        } catch(err) {
            setTimeout('mce_preload_check();', 250);
            return;
        }
        mce_init_form();
    }
    function mce_init_form(){
        jQuery(document).ready( function($) {
          var options = { errorClass: 'mce_inline_error', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
          var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
          $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
          options = { url: 'http://baralaye.us3.list-manage.com/subscribe/post-json?u=0497c3e7f0db060ff7eae50ba&id=7522fe55b6&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                        beforeSubmit: function(){
                            $('#mce_tmp_error_msg').remove();
                            $('.datefield','#mc_embed_signup').each(
                                function(){
                                    var txt = 'filled';
                                    var fields = new Array();
                                    var i = 0;
                                    $(':text', this).each(
                                        function(){
                                            fields[i] = this;
                                            i++;
                                        });
                                    $(':hidden', this).each(
                                        function(){
                                            var bday = false;
                                            if (fields.length == 2){
                                                bday = true;
                                                fields[2] = {'value':1970};//trick birthdays into having years
                                            }
                                          if ( fields[0].value=='MM' && fields[1].value=='DD' && (fields[2].value=='YYYY' || (bday && fields[2].value==1970) ) ){
                                            this.value = '';
                          } else if ( fields[0].value=='' && fields[1].value=='' && (fields[2].value=='' || (bday && fields[2].value==1970) ) ){
                                            this.value = '';
                          } else {
                              if (/\[day\]/.test(fields[0].name)){
                                                  this.value = fields[1].value+'/'+fields[0].value+'/'+fields[2].value;									        
                              } else {
                                                  this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
                                              }
                                          }
                                        });
                                });
                            $('.phonefield-us','#mc_embed_signup').each(
                                function(){
                                    var fields = new Array();
                                    var i = 0;
                                    $(':text', this).each(
                                        function(){
                                            fields[i] = this;
                                            i++;
                                        });
                                    $(':hidden', this).each(
                                        function(){
                                            if ( fields[0].value.length != 3 || fields[1].value.length!=3 || fields[2].value.length!=4 ){
                                            this.value = '';
                          } else {
                              this.value = 'filled';
                                          }
                                        });
                                });
                            return mce_validator.form();
                        }, 
                        success: mce_success_cb
                    };
          $('#mc-embedded-subscribe-form').ajaxForm(options);
        });
    }
    function mce_success_cb(resp){
        $('#mce-success-response').hide();
        $('#mce-error-response').hide();
        if (resp.result=="success"){
            $('#mce-'+resp.result+'-response').show();
            $('#mce-'+resp.result+'-response').html(resp.msg);
            $('#mc-embedded-subscribe-form').each(function(){
                this.reset();
          });
        } else {
            var index = -1;
            var msg;
            try {
                var parts = resp.msg.split(' - ',2);
                if (parts[1]==undefined){
                    msg = resp.msg;
                } else {
                    i = parseInt(parts[0]);
                    if (i.toString() == parts[0]){
                        index = parts[0];
                        msg = parts[1];
                    } else {
                        index = -1;
                        msg = resp.msg;
                    }
                }
            } catch(e){
                index = -1;
                msg = resp.msg;
            }
            try{
                if (index== -1){
                    $('#mce-'+resp.result+'-response').show();
                    $('#mce-'+resp.result+'-response').html(msg);            
                } else {
                    err_id = 'mce_tmp_error_msg';
                    html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';
                    var input_id = '#mc_embed_signup';
                    var f = $(input_id);
                    if (ftypes[index]=='address'){
                        input_id = '#mce-'+fnames[index]+'-addr1';
                        f = $(input_id).parent().parent().get(0);
                    } else if (ftypes[index]=='date'){
                        input_id = '#mce-'+fnames[index]+'-month';
                        f = $(input_id).parent().parent().get(0);
                    } else {
                        input_id = '#mce-'+fnames[index];
                        f = $().parent(input_id).get(0);
                    }
                    if (f){
                        $(f).append(html);
                        $(input_id).focus();
                    } else {
                        $('#mce-'+resp.result+'-response').show();
                        $('#mce-'+resp.result+'-response').html(msg);
                    }
                }
            } catch(e){
                $('#mce-'+resp.result+'-response').show();
                $('#mce-'+resp.result+'-response').html(msg);
            }
        }
    }
    </script>
    <!--End mc_embed_signup-->
  </section>
  <section id="media">
    <h1>Media</h1>
    <ul id="set_72157628627505367" class="item-list photoset"></ul>
  </section>
<!--
  <section id="studio">
    <h1>Studio</h1>
    <ul id="set_72157628626470369" class="item-list photoset"></ul>
  </section>
  <section id="video">
    <h1>Video</h1>
    <ul class="item-list">
      <li>
      <h4 class="name">GICBiennale</h4>
      <div class="image"><a href="http://www.youtube.com/watch?v=NUAmSSlfIPI?fs=1&amp;autoplay=1" class="ltbx video" title="GICBiennale Interview"><img src="http://img.youtube.com/vi/NUAmSSlfIPI/0.jpg" alt="GICBiennale Interview" /></a></div>
      </li>
      <li>
      <h4 class="name">Mischmasch</h4>
      <div class="image"><a href="http://www.youtube.com/watch?v=uN2_5NUURUk?fs=1&amp;autoplay=1" class="ltbx video" title="Mischmasch Interview"><img alt="" src="http://img.youtube.com/vi/uN2_5NUURUk/0.jpg" /></a></div>
      </li>
      <li>
      <h4 class="name">EFA OS 2011</h4>
      <div class="image"><a href="http://www.youtube.com/watch?v=YcRFceZvjHM?fs=1&amp;autoplay=1" class="ltbx video" title="Elizabeth Foundation Open Studio 2011"><img alt="" src="http://img.youtube.com/vi/YcRFceZvjHM/0.jpg" /></a></div>
      </li>
    </ul>
  </section>
-->
  <section id="artists">
    <h1>Artists</h1>
    <ul class="list inline">
      <li>Justin Yuen</li>
      <li><a target="_blank" href="http://ruhwald.net">Anders Ruhwald</a></li>
      <li><a target="_blank" href="http://dannielletegeder.com">Dannielle Tegeder</a></li>
      <li><a target="_blank" href="http://www.davidandrewfrey.com">David Andrew Frey</a></li>
      <li><a target="_blank" href="http://www.morganohara.com">Morgan O'Hara</a></li>
      <li><a target="_blank" href="http://www.michaeleade.com">Michael Eade</a></li>
      <li><a target="_blank" href="http://joemadrigal.com">Joseph Madrigal</a></li>
      <li><a target="_blank" href="http://www.hongseonjang.com">Hong Seon Jang</a></li>
      <li><a target="_blank" href="http://www.noahklersfeld.com">Noah Klersfeld</a></li>
      <li><a target="_blank" href="http://chrisandersonart.com">Chris Anderson</a></li>
      <li><a target="_blank" href="http://davidchang.4ormat.com">David Chang</a></li>
      <li><a target="_blank" href="http://www.robcolvin.com">Rob Colvin</a></li>
      <li><a target="_blank" href="http://www.walkerfee.com">Walker Fee</a></li>
      <li><a target="_blank" href="http://www.brianfee.net">Brian Fee</a></li>
      <li><a target="_blank" href="http://www.mariafee.net">Maria Fee</a></li>
      <li><a target="_blank" href="http://www.jameshallmusic.com">James Hall</a></li>
      <li><a target="_blank" href="http://anthonytaddeo.com">Anthony Taddeo</a></li>
      <li>Jaekyung Jung</li>
      <li>Peter Demek</li>
      <li><a target="_blank" href="http://suprina-sculpture.com">Suprina Kenney</a></li>
      <li><a target="_blank" href="http://www.susanspringeranderson.com">Susan Springer Anderson</a></li>
      <li><a target="_blank" href="http://jannadyk.tumblr.com">Janna Dyk</a></li>
      <li><a target="_blank" href="http://charisjcarmichaelbraun.tumblr.com">Charis Carmichael Braun</a></li>
      <li><a target="_blank" href="http://evanread.net">Evan Read</a></li>
      <li><a target="_blank" href="http://www.fitzhughkarol.com">Fitzhugh Karol</a></li>
      <li><a target="_blank" href="http://www.kristinemorich.com">Kristine Morich</a></li>
      <li><a target="_blank" href="http://gorrem.blogspot.com">Devon Cady-Lee</a></li>
      <li><a target="_blank" href="http://christiantonsgard.com">Chris Tonsgard</a></li>
      <li><a target="_blank" href="http://mboroniec.com">Michael Boroniec</a></li>
      <li><a target="_blank" href="http://www.thenevicaproject.com/Gallery%20Artist/Artist/gallery_artist_Rochefort.htm">Brian Rochefort</a></li>
      <li><a target="_blank" href="http://www.jacksonharris.co.uk">Rodney Harris</a></li>
      <li><a target="_blank" href="http://www.aribrice.com">Ariel Brice</a></li>
      <li><a target="_blank" href="http://www.drawnassociation.net">Drawn Association</a></li>
      <li><a target="_blank" href="http://leonidaschalepas.com">Leonidas Chalepas</a></li>
      <li>Judith Weller</li>
      <li><a target="_blank" href="http://www.eliotlable.com">Eliot Lable</a></li>
      <li><a target="_blank" href="http://www.chieshimizu.com">Chie Shimizu</a></li>
      <li><a target="_blank" href="http://www.sculpturesnyc.com">Glenn Marlowe</a></li>
      <li><a target="_blank" href="http://alexandramartin.com">Alexandra Martin</a></li>
      <li><a target="_blank" href="http://anniepatt.com">Annie Patt</a></li>
      <li><a target="_blank" href="http://necmimurat.com">Necmi Murat</a></li>
      <li><a target="_blank" href="http://sauliussiuksta.tumblr.com">Saulius Siuksta</a></li>
      <li><a target="_blank" href="http://www.erintreacy.com">Erin Treacy</a></li>
      <li><a target="_blank" href="http://acrstudio.com">Andrew Cornell Robinson</a></li>
      <li><a target="_blank" href="http://www.victoriafebrer.com">Victoria Febrer</a></li>
      <li><a target="_blank" href="http://deanhamerly.com">Dean Hammerly</a></li>
      <li><a target="_blank" href="http://brucedehnert.blogspot.com">Bruce Dehnert</a></li>
      <li>Denise Pelletier</li>
      <li><a target="_blank" href="http://www.jeffshapiroceramics.com">Jeff Shapiro</a></li>
      <li><a target="_blank" href="http://stellarunion.com">Stellar Union</a></li>
      <li><a target="_blank" href="http://steveforster.net">Steve Forster</a></li>
      <li><a target="_blank" href="http://www.janiceahn.com">Janice Ahn</a></li>
      <li><a target="_blank" href="http://www.nathanhuang.com">Nathan Huang</a></li>
    </ul>
  </section>
  <section>
    <h1>Organizations</h1>
    <ul class="list inline">
      <li><a target="_blank" href="http://www.nyfa.org" title="NYFA">New York Foundation for the Arts</a></li>
      <li><a target="_blank" href="http://www.efanyc.org" title="EFA">Elizabeth Foundation for the Arts</a></li>
      <li><a target="_blank" href="http://www.internationalartsmovement.org" title="IAM">International Arts Movement</a></li>
      <li><a target="_blank" href="http://iccc.heartshome.org" title="ICCC">International Center for a Culture of Compassion</a></li>
      <li><a target="_blank" href="http://www.sculpture.org" title="ISC">International Sculpture Center</a></li>
      <li><a target="_blank" href="http://lmcc.net" title="LMCC">Lower Manhattan Cultural Council</a></li>
      <li><a target="_blank" href="http://cranbrookart.edu" title="CAA">Cranbrook Academy of Art</a></li>
      <li><a target="_blank" href="http://risd.edu" title="RISD">Rhode Island School of Design</a></li>
      <li><a target="_blank" href="http://www.queenscouncilarts.org" title="QCA">Queens Council on the Arts</a></li>
      <li><a target="_blank" href="http://artmgt.com">ArtMgt</a></li>
      <li><a target="_blank" href="http://www.socratessculpturepark.org">Socrates Sculpture Park</a></li>
      <li><a target="_blank" href="http://www.sculpture-center.org">Sculpture Center</a></li>
      <li><a target="_blank" href="http://www.licartists.org">Long Island City Artists</a></li>
      <li><a target="_blank" href="http://www.licarts.org" title="LICCA">Long Island City Cultural Alliance</a></li>
      <li><a target="_blank" href="http://www.faithandwork.org">Center for Faith &amp; Work</a></li>
      <li><a target="_blank" href="http://churchandart.org">Church &amp; Art Network</a></li>
      <li><a target="_blank" href="http://www.sparkandecho.org">Spark &amp; Echo</a></li>
      <li><a target="_blank" href="http://www.nationalsculpture.org">National Sculpture Society</a></li>
      <li><a target="_blank" href="http://sharpeartfdn.qwestoffice.net">The Marie Walsh Sharpe Art Foundation</a></li>
      <li><a target="_blank" href="http://www.alliedartistsofamerica.org">Allied Artists of America</a></li>
      <li><a target="_blank" href="http://www.artistsfellowship.org">Artists Fellowship</a></li>
      <li><a target="_blank" href="http://www.salmagundi.org">Salmagundi Club</a></li>
      <li><a target="_blank" href="http://www.nationalartsclub.org">National Arts Club</a></li>
    </ul>
  </section>
</div>
