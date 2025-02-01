


// Image Manipulation-----------------------------------------


let imageLeft = document.getElementById('image-left');
let imageLeftInput = document.getElementById('image-left-input');


imageLeftInput.onchange = function(){
    imageLeft.src=URL.createObjectURL(imageLeftInput.files[0]);
}



let imageRight = document.getElementById('image-right');
let imageRightInput = document.getElementById('image-right-input');


imageRightInput.onchange = function(){
    imageRight.src=URL.createObjectURL(imageRightInput.files[0]);
}



// ------------------------------------------------------------------




// Screenshot---------------------------------------------------------


    'use strict';

    const screenshotButton = document.createElement('button');
    const section = document.getElementById('section');
    screenshotButton.textContent = 'Collage';
    screenshotButton.style.position = 'fixed';
    screenshotButton.style.bottom = '10px';
    screenshotButton.style.right = '45%';
    screenshotButton.style.zIndex = 9999;
    screenshotButton.style.height = '50px';
    screenshotButton.style.width = '150px';
    document.body.appendChild(screenshotButton);

    const script = document.createElement('script');
    script.src = "https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js";
    document.head.appendChild(script);

screenshotButton.addEventListener('click', function() {
       
            let div =
                document.getElementById('section');

          
            html2canvas(div).then(
                function (canvas) {
                    document
                    .getElementById('output')
                    .appendChild(canvas);
                })
        })



        <aside class="img-box" id="img-box">
            <article>
                <label for="image-left-input"><img src="https://static.thenounproject.com/png/559530-200.png"  id="image-left" alt=""></label>
                <input type="file" accept="image/jpg, image/png, image/jpeg" id="image-left-input">
            </article>
            <article>
                <label for="image-right-input"><img src="https://static.thenounproject.com/png/559530-200.png"  id="image-right" alt=""></label>
                <input type="file" accept="image/jpg, image/png, image/jpeg" id="image-right-input">
            </article>
        </aside>