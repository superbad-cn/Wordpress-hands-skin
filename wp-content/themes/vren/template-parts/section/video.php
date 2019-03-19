<?php if(get_field("video_link") || get_field("3rd_code")) { ?>
	<section class="video-section">
		<div class="container">
			<h3 class="section-video-title">精彩视频</h3>
			<div class="video-wrap">
				<?php if(get_field("video_from") == "default" && get_field("video_link")){
					echo '<video width="100%" src="'.get_field("video_link").'" controls="controls">您的浏览器不支持 video 标签。</video>';
				} else if(get_field("video_from") == "3rd" && get_field("3rd_code")){
					echo get_field("3rd_code");
				}?>
			</div>
		</div>
	</section>
<?php } ?>