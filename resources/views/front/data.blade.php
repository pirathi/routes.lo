<?php 
for ($i=1; $i <= 2; $i++) { 
    # code...
 //$target_url = "https://dialus.lk/list/Jaffna/-/airlines/C_174";
 $target_url = "https://dialus.lk/list/Jaffna/-/bus-ticketing-agents/C_189?page=".$i;
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
    }
?>
<button type="submit" id="btn_save">save</button>
{{-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script> --}}
<script type="text/javascript">
    // $(document).on('click', '#btn_save', function(e) {
     //   e.preventDefault();
     $(document).ready(function() {

        var names = [];
        var phones = [];
        var earphone = [];
        var address = [];
        var areas = [];
        var emails = [];
        var morearr = [];
        var websites = [];
        var name_class = $(".panel-heading");
        var phone_class = $(".glyphicon-phone-alt");
        var earphone_phone_class = $(".glyphicon-earphone");
        var address_class = $(".glyphicon-map-marker");
    
        $('.item').each(function() {
            //Phone number detilas
            $(this).find('.panel-body').find('.glyphicon-phone-alt').parent().filter('span').remove();
            var phone = $(this).find('.panel-body').find('.glyphicon-phone-alt').parent().text();
            var remove_space_pho = phone.replace(/\n/ig, '');
                var final_phone = remove_space_pho == '' ?'null':$.trim(remove_space_pho);
            phones.push(final_phone);
        
            //location
            var location = $(this).find('.panel-heading').find('.pull-right').text();
            areas.push(location);
            $(this).find('.panel-heading').find('.pull-right').remove();

            // Name
            var name = $(this).find('.panel-heading').text();
            var res = name.replace(/\n/ig, '');
            var result = $.trim(res) == '' ? 'null' : $.trim(res);
            names.push(result);

            // Email address
            var email_div = $(this).find('.panel-body').find('.glyphicon-envelope').parent().html();
            if(email_div){
                var email = email_div.replace('<span class="glyphicon glyphicon-envelope"></span>','');
                emails.push($.trim(email));
            }
            else{
                emails.push("null");
            }
             // more 
            var more_div = $(this).find('.panel-footer').find('a').parent().html();
            if(more_div){
                var more = more_div.replace('<span class="glyphicon glyphicon-share"></span>','');
                var href = $(more).prop('href');
                // console.log(href);
                morearr.push(href);
            }
            else{
                morearr.push("null");
            }

        
            // Website 
            var web_div = $(this).find('.panel-body').find('.glyphicon-globe').parent().html();
            if(web_div){
                var website = web_div.replace('<span class="glyphicon glyphicon-globe"></span>','');
                websites.push($.trim(website));
            }
            else{
                websites.push("null");
            }

            // Another Phone
            $(this > earphone_phone_class).contents().filter('span').remove();
            var ear = $(this).find(earphone_phone_class).parent().text();
            var res = ear.replace(/\n/ig, '');
            var result = $.trim(res) == '' ? 'null' : res;
            earphone.push(result);

            // Address Detials
            var test = $(this).find('.panel-body').find('.glyphicon-map-marker').filter('span').remove();
            $(this).find('.panel-body').find('.glyphicon-map-marker').filter('div').remove();
            $(this).find('.panel-body').children().remove();
            var add = $(this).find('.panel-body').text();
            var address_res = add.replace(/\n/ig, '');
            var address_result = $.trim(address_res) == '' ? 'null' : $.trim(address_res);
            address.push(address_result);
                
        });  
        // console.log(names);
        // console.log(areas);
        // console.log(address);
        // console.log(emails);
        // console.log(phones);
        // console.log(earphone);
        // console.log(websites);
        
        var _token = "{{ csrf_token() }}";
        $.ajax({
            url: "{{ route('savedata') }}",
            data: {
                names:names,
                areas:areas,
                address:address,
                phones:phones,
                earphone:earphone,
                websites:websites,
                emails:emails,
                morearr:morearr,
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
