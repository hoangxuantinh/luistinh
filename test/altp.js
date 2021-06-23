var questions = [
    {
        question:'Ai giàu nhất',
        answer:['tau','mi','Tý','Tèo'],
        correct:0
    },
    {
        question:'Ai nghèo nhất',
        answer:['tau','mi','Tý','Tèo'],
        correct:1,
    },
]
class altp{
    constructor() {
        this.ui = new ui();
        this.ui.showScreen('wellcomeScreen');
        this.startSound = new sound('start.mp3');
        this.bgSound = new sound('bg.mp3');
        this.waitAnswer = new sound('waitAnswer.mp3');
        this.correctAnswer = new sound('correct_answer.mp3');
        this.wrongAnswer = new sound('wrongAnswer.mp3');

        this.currenQuestion = 0;
        this.currentAnswer = null;
        this.ui.onClickBtnStart(() => {
            this.start()
        })
    }
    start() {
        this.startSound.start(() => {
            this.bgSound.start()
        });
        this.ui.showScreen('questionScreen');
        this.ui.showQuestion(questions[this.currenQuestion]);
        this.ui.onClickAnswer((answer) => {
            this.currentAnswer = answer;
            this.bgSound.stop()
            this.ui.setStyleQuestion(answer)
            this.waitAnswer.start(() => {
                this.checkAnswer()
            })
            
        })
    }
    checkAnswer() {
        if(this.currentAnswer == questions[this.currenQuestion].correct){
            this.correctAnswer.start(() => {
                this.currenQuestion++;  
                this.ui.resetStyleQuestion();             
                this.start()
            })
        }else{
            this.ui.showCorrectAnswer(questions[this.currenQuestion].correct);
            this.wrongAnswer.start(() => {
                this.reset()
            })
        }
    }
    reset() {
        this.ui.showScreen('wellcomeScreen');
        this.bgSound.start()

    }
}
var game = new altp();