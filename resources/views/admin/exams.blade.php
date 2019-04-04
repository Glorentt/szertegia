@extends('layouts.admin')

@section('title', 'All Quizzes')

@section('content')
    
    <script>
        //script to change active class in submenus
        $(document).ready(function(){ $('#sub_quiz').addClass('active'); });
    </script>
    <div class="card" id="formulario">
        <h5 class="card-header">Make Quiz</h5>
        <div class="card-body">
            <h5 class="card-title">Form to make Quiz.</h5>
            <div id="quiz"></div>
            <button id="submit">Submit Quiz</button>
        </div>
        <div class="card-footer text-muted">
            <div id="results"></div>
        </div>
    </div>
    <script>
        (function() {

            function buildQuiz() {
                // we'll need a place to store the HTML output
                const output = [];

                // for each question...
                myQuestions.forEach((currentQuestion, questionNumber) => {
                    // we'll want to store the list of answer choices
                    const answers = [];

                    // and for each available answer...
                    for (letter in currentQuestion.answers) {
                        // ...add an HTML radio button
                        answers.push(
                        `<label>
                            <input type="radio" name="question${questionNumber}" value="${letter}">
                            ${letter} :
                            ${currentQuestion.answers[letter]}
                        </label>`
                        );
                    }

                    // add this question and its answers to the output
                    output.push(
                        `<div class="question"> ${currentQuestion.question} </div>
                        <div class="answers"> ${answers.join("")} </div>`
                    );
                });

                // finally combine our output list into one string of HTML and put it on the page
                quizContainer.innerHTML = output.join("");
            }

            function showResults() {
                // gather answer containers from our quiz
                const answerContainers = quizContainer.querySelectorAll(".answers");

                // keep track of user's answers
                let numCorrect = 0;

                // for each question...
                myQuestions.forEach((currentQuestion, questionNumber) => {
                // find selected answer
                const answerContainer = answerContainers[questionNumber];
                const selector = `input[name=question${questionNumber}]:checked`;
                const userAnswer = (answerContainer.querySelector(selector) || {}).value;

                // if answer is correct
                if (userAnswer === currentQuestion.correctAnswer) {
                    // add to the number of correct answers
                    numCorrect++;

                    // color the answers green
                    answerContainers[questionNumber].style.color = "lightgreen";
                } else {
                    // if answer is wrong or blank
                    // color the answers red
                    answerContainers[questionNumber].style.color = "red";
                }
                });

                // show number of correct answers out of total
                resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;
            }

            const quizContainer = document.getElementById("quiz");
            const resultsContainer = document.getElementById("results");
            const submitButton = document.getElementById("submit");
            const myQuestions = [
                {
                question: "INTRODUCTION: Did the agent mention the company name?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "a"
                },
                {
                question: "Building credibility and rapport.. Showing empathy (not script reading all the time)?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "b"
                },
                {
                question: "Did the agent answer quickly and correctly? (less than 2 seconds)?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "b"
                },
                {
                question: "REBUTTALS: never take no for an answer. (MIN 2 rebuttals depending on situation more rebuttals should be used)?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "a"
                },
                {
                question: "Did the agent ask for / confirm the caller's information. (qulifying questions)?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "a"
                },
                {
                question: "TONE AND INFLECTION: The agent sound confident /focused? exit's not what you say it's how you say it?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "b"
                },
                {
                question: "CONTROL OF CALL: The agent took ownership of the call ex: is the customer getting off subject- bring it back?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "a"
                },
                {
                question: "Disposition Correctly: Did the agent disposition correctly??",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "a"
                },
                {
                question: "Correct Handoff/no dead air during warm transfer (small talk)?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "a"
                },
                {
                question: "ACTIVE LISTENING: Agent demonstrated active listening ( listen to cx WINs/can paraphrase)?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "b"
                },
                {
                question: "Agent displayed a professional?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "a"
                },
                {
                question: "PITCHING: make sure pitch correctly/cross-pitch (verticals)?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "a"
                },
                {
                question: "KNOWLEDGEABLE: demonstrated knowledge?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "b"
                },
                {
                question: "DNC: process was done correctly (1 rebuttal)?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "a"
                },
                {
                question: "TRANSFER PROCESS: tarnsferred correctly with all information required?",
                answers: {
                    a: "Yes",
                    b: "No", c: "N/A"
                },
                correctAnswer: "b"
                }
            ];

            // display quiz right away
            buildQuiz();

            // on submit, show results
            submitButton.addEventListener("click", showResults);
        })();
    </script>
    <style>
        body{
            font-size: 20px;
            font-family: sans-serif;
            color: #333;
        }
        .question{
            font-weight: 600;
        }
        .answers {
        margin-bottom: 20px;
        }
        .answers label{
        display: block;
        }
        #submit{
            font-family: sans-serif;
            font-size: 20px;
            background-color: #279;
            color: #fff;
            border: 0px;
            border-radius: 3px;
            padding: 20px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        #submit:hover{
            background-color: #38a;
        }
    </style>
    
@endsection