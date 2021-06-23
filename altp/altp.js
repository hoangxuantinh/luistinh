var questions = [
    {
        question: 'Câu số 1: Câu nói nào làm nên tên tuổi của anh Huấn',
        answer:['Có công mài sắt có ngày nên kim ',
        'Có Làm thì mới có ăn',
        'Liều ăn nhiều',
        'Lớp 5 tao còn chưa sợ'],
        correct:1
    },
    {
        question:'Câu số 2: Giỗ tổ Hùng Vương là ngày nào?',
        answer:['8-3',
        '26-3',
        '10-3',
        '28-4'],
        correct:2
    },
    {
        question:'Câu số 3: Giỗ tổ Hùng Vương là ngày nào?',
        answer:['8-3',
        '26-3',
        '10-3',
        '28-4'],
        correct:2
    },
    {
        question:'Câu số 4: Giỗ tổ Hùng Vương là ngày nào?',
        answer:['8-3',
        '26-3',
        '10-3',
        '28-4'],
        correct:2
    },
    {
        question:'Câu số 5: Giỗ tổ Hùng Vương là ngày nào?',
        answer:['8-3',
        '26-3',
        '10-3',
        '28-4'],
        correct:2
    },
]
class altp{
    constructor() {
        this.ui = new ui();
        this.ui.showScreen('welcomeScreen')
        this.soundStart = new sound('start.mp3')
        this.bgSound = new sound('bg.mp3')
        this.waitAnswer = new sound('waitAnswer.mp3')
        this.correctAnswer = new sound('correct_answer.mp3')
        this.wrongAnswer = new sound('wrongAnswer.mp3')
        this.count = 0;
        this.currenQuestion = 0;
        this.currentAnswer = null;
        this.ui.onClickBtnStart(() => {
            this.start()
        })
    }
    start() {
        this.ui.resetAnswerStyle()
        this.ui.showScreen('questionScreen')
        this.soundStart.start(() => {
            this.bgSound.start()
        })
        this.ui.showQuestion(questions[this.currenQuestion])
        this.ui.onClickAnswer( (answer) => {
            
            this.currentAnswer = answer;
            this.ui.setSelectorAnswer(answer);
            this.bgSound.stop()
            this.waitAnswer.start(() => {
                this.checkAnswer()
                
            } )
        })
    }
    checkAnswer() {
        if(this.currentAnswer == questions[this.currenQuestion].correct){
            this.ui.showCorrectAnswer(questions[this.currenQuestion].correct);
            this.count++;
            this.correctAnswer.start( () => {
                this.ui.resetAnswerStyle()
                this.currenQuestion++;
                this.bgSound.start()
                this.start()              
            })
            if(this.count === 5){
                this.ui.showScreen('million')
            }
        }
        else{
            this.ui.showCorrectAnswer(questions[this.currenQuestion].correct);
            this.wrongAnswer.start(() => {
                this.reset()
            })
        }

    }
    reset() {
        this.ui.showScreen('welcomeScreen')
        this.currenQuestion = 0;
        this.bgSound.stop() 
        this.soundStart.start(() => {
            this.bgSound.start()
        })
        

    }
    stop() {
        this.ui.showScreen('welcomeScreen')
    }
}
var game = new altp()