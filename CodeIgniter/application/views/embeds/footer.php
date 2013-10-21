<!--CDN scripts-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpx1FOANjsAYRyGTXDYFGjSrwJ42R7-kA&sensor=false"></script>
	<script src="http://platform.twitter.com/anywhere.js?id=[361899175-JL9rfQJwKw4VGsbpvgnoPUGESTDLKXgYA1jT8hzP]&amp;v=1"></script>

	<!--LOCAL scripts-->
	<script src="<?=base_url('public/resources/js/custom.js')?>"></script>
	<script src="<?=base_url('public/resources/js/modernizer.js')?>"></script>
	<script src="<?=base_url('public/resources/js/map.js')?>"></script>
	<script src="<?=base_url('public/resources/js/callback.js')?>"></script>
	<script src="<?=base_url('public/resources/js/navigation.js')?>"></script>
	<script src="<?=base_url('public/resources/js/modalController.js')?>"></script>
	<script src="<?=base_url('public/resources/js/sideBarController.js')?>"></script>
	<script>
		$(function() {
			mapController.initialize();
		})
	</script>

</body>
</html>