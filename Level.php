<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level</title>
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <div class="game-container">
        <!-- Message Box -->
        <div id="messageBox" class="hidden">
            <div id="message"></div>
            <button id="closeMessage">Close</button>
        </div>

        <img id="detectiveCharacter" src="Assets/character01.png" class="detective hidden">

        <div class="storyContent">
            <p id="p1" class="story active">title: "The Rainy Morning",
                story: `Rain pounded the courtyard. The royal guard found shattered glass and an empty cushion where the crown had rested. The chest in the throne room was forced open — but the thief left no footprints.\n\nYou examine the scene. A narrow smear of muddy gold dust leads toward the old tower.`,
                clue: "A muddy gold smear found near the tower — someone with access to the stables could have left it."</p>

            <p id="p2" class="story">title: "The Tower Door",
                story: `The tower door was bolted from the inside. A rope hangs from the parapet as if someone made a quick descent. An overturned lantern lies at the top of the spiral staircase.\n\nThe guard says the housekeeper was in the tower at dawn.`,
                clue: "Rope fibers matched a coarse hemp — not typical for a noble's cloak; the housekeeper manages ropes in the tower."</p>

            <p id="p3" class="story">title: "Whispers in the Kitchens",
                story: `In the kitchens the cook mutters about a late guest who requested lamp oil. The pantry shows signs of hurried rummaging; a torn glove was found behind sacks of grain.\n\nThe glove has a small embroidered emblem.",
                clue: "An embroidered emblem of a hunting club — someone who frequents the kitchens to avoid notice."</p>

            <p id="p4" class="story">title: "The Court Ledger",
                story: `The ledger shows a recent purchase of a small barrel of lamp oil under a different name. The ledger's ink reveals a blot where a signature was removed.\n\nWho was trying to hide purchases?`,
                clue: "A false name was used — check the list of recent guests who had access to supplies."</p>

            <p id="p5" class="story">title: "The Stablehand's Tale",
                story: `The stablehand mentions a stranger who led a black mare through the servants' gate the night before. The mare left silver hoof marks on the wet path.\n\nA silvery powder was found in the mare's mane.`,
                clue: "Silver powder — likely residue from a jeweler's work; someone with ties to the royal jewelers."</p>

            <p id="p6" class="story">title: "Shadows by the River",
                story: `A fisherman saw a lantern crossing the bridge at midnight. Footprints stopped at the river's edge, as if the thief waited for a boat.\n\nThe boatman recalls offering a single escort to the eastern quay.`,
                clue: "A boatman escorted someone to the eastern quay — question who might have used that route to leave quietly."</p>

            <p id="p7" class="story">title: "The Mirror in the Guest Quarters",
                story: `In a guest room a small mirror had been cleaned as if hurriedly used. A faint scent of camphor lingered. The guest registry shows a new name scratched out.\n\nWhy remove the name from the register?`,
                clue: "The scratched name matches a visiting noble's known alias; the thief used deception among guests."</p>

            <p id="p8" class="story">title: "The Jeweler's Mark",
                story: `The castle's jeweler recognizes tooling marks left on the crown's circlet — our thief is not a common thief but someone who can hide jewelry-work traces. A piece of cloth with a tailor's label is found near the throne room.",
                clue: "Tailor's label: 'B. Blackwood & Sons' — the Blackwood name appears close to our suspect circle."</p>

            <p id="p9" class="story">title: "The Late-night Confession",
                story: `A servant heard someone crying near the chapel late at night, pleading about 'keeping the crown safe from ruin.' A letter fragment says, 'To preserve the line.'\n\nWhat would make someone take the crown 'to preserve the line'?",
                clue: "The phrase suggests someone who believes the crown's possession preserves family honor — look at those closest to the royal bloodline."</p>

            <p id="p10" class="story">title: "The Final Door",
                story: `All clues converge. The muddy track, rope fibers, hunting emblem, false ledger entry, silver powder, eastern quay, scratched registry, tailor label, and the 'preserve the line' note — they point to a conspirator with motive and access.\n\nOne final Banana puzzle stands between you and the name of the stealer.`,
                clue: "Reveal: Solve the final puzzle and learn the culprit's full identity."</p>

            <button id="nextLevel">Next Level</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>