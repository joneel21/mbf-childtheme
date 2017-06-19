
jQuery(document).ready(function($){
	
	//web services
	$('.services-header-title.web').flowtype({
			maximum: 1500,
			maxFont: 209,
			minFont: 69,
			fontRatio: 8.8
	});
	$('.head-numbers').flowtype({
			maximum: 1500,
			maxFont: 209,
			minFont: 150,
			fontRatio: 12
	});
	$('.media-title.sevices-title').flowtype({
			maximum: 1500,
			maxFont: 120,
			minFont: 70,
			fontRatio: 12
	});
	//media services
	$('.services-header-title.media').flowtype({
			maximum: 1900,
			maxFont: 172,
			minFont: 84,
			fontRatio: 12
	});
	$('.media-title.infographic-title').flowtype({
			maximum: 1500,
			maxFont: 90,
			minFont: 60,
			fontRatio: 10
	});
	$('.media-title.resp-media-title').flowtype({
			maximum: 1500,
			maxFont: 80,
			minFont: 50,
			fontRatio: 10
	});
	$('.media-title.media-process').flowtype({
			maximum: 1650,
			maxFont: 76,
			minFont: 40,
			fontRatio: 20
	});

	//marketing services
	$('.services-header-title.marketing').flowtype({
			maximum: 1500,
			maxFont: 209,
			minFont: 60,
			fontRatio: 8.8
	});

	//design and dev
	$('.services-header-title.design-develop').flowtype({
			maximum: 1650,
			maxFont: 209,
			minFont: 97,
			fontRatio: 6
	});
	$('.services-header-sub-title.design-develop').flowtype({
			maximum: 1650,
			maxFont: 172,
			minFont: 72,
			fontRatio: 6.5
	});

	//projects
	$('.projects-title').flowtype({
			maximum: 1920,
			maxFont: 390,
			minFont: 140,
			fontRatio: 4
	});
	$('.proj-title').flowtype({
			maximum: 767,
			maxFont: 213,
			minFont: 135,
			fontRatio: 7
	});
	$('.jects-title').flowtype({
			maximum: 767,
			maxFont: 160,
			minFont: 102,
			fontRatio: 9
	});
	

	$('.header-img-title.contact').flowtype({
			maximum: 1900,
			maxFont: 325,
			minFont: 83,
			fontRatio: 5.2
	});
	$('.header-img-title.about').flowtype({
			maximum: 1900,
			maxFont: 395,
			minFont: 114,
			fontRatio: 4.7
	});

	//about & contact us header animation
	setTimeout(function(){
    $('.header-img-title').animate({
		opacity: 1 }, 500, "linear", function(){})
  	},200);
	
	//marketing services
	 $('.sales-funnel-list.sales-funnel-desktop dt').each(function(){
	   $(this).addClass('mk-animate-element');
	 });
	
	//testimonials
	$('.mk-testimonial-image').each(function(){
		var img = $(this).find('img').attr('src').replace('-150x150', '');
		$(this).find('img').attr('src', img);  
	 });
	 
	$('.projects-masonry-container .vc_gitem-zone img').each(function(){
		var grid_img = $(this).attr('src').replace('-1024x1024', '');
		 //console.log(grid_img);
	});
	
	//media services
	var viewPortWidth = window.innerWidth;
	  setTimeout(function(){
		  var laptop_height = $('.infographic-laptop img').height();
		  var laptop_width = $('.infographic-laptop img').width();	  
		  $('.infographic-laptop img').css('margin-left', '-' + laptop_width / 2 + 'px');
		  $('.stat17').css('height', laptop_height + 55);
		
		  if(viewPortWidth <= 768){
			  $('.stat15').css('height', laptop_height - 187);
			  $('.stat16').css('height', laptop_height - 74);
		  }
		  else if(viewPortWidth <= 1024){
			  $('.stat15').css('height', laptop_height - 263);
			  $('.stat16').css('height', laptop_height - 110);
		  }
		
		  else {
			  $('.stat15').css('height', laptop_height - 330);
			  $('.stat16').css('height', laptop_height - 135);
		  }
	
	  }, 2000);
	  
	  if(viewPortWidth <= 480){
		  $('.explainer-container').attr('data-vc-parallax-image', "/wp-content/uploads/2017/03/explainer-mobile.jpg");
	  
	  }
	  else{
		  $('.explainer-container').attr('data-vc-parallax-image', "/wp-content/uploads/2017/01/explainer-background.jpg");
	  }
	
	
	$(window).resize(function(){
		laptop_height = $('.infographic-laptop img').height();  
		laptop_width = $('.infographic-laptop img').width();
		viewPortWidth = window.innerWidth;
		$('.infographic-laptop img').css('margin-left', '-' + laptop_width / 2 + 'px');
		$('.stat17').css('height', laptop_height + 55);
		
		if(viewPortWidth <= 768){
		  $('.stat15').css('height', laptop_height - 187);
		  $('.stat16').css('height', laptop_height - 74);
		}
		else if(viewPortWidth <= 1024){
		  $('.stat15').css('height', laptop_height - 263);
		  $('.stat16').css('height', laptop_height - 110);
		}
		else {
		  $('.stat15').css('height', laptop_height - 330);
		  $('.stat16').css('height', laptop_height - 135);
		} 
	  
		if(viewPortWidth <= 480){
		  $('.explainer-container').attr('data-vc-parallax-image', "/wp-content/uploads/2017/03/explainer-mobile.jpg");
	  
		} 
		else{
		  $('.explainer-container').attr('data-vc-parallax-image', "/wp-content/uploads/2017/01/explainer-background.jpg");
		}
	  });
	  $('.mk-testimonial-image').each(function(){
		  var img = $(this).find('img').attr('src').replace('-150x150', '');
		  $(this).find('img').attr('src', img);  
	});
});