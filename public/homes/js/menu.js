$(function () {
    var $menu = $(".menus"), $menuLi = $menu.find("li"), $current = $menu.find('.current'), $li_3 = $menu.find('li.li_3'), $li_3_content = $li_3.find('.li_3_content');
    $menuLi.hover(function () {
        var $this = $(this), num = $menuLi.index($this), current = $menuLi.index($(".first")), len = current - num;
        $menu.css("background-position", (131 * current) + "px" + " bottom");
        $current.removeClass("lihover");
        $menuLi.removeClass("first");
        $this.addClass("first");
        if (len <= 0) { len = -len; };
            $menu.stop().animate({ backgroundPosition: (131 * num) + "px" + " bottom" }, 130 * len);


    });

    // console.log($(this))
    $menuLi.each(function ()
    {
        $(this).hover(function() {
        // console.log($(this).find('.li_3_content'));
        $(this).find('.li_3_content').stop(true, true).fadeIn(0);
        // $li_3_content.stop(true, true).fadeIn(0);
        },
        function() {
            // console.log(2);
            var content = $(this).find('.li_3_content');
            content.fadeOut(500,
            function() {
                content.css("display", "none");
            });
        });
    })

    $menu.mouseleave(function () {
        var $this = $(this), num = $menuLi.index($this), current = $menuLi.index($current), len = current - num;
        $menuLi.removeClass("first");
        $current.addClass("first");
        if (len <= 0) { len = -len; };
        $menu.stop().animate({ backgroundPosition: (100 * current + 1) + "px" + " bottom" }, 100 * len);
    });
    $("a.noclick").click(function (event) {
        // event.preventDefault();
    });
});