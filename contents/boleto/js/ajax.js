function getFormSelectVehiclesMarks(){
jQuery.post(the_ajax_script.ajaxurl, jQuery("#theFormSelectVehiclesMarks").serialize()
,
function(response_from_the_action_function_select_vehicles_marks){
jQuery("#result_area_select_vehicles_marks").html(response_from_the_action_function_select_vehicles_marks);
}
);
}


function getFormSelectVehiclesModels(){
jQuery.post(the_ajax_script.ajaxurl, jQuery("#theFormSelectVehiclesModels").serialize()
,
function(response_from_the_action_function_select_vehicles_models){
jQuery("#result_area_select_vehicles_models").html(response_from_the_action_function_select_vehicles_models);
}
);
}


function getFormSelectVehiclesAnoModels(){
jQuery.post(the_ajax_script.ajaxurl, jQuery("#theFormSelectVehiclesAnoModels").serialize()
,
function(response_from_the_action_function_select_vehicles_ano_models){
jQuery("#result_area_select_vehicles_ano_models").html(response_from_the_action_function_select_vehicles_ano_models);
}
);
}

function getFormSelectVehiclesValues(){
jQuery.post(the_ajax_script.ajaxurl, jQuery("#theFormSelectVehiclesValues").serialize()
,
function(response_from_the_action_function_select_vehicles_values){
jQuery("#result_area_select_vehicles_values").html(response_from_the_action_function_select_vehicles_values);
}
);
}