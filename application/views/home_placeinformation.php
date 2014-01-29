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
	<div class="col-cs-12">
		<h1><?php echo $place_info[0]['name'];?></h1>
	</div>
</div>
<div class="row">
	<div class="col-cs-12">
		<img src='<?php echo site_url("assets/places/" . $place_info[0]['image_image']); ?>' style='width: 90%;'/>
	</div>
</div>
<div class="row" style="background:#663399;">
	<div class="col-cs-12">
		<h2 style='color: #fff;'><?php echo $place_info[0]['name'];?></h2>
		<h5>Destination: <?php echo $place_info[0]['place'];?></h5>
		<h5>Region: <?php echo $place_info[0]['region'];?></h5>
		<h5>Distance: <?php echo $place_info[0]['distance'];?>KM</h5>
	</div>
</div>
<div class="row">
	<div class="col-cs-12">
		<h2>Reviews</h2>
	</div>
</div>
<div class="row">
	<div class="col-cs-12">
		<?php echo form_open(""); ?>
			<label>Name:</label></br>
			<input type="text" name="name" value=""/>
			</br><label>Comment:</label></br>
			<textarea name="comment" style="width: 98%;height: 100px;">
			</textarea>
			<button class="btn btn-primary">Comment</button>
		<?php echo form_close(); ?>
	</div>
</div>
<?php if(count($place_reviews) == 0){ ?>
<div class="row">
	<div class="col-cs-12" style="text-align: center;">
		<h6>No Reviews so far.</h6>
	</div>
</div>
<?php } else { ?>
<?php foreach($place_reviews AS $review){ ?>
<div class="row">
	<div class="col-cs-12">
		<h6></h6>
	</div>
</div>
<?php } ?>
<?php } ?>
<?php echo $footer; ?>