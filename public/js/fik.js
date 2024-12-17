"use strict";
var WebFontConfig = { google: { families: __config.gFonts.fonts }, timeout: __config.gFonts.delay };

function placeTo(a, o) {
    var e;
    function t() {
        var e = document.querySelector('[data-place-container="'.concat(a, '"]')),
            t = document.querySelector('[data-place-from="'.concat(a, '"]')),
            n = document.querySelector('[data-place-to="'.concat(a, '"]'));
        document.body.clientWidth < o ? t && e && t.append(e) : n && e && n.append(e);
    }
    a && o &&
        (window.addEventListener(
            "resize",
            function () {
                clearTimeout(e),
                (e = setTimeout(function () {
                    t();
                }, 100));
            },
            !0
        ),
        t());
}

function gwTabHide(e) {
    for (var t = 0; t < e.length; t++) $("[data-tab-group=" + e[t] + "]").hide();
}

function gwOpenTab(e) {
    for (var t = 0; t < e.length; t++) $("[data-tab=" + e[t] + "]").show();
}

function gwTabBtnsHandler(e, t) {
    for (var n = 0; n < t.length; n++) $("[data-open-tab-group*=" + t[n] + "]").attr("data-open-tab-active", !1);
    for (n = 0; n < e.length; n++) $("[data-open-tab*=" + e[n] + "]").attr("data-open-tab-active", !0);
}

function throttle(t, n) {
    var a, o, i = !1;
    return function e() {
        if (i) return (a = arguments), void (o = this);
        t.apply(this, arguments),
        (i = !0),
        setTimeout(function () {
            (i = !1), a && (e.apply(o, a), (a = o = null));
        }, n);
    };
}

function AnimatingNumbersWatch() {
    var e = document.querySelectorAll("[data-animating-numbers]"),
        o = [];
    e.forEach(function (e, a) {
        var t = new IntersectionObserver(function (e) {
            e.forEach(function (e) {
                var t = e.target,
                    n = t.dataset.animatingNumbers;
                e.isIntersecting && (AnimatingNumbers(t, 0, n, 5e3), o[a].disconnect());
            });
        });
        t.observe(e), o.push(t);
    });
}

function AnimatingNumbers(e, t, n, a) {
    anime({ targets: e, duration: a || 1e3, innerHTML: [t, n], round: 1, easing: "easeOutExpo" });
}

!(function () {
    var e = document.createElement("script"),
        t = ((e.src = "https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"), (e.type = "text/javascript"), (e.async = "true"), document.getElementsByTagName("script")[0]);
    t.parentNode.insertBefore(e, t);
})();

$(function () {
    $("[data-open-tab]").on("click", function (e) {
        var t = $(this),
            n = t.attr("data-open-tab-group").split("|"),
            t = (gwTabHide(n), t.attr("data-open-tab").split("|"));
        gwOpenTab(t), gwTabBtnsHandler(t, n), document.dispatchEvent(new Event("gwtab"));
    }),
    $('[data-open-tab-active="true"]').trigger("click");
});

$(function () {
    $("[data-tab-select]").on("change", function (e) {
        var t = $(this).find("option:selected");
        gwTabHide(t.attr("data-open-tab-group-select").split("|")), gwOpenTab(t.attr("data-open-tab-select").split("|"));
    });
});

document.addEventListener("PreloadEnd", function () {
    placeTo("scl", 1200), placeTo("lang", 1200), placeTo("btns", 1200);
});

document.addEventListener("PreloadEnd", gwAnime);
document.addEventListener("gwtab", gwAnimeRefresh);
document.addEventListener("atab", gwAnimeRefresh);

var lazyLoadInstance = new LazyLoad({
    callback_loaded: function (e) {
        e.hasAttribute("data-char-body") && document.querySelector("[data-char]") && document.querySelector("[data-char]").classList.add("char-loaded");
    },
}),
gwAnimeArray = [];

!(function () {
    var e = document.querySelector(".preload");
    function t() {
        document.dispatchEvent(new Event("PreloadEnd")), document.querySelector("body").dispatchEvent(new Event("PreloadEnd")), document.querySelector("body").classList.add("loaded");
    }
    document.addEventListener("PreloadEnd", function () {
        e && e.remove();
    }),
    e
        ? (setTimeout(function () {
              e.classList.add("preload_fade");
          }, 1e3 * (__config.preload.time || 1)),
          setTimeout(t, 1e3 * ((__config.preload.time || 1) + (__config.preload.delay || 0.5))))
        : document.addEventListener("DOMContentLoaded", t);
})();

