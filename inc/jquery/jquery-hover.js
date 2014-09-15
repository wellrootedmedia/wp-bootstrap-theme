
jQuery.fn.DropDownAddClass = function (options) {
    new jQuery.DropDownAddClass(this, options);
};

jQuery.DropDownAddClass = function (element, options) {

    options = jQuery.extend(true, {}, jQuery.DropDownAddClass.defaults, options);

    var listLength = jQuery(options.menuItemLength).length;

    if(listLength > 0) {
        jQuery(options.menuItemClassName)
            .addClass(options.menuItemClassToAdd);

        jQuery(options.menuItemContainerClassName)
            .addClass(options.menuItemContainerClassToAdd);
    }

    jQuery('ul.nav li.dropdown').hover(function() {
        jQuery(this)
            .find('.dropdown-menu')
            .stop(true, true)
            .delay(200)
            .fadeIn();
    }, function() {
        jQuery(this)
            .find('.dropdown-menu')
            .stop(true, true)
            .delay(200)
            .fadeOut();
    });

};

jQuery.DropDownAddClass.defaults = {
    menuItemClassName: ".nav .menu-item",
    menuItemClassToAdd: "dropdown",
    menuItemContainerClassName: ".menu-item .sub-menu",
    menuItemContainerClassToAdd: "dropdown-menu",
    menuItemLength: ".menu-item ul"
};
