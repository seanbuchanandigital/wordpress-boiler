let ajaxPostTypeConfig = {
    element: '.ajax-post-type'
}

$(document).ready(function(){
    ($(ajaxPostTypeConfig.element)) ? $(ajaxPostTypeConfig.element).ajaxPostTypeFilter() : null;
});