gsap.registerPlugin(ScrollTrigger);

function gwAnime() {
    gsap.utils.toArray("[data-gw-anime]").forEach(function (e) {
        var t = e.getAttribute("data-gw-anime-delay"),
            t = (t && (e.style.animationDuration = t), e.getAttribute("data-gw-anime-duration")),
            n = (t && (e.style.animationDelay = t), e.getAttribute("data-gw-anime")),
            t = ScrollTrigger.create({
                trigger: e,
                onEnter: function () {
                    return e.classList.add(n);
                },
                onEnterBack: function () {
                    return e.classList.add(n);
                },
                onLeave: function () {
                    return e.classList.remove(n);
                },
                onLeaveBack: function () {
                    return e.classList.remove(n);
                },
            });
        gwAnimeArray.push(t);
    });
}

function gwAnimeRefresh() {
    console.info("gwAnimeRefresh"),
    gwAnimeArray &&
        gwAnimeArray.length &&
        gwAnimeArray.forEach(function (e) {
            e.refresh();
        });
}

function Copy() {
    console.log("%c History jogos! ", "background: #222; color: red; font-size: 30px");
    console.log("Back-end: Haly");
    console.log("Designer: Reborn");
    console.log("para historyjogos.com.br");
}

function GetWebServers() {
    var e = $("[data-gw-server-online]");
    0 !== e.length &&
        $.each(e, function (e, t) {
            var t = $(t),
                n = t.attr("data-gw-server-online"),
                a = t.attr("data-gw-server-online-max"),
                a = 100 < (a = Math.floor((n / a) * 100)) ? 100 : a;
            t.find("[data-gw-server-load]").css("--load", a + "%"), AnimatingNumbers(t.find("[data-gw-server-percent]")[0], 0, a, 7e3), AnimatingNumbers(t.find("[data-gw-server-count]")[0], 0, n, 7e3);
        });
}

Copy();

document.addEventListener("DOMContentLoaded", function () {
    var e,
        t = document.querySelector("[data-gw-burger]"),
        n = document.querySelector("body"),
        a = document.querySelector('[data-section="panel"]');
    function o(e) {
        (0 != $(e.target).parents("[data-menu-sub-list]").length && 0 != $(e.target).parents(".menu__item_open").length) ||
            ($("[data-menu-sub-list]").slideUp(), $(".menu__item_open").removeClass("menu__item_open"), $(document).unbind("click", o));
    }
    t &&
        0 !== t.length &&
        (t.addEventListener("click", function () {
            n.classList.toggle("mob-menu-active");
        }),
        window.addEventListener("scroll", function (e) {
            a && document.scrollingElement.scrollTop > a.clientHeight ? (n.classList.add("nav-scroll"), n.classList.remove("nav-static")) : (n.classList.remove("nav-scroll"), n.classList.add("nav-static"));
        }),
        window.addEventListener(
            "resize",
            function () {
                clearTimeout(e),
                (e = setTimeout(function () {
                    1200 <= document.body.clientWidth && document.body.classList.remove("mob-menu-active");
                }, 100));
            },
            !0
        ),
        $("[data-menu]").on("click", "[data-menu-open-sub-list]", function () {
            var e = $(this);
            e.hasClass("menu__item_open")
                ? (e.next("[data-menu-sub-list]").slideUp(), e.removeClass("menu__item_open"), $(document).unbind("click", o))
                : 1200 <= $(window).width() ||
                  (e.next("[data-menu-sub-list]").slideDown(),
                  e.addClass("menu__item_open"),
                  requestAnimationFrame(function () {
                      requestAnimationFrame(function () {
                          $(document).on("click", o);
                      });
                  }));
        }));
});

document.addEventListener("PreloadEnd", GetWebServers);

var newsSlider = null;

