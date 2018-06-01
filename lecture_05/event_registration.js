/*
	[Inline event registration by using HTML attributes]

    <a href=“goThere.html” onclick=“startNow()”>
	<a href='goThere.html' onclick="starNo()">

    [Traditional event registration]

    var myElement = document.getElementById(‘1stpara’);
    myElement.onclick = startNow;
    myElement.onclick = startNo2;
    myElement.onclick = null; // to remove


    [IE event registration] // IE8 & Below
    var myElement = document.getElementById(‘1stpara’);
    myElement.attachEvent(‘onclick’, startNow);
    myElement.attachEvent(‘onclick’, startNow2); // additional
    myElement.detachEvent(‘onclick’, startNow);  // to remove
	myElement.attachEvent('onclick', startNo2);

    [W3C DOM event registration]
    var myElement = document.getElementById(‘1stpara’);
    myElement.addEventListener(‘click’, startNow, false);
    myElement.addEventListener(‘click’, startNow2, false);   // additional
    myElement.removeEventListener(‘click’, startNow, false); // to remove
    myElement.addEventListener('click', startNo3, false);
*/