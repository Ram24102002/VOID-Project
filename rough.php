


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