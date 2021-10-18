<footer class="footer footer-static footer-light navbar-border">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2019 <a href="https://www.pricon.com.ph/index.php/en/" target="_blank" class="text-bold-800 grey darken-2">PRICON MICROELECTRONICS INC. </a></span><span class="float-md-right d-xs-block d-md-inline-block" id="footerTimer"><!-- <i class="icon-heart5 pink"></i> --></span></p>
</footer>

<script type="text/javascript">
	// British English uses day-month-year order and 24-hour time without AM/PM
	// console.log(now.toLocaleString('en-GB', { timeZone: 'Asia/Manila' }));

	setInterval(function(){
		// var now = new Date();
		// $("#footerTimer").text(now.toLocaleString('en-US', { timeZone: 'Asia/Manila' }));

		$("#footerTimer").text(moment().format('MMMM DD, YYYY | hh:mm:ss A'));		
		
	}, 1000);
</script><?php /**PATH /var/www/qc_patrol_new/resources/views/shared/pages/footer.blade.php ENDPATH**/ ?>