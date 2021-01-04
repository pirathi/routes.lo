<?php 

 $target_url = "https://www.dialus.lk/list/Jaffna/-/atm/C_2";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $target_url);
        // curl_setopt($ch, CURLOPT_POST,1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $result = curl_exec ( $ch );
        $err = curl_errno ( $ch );
        $errmsg = curl_error ( $ch );
        $header = curl_getinfo ( $ch );
        $httpCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );
        print_r($result);
        // echo '------------------------';
        // print_r($ch);
        // print_r($err);
        // print_r($errmsg);
        // print_r($header);
        // print_r($httpCode);
?>
<button type="submit" id="btn_save">save</button>
{{-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script> --}}
<script type="text/javascript">
    // $(document).on('click', '#btn_save', function(e) {
    $(document).ready(function() {
        // e.preventDefault();
        // alert();
        var names = [];
        var phones = [];
        var earphone = [];
        var address = [];
        var webs = [];
        var emails = [];
        var areas = [];
        var name_class = $(".panel-heading");
        var phone_class = $(".glyphicon-phone-alt");
        var earphone_phone_class = $(".glyphicon-earphone");
        var address_class = $(".glyphicon-map-marker");
        var webclass = $(".glyphicon-globe");
        var emailclass = $(".glyphicon-envelope");
        var areaclass = $(".panel-heading .pull-right");

        name_class.each(function() {
            $(this).contents().filter('span').remove();

            var name = $(this).text();
            var res = name.replace(/\n/ig, '');
            var result = res == '' ? '1' : res;
            names.push(result);
        });
        areaclass.each(function() {
            $(this).contents().filter('span').remove();

            var area = $(this).text();
            var res = area.replace(/\n/ig, '');
            var result = res == '' ? '1' : res;
            areas.push(result);
        });

        // $(".panel-heading").each(function() {
        //     $(this > areaclass).contents().filter('span').remove();
        //     var area = $(this).find(areaclass).parent().text();
        //     var res = area.replace(/\n/ig, '');
        //     var result = $.trim(res) == '' ? '1' : res;
        //     areas.push(result);
        // });

        phone_class.each(function() {
            $(this).contents().filter('span').remove();
            var phone = $(this).parent().text();
            var res = phone.replace(/\n/ig, '');
            var result = phone == '' ? '1' : res;

            phones.push(result);
        });
        webclass.each(function() {
            $(this).contents().filter('span').remove();
            var web = $(this).parent().text();
            var res = web.replace(/\n/ig, '');
            var result = $.trim(res) == '' ? '1' : res;

            webs.push(result);
        });
        emailclass.each(function() {
            $(this).contents().filter('span').remove();
            var email = $(this).parent().text();
            var res = email.replace(/\n/ig, '');
            var result = $.trim(res) == '' ? '1' : res;

            emails.push(result);
        });
        // if ($(".panel-body").hasClass(earphone_phone_class)) {
        //     earphone_phone_class.each(function() {
        //         $(this).contents().filter('span').remove();
        //         var ear = $(this).parent().text();
        //         var res = ear.replace(/\n/ig, '');
        //         var result = $.trim(res) == null ? '1' : res;

        //         earphone.push(ear);
        //     });
        // }

        $(".panel-body").each(function() {
            $(this > earphone_phone_class).contents().filter('span').remove();
            var ear = $(this).find(earphone_phone_class).parent().text();
            var res = ear.replace(/\n/ig, '');
            var result = $.trim(res) == '' ? '1' : res;
            earphone.push(result);
        });


        address_class.each(function() {
            $(this).contents().filter('span').remove();
            $(this).parent().contents().filter('div').remove();
            var add = $(this).parent().text();
            var res = add.replace(/\n/ig, '');
            var result = $.trim(res) == '' ? '1' : res;

            address.push(result);
        });

        // console.log(names);
        // console.log(areas);
        // console.log(address);
        // console.log(phones);
        // console.log(earphone);
        // console.log(webs);
        // console.log(emails);
        var _token = "{{ csrf_token() }}";
        $.ajax({
            url: "{{ route('savedata') }}",
            data: {
                names:names,
                areas:areas,
                address:address,
                phones:phones,
                earphone:earphone,
                webs:webs,
                emails:emails,
                _token:_token
            },
            dataType: 'json',
            type: 'POST',
            success: function(response){
                console.log(response);
            }
        })
    });
</script>