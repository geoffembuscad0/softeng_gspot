<?php echo $head; ?>
<div class="row head_nav">
	<div class="col-xs-10">
		<ul class="nav nav-pills">
			<li><h2 class="txt-shadow"><?php echo $app_name; ?></h2></li>
		</ul>
	</div>
	<div class='col-cs-2'>
		<ul class='nav nav-pills'>
			<li><a class='btn btn-primary' style='padding-top:10px;height: 75px;' href='<?php echo $_SERVER['HTTP_REFERER'];?>'><span class='glyphicon glyphicon-circle-arrow-left'></span></a></li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 centralize">
		<?php echo form_open(site_url("home/search"));?>
			<input type="text" name="keyword" class="form-control" placeholder="Type keyword here.."/>
			<button type="submit" class="btn btn-info" style="margin-top: 5px;">Search</button>		
		<?php echo form_close();?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		No. of Results:<?php echo $number_of_results; ?>
	</div>
</div>
<?php foreach($search_results AS $result){ ?>
<div class="row">
	<div class="col-xs-12" style="background: rgba(255,255,255, 0.6); border-radius: 4px;margin: 1px 3px 1px 2px;">
		<div class="row">
			<div class="col-xs-4">
			<?php if($result['image_image'] != null){?>
			<img style="width: 100px; height: 100px;" src="<?php echo site_url("assets/places/" . $result['image_image']); ?>" />
			<?php } ?>
			</div>
			<div class="col-xs-8">
				<h2><a href="<?php echo site_url("home/get_place_info/" . $result['place_no']); ?>" style="color: #fff;"><?php echo $result['name']; ?></a></h2>
				<p>Distance: <?php echo $result['distance']; ?>KM</p>
				<a class="btn btn-danger" href="<?php echo site_url("home/get_place_info/" . $result['place_no']);?>">View Details</a>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php echo $footer; ?>
<!-- Need to be updated -->

