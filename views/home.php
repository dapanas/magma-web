<? include('views/includes/top.php'); ?>
<div id="home" class="base">
    <div id="slider">
        <ul>
            <li><img src="views/img/slider1.jpg"></li>
            <li><img src="views/img/slider2.jpg"></li>    
        </ul>
    </div>
    <div class="inside">
         <img src="views/img/android.jpg">
         <img src="views/img/ios.jpg">
    </div>
</div>
<script>


$("#slider").easySlider({
				auto: true,
				speed: 340,
				pause: 6000,
				continuous: true,
				width:774,
				height:378,
				numeric:true,

				prevId: 		'prevBtn',
prevText: 		'Previous',
nextId: 		'nextBtn',	
nextText: 		'Next',
controlsShow:		true,
controlsBefore:	'',
controlsAfter:		'',	
controlsFade:		true,
firstId: 		'firstBtn',
firstText: 		'First',
firstShow:		false,
lastId: 		'lastBtn',	
lastText: 		'Last',
lastShow:		false,				
vertical:		false,

numericId: 		'controls'

			});

</script>
<? include('views/includes/footer.php'); ?>