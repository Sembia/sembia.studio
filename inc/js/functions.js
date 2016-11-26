/**
 * General Javascript
 */

(function ($, window, document, undefined) {
    var $win = $(window);
    var $doc = $(document);
    var $fade_elements = $('.fade-item');
    var $classes = {
        FsrHolder: 'fsr-holder',
        FsrImage: 'image-full',
    };
    var $body;

    $doc.ready(function () {
        $body = $('body');
        $isotopeListCallout = $('.list-callout');
        fullscreener($('.' + $classes.FsrImage));
    });

    function fullscreener(_container) {
        _container.each(function () {
            var _this = $(this);
            //debugger;
            var _src = _this.attr('src');
            var _srcset = _this.attr('srcset');
            if (_srcset != null)
            {
                var screenWidth = $win.width();
                var src_arr = _parse_srcset(_srcset);
                for (var i in src_arr)
                {
                    if (src_arr[i].width >= screenWidth)
                    {
                        _src = src_arr[i].url;
                        break;
                    }
                }
            }
            _this.parent().addClass($classes.FsrHolder).attr('style', 'background-image: url(' + _src + ');');
        });
    }

    /**
     * parse_srcset - A much simplified version of https://github.com/albell/parse-srcset
     *
     * @param string str
     * @returns array of objects of the form {url: $url, width: $width}, sorted in order of increasing width
     */
    function _parse_srcset(str) {
        var arr = str.split(', ');
        var srcset = new Array();
        for (var i in arr)
        {
            var tokens = arr[i].split(' ');
            var url = tokens[0];
            var w = tokens[1].replace('w', '');
            srcset.push({url: url, width: w});
        }

        srcset.sort(function (a, b) {
            return parseFloat(a.w) - parseFloat(b.w);
        });
        return srcset;
    }

    // Parallax stuff
    $win.bind('scroll',function(e){
        // Only do parallax on larger screens
        if($win.width() > 991){
            pageParallaxScroll();
        }
    });

    function doParallax(elem){
        if($(elem).length){
            var scrolled = $win.scrollTop();
            $(elem).css('top',(0+(scrolled*0.9))+'px');
            $(elem).css('position', 'relative');
        }
    }
    function pageParallaxScroll(){
        doParallax('.site-header');
    }

})(jQuery, window, document);
