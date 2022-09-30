var homnay = new Date();
var baygio = homnay.getHours();
var loiChao ;

if (baygio > 18) {
    loiChao = "Chao Buoi Toi!";
} else if (baygio >12) {
    loiChao = "Chao Buoi Trua!";
} else if (baygio > 0) {
    loiChao = "Chao Buoi Sang An Lanh!";
} else {
    loiChao = "Chao Ban!";
}

document.write('<h2>'+ loiChao+'</h2>');




