/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Controller {

    construct() {


    }

    static initevents() {

        let partes;
        let objlenguaje;

        Controller.iniciarcomun();
        objlenguaje = new Language();
        partes = location.pathname.trim().split("/");
        if (objlenguaje.getLangueList().indexOf(partes[partes.length - 1]) == -1) {

            if (partes[partes.length - 1] == "Calendar") {

                Controller.iniciarcalendario()
            }

        }

    }

    static iniciarcomun() {
        if (document.getElementById("slclenguaje") != null) {

            document.getElementById("slclenguaje").onchange = Controller.languagelist
        }
    }

    static iniciarcalendario() {

        let fecha;
        let calendario;


        fecha = new Date();

        if (document.getElementById("slcmes") != null) {

            document.getElementById("slcmes").options.selectedIndex = fecha.getMonth();
        }
        if (document.getElementById("slcanyo") != null) {

            document.getElementById("slcanyo").options.selectedIndex = fecha.getFullYear() - 1970;
        }
        if (document.getElementById("btnverdiasofertas") != null) {

            document.getElementById("btnverdiasofertas").onclick = Controller.calendarbutton
        }
        calendario = new Calendar(document.getElementById("calendario"), document.getElementById("oferta"));
        calendario.showCalendar(fecha.getMonth() + 1, fecha.getFullYear());
    }

    static languagelist() {

        location.href = this.value;
    }

    static calendarbutton() {

        let calendario;


        calendario = new Calendar(document.getElementById("calendario"), document.getElementById("oferta"));
        try {
            calendario.showCalendar(parseInt(document.getElementById("slcmes").value, 10), parseInt(document.getElementById("slcanyo").value, 10));



        } catch (e) {



        }



    }

    static calendarlinks() {

        let calendario;


        calendario = new Calendar(document.getElementById("calendario"), document.getElementById("oferta"));
        calendario.showDayOffers(this.getAttribute("data-fecha"));





    }

}


window.onload = Controller.initevents;
