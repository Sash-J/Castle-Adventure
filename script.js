// **Sources of Information**
//   ----------------------
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


function uistoryContentaling() {
    const container = document.querySelector('.container') || document.querySelector('.gameContainer');

    if (!container) return;

    const scale = Math.min(window.innerWidth / 1080, window.innerHeight / 720, 1);
    container.style.transform = `scale(${scale})`;
    // Referencing from : https://chatgpt.com/
}
window.addEventListener('resize', uistoryContentaling);
window.addEventListener('load', uistoryContentaling);


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

    setTimeout(() => {
        box.classList.add('hidden');
        document.dispatchEvent(new CustomEvent('messageClosed'));
    }, 400); // Referencing from google and Inbuilt VstoryContentode AI helper
}

// setting current level
let currentLevel = 1;
const totalLevels = 10;

// guest player vairables
let isGuest = false;
let guestMaxLevels = 2;
const storedGuest = sessionStorage.getItem('guestMode');
if (storedGuest === '1') {
    isGuest = true;
}
let guestAttempts = parseInt(sessionStorage.getItem('guestAttempts') || '0', 10);
// referenced from : https://chatgpt.com/ 

// guestLogin function
function guestLogin() {
    sessionStorage.setItem('guestMode', '1');
    sessionStorage.setItem('guestAttempts', '0');
    setTimeout(() => window.location.href = "Level.php", 60);
}

// retreving title, story and clue as seperated parts using <p> classes
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

    clueGroup(currentLevel);
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
    const storyContent = document.querySelector(".storyContent");
    if (storyContent) storyContent.style.opacity = 0;
}

// show story function
function showStory() {
    const storyContent = document.querySelector(".storyContent");
    if (storyContent) storyContent.style.opacity = 1;
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

// exitGame function
function goToMenu() {
    window.location.href = "Menu.php";
}

function clueGroup(currentLevel) {
    const clueList = document.getElementById("clueList");
    clueList.innerHTML = "";

    let clueNumber = 1;

    for (let lvl = 1; lvl < currentLevel; lvl++) {
        const part = getStoryParts(lvl);

        if (part && part.clue && part.clue.trim() !== "") {
            const li = document.createElement("li");
            li.textContent = `Clue ${clueNumber}:  ${part.clue}`;
            clueList.appendChild(li);
            clueNumber++;
        }
    }
}

// ------------------- Banana API call --------------------------
// --------------------------------------------------------------

function bananaOverlay() {
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
    return overlay;
}

// API call
function bananaPuzzle(imgElem, messageElem) {
    fetch("https://marcconrad.com/uob/banana/api.php")
        .then(r => r.json())
        .then(data => {
            imgElem.src = data.question;
            imgElem.dataset.solution = data.solution;
        })
        .catch(() => {
            bananaMessage.textContent = "Failed to load puzzle.";
        });
}

// validataing answer. - code optimization
function validateBananaAnswer(playerAns, correctAns, bananaMessage) {
    if (!playerAns) {
        bananaMessage.textContent = "Solve the number to unlock the clue."
        return false;
    }

    if (playerAns !== correctAns) {
        bananaMessage.textContent = "Wrong Answer."
        return false;
    }

    bananaMessage.textContent = "Correct";
    return true;
}

// Answer handle on guest or registered player
function handleCorrectAnswer(overlay) {
    const parts = getStoryParts(currentLevel);

    setTimeout(() => {
        overlay.remove();

        showMessage(parts.clue, "success", 0, "clue");
        const onClosed = () => {
            document.removeEventListener('messageClosed', onClosed); //clue msg close

            // limiting guest player for 2 level preview
            setTimeout(() => {
                if (isGuest) {
                    guestAttempts = (parseInt(sessionStorage.getItem('guestAttempts') || '0', 10) || guestAttempts) + 1;
                    sessionStorage.setItem('guestAttempts', String(guestAttempts));

                    if (currentLevel < guestMaxLevels) {
                        currentLevel++;
                        showLevel("p" + currentLevel);
                    } else {
                        setTimeout(() => {
                            showMessage("Login to continue the game!", "info", 0);

                            const goBack = () => {
                                document.removeEventListener('messageClosed', goBack);

                                sessionStorage.removeItem('guestMode');
                                sessionStorage.removeItem('guestAttempts');
                                window.location.href = "Login.php";
                            };
                            document.addEventListener('messageClosed', goBack, { once: true });
                        }, 200);
                    }
                    return;
                }

                // registered players
                if (currentLevel < totalLevels) {
                    currentLevel++;
                    showLevel("p" + currentLevel);
                } else {
                    showMessage("Congratulations Detective. You've solved the case", "info", 15000);

                    const gameEnd = () => {
                        document.removeEventListener('messageClosed', gameEnd);
                        window.location.href = "Menu.php";
                    };
                    document.addEventListener('messageClosed', gameEnd, { once: true });
                }
            }, 50);
        };

        document.addEventListener('messageClosed', onClosed, { once: true });
    }, 700);
}

// main Banana game function
function bananaGame() {
    hideStory();

    const gameContainer = document.querySelector(".gameContainer");
    if (!gameContainer) return;

    // Remove previous overlays
    const existing = document.getElementById("banana-overlay");
    if (existing) existing.remove();

    const overlay = bananaOverlay();
    gameContainer.appendChild(overlay);
    // Referencing from : https://chatgpt.com/

    const imgElem = overlay.querySelector("#bananaImage");
    const bananaMessage = overlay.querySelector("#bananaMessage");

    // puzzle call
    bananaPuzzle(imgElem, bananaMessage);

    // Answer submit
    const submitBtn = overlay.querySelector("#UnlockBtn");

    submitBtn.addEventListener("click", () => {
        const playerAns = overlay.querySelector("#bananaAnswer").value.trim();
        const correctAns = imgElem.dataset.solution;

        if (!validateBananaAnswer(playerAns, correctAns, bananaMessage)) return;

        // Correct flow
        handleCorrectAnswer(overlay);
    });
}