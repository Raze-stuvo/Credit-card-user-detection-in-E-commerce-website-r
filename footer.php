		<div class="clearfix"></div>
		</div>
		
	</div>
	<div style="clear:both"><div>
	<div id="footer" style="background:#719400;padding:0px;">

		<?php

		foreach($global_data as $k=>$d){
		?>
		<div class="" style="float:left;width:300px;padding:20px;">
		<a class="cat_heading" style="font-size:16px;font-weight:bold;" href="adds_list.php?cat_id=<?php echo $k; ?>" ><?php echo $global_data[$k][0]['category'];?>
		<ul> 
		<?php foreach($global_data[$k] as $list){ ?>
		    <li><a href="adds_list.php?sub_id=<?php echo $list['subid'];?>"><?php echo $list['name'];?></a></li>
		<?php } ?>
		</ul>
		</div>
		<?php } ?>

		<p style="background:#435603;color:#FFF;padding:5px;">copy rights @ shopnow.com 2014</p>
	</div>
</div>
<script>
			(function($){
				
				//cache nav
				var nav = $("#topNav");
				
				//add indicator and hovers to submenu parents
				nav.find("li").each(function() {
					if ($(this).find("ul").length > 0) {
						$("<span>").text("▼").appendTo($(this).children(":first"));

						//show subnav on hover
						$(this).mouseenter(function() {
							$(this).find("ul").stop(true, true).slideDown();
						});
						
						//hide submenus on exit
						$(this).mouseleave(function() {
							$(this).find("ul").stop(true, true).slideUp();
						});
					}
				});
			})(jQuery);
		</script>
</body>
</html>
