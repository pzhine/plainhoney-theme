$.widget('ph.combs', {
    options: {
		sideLength: 77,
		rotation: 40
    },
    _create: function() {
      var self = this,
        $el = self.element;
      
      var hexLayout = HexLayout({
        rotation: self.options.rotation,
        sidelen: self.options.sideLength
      });
      
      var rownum = 0;
      var rowContainer = $el;
      if( rowContainer.children().prop('tagName').toLowerCase() == 'tbody' ) {
        rowContainer = $el.children().eq(0);
      }
      var $hexel = null;
      var $hexlink = null;
      var lowestHexPos = { x: 0, y: 0 };
      
      rowContainer.children().each(function() {
        $(this).children().each(function() {
          $hexel = $(this).addClass('comb');
          $hexel.css({
            'left': hexLayout.position.x + 'px',
            'top': hexLayout.position.y + 'px'
          });
          hexLayout.moveDownRight();
          if( $hexel.attr('colspan') ) {
            for( var c = 0; c < $hexel.attr('colspan')-1; c++ ) {
              hexLayout.moveDownRight();
            }
          }
          $hexLink = $hexel.find('a');

          if( $hexLink.length > 0 ) {
            $hexLink = $hexLink.eq(0);
            $hexel.addClass('linked');
            if( $hexLink.html().search(/<br/i) > 0 ) {
              var lineHeight = Math.ceil(parseInt($hexel.css('line-height')) / 2) + 1;
              $hexel.css({
                'padding-top': (parseInt($hexel.css('padding-top')) - lineHeight) + 'px',
                'height': (parseInt($hexel.height()) + lineHeight) + 'px'
              });
            }
            $hexel.click(function() {
              var url = $hexLink.attr('href');
              return function() {
                window.location = url
              }
            }());
          }
          if( !($hexel.hasClass('hidden')) ) {
            if( hexLayout.position.y > lowestHexPos.y ) {
              lowestHexPos.y = hexLayout.position.y;
              lowestHexPos.x = hexLayout.position.x;
            }
          }				
        });
        hexLayout.position = { x: 0, y: 0 };
        rownum++;
        for( var m = 0; m < rownum; m++ ) {
          hexLayout.moveDownLeft();
        }
      });
      
      if( $el.height() == 0 ) {
        $el.height(hexLayout.position.y);
      }
		
    }
});