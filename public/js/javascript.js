document.addEventListener("DOMContentLoaded", function() {
    var input = document.getElementById("myInput");
    var form = document.getElementById("myForm");

    input.addEventListener("input", function() {
        if (this.value.length === 8) {
            form.submit();
        }
    });
});
