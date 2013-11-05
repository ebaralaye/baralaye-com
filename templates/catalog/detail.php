<div class="shop-product-large">
    <div class="details">
    <h1 class="name"><?php echo $name; ?></h1>
        <ul>
            <li class="specs">
                <ul>
                    <li class="medium">Medium: {tag_custom1}</li>
                    <li class="dimensions">Dimensions (inches): {tag_custom2}</li>
                    <li class="weight">Weight: <span>{tag_custom3}</span> lbs</li>
                    <li class="year">Year: {tag_custom4}</li>
                    <li class="edition">Edition: <span>{tag_maxunits}</span></li>
                    <li class="price">Price: <a class="ltbx win" href="#purchase-inquiry">{tag_saleprice}</a></li>
                    <li class="code">Code: {tag_productcode}</li>
                    <li class="stock d-n">{tag_instock}</li>
                    <li class="type d-n">{tag_unittype}</li>
                </ul>
            </li>
            <li class="social">
                <ul class="social-btns">
                    <li class="btn-s purchase"><a href="#purchase-inquiry" class="ltbx win">Buy</a></li>
                    <li class="btn-s comment"><a href="#comment-form" class="ltbx win">Comment</a></li>
                    <li class="pin"><a href="//www.pinterest.com/pin/create/button/?url=http://baralaye.com{tag_itemurl_nolink}&media=http://baralaye.com{tag_largeimage_path}&description=Ebitenyefa%20Baralaye%20-%20{tag_title}" data-pin-do="buttonPin" data-pin-config="none"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a></li>
                    <li class="tweet"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none" data-via="baralaye">Tweet</a>
                    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                    </li>
                    <li class="like last">
                    <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
                    <fb:like send="false" layout="button_count" width="75" show_faces="false"></fb:like>
                    </li>
                    <li class="c-z"></li>
                </ul>
            </li>
            <li class="description">{tag_description}</li>
            <li class="comments">{module_ratingfeedback,date}</li>
        </ul>
    </div>
<div class="images"> <span id="zoom-var">zoom-1</span>
<div class="main">{tag_largeimage}</div>
<!--<ul id="set_{tag_productcode}" class="poplets"></ul>-->
<div class="poplets">{tag_poplets,5,75,75}</div>
</div>
<div class="d-n">
<div id="purchase-inquiry" class="section price-request">
<h3>Purchase Inquiry</h3>
<div class="hr"></div>
<form class="price-request" name="catwebformform98689" method="post" onsubmit="return checkWholeForm98689(this)" enctype="multipart/form-data" action="/FormProcessv2.aspx?WebFormID=36505&amp;OID={module_oid}&amp;OTYPE={module_otype}&amp;EID={module_eid}&amp;CID={module_cid}&amp;OPTIN=true">
    <ul class="field-list s100">
        <li class="s1of2">
        <label for="CAT_Custom_182241">Artwork Code</label>
        <input type="text" maxlength="1024" name="CAT_Custom_182241" id="CAT_Custom_182241" class="cat_textbox" value="{tag_productcode}" />
        </li>
        <li class="s1of2">
        <label for="FullName">Your Name</label>
        <input type="text" name="FullName" id="FullName" maxlength="255" />
        </li>
        <li class="s1of2">
        <label for="EmailAddress">Email</label><span class="sup">Join mailing list?
        <input name="CampaignList_22986" class="checkbox" type="checkbox" value="on" />
        </span>
        <input type="text" name="EmailAddress" id="EmailAddress" maxlength="255" />
        </li>
        <li class="s1of2">
        <label for="HomePhone">Phone</label>
        <input type="text" name="HomePhone" id="HomePhone" maxlength="255" />
        </li>
        <li class="s1of1 inline">
        <label>Preferred contact method</label>
        <input checked="checked" type="checkbox" name="CAT_Custom_182245" id="CAT_Custom_182245_0" value="email" />
        email
        &nbsp; &nbsp;
        <input type="checkbox" name="CAT_Custom_182245" id="CAT_Custom_182245_1" value="phone" />
        phone </li>
        <li class="s1of1">
        <label for="CAT_Custom_182240">Comments</label>
        <textarea name="CAT_Custom_182240" id="CAT_Custom_182240" cols="10" rows="2" onkeydown="if(this.value.length&gt;=1024)this.value=this.value.substring(0,1023);"></textarea>
        </li>
        <li class="s1of2 captcha">
        <label>Enter Word Verification</label>
        {module_captchav2,White,SlateGray}<br class="c-z" />
        </li>
        <li class="s1of2">
        <label>&nbsp;</label>
        <input class="btn f-r" type="submit" value="Submit" id="catwebformbutton" />
        </li>
        <li class="c-z"></li>
    </ul>
    <script type="text/javascript" src="/CatalystScripts/ValidationFunctions.js"></script>
    <script type="text/javascript">
//<![CDATA[
var submitcount98689 = 0;function checkWholeForm98689(theForm){var why = "";if (theForm.FirstName) why += isEmpty(theForm.FirstName.value, "First Name");if (theForm.LastName) why += isEmpty(theForm.LastName.value, "Last Name"); if (theForm.EmailAddress) why += checkEmail(theForm.EmailAddress.value); if (theForm.CaptchaV2) why += captchaIsInvalid(theForm, "Enter Word Verification in box below", "Please enter the correct Word Verification as seen in the image"); if(why != ""){alert(why);return false;}if(submitcount98689 == 0){submitcount98689++;theForm.submit();return false;}else{alert("Form submission is in progress.");return false;}}
//]]>
</script>
</form>
</div>
<div id="comment-form" class="section comment-form">
<h3>Comment</h3>
<div class="hr"></div>
<form class="comment-form" name="catratingform2343" onsubmit="return checkWholeForm2343(this)" method="post" action="/RatingProcess.aspx?OID={module_oid}&amp;OTYPE={module_otype}">
    <ul class="field-list">
        <li class="s1of2">
        <label>Name</label>
        <input class="cat_textbox_small" type="text" name="FullName" maxlength="255" />
        </li>
        <li class="s1of2 d-n">
        <label>Website</label>
        <input class="cat_textbox_small" type="text" name="Website" maxlength="255" />
        </li>
        <li class="s1of2">
        <label>Email</label><span class="sup">Join mailing list?
        <input name="CampaignList_22986" class="checkbox" type="checkbox" value="on" />
        </span>
        <input class="cat_textbox_small" type="text" name="EmailAddress" maxlength="255" />
        </li>
        <li class="s1of1">
        <label>Comment</label>
        <textarea name="Feedback" cols="10" rows="2"></textarea>
        </li>
        <li class="s1of2 captcha">
        <label>Enter Word Verification</label>
        {module_captchav2,White,SlateGray}<br class="c-z" />
        </li>
        <li class="s1of2">
        <label>&nbsp;</label>
        <input type="submit" class="btn f-r" value="Submit" />
        </li>
        <li class="c-z">
        </li>
    </ul>
    <script type="text/javascript" src="/CatalystScripts/ValidationFunctions.js"></script>
    <script type="text/javascript">   //<![CDATA[
   function checkWholeForm2343(theForm){var why = "";if (theForm.EmailAddress) if (theForm.EmailAddress.value.length > 0) why += checkEmail(theForm.EmailAddress.value);if (theForm.CaptchaV2) why += isEmpty(theForm.CaptchaV2.value, "Enter Word Verification in box below");if (why != ""){alert(why);return false;}theForm.submit();return false;}   
//]]>		   		  		   </script>
</form>
</div>
</div>
</div>
