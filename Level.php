<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level</title>
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <div class="gameContainer">
        <!-- Message Box -->
        <div id="messageBox" class="hidden">
            <div id="message"></div>
            <button id="closeMsgBtn">close</button>
        </div>

        <div class="levelInd">
            <img id="levelBtn" src="Assets/Button_3.png">
            <span id="levelIndicator"></span>
        </div>

        <div class="gameMenuBtn" onclick="goToMenu()">
            <img id="menuBtn" src="Assets/Button_5.png">
            <span id="menuTxt">Menu</span>
        </div>

        <img id="detectiveCharacter" src="Assets/character01.png" class="detective">

        <div class="storyContent">
            <div id="p1" class="story active">
                <p class="storyTitle" hidden>" The Rainy Morning "</p>
                <p class="storyPara">Rain pounded the courtyard. The royal guard found shattered glass and an empty cushion where the crown had rested. The chest in the throne room was forced open — but the thief left no footprints.<br>You examine the scene. A narrow smear of muddy gold dust leads toward the old tower.</p>
                <p class="clue" hidden>"A muddy gold smear found near the tower - someone with access to the stables could have left it."</p>
            </div>

            <div id="p2" class="story">
                <p class="storyTitle" hidden>" The Tower Door "</p>
                <p class="storyPara">The tower door was bolted from the inside. A rope hangs from the parapet as if someone made a quick descent. An overturned lantern lies at the top of the spiral staircase.<br>The guard says the housekeeper was in the tower at dawn.</p>
                <p class="clue" hidden>Rope fibers matched a coarse hemp — not typical for a noble's cloak; the housekeeper manages ropes in the tower.</p>
            </div>

            <div id="p3" class="story">
                <p class="storyTitle" hidden>" Whispers in the Kitchens "</p>
                <p class="storyPara">In the kitchens the cook mutters about a late guest who requested lamp oil. The pantry shows signs of hurried rummaging; a torn glove was found behind sacks of grain.<br>The glove has a small embroidered emblem."</p>
                <p class="clue" hidden>An embroidered emblem of a hunting club — someone who frequents the kitchens to avoid notice.</p>
            </div>

            <div id="p4" class="story">
                <p class="storyTitle" hidden>" The Court Ledger "</p>
                <p class="storyPara">The ledger shows a recent purchase of a small barrel of lamp oil under a different name. The ledger's ink reveals a blot where a signature was removed.<br>Who was trying to hide purchases?</p>
                <p class="clue" hidden>A false name was used — check the list of recent guests who had access to supplies.</p>
            </div>

            <div id="p5" class="story">
                <p class="storyTitle" hidden>" The Stablehand's Tale "</p>
                <p class="storyPara">The stablehand mentions a stranger who led a black mare through the servants' gate the night before. The mare left silver hoof marks on the wet path.<br>A silvery powder was found in the mare's mane.</p>
                <p class="clue" hidden>Silver powder — likely residue from a jeweler's work; someone with ties to the royal jewelers.</p>
            </div>

            <div id="p6" class="story">
                <p class="storyTitle" hidden>" Shadows by the River "</p>
                <p class="storyPara">A fisherman saw a lantern crossing the bridge at midnight. Footprints stopped at the river's edge, as if the thief waited for a boat.<br>The boatman recalls offering a single escort to the eastern quay.</p>
                <p class="clue" hidden>A boatman escorted someone to the eastern quay — question who might have used that route to leave quietly.</p>
            </div>

            <div id="p7" class="story">
                <p class="storyTitle" hidden>" The Mirror in the Guest Quarters "</p>
                <p class="storyPara">In a guest room a small mirror had been cleaned as if hurriedly used. A faint scent of camphor lingered. The guest registry shows a new name scratched out.<br>Why remove the name from the register?</p>
                <p class="clue" hidden>The scratched name matches a visiting noble's known alias; the thief used deception among guests.</p>
            </div>

            <div id="p8" class="story">
                <p class="storyTitle" hidden>" The Jeweler's Mark "</p>
                <p class="storyPara">The castle's jeweler recognizes tooling marks left on the crown's circlet — our thief is not a common thief but someone who can hide jewelry-work traces. A piece of cloth with a tailor's label is found near the throne room.</p>
                <p class="clue" hidden>Tailor's label: 'B. Blackwood & Sons' — the Blackwood name appears close to our suspect circle.</p>
            </div>

            <div id="p9" class="story">
                <p class="storyTitle" hidden>" The Late-night Confession "</p>
                <p class="storyPara">The castle's jeweler recognizes tooling marks left on the crown's circlet — our thief is not a common thief but soA servant heard someone crying near the chapel late at night, pleading about 'keeping the crown safe from ruin.' A letter fragment says, 'To preserve the line.'<br>What would make someone take the crown 'to preserve the line'?</p>
                <p class="clue" hidden>The phrase suggests someone who believes the crown's possession preserves family honor — look at those closest to the royal bloodline.</p>
            </div>

            <div id="p10" class="story">
                <p class="storyTitle" hidden>" The Final Door "</p>
                <p class="storyPara">All clues converge. The muddy track, rope fibers, hunting emblem, false ledger entry, silver powder, eastern quay, scratched registry, tailor label, and the 'preserve the line' note — they point to a conspirator with motive and access.<br>One final Banana puzzle stands between you and the name of the stealer.</p>
                <p class="clue" hidden>Reveal: Solve the final puzzle and learn the culprit's full identity.</p>
            </div>

            <button id="unlockClueBtn">
                <img src="./Assets/Button_4.png">
            </button>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>