function empty(string) {
    if (string == null || string == undefined || string == NaN || string == "")
        return true;
    return false;
}
(Hn_Framework.reset_page = () => {
    Hn_Framework.lazy_video(),
    Hn_Framework.lazy_img(),
        $(".select-load").each(function () {
            $.ajax({
                url: Hn_Framework.url + '/public/json/' + $(this).data('json') + '.json',
                dataType: "json",
                success: (data) => {
                    Hn_Framework.render_select_load($(this), data)
                },
                error: (xhr) => {
                    if (Hn_Framework.settings.dev) console.log(xhr);
                    $(this).html("<option>Load data error</option>");
                },
            });
        });
}),
    (Hn_Framework.lazy_img = () => {
        var imgs = [].slice.call(document.querySelectorAll("img.lazy"));
        if ("IntersectionObserver" in window) {
            let invisibleObserver = new IntersectionObserver(function (
                entries,
                observer
            ) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        let img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove("lazy");
                        invisibleObserver.unobserve(img);
                    }
                });
            });
            imgs.forEach(function (item) {
                invisibleObserver.observe(item);
            });
        } else {
            imgs.forEach(function (item) {
                item.src = item.dataset.src;
                item.classList.remove("lazy");
            });
        }
    }),
    (Hn_Framework.lazy_video = () => {
        var videos = [].slice.call(document.querySelectorAll("video.lazy"));
        if ("IntersectionObserver" in window) {
            let invisibleObserver = new IntersectionObserver(function (
                entries,
                observer
            ) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        let video = entry.target;
                        video.src = video.dataset.src;
                        video.classList.remove("lazy");
                        invisibleObserver.unobserve(video);
                    }
                });
            });
            videos.forEach(function (item) {
                invisibleObserver.observe(item);
            });
        } else {
            videos.forEach(function (item) {
                item.src = item.dataset.src;
                item.classList.remove("lazy");
            });
        }
    }),
    (Hn_Framework.reset_load = () => {
        $(".select-load.new").each(function () {
            $.ajax({
                url: Hn_Framework.url + "/public/json/" + $(this).data("json") + ".json",
                dataType: "json",
                success: (data) => {
                    Hn_Framework.render_select_load($(this), data)
                },
                error: (xhr) => {
                    if (Hn_Framework.settings.dev) console.log(xhr);
                    $(this).html("<option>Load data error</option>");
                },
            });
        });
    }),
    Hn_Framework.render_select_load = (ele, data) => {
        ele.html("");
        if(!Array.isArray(data)) data = Object.keys(data).map(key => data[key]);
        ele.append(
            `<option value="">- Select -</option>`
        );
        data.forEach((element) => {
            ele.append(
                `<option value="${element.value}">${element.name}</option>`
            );
        });
        ele.val(ele.data("value"));
        ele.removeClass("new");
        // if ($(this).data("sl2")) $(this).select2();
    }
    (Hn_Framework.setCookie = (name, value, second) => {
        var d = new Date();
        d.setTime(d.getTime() + second * 1000);
        var expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + "; " + expires + ";path=/";
    }),
    (Hn_Framework.getCookie = (cname) => {
        var name = cname + "=";
        var ca = document.cookie.split(";");
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == " ") {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return false;
    }),
    (Hn_Framework.loading = () => {
        $('body').addClass('loading');
        $('#nprogress').css('opacity', 1);
        $('#nprogress .bar').css('transform', 'translate3d(-80%, 0px, 0px)');
    }),
    (Hn_Framework.convert_url = (url, query = "load=1") => {
        if(url.indexOf(Hn_Framework.url) === -1) url = Hn_Framework.url + url;
        if (url.indexOf(query) === -1) {
            if (url.indexOf("?") === -1) url += "?" + query;
            else url += "&" + query;
        }
        return url;
    }),
    (Hn_Framework.remove_load = () => {
        $('body').removeClass('loading');
        $('#nprogress .bar').css('transform', 'translate3d(-0%, 0px, 0px)');
        setTimeout(function(){
            $('#nprogress').css('opacity', 0);
        }, 1000);
    }),
    (Hn_Framework.ajax_load = (
        url,
        data = "",
        type = "GET",
        convert = "",
        load = true,
        complete_ = ""
    ) => {
        if (!empty(convert)) convert();
        if (!empty(load) && load !== false) {
            var load_ = setTimeout(function () {
                if (load !== true) Hn_Framework.loading();
                else Hn_Framework.loading();
                load_ = "";
            }, 400);
        }
        if (type === "POST" && empty(data)) data = { _token: Hn_Framework._token };
        $.ajax({
            url: Hn_Framework.convert_url(url),
            headers: { _token: Hn_Framework._token },
            method: type,
            data: data,
            dataType: "json",
            error: function (xhr) {
                if (Hn_Framework.settings.dev) console.log(xhr);
                if (xhr.status === 419) {
                    cuteAlert({
                        type: "info",
                        title: "ERROR",
                        img: "img/warning.svg",
                        message:
                            "Xác thực lỗi, trang sẽ tự động làm mới!",
                        buttonText: "CONFIRM",
                        closeStyle: "circle",
                    }).then(() => {
                        location.reload();
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    cuteToast({
                        type: "error",
                        message:
                            "Đã có lỗi xảy ra, bạn có thể làm mới lại trang và thử lại!",
                        timer: 3000,
                    });
                }
            },
            success: function (result) {
                Hn_Framework.up_ajax_result(result);
                if (!empty(complete_)) {
                    complete_(result);
                }
            },
            complete: function (result) {
                if (Hn_Framework.dev) console.log(result.responseJSON);
                if (!empty(load_)) clearTimeout(load_);
                if (load) Hn_Framework.remove_load();
            },
        });
        return false;
    }),
    (Hn_Framework.up_ajax_result = (data) => {
        try {
            if (!empty(data.link.url)) {
                // console.log(data.link.url);
                if (!empty(data.link.time)) {
                    setTimeout(() => {
                        if (data.link.ajax) Hn_Framework.ajax_load(data.link.url);
                        else window.location = data.link.url;
                    }, data.link.time);
                } else {
                    if (data.link.ajax) Hn_Framework.ajax_load(data.link.url);
                    else window.location = data.link.url;
                }
            }
            if (!empty(data.alert) && !empty(data.message)) {
                if (data.message == "success" || data.message == "warning")
                    cuteToast({
                        type: data.message,
                        message: data.alert,
                        timer: 3000,
                    });
                else {
                    var title = "NOTE";
                    if (data.message == "error") title = "ERROR";
                    cuteAlert({
                        type: data.message,
                        title: title,
                        img: "img/" + data.message + ".svg",
                        message: data.alert,
                        buttonText: "CONFIRM",
                        closeStyle: "circle",
                    });
                }
            }

            if (data.message != "error") {
                if (!empty(data.view_delete)) {
                    data.view_delete.forEach((element) => {
                        $(element).fadeOut(100, function () {
                            $(element).slideUp(100, function () {
                                $(element).remove();
                            });
                        });
                    });
                }
                if (!empty(data.view_up)) {
                    var changeUrl = "";
                    var script = '';
                    data.view_up.forEach((element) => {
                        if (!empty(element[2])) {
                            if ($(element[0]).length) {
                                if (element[2] == "before")
                                    $(element[0]).before(element[1]);
                                else if (element[2] == "after")
                                    $(element[0]).after(element[1]);
                                else if (element[2] == "append")
                                    $(element[0]).append(element[1]);
                                else if (element[2] == "prepend")
                                    $(element[0]).prepend(element[1]);
                                else if (element[2] == "attr")
                                    $(element[0]).attr(element[3], element[1]);
                                else if (element[2] == "modal") {
                                    $(element[0]).modal(element[1]);
                                    $(element[0] + " .modal-body").animate(
                                        { scrollTop: 0 },
                                        200
                                    );
                                } else if (
                                    $(element[0]).html().trim() !=
                                    element[1].trim()
                                ) {
                                    element[1] += "";
                                    $(element[0]).html(element[1]);
                                    Hn_Framework.show_element(element[0]);
                                }
                            }
                        } else {
                            if (element[0] == "script") script = element[1];
                            else if (element[0] == "script_footer") script = element[1].replace("<script>", "").replace("</script>", "")
                            else if (element[0] == "url")
                                changeUrl = element[1];
                            else {
                                element[1] += "";
                                if (
                                    $(element[0]).length &&
                                    $(element[0]).html().trim() !=
                                        element[1].trim()
                                ) {
                                    $(element[0]).html(element[1]);
                                    Hn_Framework.show_element(element[0]);
                                }
                            }
                        }
                    });
                    if (!empty(changeUrl)) {
                        if (changeUrl != window.location.href) {
                            Hn_Framework.change_my_url(changeUrl, {
                                html: changeUrl,
                                title: $("title").text(),
                            });
                        }
                        Hn_Framework.reset_page();
                    }
                    Hn_Framework.reset_load();
                    if(!empty(script)) eval(script);
                }
            }
            if (!empty(data.back_to_top)) {
                Hn_Framework.scrollTo(data.back_to_top);
            }
        } catch (e) {
            if (Hn_Framework.settings.dev) {
                console.log(e);
                console.log(data);
            }
            cuteToast({
                type: "error",
                message: "Đã xảy ra lỗi javascript, vui lòng làm mới trang và thử lại!",
                timer: 5000,
            });
        }
    }),
    (Hn_Framework.show_element = (element) => {
        // $(element).removeAttr("style");
        // $(element).css({ opacity: 0 });
        // $(element).animate({ opacity: 1 }, 300);
    }),
    (Hn_Framework.change_my_url = (url) => {
        history.pushState({ title: document.title, url: url }, "", url);
    }),
    (Hn_Framework.form_ajax = (ele) => {
        var url_ = Hn_Framework.convert_url(ele.attr("action"));
        var method = ele.attr("method");
        var data = ele.serialize();
        var check = true;
        var top = 0;
        ele.find(".required").each(function () {
            if (empty($(this).val())) {
                $(this).addClass("is-invalid");
                check = false;
                if (top == 0) top = $(this).offset().top;
            }
        });

        if (check) {
            if (data === ele.attr("data")) {
                cuteToast({
                    type: "warning",
                    message: "Thông tin yêu cầu không có sự thay đổi!",
                    timer: 4000,
                });
                return false;
            }
            var load_complete = function (result) {
                if (result.message == "success") {
                    ele.attr("data", data);
                }
            };
            Hn_Framework.ajax_load(url_, data, method, "", true, load_complete);
        } else {
            document.querySelector('body').scrollTo({
                top: top - Hn_Framework.settings.top,
                behavior: "smooth",
            });
            cuteToast({
                type: "error",
                message: "Vui lòng chọn hoặc nhập đầy đủ các trường bắt buộc!",
                timer: 4000,
            });
        }
    }),
    (Hn_Framework.scrollTo = (ele) => {
        var top = $(ele).offset().top - Hn_Framework.settings.top;
        document.querySelector('html').scrollTo({
            top: top,
            behavior: "smooth",
        });
    });