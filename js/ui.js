$(document).ready(function () {

  $('.tooltipped').tooltip({ delay: 8000, displayLength: 8000 });

  var current_page = window.location.href;
  
  var position = current_page.search("pageEdited");
  if (position != -1) {
    var text = '<span><span class="green-text">STATUS:</span> Page Edited Successfully!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("preview");
  if (position != -1) {
    var text = '<span><span class="orange-text">STATUS:</span> See how far you\'ve gone.</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("deploy");
  if (position != -1) {
    var text = '<span><span class="green-text">STATUS:</span> Your Website is now ready.</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("edit_page");
  if (position != -1) {
    // var text = '<span><span class="green-text">STATUS:</span> Editing Page</span>';
    // M.toast({ html: text, displayLength: 8000 });
    $('#modal1').modal('open');
  }
  var position = current_page.search("pageNotCreated");
  if (position != -1) {
    var text = '<span><span class="red-text">STATUS:</span> Page Not Created</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("pageCreated");
  if (position != -1) {
    var text = '<span><span class="green-text">STATUS:</span> Page Created Successfully!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("login_good");
  if (position != -1) {
    var text = '<span><span class="green-text">STATUS:</span> Login Successful!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("invalid");
  if (position != -1) {
    var text = '<span><span class="red-text">STATUS:</span> Incorrect Credentials</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("signup_good");
  if (position != -1) {
    var text = '<span><span class="green-text">STATUS:</span> Signup Successful!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("alreadySignedUp");
  if (position != -1) {
    var text = '<span><span class="red-text">STATUS:</span> Account Already Exists</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("fields_bad");
  if (position != -1) {
    var text = '<span><span class="red-text">STATUS:</span> Please Fill in Form Correctly!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("bad_image");
  if (position != -1) {
    var text = '<span><span class="red-text">STATUS:</span> Please Attach Smaller Images.</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("form_submitted");
  if (position != -1) {
    var text = '<span><span class="green-text">STATUS:</span> Form Submitted Successfully!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("edit_good");
  if (position != -1) {
    var text = '<span><span class="green-text">STATUS:</span> Edit Successful!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("logged_in");
  if (position != -1) {
    var text = '<span><span class="green-text">STATUS:</span> You Are Logged In!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("logged_out");
  if (position != -1) {
    var text = '<span><span class="red-text">STATUS:</span> You Are Logged Out!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("log_out");
  if (position != -1) {
    var text = '<span><span class="orange-text">STATUS:</span> You have Logged Out!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("login_admin");
  if (position != -1) {
    var text = '<span><span class="green-text">STATUS:</span> Logged In as Admin!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("_form_admin.php");
  if (position != -1) {
    var text = '<span><span class="orange-text">STATUS:</span> This form can NOT be edited, Only Reviewed.</span>';
    M.toast({ html: text, displayLength: 10000 });
  }
  var position = current_page.search("form_approved");
  if (position != -1) {
    var text = '<span><span class="green-text">STATUS:</span> Form Aproved Successfully.</span>';
    M.toast({ html: text, displayLength: 8000 });
  }
  var position = current_page.search("form_denied");
  if (position != -1) {
    var text = '<span><span class="red-text">STATUS:</span> Form Has Been DENIED!</span>';
    M.toast({ html: text, displayLength: 8000 });
  }


 
        
  const menus = document.querySelectorAll('.mobile-demo');
  M.Sidenav.init(menus, {edge: 'right'});

  const forms = document.querySelectorAll('.side-form');
  M.Sidenav.init(forms, {edge: 'left'});

  $('input#input_text, textarea#textarea1').characterCounter();

});
