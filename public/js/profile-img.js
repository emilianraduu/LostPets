document.getElementById('hide_img').onchange = function(evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function() {
            var options = {
                method: "POST",
                body: fr.result,
            }
            console.log(fr.result);
            document.getElementById('avatar').src = fr.result;
            fetch('./upload', options).then((response) => {
                console.log(response);
            }).catch(error => {
                console.log(error);
            })
        }
        fr.readAsDataURL(files[0]);
    }
}