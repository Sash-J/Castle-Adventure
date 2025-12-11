<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level</title>
    <link rel="stylesheet" href="Style.css">

    <link rel="preload" href="Assets/Button_1.png" as="image">
    <link rel="preload" href="Assets/Button_2.png" as="image">
    <link rel="preload" href="Assets/Button_3.png" as="image">
    <link rel="preload" href="Assets/Button_4.png" as="image">
    <link rel="preload" href="Assets/Button_5.png" as="image">
    <link rel="preload" href="Assets/character01.png" as="image">
    <link rel="preload" href="Assets/character02.png" as="image">
    <link rel="preload" href="Assets/Game_Background.png" as="image">
    <link rel="preload" href="Assets/Lg_Background.png" as="image">
    <link rel="preload" href="Assets/MessageBox.png" as="image">
    <link rel="preload" href="Assets/MessageBox01.png" as="image">
    <link rel="preload" href="Assets/MessageBox02.png" as="image">

    <link rel="preload" href="https://fonts.gstatic.com/s/alexbrush/v19/SZc43FDpIKu6Hn4zHrekYw.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/pirataone/v17/I_urMpiDvgLdLh0fAtoft_SebaPcwNol.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/grenzegotisch/v17/0Fl5VN1Iz6e-B7j9F54FR920W5c.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/moondance/v7/uU9PCBUV5E0G4CCltZI4lw.woff2" as="font" type="font/woff2" crossorigin>
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

        <div class="clueContainer" id="clueBox">
            <h3>Clues Found</h3>
            <ul id="clueList"></ul>
        </div>

        <div class="storyContent">
            <div id="p1" class="story active">
                <p class="storyTitle" hidden>" The Rainy Morning "</p>
                <div class="storyPara">
                    <p>Rain pounded the courtyard. The royal guard found shattered glass and an empty cushion where the crown had rested. The chest in the throne room was forced open but the thief left no footprints.</p>
                    <p>You examine the scene. A narrow smear of muddy gold dust leads toward the stables.</p>
                    <p>Nearby, Lord Harrington, a wealthy noble known for his obsession with family legacy, was inspecting his jewels, frowning at the disrupted order.</p>
                </div>
                <p class="clue" hidden>"A muddy gold smear found near the tower, someone with access to the stables could have left it."</p>
            </div>

            <div id="p2" class="story">
                <p class="storyTitle" hidden>" The Tower Door "</p>
                <div class="storyPara">
                    <p>The tower door was bolted from the inside. A rope hangs from the parapet as if someone made a quick descent. An overturned lantern lies at the top of the spiral staircase.</p>
                    <p>Jasper, the stablehand who knows the grounds like the back of his hand, recalls seeing a shadowy figure near the rope, moving quickly and silently.</p>
                    <p>In the courtyard, Lady Evangeline, a clever socialite with a taste for gossip, passed carrying a bundle of papers.</p>
                </div>
                <p class="clue" hidden>Rope fibers matched a coarse hemp, not typical for a noble's cloak. The housekeeper manages ropes in the tower.</p>
            </div>

            <div id="p3" class="story">
                <p class="storyTitle" hidden>" Whispers in the Kitchens "</p>
                <div class="storyPara">
                    <p>In the kitchens, the cook mutters about a late guest who requested lamp oil. The pantry shows signs of hurried rummaging; a torn glove was found behind sacks of grain.</p>
                    <p>Lady Evangeline lingered near the pantry, pretending to examine recipes, while Marian, the housekeeper who quietly manages the castle’s daily affairs, watched from the doorway with a careful, unreadable expression</p>
                </div>
                <p class="clue" hidden>An embroidered emblem of a hunting club, someone familiar with the kitchens might have left it.</p>
            </div>

            <div id="p4" class="story">
                <p class="storyTitle" hidden>" The Court Ledger "</p>
                <div class="storyPara">
                    <p>The ledger shows a recent purchase of a small barrel of lamp oil under a different name. The ledger's ink reveals a blot where a signature was removed.</p>
                    <p>Lord Harrington was handling the ledger earlier, muttering about suspicious transactions.</p>
                    <p>Meanwhile, Jasper mentioned seeing someone slipping past the servants’ hall unnoticed.</p>
                </div>
                <p class="clue" hidden>A false name was used, check the list of recent guests who had access to supplies.</p>
            </div>

            <div id="p5" class="story">
                <p class="storyTitle" hidden>" The Stablehand's Tale "</p>
                <div class="storyPara">
                    <p>The stablehand mentions a stranger who led a black mare through the servants' gate the night before. The mare left silver hoof marks on the wet path.</p>
                    <p>Jasper insisted he saw someone with a gloved hand guiding the mare, while Sebastian, the royal jeweler known for his meticulous work, was in the courtyard carrying tools for inspecting his latest commission.</p>
                </div>
                <p class="clue" hidden>Silver powder... likely residue from a jeweler's work, someone with ties to the royal jeweler Sebastian.</p>
            </div>

            <div id="p6" class="story">
                <p class="storyTitle" hidden>" Shadows by the River "</p>
                <div class="storyPara">
                    <p>A fisherman saw a lantern crossing the bridge at midnight. Footprints stopped at the river's edge, as if the thief waited for a boat.</p>
                    <p>Marian, the housekeeper, recalls moving crates at the eastern quay that night, suspicious of anyone passing through.</p>
                    <p>Lady Evangeline, appearing casual, seemed to watch the river from afar.</p>
                </div>
                <p class="clue" hidden>A boatman escorted someone... question is who might have used the eastern quay to leave quietly.</p>
            </div>

            <div id="p7" class="story">
                <p class="storyTitle" hidden>" The Mirror in the Guest Quarters "</p>
                <div class="storyPara">
                    <p>In a guest room, a small mirror had been cleaned as if hurriedly used. A faint scent of camphor lingered. The guest registry shows a new name scratched out.</p>
                    <p>Lady Evangeline, who had access to the registry that week, appeared nervous when asked about it.</p>
                    <p>Lord Harrington loitered nearby, frowning and pacing, clearly tense about the missing records.</p>
                </div>
                <p class="clue" hidden>The scratched name matches a visiting noble's known alias, deception among guests is possible.</p>
            </div>

            <div id="p8" class="story">
                <p class="storyTitle" hidden>" The Jeweler's Mark "</p>
                <div class="storyPara">
                    <p>Sebastian, the royal jeweler, recognizes tooling marks left on the crown's circlet — our thief is not a common thief.</p>
                    <p>A piece of cloth with a tailor's label is found near the throne room. Marian was passing by, carrying linens, while Jasper seemed unusually attentive to the area.</p>
                </div>
                <p class="clue" hidden>Tailor's label... 'B. Blackwood & Sons', the Blackwood name appears close to our suspect circle.</p>
            </div>

            <div id="p9" class="story">
                <p class="storyTitle" hidden>" The Late-night Confession "</p>
                <div class="storyPara">
                    <p>A servant heard someone crying near the chapel late at night, pleading about 'keeping the crown safe from ruin.</p>
                    <p>' A letter fragment says, "To preserve the line." Marian mentioned hearing whispers about 'protecting family honor.'</p>
                    <p>Lord Harrington paced near the castle walls, his expression tight, while Lady Evangeline avoided eye contact, nervously glancing toward the chapel.</p>
                </div>
                <p class="clue" hidden>The phrase suggests someone who believes the crown's possession preserves family honor, consider Lord Harrington and his circle.</p>
            </div>

            <div id="p10" class="story">
                <p class="storyTitle" hidden>" The Final Door "</p>
                <div class="storyPara">
                    <p>All clues converge. The muddy track, rope fibers, hunting emblem, false ledger entry, silver powder, eastern quay, scratched registry, tailor label, and the 'preserve the line' note... they point to a conspirator with motive and access.</p>
                    <p>One final Banana puzzle stands between you and the name of the stealer.</p>
                    <p>Lord Harrington, Lady Evangeline, Jasper, Marian or Sebastian</p>
                </div>
                <p class="clue" hidden><b>Lord Harrington stole the crown</b> believing it was his duty to “preserve the royal line” from what he feared was internal corruption.He never intended to sell or damage it… He believed he was the kingdom’s last protector — even if it meant committing a crime.</p>
            </div>

            <button id="unlockClueBtn">
                <img src="./Assets/Button_4.png">
            </button>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>