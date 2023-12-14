races = [
    'Argonian',
    'Breton',
    'Dark',
    'High',
    'Imperial',
    'Khajiit',
    'Nord',
    'Orc',
    'Redguard',
    'Wood',
]

skill_trees = [
    'Illusion',
    'Conjuration',
    'Destruction',
    'Restoration',
    'Alteration',
    'Heavy Armor',
    'Block',
    'Two Handed',
    'One Handed',
    'Archery',
    'Light Armor',
    'Lockpicking',
    'Pickpocket',
    'Speech',
]

quest_lines = [
    'Mage Guild Questline',
    'Companions questline',
    'Thieves Guild Questline',
    'Dark brotherhood Questline',
    'Civil War Questline',
]

$(function(){
    function randomize(){
        quest_lines = shuffleArray(quest_lines);
        races = shuffleArray(races);
        skill_trees = shuffleArray(skill_trees);

        $(".ironscrolls-race").html(races[0]);
        $(".ironscrolls-skills").html(skills[0] + ',' + skills[1] + ',' + skills[2]);
        $(".ironscrolls-quests").html(quests[0]);
    }

    $("#roll").click(function(){randomize()});

    function shuffleArray(array) {
        for (var i = array.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = array[i];
            array[i] = array[j];
            array[j] = temp;
        }
    }
});
