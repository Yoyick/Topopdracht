var submitBtn = document.getElementById("reverse_omdraaien");
var output = document.getElementById("output");

submitBtn.onclick = function() {reverseInput()};
function reverseInput(str){
    var inputValue = document.getElementById("reverse_input").value;
    var reversedString = reverseString(inputValue);
    output.innerText = reversedString;          
}
function reverseString(str) {
    var splitString = emojiStringToArray(str); 
    var reverseArray = splitString.reverse();
    var joinArray = reverseArray.join("");
    return joinArray;
}
function specialChar(s) {
    return /[^\u0000-\u00ff]/.test(s);
}
function emojiStringToArray(str) {
    split = str.split(/([\uD800-\uDBFF][\uDC00-\uDFFF])/);
    arr = [];
    for (var i=0; i<split.length; i++) {
        char = split[i]
        if (char !== "") {
            if(!specialChar(char)){
                char = char.split("");
                char = char.reverse();
                char = char.join("");
            }
        arr.push(char);
        }
    }
    return arr;
};