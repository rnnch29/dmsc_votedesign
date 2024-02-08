
var baseUrl = $("base").attr("href");
var siteKey = '6LcjYmspAAAAAOg9vEosPbnSFqtRITr2qcB-w-kF';
// var siteKey = '6LcjYmspAAAAAOg9vEosPbnSFqtRITr2qcB-w-kF-falsekey';

// console.log(baseUrl);
$('#myForm').on('submit', function (e) {

    e.preventDefault();
    // var response = grecaptcha.getResponse();
    // if(response.length == 0) 
    // { 
    //     e.preventDefault();
    //     return false;

            $(".submit").attr("disabled", true);


            // var recaptchaVal = $('#recaptcha').val();
            // submitContactus(dataSet);
            // gtag_report_conversion(baseUrl);
            // console.log(baseUrl);
            // console.log(recaptchaVal);

            grecaptcha.ready(function() {
                grecaptcha.execute(siteKey, {action: 'submit'}).then(function(token) {
                    // Add your logic to submit to your backend server here.             
                    if(token){             
                        $('#recaptcha').val(token);
                        submitVote();
                    }
                });
            });


    return false;
});

// function gtag_report_conversion(url) {
//     var callback = function () {
//         if (typeof (url) != 'undefined') {
//             window.location = url;
//         }
//     };

//     gtag('event', 'conversion', {
//         'send_to': 'AW-645339462/e2qMCK3AyM4BEMay3LMC',
//         'event_callback': callback
//     });

//     console.log('[GTAG] event conversion : CALL FUNCTION');

//     return false;
// }


// $(".submit").click(function (e) { 
//     $("#myForm").submit();
//   });

// function recaptcha_callback(e) {
//     $('button[type="submit"]').prop('disabled', false);
//     $('#myForm').validator('validate');
//     $(".submit").attr("disabled", false);
// }


function submitVote() {
    // console.log('DATASET SERIALIZE: ' + dataSet);
    
    var dataSet = $("#myForm").serialize();
    console.log('[GTAG] event conversion : LOAD...');
    console.log(dataSet);
    

    $.ajax({
        type: "post",
        url: baseUrl + "th/home",
        data: dataSet,
        success: function (data) {
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
                    confirmButtonColor: "#004298",
                    confirmButtonText: "ตกลง"
                }).then((result) => {
                    // หากผู้ใช้กด OK
                    if (result.isConfirmed) {
                        // โหลดหน้าเว็บใหม่
                        window.location.href = baseUrl + "th/home";
                    }
                });
                // gtag_report_conversion(baseUrl + "th/home");
                // window.location.href = baseUrl+"th/home";
            } else {

                console.log('[GTAG] event conversion : POST FAIL');
                // Swal.fire({
                //     icon: obj.icon,
                //     title: obj.title,
                //     text: obj.msg,
                //     confirmButtonColor: "#3085d6",
                //     confirmButtonText: "ตกลง"
                // }).then((result) => {
                //     // หากผู้ใช้กด OK
                //     if (result.isConfirmed) {
                //     }
                // });
                // gtag_report_conversion(baseUrl + "/contactus");
                // window.location.href = baseUrl+"/contactus";
            }
        },
    });
}