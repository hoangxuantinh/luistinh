// var widthSlide = document.getElementsByClassName("slide")[0].clientWidth;
// var slideShow = document.getElementsByClassName("slide_show")[0];
// var countImg = document.querySelectorAll("img");
// var totalWidth = widthSlide * countImg.length;
// totalWidth -= widthSlide;
// var width = 0;
// function Next(){
//     if(width < totalWidth)  width += widthSlide;
//     else{
//         width = 0;
//     }
//     slideShow.style.marginLeft = '-' + width  + 'px';
// }
// function Back(){
//     if(width == 0)  width = totalWidth;
//     else{
//         width -= widthSlide;
//     }
//     slideShow.style.marginLeft = '-' + width  + 'px';
// }
// setInterval(function(){
//     Next();
// },3000)
var widthSlide = document.getElementsByClassName('slide')[0].clientWidth;
var slideShow = document.getElementsByClassName('slide_show')[0];
var img = document.getElementsByTagName('img');
var maxWidth = widthSlide * img.length;
var total = maxWidth - widthSlide;
var width = 0;
function Next(){
    if(width < total){
        width += widthSlide;
    }else{
        width = 0;
    }
    slideShow.style.marginLeft = '-' + width + 'px';
}
function Back(){
    if(width == 0){
        width = total;
    }else{
        width -= widthSlide;
    }
    slideShow.style.marginLeft = '-' + width + 'px';
}
setInterval(function(){
    Back()
},3000)