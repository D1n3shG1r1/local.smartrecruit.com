@extends("app")
@section("contentbox")
<style>
.descriptionInput {
    resize: none;
}
</style>

<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Create Note</h2>
            </div>
        </div>
        </div>
        <!-- row -->
        <div class="row column1">
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                    <h2>Create Note</h2>
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                    <!-- user profile section --> 
                    <!-- profile image -->
                    <div class="col-lg-12">
                        <div class="full dis_flex center_text">
                        <form class="profile_contant">
                            <div class="form-group row mb-3">
                                <div class="col-md-12">
                                    <label for="noteTitle" class="form-label">Title<span class="required">*</span></label>
                                    <input type="text" class="form-input" name="noteTitle" id="noteTitle" value="">
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <div class="col-md-12">
                                    <label for="noteDescription" class="form-label">Description<span class="required">*</span></label>
                                    
                                    <textarea id="noteDescription" class="form-input descriptionInput" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-md-12">
                                    <label for="noteContent" class="form-label">Content<span class="required">*</span></label>
                                    
                                    <textarea id="noteContent" class="form-input"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-md-12 profile-btn-box">
                                    <button type="button" class="btn cur-p btn-outline-primary">Cancel</button>
                                    <button type="button" id="profSaveBtn" class="btn cur-p btn-primary" data-txt="Save" data-loadingtxt="Saving..." onclick="validateForm(this);">Save</button>
                                </div>
                            </div>
                        </form> 
                        
                        
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        <!-- end row -->
        </div>
        
    </div>
</div>
@endsection
@push("js")
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
// Initialize CKEditor
var editorInstance;
$(function(){
    
    // Initialize CKEditor on the textarea
    ClassicEditor
      .create(document.querySelector('#noteContent'), {
        height: '500px', // Set the height of the editor
        toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
        })
      .then(editor => {
        console.log('CKEditor initialized', editor);
        editorInstance = editor; // Store the editor instance
      })
      .catch(error => {
        console.error('Error initializing CKEditor:', error);
      });
});


function validateForm(elm) {

    //let plainText = editorInstance.getData().replace(/<[^>]*>/g, ''); // Remove HTML tags

    // Validate each field
    var noteTitle = $("#noteTitle").val();
    var noteDescription = $("#noteDescription").val();
    var noteContent = ''; 
    var sakey = '';
    
    // Get CKEditor content if it's initialized
    if (editorInstance) {
        noteContent = editorInstance.getData();
        console.log('Editor Content:', noteContent);
    }

    // Define valid characters pattern for validation
    const validCharacters = /^[A-Za-z0-9-_\s]+$/; // Only letters, numbers, -, _ and spaces

    // Validate Note Title
    if (!isRealValue(noteTitle)) {
        var msg = "Title is required.";
        showToast(1, msg); // Show error toast
        return false;
    }

    if (isRealValue(noteTitle) && !validCharacters.test(noteTitle)) {
        var msg = "Only letters, numbers, - , _ and spaces are allowed in the title.";
        showToast(1, msg); // Show error toast
        return false;
    }

    if (isRealValue(noteTitle) && noteTitle.length < 3 || noteTitle.length > 30) {
        var msg = "Title should be 3 to 30 charcters long.";
        showToast(1, msg); // Show error toast
        return false;
    }

    // Validate Note Description
    if (!isRealValue(noteDescription)) {
        var msg = "Description is required.";
        showToast(1, msg); // Show error toast
        return false;
    }

    if (isRealValue(noteDescription) && !validCharacters.test(noteDescription)) {
        var msg = "Only letters, numbers, - , _ and spaces are allowed in the description.";
        showToast(1, msg); // Show error toast
        return false;
    }

    if (isRealValue(noteDescription) && noteDescription.length < 3 || noteDescription.length > 160) {
        var msg = "Description should be 3 to 160 charcters long.";
        showToast(1, msg); // Show error toast
        return false;
    }
    
    // Validate Note Content
    if (!isRealValue(noteContent)) {
        var msg = "Note content is required.";
        showToast(1, msg); // Show error toast
        return false;
    }
    
    
    var elmId = $(elm).attr("id");
    $(elm).attr("disabled",true);
    var orgTxt = $(elm).attr("data-txt");
    var loadingTxt = $(elm).attr("data-loadingtxt");
    showLoader(elmId,loadingTxt);
    
    var requrl = "admin/savenote";
    var postdata = {
        "title":noteTitle,
        "description":noteDescription,
        "content":noteContent,
        "sakey":sakey
    };

    callajax(requrl, postdata, function(resp){
        $(elm).removeAttr("disabled");
        hideLoader(elmId,orgTxt);
        $(".errorMessage").html(resp.M);
        var err = 1;
        if(resp.C == 100){
            err = 0;
        }
        
        var msg = resp.M;
        showToast(err,msg);
        
    });

}

</script>
@endpush