export default function() {
    var inputValue = document.getElementById("task_task").value;
    var submitBtn = document.getElementById('task_omdraaien');
    
    submitBtn.onclick = function() {reverseInput()};
    function reverseInput(str){
        return str;
    }
    var reversedString = reverseString(inputValue);
    console.log(reversedString);
    
    return reversedString;
};
