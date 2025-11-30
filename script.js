// login and register form active status
function showForm(formId) {
    document.querySelectorAll(".form").forEach(form => form.classList.remove("active"));
    document.getElementById(formId).classList.add("active");
}

// message box function
function showMessage(message, type = 'info', duration = 3000) {
    const box = document.getElementById("messageBox");
    const content = document.getElementById("message");

    if (!box || !content) return;

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

//Level funtions
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
    Level();

    //buttonclick event for next Level
    const nextBtn = document.getElementById("unlockClue");
    if (nextBtn) {

        nextBtn.addEventListener("click", () => {
            bananaGame();
            if (currentLevel < totalLevels) {
                currentLevel++;
                showLevel("p" + currentLevel)
                showMessage("Welcome to Level " + currentLevel + "!", "success", 3000); //New level message box
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

//Level function
function Level() {
    const levelIndicator = document.getElementById("levelIndicator");
    if (levelIndicator) {
        levelIndicator.textContent = "Level " + currentLevel;

        levelIndicator.classList.remove("visible");
        void levelIndicator.offsetWidth;
        levelIndicator.classList.add("visible");
    }
}

/*------- Reffered from OpenAI --------------Banana API-----------------*/
function bananaGame() {
    const gameContainer = document.querySelector(".gameContainer");
    const storyContent = document.querySelector(".story");

    const overlay = document.createElement('div');
    overlay.id = 'banana-overlay';
    overlay.innerHTML = `
        <div class="banana-container">
            <h2>Unlock the Clue</h2>
            <img id="bananaImage" src="" alt="Banana Puzzle" />
            <input type="text" id="bananaAnswer" placeholder="Enter your answer..." /><br>
            <button type="submit "id="UnlockBtn" class="img-btn">
                <img class="btn-image" src="./Assets/Button_1.png">
                <span class="Btn-text">Submit</span>
            </button>
            <p id="bananaMessage"></p>
        </div>
    `;

    gameContainer.appendChild(overlay);

    const bananaImg = overlay.querySelector('#bananaImage');
    const reponse = overlay.querySelector('#bananaMessage');
    const btn = overlay.querySelector('#UnlockBtn');

    // referred and guidance from OpenAI to fetch the API data
    fetch('https://marcconrad.com/uob/banana/api.php')
        .then(res => res.json())
        .then(data => {
            bananaImg.src = data.question;
            bananaImg.dataset.expected = data.solution;
        })
        .catch(err => {
            reponse.textContent = "Puzzle failed to load.";
            console.error(err);
        });

    btn.addEventListener('click', () => {
        const userAnswer = overlay.querySelector('#bananaAnswer').value.trim();
        const correctAnswer = bananaImg.dataset.expected;

        if (!userAnswer) {
            reponse.textContent = "Please enter an answer.";
            return;
        }

        if (userAnswer === correctAnswer) {
            reponse.textContent = "Correct! Continue the game!";
            setTimeout(() => {
                overlay.remove();
            }, 1000);

        } else {
            reponse.textContent = "Wrong answer! Game Over!";
            setTimeout(() => {
                overlay.remove();
            }, 1000);
        }
        Level();
    });
}