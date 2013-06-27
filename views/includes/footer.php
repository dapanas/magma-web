		
		<div class="inside" id="footer">
		
		&copy; <?= Date("Y") ?> MAGMA AGENDA DE MALLORCA | <a href="page/condiciones"><?= strtoupper( $cond_uso) ?></a> | <a href="page/privacidad"><?= strtoupper($pol_pri) ?></a>
		</div>
		
        </div>			<!-- CONTENT -->
    </div>
	<a id="thr" href="http://www.phpninja.info">Php Ninja</a>
	<a id="thr" href="http://www.itwoorks.com">itWoorks</a>

	<? include "modals.php"; ?>

        <script>
            var BASE_URL = '<?= $base_url ?>';
			base = BASE_URL;
			var loc = unescape(document.location.href);
			var cadena;
			cadena = loc.replace(base,'');
			var obj = $("a[href='"+cadena+"']");
			obj.parent().addClass("active");


           	if ($('.modificarButton').length> 0){
           	
           		$('.vermell').hide();
           	}

            $(document).ready(function(){
                $('#sidebar').css("height",$(document).height()+'px');
            
            	$('.modificarButton').click(function(){
            		$('.guardarButton').show();
            		$('.vermell').show();
            		$('input[disabled],select[disabled]').removeAttr("disabled").first().focus();
            		
            		$(this).hide();
            	});
            	$('.guardarButton').hide();
            	
            	if ($('input[disabled]').length > 0) $('select').attr("disabled","disabled");
            	

            });
        
        	
        </script>
				
	</body>
</html>
