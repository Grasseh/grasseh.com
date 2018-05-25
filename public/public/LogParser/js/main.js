var DefaultTypeFilter = "--Type--";
var DefaultOtherFilter = "--Other data--";

$(function(){
    function parse(){
        var JSONString = $("#log").val();
        JSONString = JSONString.replace(/{/g,",{");
        JSONString = "[" + JSONString.substr(1) + "]";
        var message_types = [];
        var keys_arr = [];
        try{
            var data = $.parseJSON(JSONString);
            $(".dataTablediv").html("");
            var string = "<table>";
            string += "<tr id=\"TableTitle\"><th>Type</th><th>Date</th><th>Other data</th></tr>";
            $(data).each(function(index){
                var item = this;
                string += "<tr data-row=\"" + index + "\">";
                string += "<td data-key=\"type-message\" data-type=\"" + item.type_message + "\">";
                string += item.type_message;
                string += "</td>";
                string += "<td data-key=\"date\">";
                string += item.date;
                string += "</td>";
                var first = true;
                Object.keys(item).forEach(function(key) {
                    //Create object rows
                    if(is_non_special_data(key))
                    {
                        if(!first){
                            string += "<tr data-row=\"" + index + "\"><td data-key=\"type-message\" data-type=\"" + item.type_message + "\"></td><td data-key=\"date\"></td>";
                        }
                        string += "<td data-key=" + key + ">";
                        string += "<b>" + key + "</b> : " + item[key];
                        string += "</td></tr>";
                        first = false;
                    }
                    //Check if type_message already exists
                    if(key == "type_message")
                    {
                        //if(NOT IN)
                        if($.inArray(item[key],message_types) == "-1"){
                            message_types[message_types.length] = item[key];
                        }
                    }
                    else if(key == "type"){}
                    //Check for date
                    else if(key == "date"){}
                    //Check if key exists, add it to filter
                    else
                    {
                        if($.inArray(key,keys_arr) == "-1"){
                            keys_arr.push(key);
                        }
                    }
                });
            });
            string += "</table>";
            $(".dataTablediv").html(string);
        }
        catch(err){
            alert("The log entered does not follow the needed format!");
            console.dir(err);
            return false;
        }
        $("#filters").html("");
        //TYPE
        var filters = "<select id=\"filter_type\" value=\"" + DefaultTypeFilter + "\"><option>" + DefaultTypeFilter + "</option>";
        for (var i = 0; i < message_types.length; i++){
            filters += "<option value=\"" + message_types[i] +"\" >" + message_types[i] + "</option>";
        }
        filters += "</select><br/>";
        //KEYS
        filters += "<select id=\"filter_other\" value=\"" + DefaultOtherFilter + "\"><option>" + DefaultOtherFilter + "</option>";
        for (var i = 0; i < keys_arr.length; i++){
            filters += "<option value=\"" + keys_arr[i] +"\" >" + keys_arr[i] + "</option>";
        }
        filters += "</select><input type=\"text\" id=\"filter_other_txt\" /><br>";
        filters += "<button id=\"filterBtn\">Filter</button>";
        $("#filters").html(filters);
        bindFilters();
    }

    $("#parse").click(function(){parse()});

    function bindFilters(){
        $("#filterBtn").unbind("click");
        $("#filterBtn").bind("click",function(){
            //Display all rows
            $("tr").addClass("hidden");
            var okArray = [];
            //Check what the TypeFilter is
            var TypeFilter = $("#filter_type").val();
            var OtherFilter = $("#filter_other").val();
            var OtherSearch = $("#filter_other_txt").val();
            //Put each OK in OK array
            $("tr").each(function(){
                var Okay = true;
                $(this).children("td").each(function(index,element){
                    //Check the type
                    if($(element).data("key") == "type-message"){
                        if(TypeFilter != DefaultTypeFilter){
                            if($(element).data("type") != TypeFilter){
                                Okay = false;
                            }
                        }
                    }
                    else if($(element).data("key") == "date"){

                    }
                    else{//other data
                        if(OtherFilter != DefaultOtherFilter){
                            if($(element).data("key") != OtherFilter){
                                Okay = false;
                            }
                            if($(element).html().indexOf(OtherSearch) == -1){
                                Okay = false;
                            }
                            else
                                console.dir(index);
                        }
                    }
                });
                if(Okay){
                    if($.inArray($(this).data("row"),okArray) == "-1"){
                        okArray.push($(this).data("row"));
                    }
                }
            });
            for (var i = 0; i < okArray.length; i++){
                $("tr[data-row=" + okArray[i] + "]").removeClass("hidden");
            }
            $("#TableTitle").removeClass("hidden");
        });
    }

    function is_non_special_data(key)
    {
        return (key != "type" && key != "type_message" && key != "date");
    }


});
