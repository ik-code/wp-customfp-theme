document.addEventListener('DOMContentLoaded', function () {

    var $left = $('.slick-paging__pagingInfo--left');
    var $right = $('.slick-paging__pagingInfo--right');
    var $slickElement = $('.slider');

    $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
        //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
        var i = (currentSlide ? currentSlide : 0) + 1;
        var count = slick.slideCount < 10 ? '0' + slick.slideCount : slick.slideCount;
        $left.text(i < 10 ? '0' + i : i);
        $right.text(count);
    });


    $slickElement.on('afterChange init', function (event, slick, direction) {
            // console.log('afterChange/init', event, slick, slick.$slides);
            // remove all prev/next
            slick.$slides.removeClass('prevSlide').removeClass('nextSlide');

            // find current slide
            for (var i = 0; i < slick.$slides.length; i++) {
                var $slide = $(slick.$slides[i]);
                if ($slide.hasClass('slick-current')) {
                    // update DOM siblings
                    $slide.prev().addClass('prevSlide');
                    $slide.next().addClass('nextSlide');
                    break;
                }
            }
        }
    )
        .on('beforeChange', function (event, slick) {
            // optional, but cleaner maybe
            // remove all prev/next
            slick.$slides.removeClass('prevSlide').removeClass('nextSlide');
        }).slick({

        // normal options...
        infinite: false,
        dots: true,
        arrows: true,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1,
        variableWidth: true,

        appendArrows: $('.slick-arrows'),
        prevArrow: '<button id="prev" type="button" class="btn-slick-arrow"><svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
            '<path d="M0.229141 4.44711C0.229376 4.44687 0.22957 4.4466 0.229843 4.44636L4.31203 0.383869C4.61785 0.0795337 5.1125 0.0806662 5.41691 0.386525C5.72129 0.692345 5.72012 1.18699 5.4143 1.49137L2.67352 4.21886H19.2188C19.6502 4.21886 20 4.56863 20 5.00011C20 5.4316 19.6502 5.78136 19.2188 5.78136H2.67355L5.41426 8.50886C5.72008 8.81323 5.72125 9.30788 5.41687 9.6137C5.11246 9.9196 4.61777 9.92065 4.31199 9.61636L0.229805 5.55386C0.22957 5.55363 0.229374 5.55335 0.229101 5.55312C-0.0768757 5.24773 -0.0758991 4.75148 0.229141 4.44711Z" fill="black"/>\n' +
            '</svg>\n</button>',
        nextArrow: '<button id="next" type="button" class="btn-slick-arrow"><svg width="20" height="11" viewBox="0 0 20 11" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
            '<path d="M19.7709 4.94698C19.7706 4.94675 19.7704 4.94648 19.7702 4.94624L15.688 0.883747C15.3821 0.579412 14.8875 0.580544 14.5831 0.886403C14.2787 1.19222 14.2799 1.68687 14.5857 1.99125L17.3265 4.71874H0.78125C0.349766 4.71874 0 5.06851 0 5.49999C0 5.93147 0.349766 6.28124 0.78125 6.28124H17.3264L14.5857 9.00874C14.2799 9.31311 14.2788 9.80776 14.5831 10.1136C14.8875 10.4195 15.3822 10.4205 15.688 10.1162L19.7702 6.05374C19.7704 6.05351 19.7706 6.05323 19.7709 6.053C20.0769 5.74761 20.0759 5.25136 19.7709 4.94698Z" fill="black"/>\n' +
            '</svg></button>',
          responsive: [{

            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                dots: true,
                arrows: true,
                centerMode: false,
                centerPadding: '0px',
                variableWidth: false,
            }

        }, {

            // breakpoint: 640,
            // settings: "unslick" // destroys slick

        }]
    });

});
