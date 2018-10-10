(function ($) {
    /**
     * 复选框
     *
     * `Html`
        <label class="u-checkbox">
            <input name="checkbox" type="checkbox">
        </label>
     * `/Html`
     *
     * @param settings 用户设置参数
     */
    $.fn.jCheckbox = function (settings) {
        /* 默认参数 */
        var _defaults = {
            checkedClass: "z-checked", // 选中状态类名
            onChange: function (element) {} // onchange回调，返回当前选中项DOM元素组
        };

        var options = $.extend(_defaults, settings || {});
        var checkboxes = this;

        checkboxes.each(function () {
            var $checkbox = $(this);

            /*---- 初始化 ----*/
            // 是否选中以input:checkbox的选中状态为准
            if($checkbox.find('input[type="checkbox"]').is(':checked')) {
                $checkbox.addClass(options.checkedClass);
            } else {
                $checkbox.removeClass(options.checkedClass);
            }

            /*---- 添加事件 ----*/
            $checkbox.on("change", function () {
                $(this).toggleClass(options.checkedClass);
                options.onChange($(this));
            });
        });
    };
})(jQuery);
