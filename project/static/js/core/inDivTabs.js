



(function($){
	$(document).ready(function(){
		selectTab();
		generateClothingItems();

        
    });

	function selectTab(){
		var tab=$("ul.tab>li");
		tab.addClass("tablinks");
		tab.click(function(e){
			let tabName = $(this).attr('tab');
			let tabcontent = $(".tabcontent");
			let tablinks = $(".tablinks");

			tabcontent.hide();
		    tablinks.removeClass("active");
		    $("div#"+tabName).show();
			$(this).addClass("active");
		});
	}

	function generateClothingItems(){
		let item = $("item");
		let thisbutton = $(this).children('img');
		
		
		item.each(function(){

			let thissrc = $(this).attr('src');
			let thistitle = $(this).attr('title');
			let thisprice = $(this).attr('price');

			let full_imgsrc = '<img src="../../static/img/shop/'+ thissrc +'.png">';
			let display_title = $('<div>'+thistitle+'</div>').addClass('item-title');
			let display_price = $('<div>'+'$'+thisprice+'</div>').addClass('item-price');
			let addtocart_button = $('<button>Add to Cart</button>').attr('data-price',thisprice);
			let addtocart_container = $('<div></div>').addClass('center-div').append(addtocart_button);
			$(this).append(full_imgsrc).append(display_title).append(display_price).append(addtocart_container);
		});
		
		
		$('button').click(function(){
			var thisprice = $(this).data('price');
			var totalprice = totalprice+ thisprice;
			alert(thisprice);
		});

	}

   
})(jQuery);


