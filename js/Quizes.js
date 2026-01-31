// function toggleForm()
// {
//     var Choose = document.getElementById("Choose").value;
//     var Sports = document.getElementById("Sports");
//     var Academy = document.getElementById("Academy")
//     var submit = document.getElementById("submit")
//     // var choose_button = document.getElementById("choose_button");

//     if(Choose === "Sport")
//     {
//         Sports.style.display = "block";
//         submit.style.display = "block";
//         Academy.style.display = "none";
//         // choose_button.style.display = "none"
//     }
//     else
//     {
//         Academy.style.display = "block";
//         submit.style.display = "block";
//         Sports.style.display = "none";
//         // choose_button.style.display = "none"
//     }

// }

function toggleForm() {
    const choose = document.getElementById('Choose').value;
    if (choose === '-') {
        document.getElementById('Questions').style.display = 'none';
        document.getElementById('submit').style.display = 'none';
    } else {
        document.getElementById('Questions').style.display = 'block';
        document.getElementById('submit').style.display = 'block';
        fetchQuestions(choose);
    }
}

function fetchQuestions(type) {
    fetch(`get_questions.php?type=${type}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('Questions').innerHTML = data;
        });
}