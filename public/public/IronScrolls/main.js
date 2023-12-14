let races = [
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

let skill_trees = [
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

let quest_lines = [
    'Mage Guild Questline',
    'Companions questline',
    'Thieves Guild Questline',
    'Dark brotherhood Questline',
    'Civil War Questline',
]

$(function(){
    function randomize(){
        let shuffled_quests = shuffleArray(quest_lines);
        let shuffled_races = shuffleArray(races);
        let shuffled_skills = shuffleArray(skill_trees);

        $("#ironscrolls-race").html(shuffled_races[0]);
        $("#ironscrolls-skills").html(shuffled_skills[0] + ',' + shuffled_skills[1] + ',' + shuffled_skills[2]);
        $("#ironscrolls-quests").html(shuffled_quests[0]);
    }

    $("#roll").click(function(){randomize()});

    function shuffleArray(array) {
        for (var i = array.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = array[i];
            array[i] = array[j];
            array[j] = temp;
        }

        return array;
    }
});
