/*login and register form active status*/
function showForm(formId) {
    document.querySelectorAll(".form").forEach(form => form.classList.remove("active"));
    document.getElementById(formId).classList.add("active");
}

// ------- message box function ----------------
function showMessage(message, type = 'info', duration = 3000) {
    const box = document.getElementById("messageBox");
    const content = document.getElementById("message");

    if (!box || !content) return;

    //Reset class
    // box.className = '';
    box.classList.remove('hidden', 'hide');
    box.classList.add('show', type);
    content.textContent = message;


    if (duration > 0) {
        setTimeout(() => {
            box.classList.remove('show');
            box.classList.add('hide');

            // After animation ends, fully hide
            setTimeout(() => box.classList.add('hidden'), 400);
        }, duration);
    }
}

let currentLevel = 1;
const totalLevels = 10;

// ------------Level funtions---------
function showLevel(storyId) {
    document.querySelectorAll(".story").forEach(story => story.classList.remove("active"));
    const targetStory = document.getElementById(storyId);
    if (targetStory) targetStory.classList.add("active");

    // detective character animation function
    const detective = document.getElementById("detectiveCharacter");
    if (detective) {
        detective.classList.remove("hidden");
        detective.classList.add("show");
    }
}

//starting the story with function showStory()
document.addEventListener("DOMContentLoaded", () => {
    showLevel("p1");

    //buttonclick event for next Level
    const nextBtn = document.getElementById("nextLevel");
    if (nextBtn) {

        nextBtn.addEventListener("click", () => {
            bananaGame();
            if (currentLevel < totalLevels) {
                currentLevel++;
                showLevel("p" + currentLevel);
                showMessage("Welcome to Level " + currentLevel + "!", "success", 3000);
            } else {
                alert("You've reached the end of the story!");
            }
        });
    };
});

function startGame() {
    window.location.href = "Level.php";
}

function instructions() {
    alert("Instructions:\n\n• Complete each level.\n• Click Next to continue.\n• Enjoy the Castle Adventure!");
}

function logout() {
    window.location.href = "logout.php";
}

// Message box close event in story levels
document.addEventListener("DOMContentLoaded", () => {
    const closeBtn = document.getElementById("closeMessage");
    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            const box = document.getElementById("messageBox");
            box.classList.remove('show');
            box.classList.add('hide');
            setTimeout(() => box.classList.add('hidden'), 400);
        });
    }
});

/*------- Reffered from OpenAI --------------*/
function bananaGame() {
    const gameContainer = document.querySelector(".gameContainer");
    const storyContent = document.querySelector(".story");

    const overlay = document.createElement('div');
    overlay.id = 'banana-overlay';
    overlay.innerHTML = `
        <div class="banana-container">
            <h2>🍌 Banana Puzzle</h2>
            <img id="bananaImage" src="" alt="Banana Puzzle" />
            <input type="text" id="bananaAnswer" placeholder="Enter your answer..." />
            <button id="submitAnswer">Submit</button>
            <p id="bananaMessage"></p>
        </div>
    `;

    gameContainer.appendChild(overlay);

    const bananaImg = overlay.querySelector('#bananaImage');
    const msg = overlay.querySelector('#bananaMessage');
    const btn = overlay.querySelector('#submitAnswer');

    // Fetch puzzle image from Banana API
    fetch('https://marcconrad.com/uob/banana/api.php')
        .then(res => res.json())
        .then(data => {
            bananaImg.src = data.question;
            bananaImg.dataset.expected = data.solution; // store solution temporarily
        })
        .catch(err => {
            msg.textContent = "Failed to load puzzle.";
            console.error(err);
        });

    btn.addEventListener('click', () => {
    const userAnswer = overlay.querySelector('#bananaAnswer').value.trim();
    const correctAnswer = bananaImg.dataset.expected;

    if (!userAnswer) {
        msg.textContent = "Please enter an answer.";
        return;
    }

    if (userAnswer === correctAnswer) {
        msg.textContent = "Correct! Continue the game!";
        setTimeout(() => {
            overlay.remove();
        }, 1000);
    } else {
        msg.textContent = "Wrong answer! Game Over!";
        setTimeout(() => {
            overlay.remove();
        }, 1000);
    }
});
}