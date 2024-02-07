
var baseUrl = $("base").attr("href");
// console.log(baseUrl);
$('#myForm').validator().on('submit',function (e) { 
    if (e.isDefaultPrevented()) {
        $('#myForm').validator('validate');
    } else {
        // var response = grecaptcha.getResponse();
        // if(response.length == 0) 
        // { 
        //     e.preventDefault();
        //     return false;
        // }
        $(".submit").attr("disabled", true);
        // $('.fa-icon').show();
        var dataSet = $(this).serialize();
        // submitContactus(dataSet);
        // gtag_report_conversion(baseUrl);
        console.log(baseUrl);

        console.log('DATASET SERIALIZE: '+dataSet);
        console.log('[GTAG] event conversion : LOAD...');
        $.ajax({
            type: "post",
            url: baseUrl+"th/home_bk",
            data: dataSet,
            success: function(data) {
                const obj = JSON.parse(data);
                // console.log(obj.status);
                // console.log(data);
                console.log(obj.status);
                if (obj.status == 'success') {
                    
                    console.log('[GTAG] event conversion : POST SUCCESS');
                    Swal.fire({
                        icon: obj.icon,
                        title: obj.title,
                        text: obj.msg,
                    }).then((result) => {
                        // หากผู้ใช้กด OK
                        if (result.isConfirmed) {
                            // โหลดหน้าเว็บใหม่
                            window.location.href = baseUrl+"th/home_bk";
                        }
                    });
                    // gtag_report_conversion(baseUrl + "th/home_bk");
                    // window.location.href = baseUrl+"th/home_bk";
                } else {
                      
                    console.log('[GTAG] event conversion : POST FAIL');
                    // gtag_report_conversion(baseUrl + "/contactus");
                    // window.location.href = baseUrl+"/contactus";
                }
            },
        });
    }
    return false;
});

function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  
  gtag('event', 'conversion', {
      'send_to': 'AW-645339462/e2qMCK3AyM4BEMay3LMC',
      'event_callback': callback
  });
  
  console.log('[GTAG] event conversion : CALL FUNCTION');
  
  return false;
}


// $(".submit").click(function (e) { 
//     $("#myForm").submit();
//   });



function recaptcha_callback(e){
    $('button[type="submit"]').prop('disabled', false);
    $('#myForm').validator('validate');
    $(".submit").attr("disabled", false);
}