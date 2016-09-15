(function($){

    $(document).ready(function(){
        generateTopNav();
        
    });
    
    function generateTopNav(){
        
        let nav = $("nav").addClass("whiteBG");

        var img = $('<img />', { 
              id: 'Myid',
              src: '../../static/img/common/logo.png',
              href: '#index.html',
              alt: 'Logo'
            });

        let homelink = $('<a>Home</a>').attr('href','#index.html');
        let aboutlink = $('<a>About</a>').attr('href','#about.html');
        let shoplink = $('<a>Shop</a>').attr('href','#shop.html');


        let gallerylink = $('<a>Gallery</a>').attr('href','#gallery.html');
        let contactlink = $('<a>Contact</a>').attr('href','#contact.html');

        nav.append(homelink).append(aboutlink).append(shoplink).append(img).append(gallerylink).append(contactlink);
        
    }
})(jQuery);
