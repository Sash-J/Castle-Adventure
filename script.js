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
}

//starting the story with function showStory()
document.addEventListener("DOMContentLoaded", () => {
    showLevel("p1");

    //buttonclick event for next Level
    const nextBtn = document.getElementById("nextLevel");
    if (nextBtn) {

        nextBtn.addEventListener("click", () => {
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

// Message box close event
document.getElementById("closeMessage").addEventListener("click", () => {
  const box = document.getElementById("messageBox");
  box.classList.remove('show');
  box.classList.add('hide');
  setTimeout(() => box.classList.add('hidden'), 400);
});


