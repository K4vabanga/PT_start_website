var count = 0;
document.getElementById("myButton").onclick = function () {
	count++;
	if (count % 2 == 0) {
		document.getElemetnById("demo").innerHTML = "";
	} else {
		var img = document.createElement("img");
		img.src = "image/99083393.jpg";
		document.getElementById("demo").appendChild(img);
	}
}
