window.onload = addModalHtmlToBody;

function addModalHtmlToBody() {
    let bodyElement = document.getElementsByTagName("body").item(0)
    bodyElement.innerHTML +=
        "<h2>Modal Example</h2>" +
        "<div id='myModal' class='modal'>" +
        "  <div class='modal-content'>" +
        "    <span class='close'>&times;</span>" +
        "    <h3>Modal title</h3>" +
        "    <div>" +
        "    Name : <strong>{{$popapa->title}}</strong><br>" +
        "    Content: <p>{{$popapa->content}}</p><br>" +
        "</div> " +
        "  </div>" +
        "</div>";

    let head = document.getElementsByTagName('HEAD')[0];

    let link = document.createElement('link');

    link.rel = 'stylesheet';

    link.type = 'text/css';

    link.href = 'style.css'; //shuna deregem .css faylyna link goyay, her sahypada senin stayyllaryny alyp biler yaly

    head.appendChild(link);
    setModalActions()
}

function setModalActions() {

    let modal = document.getElementById("myModal");

    modal.style.display = "block";
    let span = document.getElementsByClassName("close")[0];
    span.onclick = function () {
        modal.style.display = "none";
    }
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
    setTimeout(increaseViewCount, 10000)
}


function increaseViewCount() {
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {

        }
    };
    xhttp.open("GET", "http:\\localhost:3001\\api\\v1\\public\\get-params\\:id", true);
    xhttp.send();
}

// http:\\localhost:3001\api\v1\public\get-params\:id
// suny example gornshinde yazandyryn shuna derek oz url goyay :id dp
// duran yerina san goymalydyr
