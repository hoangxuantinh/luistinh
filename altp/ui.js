class ui{
    constructor(){

    }
    showScreen(screenName) {
        let totalScreen = document.querySelectorAll('#wrapper > div');
        totalScreen.forEach( (screen) => {
            screen.style.display = "none"
        })

        let currentScreen = document.getElementById(screenName);
        currentScreen.style.display = "block"
    }
    onClickBtnStart(callBack) {
        
        let btnStart = document.getElementById('btnStart');
        btnStart.addEventListener('click',callBack);
        
    }
    showQuestion(questions) {
        document.getElementById('questions').innerHTML = questions.question; 
        document.getElementById('answer_1').innerHTML = questions.answer[0]; 
        document.getElementById('answer_2').innerHTML = questions.answer[1]; 
        document.getElementById('answer_3').innerHTML = questions.answer[2]; 
        document.getElementById('answer_4').innerHTML = questions.answer[3]; 
    }
    onClickAnswer(callback) {
        document.getElementById('answer_1').addEventListener('click',() => callback(0));
        document.getElementById('answer_2').addEventListener('click',() => callback(1));
        document.getElementById('answer_3').addEventListener('click',() => callback(2));
        document.getElementById('answer_4').addEventListener('click',() => callback(3));
    }
    setSelectorAnswer(answer) {
        let answerIndex = answer + 1;
        let answerDivId = 'answer_' + answerIndex;
        document.getElementById(answerDivId).style.backgroundColor = '#08b51c'
        

    }
    showCorrectAnswer(correctAnswer) {
        let answerIndex = correctAnswer + 1;
        let answerDivId = 'answer_' + answerIndex;
        let myDiv = document.getElementById(answerDivId);
        myDiv.classList.add('quadrat');
        // .style.backgroundColor = '#022d62';

    }
    resetAnswerStyle() {
        for(let i = 1;i <= 4;i++){
            let myDiv = document.querySelectorAll('#answer_' + i);
            myDiv.forEach((element) => {
                element.classList.remove('quadrat');
                element.style.backgroundColor = '#022d62';
            })
            
        }
    }
}