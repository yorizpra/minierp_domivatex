<?php

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script>
    $(window).load(function() {
        $(".se-pre-con").fadeOut("slow");;
    });
</script>
<div class="container-fluid banner" style="padding:0px; position: relative;">
    <img src="img/banner/profile.jpg" class="banner">
    <div class="leftmenu bottom-left">
        &nbsp &nbsp &nbsp Contact Us &nbsp &nbsp &nbsp
    </div>
</div><!-- /.container -->
<div class="container">
    <div class="row">

        <div class="col-md-6">
            <div class="addres">
                <p class="addres">
                    ECOGREEN OLEOCHEMICALS (SINGAPORE) PTE LTD <br>
                    99 Bukit Timah Road # 04-01 Alfa Centre <br>
                    Singapore - 229835 <br>
                    Tel : (65) 633 777 26 <br>
                    Fax : (65) 633 777 06 <br>
                    Email : info@ecogreenoleo.com
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="artContentSided">
                <iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.id/maps/ms?msa=0&amp;msid=205761673728504543272.0004d5ab5be5ce0bc3e15&amp;gl=ID&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=1.307496,103.847086&amp;spn=0.007508,0.00912&amp;z=16&amp;output=embed" frameborder="0" style="width:100%; min-height: 300px; margin-top: 20px;"></iframe><br><small>View <a href="https://maps.google.co.id/maps/ms?msa=0&amp;msid=205761673728504543272.0004d5ab5be5ce0bc3e15&amp;gl=ID&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=1.307496,103.847086&amp;spn=0.007508,0.00912&amp;z=16&amp;source=embed" style="color:#0000FF;text-align:left">Ecogreen Oleochemicals (Singapore) Pte Ltd</a> in a larger map</small>
            </div>
        </div>

    </div> <!-- row -->
</div><!-- /.container -->

<div class="container contact-form">
    <form method="post">
        <div class="row" style="max-width: 100%;">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="contactform"> FULL NAME: </label>
                    <input type="text" name="txtName" class="form-control" placeholder="Your Name Here" value="" />
                </div>
                <div class="form-group">
                    <label class="contactform"> EMAIL ADDRESS: </label>
                    <input type="text" name="txtEmail" class="form-control" placeholder="" value="" />
                </div>
                <div class="form-group">
                    <label class="contactform"> SUBJECT: </label>
                    <input type="text" name="txtSubject" class="form-control" placeholder="" value="" />
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="contactform"> YOUR MESSAGE: </label>
                    <textarea name="txtMsg" class="form-control" placeholder="" style="width: 100%; height: 160px;"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btn btn-success" value="Send Message" />
                </div>
            </div>
        </div>
    </form>
</div>
