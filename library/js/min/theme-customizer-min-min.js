!function(t){wp.customize("blogname",(function(i){i.bind((function(i){t(".site-title").text(i)}))})),wp.customize("blogdescription",(function(i){i.bind((function(i){t(".site-description").text(i)}))})),wp.customize("header_textcolor",(function(i){i.bind((function(i){"blank"===i?t(".site-title").css({clip:"rect(1px, 1px, 1px, 1px)",position:"absolute"}):(t(".site-title").css({clip:"auto",position:"static"}),t(".site-title").css({color:i}))}))}))}(jQuery);