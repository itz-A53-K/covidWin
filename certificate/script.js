var canvas = document.getElementById('canvas')
var ctx = canvas.getContext('2d')
var nameInput = document.getElementById('name')
var dateInput = document.getElementById('date')
var downloadBtn = document.getElementById('download-btn')

var image = new Image()
image.crossOrigin="anonymous";
image.src = 'vac-cert.jpg'
image.onload = function () {
	drawImage()
}

function drawImage() {
	// ctx.clearRect(0, 0, canvas.width, canvas.height)
	ctx.drawImage(image, 0, 0, canvas.width, canvas.height)
	ctx.font = '30px monotype corsiva'
	ctx.fillStyle = '#29e'
	ctx.fillText(nameInput.value, 95, 220)
	ctx.fillText(dateInput.value, 95, 268)
	//ctx.fillText("Samir Amin", 95, 220)
	//ctx.fillText("21/11/2001", 95, 268)
}

nameInput.addEventListener('input', function () {
	drawImage()
})

downloadBtn.addEventListener('click', function () {
	downloadBtn.href = canvas.toDataURL('image/jpg')
	downloadBtn.download = 'Certificate - ' + nameInput.value + dateInput.value
})
