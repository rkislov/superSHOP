<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="footer-container">
            <div class="footer-row">
                <p class="pull-left" style="margin-left: 20px;">Copyright © 2017</p>
                <p class="pull-right" style="margin-right: 40px;">Kislovs example</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->

<script src="/template/js/jquery.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/cycle2.js"></script>
<script src="/template/js/corusel.cycle2.js"></script>
<script src='/template/js/jquery.fancybox.min.js'></script>
<script>
    $(document).ready(function (){
        $(".add-to-cart").click(function (){
            var id = $(this).attr("data-id");

            $.post("/cart/addAjax/"+id, {}, function(data){
                $("#cart-count").html(data);
            });
            return false;
        }) ;

    });
    $(".prev-slide").click(function(){
        $("#topCarousel2").carousel('prev');
    });
    // Осуществляет переход на следующий слайд
    $(".next-slide").click(function(){
        $("#topCarousel2").carousel('next');
    });
    $(".prev-slide1").click(function(){
        $("#botCarousel2").carousel('prev');
    });
    // Осуществляет переход на следующий слайд
    $(".next-slide1").click(function(){
        $("#botCarousel2").carousel('next');
    });




</script>
</body>
</html>
