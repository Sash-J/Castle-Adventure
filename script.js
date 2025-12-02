// **Sources of Information**
// Referencing Open AI & chatGPT
// Using VS Code inbuilt AI helper
// Using general google searches


// login and register form active status
function showForm(formId) {
    document.querySelectorAll(".form").forEach(form => form.classList.remove("active"));
    document.getElementById(formId).classList.add("active");
    // Checks .form classes and removes active from all
    // Then adds active to the selected form
    // Referencing from : https://chatgpt.com/
}


function uiScaling() {
    const container = document.querySelector('.container, .gameContainer');
    const scale = Math.min(window.innerWidth / 1080, window.innerHeight / 720, 1);
    container.style.transform = `scale(${scale})`;
    // Referencing from : https://chatgpt.com/
}

window.addEventListener('resize', uiScaling);
window.addEventListener('load', uiScaling);



// -----------Menu functions -----------------

function startGame() {
    window.location.href = "Level.php";
    // Redirects to Level.php to start game
}

function instructions() {
    alert("Instructions:\n\n• Complete each level.\n• Click Next to continue.\n• Enjoy the Castle Adventure!");
}

function logout() {
    window.location.href = "logout.php";
    // Redirects to logout.php to quit game
}

// ------------- game functions ----------------
// message box function
function showMessage(message, type = 'info', duration = 0, dataType = "") { // Referencing from : google search
    const box = document.getElementById("messageBox");
    const content = document.getElementById("message");

    if (!box || !content) return;

    if (dataType) {
        box.dataset.type = dataType;
    } else {
        delete box.dataset.type;
    }

    if (dataType === "clue") {
        content.innerHTML = `<h4 class="msgTitle">Clue Found</h4><p>${message}</p>`;  // Referencing from : https://chatgpt.com/
    } else {
        content.textContent = message; // normal behavior
    }

    box.classList.remove('hidden', 'hide');
    void box.offsetWidth;
    box.classList.add('show');

    if (duration > 0) {
        setTimeout(() => closeMessageBox(), duration);
    }
    // Referencing from : https://chatgpt.com/
}

// Message box close function
function closeMessageBox() {
    const box = document.getElementById("messageBox");
    if (!box) return;

    // If already hiding/hidden, ignore
    if (box.classList.contains('hide') || box.classList.contains('hidden')) return;

    box.classList.remove('show');
    box.classList.add('hide');
    const HIDE_MS = 400;
    setTimeout(() => {
        box.classList.add('hidden');
        document.dispatchEvent(new CustomEvent('messageClosed'));
    }, HIDE_MS); // Referencing from : https://chatgpt.com/ 
}

// setting current level
let currentLevel = 1;
const totalLevels = 10;

// get storyparts function
function getStoryParts(level) {
    const story = document.getElementById("p" + level);
    if (!story) return { title: "", story: "", clue: "" };
    return {
        title: story.querySelector(".storyTitle")?.textContent.trim(),
        story: story.querySelector(".storyPara")?.textContent.trim(),
        clue: story.querySelector(".clue")?.textContent.trim()
    };
    // Referencing from : https://chatgpt.com/
}

// show level function
function showLevel(levelId) {
    document.querySelectorAll(".story").forEach(s => s.classList.remove("active"));
    const story = document.getElementById(levelId);

    if (story) story.classList.add("active");

    hideStory();

    const levelNumber = Number(levelId.replace("p", ""));
    const parts = getStoryParts(levelNumber);

    // Referencing from : VS Code AI helper
    showMessage(parts.title, "success", 0, "title");;

    Level();
}

// detective character animation function
const detective = document.getElementById("detectiveCharacter");
if (detective) {
    detective.classList.remove("hidden");
    detective.classList.add("show");
}

// hide story function
function hideStory() {
    const sc = document.querySelector(".storyContent");
    if (sc) sc.style.opacity = 0;
}

// show story function
function showStory() {
    const sc = document.querySelector(".storyContent");
    if (sc) sc.style.opacity = 1;
}

function showLevelTitle() {
    const activeStory = document.querySelector(".story.active");
    const titleText = activeStory.querySelector(".storyTitle").textContent;
    showMessage(titleText, "title");
}

function showClue() {
    const activeStory = document.querySelector(".story.active");
    const clueText = activeStory.querySelector(".clue").textContent;
    showMessage(clueText, "clue");
}

// loading contents
document.addEventListener("DOMContentLoaded", () => {
    showLevel("p" + currentLevel);

    // attach unlock button
    const nextBtn = document.getElementById("unlockClueBtn");
    if (nextBtn) nextBtn.addEventListener("click", bananaGame);


    const closeBtn = document.getElementById("closeMsgBtn");
    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            // use the centralized close so messageClosed is dispatched
            closeMessageBox();
        });
    }

    document.addEventListener('messageClosed', () => {
        const box = document.getElementById("messageBox");
        if (!box) return;

        // if it was a title message, reveal the story content
        if (box.dataset.type === "title") {
            setTimeout(() => showStory(), 20);
        }
    });
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

// exit game to Menu.php
function goToMenu() {
    window.location.href = "Menu.php";
}

// ------------ Banana API call -----------------
function bananaGame() {
    hideStory();

    const gameContainer = document.querySelector(".gameContainer");
    if (!gameContainer) return;

    // If overlay already exists remove it (safety)
    const existing = document.getElementById("banana-overlay");
    if (existing) existing.remove();

    const overlay = document.createElement("div");
    overlay.id = "banana-overlay";

    overlay.innerHTML = `
        <div class="banana-container">
            <h2>Open the Lock</h2>
            <img id="bananaImage" src="" alt="Puzzle"><br>
            <input id="bananaAnswer" type="text" placeholder="Enter answer...">
            <button id="UnlockBtn" class="img-btn">
                <img class="btn-image" src="./Assets/Button_1.png">
                <span class="Btn-text">Submit</span>
            </button>
            <p id="bananaMessage"></p>
        </div>
    `;

    gameContainer.appendChild(overlay);

    // load API puzzle
    const img = overlay.querySelector("#bananaImage");
    const msg = overlay.querySelector("#bananaMessage");

    fetch("https://marcconrad.com/uob/banana/api.php")
        .then(r => r.json())
        .then(data => {
            img.src = data.question;
            img.dataset.solution = data.solution;
        })
        .catch(() => {
            msg.textContent = "Failed to load puzzle.";
        });

    overlay.querySelector("#UnlockBtn").addEventListener("click", () => {
        const playerAns = overlay.querySelector("#bananaAnswer").value.trim();
        const correct = img.dataset.solution;

        if (!playerAns) {
            msg.textContent = "Solve the number to unlock the clue.";
            return;
        }

        if (playerAns === correct) {
            msg.textContent = "Correct!";

            const parts = getStoryParts(currentLevel);

            setTimeout(() => {
                overlay.remove();
                showMessage(parts.clue, "success", 0, "clue");

                // Wait for the player to close the clue. Instead of overwriting onclick,
                // listen for the custom 'messageClosed' event once.
                const onClosed = () => {
                    document.removeEventListener('messageClosed', onClosed);

                    setTimeout(() => {
                        if (currentLevel < totalLevels) {
                            currentLevel++;
                            showLevel("p" + currentLevel);
                        } else {
                            showMessage("You've reached the end of the story!", "info", 3000);
                        }
                    }, 50);
                };

                document.addEventListener('messageClosed', onClosed, { once: true });

            }, 700);

        } else {
            msg.textContent = "Wrong answer!";
        }
    });
}