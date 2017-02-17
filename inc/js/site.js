(function($){
    function slugify(text){
        return text.toLowerCase()
            .replace(/ /g,'-')
            .replace(/[-]+/g, '-')
            .replace(/[^\w-]+/g,'');
    }

    $(document).ready(function() {
        var sections = $('.section');
        var titles = [];
        var anchors = [];
        sections.each(function(i, item){
            var title = $(item).data('title');
            console.log(title);
            var anchor = slugify(title);
            titles.push(title);
            anchors.push(anchor);
        });
        $('#fullpage').fullpage({
            anchors: anchors,
            //sectionsColor: ['#C63D0F', '#1BBC9B', '#7E8F7C'],
            navigation: true,
            navigationPosition: 'right',
            navigationTooltips: titles,
            bigSectionsDestination: 'top',
            responsiveWidth: 992,
        });
    });
})(jQuery);
