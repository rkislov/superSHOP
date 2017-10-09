<footer-admin id="footer_admin"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left" style="margin-left: 20px;">Copyright © 2017</p>
                <p class="pull-right" style="margin-right: 40px;">Kislovs example</p>
            </div>
        </div>
    </div>
</footer-admin><!--/Footer-->
</div>
<script src="/template/js/jquery.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>
<script src="/template/js/cycle2.js"></script>
<script src="/template/js/corusel.cycle2.js"></script>
<script type="text/javascript">
    $('.image').change(function() {
        var input = $(this)[0];
        var id = $(this).attr('id');

        if ( input.files && input.files[0] ) {
            if ( input.files[0].type.match('image.*') ) {
                var reader = new FileReader();
                reader.onload = function(e) { $('#'+id).attr('src', e.target.result); }
                reader.readAsDataURL(input.files[0]);
            }
        }
    });


</script>
</body>
</html>
