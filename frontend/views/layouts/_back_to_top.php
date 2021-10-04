<style>
.back-to-top {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    background: #1d2129 url("data:image/svg+xml,%3Csvg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z' fill='%23fff'/%3E%3C/svg%3E") no-repeat center center;

    color: white;
    cursor: pointer;
    padding: 23px;
    border-radius: 8px;
}

.back-to-top:hover {
    background: #1d2129 url("data:image/svg+xml,%3Csvg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z' fill='%23fff'/%3E%3C/svg%3E") no-repeat center center;
}
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
                $(".navbar-right.navbar-r").css('margin-top',14);
                $(".navbar-brand img").css('width',195);
            } else {
                $('#back-to-top').fadeOut();
                $(".navbar-right.navbar-r").css('margin-top',17);
                $(".navbar-brand img").css('width',230);
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            //$('#back-to-top').tooltip('hide');
			
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        //$('#back-to-top').tooltip('show');
    });
</script>