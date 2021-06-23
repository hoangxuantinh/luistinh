class ui{
    constructor() {

    }
    showScreen(screenName) {
        let totalScreen = document.querySelectorAll('#wrapper > div');
        // console.log(totalScreen)
        totalScreen.forEach( (screen) => {
            screen.style.display = 'none'
        })
        let currentScreen = document.getElementById(screenName);
        currentScreen.style.display = 'block'
    }
    onClickBtnStart(callback) {
        let btnStart = document.getElementById('btnStart');
        btnStart.addEventListener('click',callback)
    }
    showQuestion(questions){
        document.getElementById('questions').innerHTML = questions.question;
        document.getElementById('answer_0').innerHTML = questions.answer[0];
        document.getElementById('answer_1').innerHTML = questions.answer[1];
        document.getElementById('answer_2').innerHTML = questions.answer[2];
        document.getElementById('answer_3').innerHTML = questions.answer[3];
    }
    onClickAnswer(callback){
        document.getElementById('answer_0').addEventListener('click',() => callback(0))
        document.getElementById('answer_1').addEventListener('click',() => callback(1))
        document.getElementById('answer_2').addEventListener('click',() => callback(2))
        document.getElementById('answer_3').addEventListener('click',() => callback(3))
    }
    setStyleQuestion(index) {
        // var currentQuestion = index;
        document.getElementById('answer_' + index).style.backgroundColor = 'green';

    }
    resetStyleQuestion(index){
        for(var i = 0;i <= 3;i++){
            document.getElementById('answer_' + i).style.backgroundColor = '#ece';
        }
    }
    showCorrectAnswer(index){
        document.getElementById('answer_' + index).style.backgroundColor = 'red';
    }
}