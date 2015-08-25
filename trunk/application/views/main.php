<div class="ng_main_wrap clearfix" style="width:100%;position:relative;">	
	<div style="float:left; width:100%;border:0px solid #ccc;background:" class="ng-user-cneter-right">
	
		<div class="clearfix" style="min-height: 600px;border:1px solid #ccc;margin-left:120px;background:white">
			<div class="clearfix" style="height:28px;line-height:28px;padding-left:5px;background: transparent url(/images/tps/i1/bg_thead_grade.png) repeat-x scroll 0 0;border-bottom: 1px solid #aec7e5;">
				<div style="float:left;"><span style="font-size:13px;font-weight:bold;"><?php echo $_ADDRESS?></span></div>
				<!-- <div style='float:right; line-height:30px;width:90px;'><a href='<?php echo $_SRC?>'><?php echo $_SRCWORD; ?></a></div> -->
			</div>
			<div class="blank_d" style="height: 5px;"></div>
			<div class="content" style="padding:5px;">
				<?php $this->load->view($content);?>
			</div>
		</div>
		
	</div>
	<?php $this->load->view('common/left_nav.php');?>
</div>

