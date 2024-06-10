history.replaceState(
    { url: window.location.href, title: document.title },
    "",
    window.location.href
);
window.onpopstate = (e) => {
    if (e.state) {
        Hn_Framework.ajax_load(
            Hn_Framework.convert_url(e.state.url, "load=1&back=1"),
            "",
            "GET",
            "",
            true,
            () => {
                Hn_Framework.reset_page();
            }
        );
    }
};
$(document).on("click", 'a:not([role="tab"])', function (e) {
    if ($(this).attr("href") != undefined && $(this).attr("href").indexOf("#") != -1) {
        e.preventDefault();
        let ele = $(this)
            .attr("href")
            .replace(Hn_Framework.url + "/");
        if (ele === "#" || $(ele).length === 0) Hn_Framework.scrollTo("header");
        else Hn_Framework.scrollTo(ele);
    }
});
$(document).on("click", ".ajax-load", function (e) {
    if (
        !empty($(this).attr("href")) &&
        $(this).attr("href").indexOf("#") !== -1
    )
        return;
    let url_ = $(this).attr("href");
    if (empty(url_)) url_ = $(this).attr("data-url");
    var url_load = Hn_Framework.convert_url(url_);
    var method = !empty($(this).data("method"))
        ? $(this).data("method")
        : "GET";
    if (!empty($(this).data("alert"))) {
        cuteAlert({
            type: "question",
            title: "WARNING",
            message: $(this).data("alert"),
            confirmText: "CONFIRM",
            cancelText: "CANCEL",
        }).then((e) => {
            if (e) {
                Hn_Framework.ajax_load(url_load, "", method);
            }
        });
    } else Hn_Framework.ajax_load(url_load, "", method);
    if ($(this).hasClass("sidebar")) {
        $("#sidebar-menu").find("a.sidebar").removeClass("active");
        $(this).addClass("active");
    }
    if($(this).hasClass('menu_item')) {$('#menu_header_mobile').removeClass('active');$(this).parents('.sub-menu').removeClass('active');}
    e.preventDefault();
});

$(document).on("keyup", ".required", function () {
    if (empty($(this).val())) $(this).addClass("is-invalid");
    else $(this).removeClass("is-invalid");
});
$(document).on("change", ".required", function () {
    if (empty($(this).val())) $(this).addClass("is-invalid");
    else $(this).removeClass("is-invalid");
});
$('.has_sub_menu').on('click', function() {
    $(this).next('.sub-menu').addClass('current');
    $(this).parents('#menu-header').find('.sub-menu:not(.current)').removeClass('active');
    $(this).next('.sub-menu').toggleClass('active');
    $(this).next('.sub-menu').removeClass('current');
})
$('.has_sub_menu_mobile').on('click', function() {
    $(this).next('.sub_menu_mobile').addClass('current');
    $(this).parents('#menu_header_mobile').find('.sub_menu_mobile:not(.current)').removeClass('active');
    $(this).next('.sub_menu_mobile').toggleClass('active');
    $(this).next('.sub_menu_mobile').removeClass('current');
})
document.addEventListener("click", function(e) {
    if (!document.getElementById('menu-header').contains(e.target)) $('#menu-header .sub-menu').removeClass("active");
    $('ul.option_theme').removeClass('active');
    if (!document.querySelector('.form-search').contains(e.target)) $('.form-search').removeClass('active');
});
document.addEventListener('DOMContentLoaded', (event) => {
    var menuHeaderMobile = document.getElementById('menu_header_mobile');
    if (menuHeaderMobile) {
        menuHeaderMobile.addEventListener("click", function(e) {
            if (!document.querySelector('#menu_header_mobile>ul').contains(e.target)) {
                menuHeaderMobile.classList.remove("active");
            }
        });
    }
});

$('#open-menu').on('click', function(e) {
    e.stopPropagation();
    $('#menu_header_mobile').addClass('active');
})
$(".open_theme").on('click', function(e) {
    e.stopPropagation();
    $(this).next('ul.option_theme').toggleClass('active');
})
$('.theme').on('click', function() {
    if ($(this).data('theme') === 'dark') {
        $('html').addClass('dark');
        $('html').removeClass('light');
        localStorage.setItem('theme', 'dark');
    } else {
        $('html').removeClass('dark');
        $('html').addClass('light');
        localStorage.setItem('theme', 'light');
    }
})
$('.open-search').on('click', function(e){
    e.stopPropagation();
    $(this).next('.form-search').toggleClass('active');
})
$(document).on('click', '.open_filter', function(){
    $('.select_filter').toggleClass('hidden');
    $(this).find('svg').toggleClass('transform rotate-180');
})
$(document).on('click', '.scroll', function(e){
    e.preventDefault();
    Hn_Framework.scrollTo($(this).data('scroll'));
})
$(document).on('click', '.card-collapse .toggle-content', function(){
    $(this).find('svg').toggleClass('transform rotate-180');
    $(this).next('.card-collapse-content').slideToggle(300);
})
$(document).on('click', '.card-collapse .toggle-content', function(){
    $(this).next('.card-collapse-content-player').slideToggle(300);
})
