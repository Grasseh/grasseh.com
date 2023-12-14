let races = [
    'Argonian',
    'Breton',
    'Dark Elf',
    'High Elf',
    'Imperial',
    'Khajiit',
    'Nord',
    'Orc',
    'Redguard',
    'Wood Elf',
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
        $("#ironscrolls-quest-0").html(shuffled_quests[0]);
        $("#ironscrolls-quest-1").html(hiddenHtml(shuffled_quests[1], 1));
        $("#hidden1").click(function(){show(1)});
        $("#ironscrolls-quest-2").html(hiddenHtml(shuffled_quests[2], 2));
        $("#hidden2").click(function(){show(2)});
        $("#ironscrolls-quest-3").html(hiddenHtml(shuffled_quests[3], 3));
        $("#hidden3").click(function(){show(3)});
        $("#ironscrolls-quest-4").html(hiddenHtml(shuffled_quests[4], 4));
        $("#hidden4").click(function(){show(4)});
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

    function hiddenHtml(value, index){
        return "<button id='hidden" + index + "'> Quest Hidden -- Click to Show </button>" +
        "<span style='bold' id='hiddencontent" + index + "'>" + value + "</span>"
    }

    function show(index){
        $("#hidden" + index).hide();
        $("#hiddencontent" + index).show();
    }
});
