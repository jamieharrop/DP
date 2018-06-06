<!-- BOOTSTRAP JS -->
<script src="/js/bootstrap.min.js" type="text/javascript"></script>

<!-- WEBSITE JS -->
<script src="/js/website.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".res_nav").sidr({
		side: 'right',
		source: '.nav',
	});
	$(".home_rating_item, .home_productions_body_item").matchHeight();
});
</script>

<!-- GOOGLE ANALYTICS -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-464534-14', 'auto');
  ga('send', 'pageview');

</script>

<script type="text/javascript">
$(window).scroll(function() {
  if ($(document).scrollTop() > 50) {
    $('.logo img').addClass('shrink');
  } else {
    $('.logo img').removeClass('shrink');
  }
});
</script>
