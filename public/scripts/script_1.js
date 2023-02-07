window.onload = addModalHtmlToBody;
         
        function addModalHtmlToBody() {
            let bodyElement = document.getElementsByTagName(`body`).item(0)
            bodyElement.innerHTML +=
                `<div id='myModal' class='modal' style='display: none;position: fixed;z-index: 1;padding-top: 100px;left: 0;top: 0;width: 100%;height: 100%;overflow: auto;background-color: rgb(0,0,0);background-color: rgba(0,0,0,0.4);'>` +
                `  <div class='modal-content' style='background-color: #fefefe;margin: auto;padding: 20px;border: 1px solid #888;width: 80%;font-size: 18px;font-family: Arial, sans - serif; animation: openModal .2s ease;'>` +
                `    <span class='close' style=' color: #aaaaaa;float: right;font-size: 28px;font-weight: bold;'>&times;</span>` +
                `    <h3>Modal title</h3>` +
                `    <div>` +
                `    Name : <strong>Test</strong><br>` +
                `    Content: <p><p><p>content</p></p></p><br>` +
                `</div> ` +
                `  </div>` +
                `<style>.close:hover,.close:focus {color: #000;text-decoration: none;cursor: pointer;} @keyframes openModal{0%{transform: scale(0);}50%{transform: scale(.5); }100%{transform: scale(1);}}</style>` +
                `</div>`;
        
            let head = document.getElementsByTagName('HEAD')[0];
        
            let link = document.createElement('link');
        
            head.appendChild(link);
            setModalActions()
        }
        
        function setModalActions() {
        
            let modal = document.getElementById(`myModal`);
        
            modal.style.display = `block`;
            let span = document.getElementsByClassName(`close`)[0];
            span.onclick = function () {
                modal.style.display = `none`;
            }
            window.onclick = function (event) {
                if (event.target === modal) {
                    modal.style.display = `none`;
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
            xhttp.open(`GET`, `http://test-i.site/api/popapa-view/1`, true);
            xhttp.send();
        }
        