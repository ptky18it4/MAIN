function enabled() {
    document.getElementById("name").disabled = false;
}

// Check confirm password
var check = function() {
    if (document.getElementById('password1').value == document.getElementById('password2').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = '<i class="fas fa-check"></i>';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = '<i class="fas fa-exclamation-triangle"></i>';
    }
}

// input image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function() {
    readURL(this);
});
