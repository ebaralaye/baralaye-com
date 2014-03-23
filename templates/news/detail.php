<div class="page-body post">
    <div class="header">
        <h1><a href="/news">News</a></h1>
        <p>Upcoming shows/openings, updates and other events.</p>
    </div>
    <div class="page-main">
        <div class="col a">
            <div class="post">
                <h2 class="post-title h-title sub"><?php echo $title; ?></h2>
                <p class="post-details">posted on: <?php echo $published_date; ?></p>
                <ul class="social-btns">
                    <li class="btn-s comment"><a href="#comment-form" class="ltbx win">Comment</a></li>
                    <li class="tweet"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none" data-via="baralaye">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
                    <li class="like last"> 
                    <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
                    <fb:like href="" send="false" layout="button_count" width="75" show_faces="false"></fb:like>
                    </li>
                    <li class="c-z"></li>
                </ul>
                <div class="post-body"><?php echo $content; ?></div>
            </div>
            <div class="goBack btn-sub">{module_referreraddress,,Go Back}</div>
        </div>
        <div class="col b last">
            <h2 class="h-title">More News...</h2>
            {module_announcement,l,3}<a href="/news" class="btn-sub">+ See All</a></div>
    </div>
    <div class="c-z"></div>
</div>
<div class="d-n">
