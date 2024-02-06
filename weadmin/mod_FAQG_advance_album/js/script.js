function onChangeSelect(fileAc, elemID) {

  jQuery.blockUI({
      message: jQuery('#tallContent'),
      css: {
          border: 'none',
          padding: '35px',
          backgroundColor: '#000',
          '-webkit-border-radius': '10px',
          '-moz-border-radius': '10px',
          opacity: .9,
          color: '#fff'
      }
  });

  var TYPE = "POST";
  var URL = fileAc;

  var dataSet = jQuery("#myForm").serialize();

  jQuery.ajax({
      type: TYPE,
      url: URL,
      data: dataSet,
      success: function(html) {
          jQuery(elemID).show();
          jQuery(elemID).html(html);
          setTimeout(jQuery.unblockUI, 200);
      }
  });
}

function onChangeSelectHome(fileAc, elemID) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });
  
    var TYPE = "POST";
    var URL = fileAc;
  
    var dataSet = jQuery("#myFormHome").serialize();
  
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery(elemID).show();
            jQuery(elemID).html(html);
            setTimeout(jQuery.unblockUI, 200);
        }
    });
  }

function onChangeSelect2(fileAc, elemID) {

    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });
  
    var TYPE = "POST";
    var URL = fileAc;
  
    var dataSet = jQuery("#myForm").serialize();
  
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery(elemID).show();
            jQuery(elemID).html(html);
            setTimeout(jQuery.unblockUI, 200);
            document.myForm.submit();
        }
    });
  }

$('select[name="inputGroupID"]').on('change', function(){
    let type = $('option:selected', $(this)).data('type');
    let masterkey = $('#masterkey').val();
    
    if (type == 2 || masterkey == 'ab_nm') {
        $('.boxPic').show();
    }else{
        $('.boxPic').hide();
    }
});


function checkUrl(el) {
    jQuery.blockUI({
        message: jQuery('#tallContent'),
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .9,
            color: '#fff'
        }
    });
  
    var TYPE = "POST";
    var URL = "./checkurl.php";
    var dataSet = jQuery("#myForm").serialize();
  
    var url = jQuery(el).val();
  
    // make the url lowercase         
    var encodedUrl = url.toString().toLowerCase();
  
    // replace & with and           
    encodedUrl = encodedUrl.split(/\&+/).join("-and-")
  
    // remove invalid characters 
    encodedUrl = encodedUrl.split(/[^a-z0-9ก-๙]/).join("-");
  
    // remove duplicates 
    encodedUrl = encodedUrl.split(/-+/).join("-");
  
    // trim leading & trailing characters 
    encodedUrl = encodedUrl.trim('-');
  
    jQuery(el).val(encodedUrl);
  
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(res) {
          let data = JSON.parse(res);
          $('#urlstatus').html(data.msg);
          $('#inputUrlcheck').val(data.status);
          $('#urlstatus').css('color',data.color);
          if (data.status == 'Disabled') {
            jQuery("#inputShortUrl").addClass("formInputContantTbAlertY");
          }else{
            jQuery("#inputShortUrl").removeClass("formInputContantTbAlertY");
          }
  
          if (!$(el).val()) {
            $('#inputUrlEmpty').val('false');
            $('#urlstatus').text(" - ");
            $('#urlstatus').css('color' ,'#8496aa');
          }else{
            $('#inputUrlEmpty').val('true');
          }
          setTimeout(jQuery.unblockUI, 200);
        }
    });
}
  
function executeUrl(el) {
// var valPass = 's=' + randomString(2);
let length = 5;
let result = '';
let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
let charactersLength = characters.length;
for ( var i = 0; i < length; i++ ) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength)).toLowerCase();
}
jQuery('#inputShortUrl').val(result);

var TYPE = "POST";
var URL = "./checkurl.php";
var dataSet = jQuery("#myForm").serialize();
jQuery.ajax({
    type: TYPE,
    url: URL,
    data: dataSet,
    success: function(res) {
    let data = JSON.parse(res);
    $('#urlstatus').html(data.msg);
    $('#inputUrlcheck').val(data.status);
    $('#urlstatus').css('color',data.color);
    if (data.status == 'Disabled') {
        jQuery("#inputShortUrl").addClass("formInputContantTbAlertY");
    }else{
        jQuery("#inputShortUrl").removeClass("formInputContantTbAlertY");
    }

    if (!$(el).val()) {
        $('#inputUrlEmpty').val('false');
        $('#urlstatus').text(" - ");
        $('#urlstatus').css('color' ,'#8496aa');
    }else{
        $('#inputUrlEmpty').val('true');
    }
    setTimeout(jQuery.unblockUI, 200);
    }
});
}