function newsInit() {
    var e;
    "undefined" != typeof __config && void 0 !== __config.sliders && void 0 !== __config.sliders.news && __config.sliders.news.init
        ? ((newsSlider = new Swiper('[data-slider="news"]', {
              autoplay: !(void 0 === __config.sliders.news.autoplay || !__config.sliders.news.autoplay || void 0 === __config.sliders.news.autoplayDelay) && { disableOnInteraction: !0, delay: __config.sliders.news.autoplayDelay || 1e4 },
              pagination: {
                  el: '[data-slider-dots="news"]',
                  type: "bullets",
                  clickable: !0,
                  bulletClass: "dot",
                  bulletActiveClass: "dot_active",
                  renderBullet: function (e, t) {
                      return '<div class="' + t + '"></div>';
                  },
              },
              navigation: { nextEl: '[data-slider-next="news"]', prevEl: '[data-slider-prev="news"]' },
              loop: null != (e = null == (e = __config.sliders.news) ? void 0 : e.loop) && e,
              slidesPerView: 2,
              spaceBetween: 15,
              breakpoints: { 
                  0: { slidesPerView: 1, spaceBetween: 15 }, 
                  700: { slidesPerView: 2, spaceBetween: 15 }, 
                  2400: { slidesPerView: 2, spaceBetween: 30 } 
              },
          })),
          void 0 !== __config.sliders.news.autoplay &&
              __config.sliders.news.autoplay &&
              __config.sliders.news.pauseOnHover &&
              $('[data-slider="news"]').hover(
                  function () {
                      newsSlider.autoplay.stop();
                  },
                  function () {
                      newsSlider.autoplay.start();
                  }
              ),
          setTimeout(function () {
              var e;
              insertmedia({ delay: null != (e = null == (e = __config) || null == (e = e.insertstream) ? void 0 : e.delay) ? e : 500, attr: "data-insertstream" });
          }, 0))
        : $('[data-slider="news"]').remove();
}

document.addEventListener("PreloadEnd", newsInit);

var streamsSlider = null;

function streamsInit() {
    var e;
    "undefined" != typeof __config && void 0 !== __config.sliders && void 0 !== __config.sliders.streams && __config.sliders.streams.init
        ? ((streamsSlider = new Swiper('[data-slider="streams"]', {
              autoplay: !(void 0 === __config.sliders.streams.autoplay || !__config.sliders.streams.autoplay || void 0 === __config.sliders.streams.autoplayDelay) && {
                  disableOnInteraction: !0,
                  delay: __config.sliders.streams.autoplayDelay || 1e4,
              },
              pagination: {
                  el: '[data-slider-dots="streams"]',
                  type: "bullets",
                  clickable: !0,
                  bulletClass: "dot",
                  bulletActiveClass: "dot_active",
                  renderBullet: function (e, t) {
                      return '<div class="' + t + '"></div>';
                  },
              },
              navigation: { nextEl: '[data-slider-next="streams"]', prevEl: '[data-slider-prev="streams"]' },
              loop: null != (e = null == (e = __config.sliders.streams) ? void 0 : e.loop) && e,
              slidesPerView: 2,
              spaceBetween: 15,
              simulateTouch: !1,
              onlyExternal: !1,
              breakpoints: { 
                  0: { slidesPerView: 1, spaceBetween: 15 }, 
                  700: { slidesPerView: 2, spaceBetween: 15 }, 
                  1e3: { slidesPerView: 3, spaceBetween: 15 }, 
                  1200: { slidesPerView: 4, spaceBetween: 15 }, 
                  2400: { slidesPerView: 4, spaceBetween: 30 } 
              },
          })),
          void 0 !== __config.sliders.streams.autoplay &&
              __config.sliders.streams.autoplay &&
              __config.sliders.streams.pauseOnHover &&
              $('[data-slider="streams"]').hover(
                  function () {
                      streamsSlider.autoplay.stop();
                  },
                  function () {
                      streamsSlider.autoplay.start();
                  }
              ),
          setTimeout(function () {
              var e;
              insertmedia({ delay: null != (e = null == (e = __config) || null == (e = e.insertstream) ? void 0 : e.delay) ? e : 500, attr: "data-insertstream" });
          }, 0))
        : $('[data-slider="streams"]').remove();
}

function fancyCustomOpen(e) {
    $.fancybox.open({
        src: "#" + e,
        type: "inline",
        selectable: !0,
        opts: {
            touch: !1,
            beforeShow: function (e, t) {},
            btnTpl: { smallBtn: '<div class="gw-modal-close" data-fancybox-close></div>' },
            beforeClose: function () {
                history.pushState("", document.title, window.location.pathname);
            },
        },
    });
}

function fancyCheckHash() {
    var e = window.location.hash.substr(1);
    -1 != e.indexOf("modal-") && fancyCustomOpen(e);
}

document.addEventListener("PreloadEnd", streamsInit);

$.fancybox.defaults.animationDuration = 1e3;

$("body").on("click", "[data-open-window]", function (e) {
    e.preventDefault(), $.fancybox.getInstance("close");
    e = $(this).attr("data-open-window");
    fancyCustomOpen((window.location.hash = e));
});

document.addEventListener("PreloadEnd", fancyCheckHash);
