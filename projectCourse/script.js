$(document).ready(function () {
    $('.header_categories-list').slideUp();
    $('.header_input-categories').click(function () {
        $('.header_categories-list').slideToggle();
    })


    $('.header_navbars').slideUp()


    // scroll top button
    $('.header-wrapper-sticky').hide()
    const btnBackToTop = $('.btn_scroll-top');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            btnBackToTop.fadeIn();
        } else {
            btnBackToTop.fadeOut();
        }
        // back to top
        $('.btn_scroll-top').click(function () {
            $('html,body').animate({ scrollTop: 0 }, 800);
            return false;
        })

        //parent of element sticky
        if ($(this).scrollTop() > 150) {
            $('.header-wrapper-sticky').show();
        } else {
            $('.header-wrapper-sticky').hide();
        }
    })

    //owlCarosel slide
    $('.owl-one').owlCarousel({
        loop: true,
        margin: 24,
        nav: true,
        dotsEach: 2,

        dots: true,
        responsive: {
            0: {
                items: 1
            },
            740: {
                items: 3
            },
            1100: {
                items: 5
            }
        }
    })
    $('.owl-two').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            740: {
                items: 3
            },
            1140: {
                items: 4
            }
        }
    })
    $('.owl-three').owlCarousel({
        loop: true,
        margin: 24,
        nav: false,
        dots: true,
        dotsEach: 4,
        // dotsData:true,
        responsive: {
            0: {
                items: 1
            },
            740: {
                items: 4
            },
            1200: {
                items: 4
            }
        }
    })
    $('.owl-four').owlCarousel({
        loop: true,
        margin: 31,
        nav: true,
        dots: true,
        dotsEach: 2,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1200: {
                items: 5
            }
        }
    })
});
    //slideShow
    var widthSlide = document.querySelector('.slide-main').clientWidth;
    var showSlide = document.querySelector('.slide_show');
    var img = document.querySelectorAll('.slide_show .slide_show-img');
    var maxWidth = widthSlide * img.length;
    var totalWidth = maxWidth - widthSlide;
    var width = 0;
    function Next() {
        if (width < totalWidth) {
            width += widthSlide;
        } else {
            width = 0;
        }
        showSlide.style.marginLeft = '-' + width + 'px';
    }
    function Back() {
        if (width == 0) {
            width = totalWidth;
        } else {
            width -= widthSlide;
        }
        showSlide.style.marginLeft = '-' + width + 'px';
    }
    setInterval(function () {
        Next()
    }, 5000)

    //CountDown
    /*L???y th???i gian t???t ??m l???ch (mily gi??y)*/
    var tetAmLich = new Date(2022, 1, 12).getTime();

    function newYear() {
        /*L???y th???i gian ng??y hi???n t???i (mily gi??y) */
        var ngayHienTai = new Date().getTime();

        /*T??nh th???i gian c??n l???i (mily gi??y) */
        thoigianConLai = tetAmLich - ngayHienTai;

        /*Chuy???n ????n v??? th???i gian t????ng ???ng sang mili gi??y*/
        var giay = 1000;
        var phut = giay * 60;
        var gio = phut * 60;
        var ngay = gio * 24;

        /*T??m ra th???i gian theo ng??y, gi???, ph??t gi??y c??n l???i th??ng qua c??ch chia l???y d??(%) v?? l??m tr??n s???(Math.floor) trong Javascript*/
        var d = Math.floor(thoigianConLai / (ngay));
        var h = Math.floor((thoigianConLai % (ngay)) / (gio));
        var m = Math.floor((thoigianConLai % (gio)) / (phut));
        var s = Math.floor((thoigianConLai % (phut)) / (giay));

        /*Hi???n th??? k???t qu??? ra c??c th??? Div v???i ID t????ng ???ng*/
        document.getElementById("day").innerText = d;
        document.getElementById("hour").innerText = h;
        document.getElementById("minute").innerText = m;
        document.getElementById("second").innerText = s;
    }

    /*Thi???t L???p h??m s??? t??? ?????ng ch???y l???i sau 1s*/
    setInterval(function () {
        newYear()
    }, 1000)


    function tabComponent() {

        const $ = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);

        const tabs = $$(".top_sell-nav-item");
        const panes = $$(".top_sell-show");

        const tabActive = $(".top_sell-nav-item.active");
        const line = $(".top_sell-nav-item .line");

        // line.style.left = tabActive.offsetLeft + "px";
        // line.style.width = tabActive.offsetWidth + "px";

        tabs.forEach((tab, index) => {
            const pane = panes[index];

            tab.onclick = function () {
                $(".top_sell-nav-item.active").classList.remove("active");
                $(".top_sell-show.active").classList.remove("active");

                line.style.left = this.offsetLeft + "px";
                line.style.width = this.offsetWidth + "px";

                this.classList.add("active");
                pane.classList.add("active");
            };
        });
    }
    tabComponent()