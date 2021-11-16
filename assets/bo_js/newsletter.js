var cbTous = document.getElementById("news_letter_select_0");
var cbVip = document.getElementById("news_letter_select_1");
var cbAmbassador = document.getElementById("news_letter_select_2");
var cbPlanningNewsletter = document.getElementById("news_letter_planning_newsletter");
var dtPlanningNewsleter = document.getElementById("news_letter_publishedAt");

var cbListeUser=document.getElementsByName('news_letter[send_list][]');  
var cbListVip=document.getElementsByClassName('vip');  
var cbListAmbassador=document.getElementsByClassName('ambassador');  

$(document).ready( function () {
    $('#contacts').DataTable({ 
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Tous"] ],
        scrollY: 300,
        pageLength: 50,
    });

    $('#contacts-update').DataTable({ 
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Tous"] ],
        scrollY: 300,
        pageLength: 50,
    });

    sendedContacts();
    initMailPlanning();
});


cbTous.addEventListener('change', function() {
  if (this.checked) {
      selectAll();
  } else {
      deselectAll();
  }
});

cbAmbassador.addEventListener('change', function() {
    if (this.checked) {
        selectAmbassador();
    } else {
        deselectAmbassador();
    }
  });

  cbVip.addEventListener('change', function() {
    if (this.checked) {
        selectVip();
    } else {
        deselectVip();
    }
  });

/* enabled or disabeled si le planning d'envoie est sélèctionné */
function initMailPlanning(){
    var oPlanning = $("#js-mail-planning").data("planning");
    if(oPlanning){
        enabledDtPlanning(false);
        cbPlanningNewsletter.checked = true;
    } else {
        enabledDtPlanning(true);
        cbPlanningNewsletter.checked = false;
    }
}

cbPlanningNewsletter.addEventListener('change', function() {
    if(cbPlanningNewsletter.checked){
        enabledDtPlanning(false);
    } else {
        enabledDtPlanning(true);
    }
});

function enabledDtPlanning (val){
    collection = dtPlanningNewsleter.children;

    for(element of collection) {
        collection2 = element.children;

        for($i = 0; $i < collection2.length; $i++ ) {
            collection2[$i].disabled = val;
        };
    };
}

function selectVip(){
    for(var i=0; i<cbListVip.length; i++){  
        if(cbListVip[i].type=='checkbox')  
        cbListVip[i].checked=true;  
    }
}

function deselectVip(){
    for(var i=0; i<cbListVip.length; i++){  
        if(cbListVip[i].type=='checkbox')  
        cbListVip[i].checked=false;  
    }
}

function selectAmbassador(){
    for(var i=0; i<cbListAmbassador.length; i++){  
        if(cbListAmbassador[i].type=='checkbox')  
            cbListAmbassador[i].checked=true;  
    }
}

function deselectAmbassador(){
    for(var i=0; i<cbListAmbassador.length; i++){  
        if(cbListAmbassador[i].type=='checkbox')  
            cbListAmbassador[i].checked=false;  
    }
}

function selectAll(){
    for(var i=0; i<cbListeUser.length; i++){  
        if(cbListeUser[i].type=='checkbox')  
            cbListeUser[i].checked=true;  
    }
}

function deselectAll(){
    for(var i=0; i<cbListeUser.length; i++){  
        if(cbListeUser[i].type=='checkbox')  
            cbListeUser[i].checked=false;  
    }

    if(cbVip.checked){
        selectVip();
    }
    if(cbAmbassador.checked){
        selectAmbassador();
    }
}

/* check les contacts sélectionner et masque les contacts ayant déjà reçu la newsletter */
function sendedContacts(){
    var aSendedContacts = $("#js-sended-contacts").data("contacts");
    if(aSendedContacts){
        aSendedContacts.noPublished.forEach(contactId => {
            Object.values(cbListeUser).find((obj) => {
                return obj.value == contactId;
            }).checked = true;
        });
        
        aSendedContacts.published.forEach(contactId => {
            Object.values(cbListeUser).find((obj) => {
                return obj.value == contactId;
            }).checked = true;
        });
    
        aSendedContacts.published.forEach(contactId => {
            input = Object.values(cbListeUser).find((obj) => {
                return obj.value == contactId;
            });
    
            if(input){
                input.checked = false;
                input.remove();
            }
        });
    }

}

/* enlève le resubmit lors d'un refresh */
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
