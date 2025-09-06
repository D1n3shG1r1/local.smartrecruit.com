/*Custom script*/


function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
  }
  
  function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.
    
    // get input value
    var input_val = input.val();
    
    // don't validate empty input
    if (input_val === "") { return; }
    
    // original length
    var original_len = input_val.length;
  
    // initial caret position 
    var caret_pos = input.prop("selectionStart");
      
    // check for decimal
    if (input_val.indexOf(".") >= 0) {
  
      // get position of first decimal
      // this prevents multiple decimals from
      // being entered
      var decimal_pos = input_val.indexOf(".");
  
      // split number by decimal point
      var left_side = input_val.substring(0, decimal_pos);
      var right_side = input_val.substring(decimal_pos);
  
      // add commas to left side of number
      left_side = formatNumber(left_side);
  
      // validate right side
      right_side = formatNumber(right_side);
      
      // On blur make sure 2 numbers after decimal
      if (blur === "blur") {
        right_side += "00";
      }
      
      // Limit decimal to only 2 digits
      right_side = right_side.substring(0, 2);
  
      // join number by .
      //input_val = "$" + left_side + "." + right_side;
      input_val = left_side + "." + right_side;
  
    } else {
      // no decimal entered
      // add commas to number
      // remove all non-digits
      input_val = formatNumber(input_val);
      //input_val = "$" + input_val;
      input_val = input_val;
      
      // final formatting
      if (blur === "blur") {
        input_val += ".00";
      }
    }
    
    // send updated string to input
    input.val(input_val);
  
    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
  }
  
  function getUserLocale(cb){
    var ipapi = "http://ip-api.com/json";    
    //var ipapi = "https://json.geoiplookup.io/?callback=?";    
    $.getJSON(ipapi, function(data) {
      return cb(data);
    });
    
  }
  
  
  function callajax(requrl, jsondata, cb){
      var requestUrl = SERVICEURL+"/"+requrl;
      jsondata["_token"] = CSRFTOKEN;
    $.ajax({
          url:requestUrl,
          data:jsondata,
          type:"post",
          dataType:"json",
          success:function(resp){
              return cb(resp);
          },
          error:function(p1,p2,p3){
              
              printLog("p1");
              printLog(p1);
              printLog("p2");
              printLog(p2);
              printLog("p3");
              printLog(p3);
              return cb({C:777, R:[p1,p2,p3],M:"error"});
          }
      });
  }
  
  function isRealValue(arg){
      if(arg != "" && arg != null && arg != undefined){
          return true;
      }else{
          return false;	
      }
  }
  
  function printLog(arg){
      console.log(arg);
  }
  
  function showToast(err,msg){
      
      if(err > 0){
          //error
      $("#toastMessage").removeClass("alert-success");
      $("#toastMessage").addClass("alert-danger");
    }else{
          //success
      $("#toastMessage").removeClass("alert-danger");
      $("#toastMessage").addClass("alert-success");
      }
  
    $("#toastMessage").html(msg);
    $("#toastMessage").show();
    setTimeout(function(){
      $("#toastMessage").hide("slow");
    }, 10000);
    
  
      //alert(msg);
      //printLog(msg);
  
  }
  
  function uniqueId(){
      var x = new Date();
      var UTCseconds = (x.getTime() + x.getTimezoneOffset()*60*1000);
      return UTCseconds;
  }
  
  function showLoader(elmId,loadingTxt){
    var htmlStr = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+loadingTxt;
    $("#"+elmId).html(htmlStr);
  }
  
  function hideLoader(elmId,orgTxt){
      var htmlStr = orgTxt;
    $("#"+elmId).html(htmlStr);
  }

  function capatilizeWordsInPhrase(phrase){
    
    if(phrase.length > 0){
      
      var words = phrase.split(" ");
  
      for (let i = 0; i < words.length; i++) {
          words[i] = words[i][0].toUpperCase() + words[i].substr(1);
      }
  
      return words.join(" ");
    }else{
      var words = "";
      return words;
    }  
  
  }
  
  function validatePhone(phoneNumber){
    if (!/(^\d{5,15}$)/.test(phoneNumber)) {
      return false;
    }
    return true;
  }
  
  function validateEmail(email){
    return String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
  }
  
  function validatePassword(password) {
    // Define validation criteria
    const minLength = 8;
    const maxLength = 20; // Set maximum length
    const hasUpperCase = /[A-Z]/;      // At least one uppercase letter
    const hasLowerCase = /[a-z]/;      // At least one lowercase letter
    const hasNumber = /\d/;            // At least one number
    const hasSpecialChar = /[\W_]/;    // At least one special character
  
    var msg = "Password is valid.";
    var err = 0;
    // Check conditions
    if (password.length < minLength) {
        msg = "Password must be at least 8 characters long.";
        err = 1;
    }
    if (password.length > maxLength) {
       msg = `Password must not exceed ${maxLength} characters.`;
       err = 1;
    }
    if (!hasUpperCase.test(password)) {
        msg = "Password must include at least one uppercase letter.";
        err = 1;
    }
    if (!hasLowerCase.test(password)) {
        msg = "Password must include at least one lowercase letter.";
        err = 1;
    }
    if (!hasNumber.test(password)) {
        msg = "Password must include at least one number.";
        err = 1;
    }
    if (!hasSpecialChar.test(password)) {
        msg = "Password must include at least one special character.";
        err = 1;
    }
  
    return {"err":err,"msg":msg};
  }
  
  function validateName(name) {
    // Define validation criteria
    const minLength = 2;
    const maxLength = 50;
    const validCharacters = /^[A-Za-z\s]+$/; // Only letters and spaces
  
    var msg = "Name is valid.";
    var err = 0;
    
    // Check conditions
    if (name.length < minLength) {
        msg = `Name must be at least ${minLength} characters long.`;
        err = 1;
    }
    if (name.length > maxLength) {
        msg = `Name must not exceed ${maxLength} characters.`;
        err = 1;
    }
    if (!validCharacters.test(name)) {
        msg = "Name can only contain letters and spaces.";
        err = 1;
    }
  
    return {"err":err,"msg":msg};
  }
  