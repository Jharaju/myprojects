const msgBox = document.getElementById('msgBox');
const textArea = document.getElementById('userText');
const btn = document.getElementById('bt_btn');
let startTime, endTime;

const setOfWords = [`This is me, and i want to test my typing speed.`,
`Lets careful your each word is counting.`,`Be careful on spaces you are entering, this is also noticed by the system.`,
`Give your best to raise your good typing quality.`,`Try and try once more until you became awesome.`];

const playGame = () => {
    let randomNumber = Math.floor(Math.random() * setOfWords.length);
    msgBox.innerText = setOfWords[randomNumber];
    let date = new Date();
    startTime = date.getTime();
    btn.innerText = `Done`;

}
const matchWord = (one, two) => {
    let wordFst = one.split(" ");
    let wordScnd = two.split(" ");
    let cnt = 0;

    wordFst.forEach(function (itm, ind) {
        if (itm === wordScnd[ind]) {
            cnt++;
        }
    })
    let errorWords = ( wordFst.length - cnt );
    return (`${cnt} correct out of ${wordFst.length} words. and the total number of error are ${errorWords}.`);

}

const countLength = (e) =>{
    let count = e.split(" ").length;
    // console.log(count);
    return count;

}


const endGame = () => {
    let date = new Date();
    endTime = date.getTime();
    const totalTime = ((endTime - startTime) / 1000);

    let wordCount = textArea.value;
    let countWord = countLength(wordCount);

    const speed = Math.round((countWord / totalTime) * 60);
    let finalMsg = `You typed total at ${speed} words per minute. `;
    finalMsg += matchWord (msgBox.innerText, wordCount);

    msgBox.innerText = finalMsg;

}



bt_btn.addEventListener('click', function() {
    if (this.innerText == `Test`) {
        textArea.value = "";
        textArea.disabled = false;
        playGame();
    } else if (this.innerText == `Done`) {
         endGame();
        textArea.disabled = true;
        bt_btn.innerHTML = "Test";
       

    }

})