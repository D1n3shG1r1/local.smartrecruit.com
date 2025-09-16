            <!-- footer -->
            <div class="container-fluid">
                <div class="footer">
                <p>Copyright © {{date("Y")}}. All rights reserved.<br><br>
                    Powered by: Smart Technology Services Ltd</a>
                </p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 style="font-weight:normal;" class="modal-title">Action Required: Complete Your Profile</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
            It seems like you have not completed your profile.
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="font-weight:normal;" class="modal-title" id="confirmModalLabel"></h5>
      </div>
      <div class="modal-body" id="confirmMessage">
        <!-- Dynamic content will go here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" id="confirmCancelBtn">Cancel</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="confirmBtn">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!--- ask for special-access-key --->
<div class="modal fade" id="SAKeyModal" tabindex="-1" aria-labelledby="SAKeyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="font-weight:normal;" class="modal-title" id="SAKeyModalLabel"></h5>
      </div>
      <div class="modal-body">
        <span id="SAKeyMessage"></span>
        <input type="text" id="SAKeyInput" class="form-control" placeholder="Enter your Special Access Key">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" id="SAKeyCancelBtn">Cancel</button>
        <button type="button" class="btn btn-primary" id="SAKeyConfirmBtn">Confirm</button>
      </div>
    </div>
  </div>
</div>
<!--- / ask for special-access-key --->

<!--- contact modal --->
<div class="modal fade" id="contactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="contactModalLabel" class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">


            <div class="form-group row mb-3">
              
              <div class="col-md-12">
                <label for="toemail" class="form-label">To Email<span class="required">*</span></label>
                <input type="email" class="form-input" name="recieverEmail" id="recieverEmail" placeholder="Candidate email" value="" readonly>
                <input type="hidden" class="form-input" name="recieverId" id="recieverId" value="" readonly>
                <input type="hidden" class="form-input" name="recieverFname" id="recieverFname" value="" readonly>
                <input type="hidden" class="form-input" name="recieverLname" id="recieverLname" value="" readonly>
 
              </div>
              
              <div class="col-md-12">
                <label for="subject" class="form-label">Subject<span class="required">*</span></label>
                <input type="text" class="form-input" name="subject" id="subject" placeholder="Subject">
              </div>
            
              <div class="col-md-12">
                <label for="message" class="form-label">Message<span class="required">*</span></label>
                <textarea id="message" maxlength="320" rows="10" class="form-control" style="resize: none;" placeholder="Type your message." oninput="updateMessageCharacterCount()"></textarea>
                <p class="text-align-right">Remaining characters: <span id="msgRemainingChars">320</span></p>
              </div>
              
            </div>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="sendQtBtn" class="btn btn-primary" data-txt="Send Message" data-loadingtxt="Sending..." onclick="sendMessage(this);">Send Message</button>
            </div>
        </div>
    </div>
</div>
<!--- / contact modal --->

<div class="modal-backdrop"></div>

@php
$incompleteProfile = $LOGINUSER["incompleteProfile"];
@endphp 
<script>
$(function(){
    
    var incompleteProfile = '{{ $incompleteProfile }}';
    
    incompleteProfile = parseInt(incompleteProfile);

    if(incompleteProfile == 1){
        // Get the modal element
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));

        // Show the modal
        myModal.show();

    }
});

function editProfilePhoto(elm){
  const fileInputId = $(elm).attr("data-fileelm");
  console.log(fileInputId);
  $("#"+fileInputId).trigger("click");
}

