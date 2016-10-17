$(function() {
  $("#contact .contents .form .column ul.twoColumn li ul.radio li a").click(function (e) {
      e.preventDefault();
     if($(this).parent().hasClass("radio01")){
      if($(this).hasClass('active')){
        $(this).removeClass("active");
        $("#contact .contents .form .column ul.twoColumn  li ul.radio li.radio02 a").addClass("active");
        $('input[name="radio01"]').prop("checked",false);
        $('input[name="radio02"]').prop("checked",true);
      }else{
        $(this).addClass("active");
        $("#contact .contents .form .column ul.twoColumn  li ul.radio li.radio02 a").removeClass("active");
        $('input[name="radio01"]').prop("checked",true);
        $('input[name="radio02"]').prop("checked",false);
      }
    }else{
      if($(this).hasClass('active')){
        $(this).removeClass("active");
        $("#contact .contents .form .column ul.twoColumn  li ul.radio li.radio01 a").addClass("active");
        $('input[name="radio01"]').prop("checked",true);
        $('input[name="radio02"]').prop("checked",false);
      }else{
        $(this).addClass("active");
        $("#contact .contents .form .column ul.twoColumn  li ul.radio li.radio01 a").removeClass("active");
        $('input[name="radio01"]').prop("checked",false);
        $('input[name="radio02"]').prop("checked",true);
      }
    }
  });
});
  function inputRequired(target) {
    var result = false;
    if ($(target).val() == "") {
      $(target).parent().find("div.ok").hide();
      $(target).parent().find("div.miss").show();
      $(target).parent().find('div.miss').html("入力されていません");
      $(target).addClass('miss');
    } else {
      $(target).parent().find("div.miss").hide();
      $(target).parent().find("div.ok").show();
      $(target).removeClass('miss');
      result = true;
    }
    return result;
  }
  function checkRequired(target) {
    var result = false;
    if ($(target).parents('div.column').find('a.active').length > 0) {
      $(target).parents('div.column').find('div.ok').show();
      $(target).parents('div.column').find('div.miss').hide();
      result = true;
    } else {
      $(target).parents('div.column').find('div.ok').hide();
      $(target).parents('div.column').find('div.miss').show();
    }
    return result;
  }
  function checkRequired2(target) {
    var result = false;
    if ($(target).parents('div.column').find('a.ok').length > 0) {
      $(target).parents('div.column').find('div.miss').hide();
      result = true;
    } else {
      $(target).parents('div.column').find('div.miss').show();
    }
    return result;
  }
  function mailValid(target) {
    if ($(target).val().length == 0) {
      return false;
    }
    if (!$(target).val().match(/^[A-Za-z0-9]+[\w-]+@[\w\.-]+\.\w{2,}$/)) {
      $(target).parent().find("div.ok").hide();
      $(target).parent().find("div.miss").show();
      $(target).parent().find('div.miss').html("メールアドレスが正しくありません");
      $(target).addClass('miss');
      return false;
    } else {
      $(target).parent().find("div.miss").hide();
      $(target).parent().find("div.ok").show();
      $(target).removeClass('miss');
    }
    return true;
  }
  function mailMatch() {
    if ($("#mail1").val().length > 0 && $("#mail2").val().length > 0) {
      if ($("#mail1").val().length > 0 && $("#mail2").val().length > 0 && $("#mail1").val() != $("#mail2").val()) {
        $("#mail2").parents('div.column').find('div.miss').html("確認用メールアドレスが一致しません");
        $("#mail2").parents('div.column').find('div.ok').hide();
        $("#mail2").parents('div.column').find('div.miss').show();
        $("#mail2").addClass('miss');
        return false;
      } else {
        $("#mail2").parents('div.column').find('div.ok').show();
        $("#mail2").parents('div.column').find('div.miss').hide();
        $("#mail2").removeClass('miss');
      }
    }
    return true;
  }

  function phoneValid(target) {
    if ($(target).val().length <= 0) {
      return false;
    }
    if (!$(target).val().match(/^[0-9-]+$/)) {
      $(target).parent().find("div.ok").hide();
      $(target).parent().find("div.miss").show();
      $(target).parent().find('div.miss').html("半角の数字とハイフンで入力してください。");
      $(target).addClass('miss');
      return false;
    } else {
      $(target).parent().find("div.miss").hide();
      $(target).parent().find("div.ok").show();
      $(target).removeClass('miss');
    }
    return true;
  }

  $(document).ready(function(){
    $(".inputRequired").change(function(e) {
      inputRequired(e.target);
    });

    $(".inputRequired").blur(function(e) {
      inputRequired(e.target);
    });

    $("#mail1").blur(function(e) {
      if (mailValid(e.target)) {
        mailMatch();
      }
      
    });
    $("#mail2").blur(function(e) {
      if (mailValid(e.target)) {
        mailMatch();
      }
    });
    $("#phone").blur(function(e) {
      phoneValid(e.target);
    }); 

    $(".checkRequired").click(function(e) {
      checkRequired(e.target);
    });
    $(".checkRequired2").click(function(e) {
      checkRequired2(e.target);
    });
  });

  function validate() {
    $("#sendCheck").val(0);
    $("#contactType").val(0);

    var result = true;
    $(".inputRequired").each(function() {
      if (!inputRequired($(this))) {
        result = false;
      }
    });
    $(".checkRequired").each(function() {
      if (!checkRequired($(this))) {
        result = false;
      } else {
        if ($(this).hasClass('active') && $(this).hasClass('contactType1')) {
          $("#contactType").val(1);
        } else if ($(this).hasClass('active') && $(this).hasClass('contactType2')) {
          $("#contactType").val(2);
        }
      }
    });
    $(".checkRequired2").each(function() {
      if (!checkRequired2($(this))) {
        result = false;
      } else {
        if ($(this).hasClass('ok') && $(this).hasClass('sendConfirm')) {
          $("#sendCheck").val(1);
        }
      }
    });

    var chk = mailValid($("#mail1")) && mailValid($("#mail2"));
    if (chk) {
      if (!mailMatch()) {
        result = false;
      }
    } else {
      result = false;
    }
    
    chk = phoneValid($("#phone"));
    if (!chk) {
      result = chk;
    }

    if($(".radio01").find('a.active').parent().hasClass("radio01") ){ 
      $("#sexValue").val($('input[name="radio01"]').val());
    } else {
      $("#sexValue").val($('input[name="radio02"]').val());
    }

    return result;
  }