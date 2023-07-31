

$(function (){
    $("#LISTER").click(function(){

        valid = true ;
        text = $("#service_view").val() ;
        if ( text == "0" ) {
            $("#service_view").css("color","red");
            $("#service_view").css("border","2px solid red");
            valid = false ;
        }
        else {
            $("#service_view").css("color","black");
            $("#service_view").css("border","none");
        }

        return valid ;
    }) ;
}) ; 

$(function (){
    $("#AJOUTERRV").click(function(){

        valid = true ;
        text = $("#servDemande").val() ;
        if ( text == "0" ) {
            $("#servDemande").css("color","red");
            $("#servDemande").css("border","2px solid red");
            valid = false ;
        }
        else {
            $("#servDemande").css("color","black");
            $("#servDemande").css("border","none");
        }

        return valid ;
    }) ;
}) ;
    

$(function (){
    $("#UPDATEAGENT").click(function(){
                
        valid = true ;
        if ( $("#password1").val() != $("#password2").val() ) {
            $("#password1").css("color","red");
            $("#password1").css("border","2px solid red");
            $("#password2").css("color","red");
            $("#password2").css("border","2px solid red");
            $("#alert_rouge").css("display","block");
            valid = false ;
        }
        else {
            $("#alert_rouge").css("display","none");
            $("#password1").css("color","black");
            $("#password1").css("border","none");
            $("#password2").css("color","black");
            $("#password2").css("border","none");
        }

        if (!$("#prenom_agent").val().match(/^[a-zA-Zàáôûéèîï ]+$/)){
            $("#prenom_agent").css("color","red");
            $("#prenom_agent").css("border","2px solid red");
            valid = false ;
        }
        else {
            $("#prenom_agent").css("color","black");
            $("#prenom_agent").css("border","none");
        }

        if (!$("#nom_agent").val().match(/^[a-zA-Zàáôûéèîï]+$/)){
            $("#nom_agent").css("color","red");
            $("#nom_agent").css("border","2px solid red");
            valid = false ;
        }
        else {
            $("#nom_agent").css("color","black");
            $("#nom_agent").css("border","none");
        }
                
            return valid ;
    }) ;
}) ; 


$(function (){
    $("#AJOUTER").click(function(){
        valid = true ;
        if (!$("#prenomsPatient").val().match(/^[a-zA-Zàáôûéèîï ]+$/)){
            $("#prenomsPatient").css("color","red");
            $("#prenomsPatient").css("border","2px solid red");
            valid = false ;
        }
        else {
            $("#prenomsPatient").css("color","black");
            $("#prenomsPatient").css("border","none");
        }
                    
        if (!$("#nomPatient").val().match(/^[a-zA-Zàáôûéèîï]+$/)){
            $("#nomPatient").css("color","red");
            $("#nomPatient").css("border","2px solid red");
            valid = false ;
        }
        else {
            $("#nomPatient").css("color","black");
            $("#nomPatient").css("border","none");
        }
        if ($("#numeroDossierPatient").val() > 200000)
            valid = false;
        
            return valid ;                
    }) ;
}) ; 
            

$(function (){
    $("#AJOUTERNOI").click(function(){
        valid = true ;
        if (!$("#prenomsPatientNoi").val().match(/^[a-zA-Zàáôûéèîï ]+$/)){
            $("#prenomsPatientNoi").css("color","red");
            $("#prenomsPatientNoi").css("border","2px solid red");
            valid = false ;
        }
        else {
            $("#prenomsPatientNoi").css("color","black");
            $("#prenomsPatientNoi").css("border","none");
        }

        if (!$("#nomPatientNoi").val().match(/^[a-zA-Zàáôûéèîï]+$/)){
            $("#nomPatientNoi").css("color","red");
            $("#nomPatientNoi").css("border","2px solid red");
            valid = false ;
        }
        else {
            $("#nomPatientNoi").css("color","black");
            $("#nomPatientNoi").css("border","none");
        }
                     
        text = $("#servDemande").val() ;
        if ( text == "0" ) {
            $("#servDemande").css("color","red");
            $("#servDemande").css("border","2px solid red");
            valid = false ;
        }
        else {
            $("#servDemande").css("color","black");
            $("#servDemande").css("border","none");
        }
                     
            return valid ;                
    }) ;
}) ; 
    