function ppDailog(){
  const imageInput = document.getElementById('ProfilePhotoFile');
  const file = imageInput.files[0];

  // Validate file type (only allow jpg, jpeg, or png)
  if (!file) {
      var err = 1;
      var msg = "No file selected!";
      showToast(err,msg);
      return;
  }
  const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
  if (!allowedTypes.includes(file.type)) {
      var err = 1;
      var msg = "Please upload a valid image file (JPG, JPEG, or PNG).";
      showToast(err,msg);
      return;
  }

  if (file.size > 5 * 1024 * 1024) { // 5MB limit
      var err = 1;
      var msg = "File size should not exceed 5MB.";
      showToast(err,msg);
      return;
  }

  // Create an image object to load the selected file
  const img = new Image();
  const reader = new FileReader();

  reader.onload = function(e) {
      img.src = e.target.result;
  };

  reader.readAsDataURL(file);

  // Once the image is loaded, resize it
  img.onload = function() {
      // Create a canvas element for resizing
      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');

      // Resize the image to 500x500 pixels
      const width = 500;
      const height = 500;
      canvas.width = width;
      canvas.height = height;

      // Draw the resized image onto the canvas
      ctx.drawImage(img, 0, 0, width, height);

      // Convert the canvas image back to a data URL
      const resizedImage = canvas.toDataURL('image/jpeg'); // You can also use 'image/png' here if needed

      // Display the resized image as a preview
      //$(".profilephotoimg").attr("src",resizedImage);
      //const imagePreviewDiv = document.getElementById('imagePreview');
      //imagePreviewDiv.innerHTML = `<img src="${resizedImage}" alt="Resized Image" width="200">`;

      const requrl = "admin/saveprofilephoto";
      const postdata = {
          "imgData":resizedImage
      };
      callajax(requrl, postdata, function(resp){
          $(".errorMessage").html(resp.M);
          var err = 1;
          if(resp.C == 100){
              err = 0;
              var imagePath = resp.R.path;
              $(".profilephotoimg").attr("src",resizedImage);
          }
          
          var msg = resp.M;
          showToast(err,msg);
          
      });

  };
}


function updateMessageCharacterCount() {
  var textarea = document.getElementById("message");
  var remainingChars = document.getElementById("msgRemainingChars");
  var maxLength = textarea.getAttribute("maxlength");
  var currentLength = textarea.value.length;

  var charsLeft = maxLength - currentLength;
  remainingChars.textContent = charsLeft;

  if (charsLeft <= 0) {
      remainingChars.style.color = "red";
  } else {
      remainingChars.style.color = "black";
  }
}

function sendMessage(elm){
    //send email
    var myModal = new bootstrap.Modal(document.getElementById('contactModal'));

    //recieverId recieverEmail subject message
    var recieverId = $("#recieverId").val();
    var recieverFname = $("#recieverFname").val();
    var recieverLname = $("#recieverLname").val();
    var recieverEmail = $("#recieverEmail").val();
    var subject = $("#subject").val();
    var message = $("#message").val();
    
    if(!isRealValue(subject)){
        var err = 1;
        var msg = "Please type subject line.";
        showToast(err,msg);
        return false;
    }

    if(!isRealValue(message)){
        var err = 1;
        var msg = "Please type your message.";
        showToast(err,msg);
        return false;
    }
    
    if(message.length > 320){
        var err = 1;
        var msg = "Your message cannot exceed 320 characters.";
        showToast(err,msg);
        return false;
    }

    var elmId = $(elm).attr("id");
    $(elm).attr("disabled",true);
    var orgTxt = $(elm).attr("data-txt");
    var loadingTxt = $(elm).attr("data-loadingtxt");
    showLoader(elmId,loadingTxt); 

    var requrl = "admin/sendmessage";
    var jsondata = {
      "recieverId":recieverId,
      "recieverFname":recieverFname,
      "recieverLname":recieverLname,
      "recieverEmail":recieverEmail,
      "subject":subject,
      "message":message
    };
    
    callajax(requrl, jsondata, function(resp){
        $(elm).removeAttr("disabled");
        hideLoader(elmId,orgTxt);
        
        $("#message").val("");
        myModal.hide();

        if(resp.C == 100){
            var err = 0;
            var msg = "Your message has been submitted.";
            showToast(err,msg);  

            
            $('#contactModal').modal('hide');

        }else{
            var err = 1;
            var msg = "Your session has expired. Please log in again to continue.";
            showToast(err,msg);    
        }

        $('#contactModal').modal('hide');

        $(".modal-backdrop").removeClass("fade");
        $(".modal-backdrop").removeClass("show");
    });
}

</script>