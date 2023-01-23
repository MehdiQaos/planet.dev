
function loadFile(e){
    var image = document.getElementById('profile_image');
	image.src = URL.createObjectURL(e.target.files[0]);
}