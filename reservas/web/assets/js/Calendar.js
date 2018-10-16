class Calendar {

    constructor(calendarcontainer, offercontainer) {

        if ((calendarcontainer instanceof Element) == false) {

            throw new ArgumentValueNotValidException("el valor de calendarcontainer no es valido");
        } else if ((offercontainer instanceof Element == false)) {

            throw new ArgumentValueNotValidException("el valor de offercontainer no es valido");
        } else {

            this.calendarcontainer = calendarcontainer;
            this.offercontainer = offercontainer;
            this.ajaxobj = Ajax.createAjax();
        }
    }
    setCalendarcontainer(calendarcontainer) {

        if ((calendarcontainer instanceof Element) == false) {

            throw new ArgumentValueNotValidException("el valor de calendarcontainer no es valido");
        } else {
            this.calendarcontainer = calendarcontainer;
        }
    }

    getCalendarcontainer() {

        return this.calendarcontainer
    }

    setOffercontainer(offercontainer) {

        if ((offercontainer instanceof Element) == false) {

            throw new ArgumentValueNotValidException("el valor de offercontainer no es valido");
        } else {
            this.offercontainer = offercontainer;
        }
    }

    getOffercontainer() {

        return this.offercontainer;
    }

    showCalendar(month, year) {

        let fecha;
        let diasemana;
        let capa;
        let capa2;
        let tabla;
        let fila;
        let columna;
        let cabeceracuerpotabla;
        let enlace;
        let texto;
        let lenguaje
        let meses;
        let diasconoferta;


        if ((this.calendarcontainer instanceof Element) == false) {
            throw new ArgumentValueNotValidException("el valor de calendarcontainer no es valido");
        } else if ((this.offercontainer instanceof Element) == false) {
            throw new ArgumentValueNotValidException("el valor de offercontainer no es valido");
        } else if (typeof (month) != "number" || parseFloat(month) != parseInt(month, 10) || month < 1 || month > 12) {
            throw new ArgumentValueNotValidException("el valor de month no es valido");
        } else if (typeof (year) != "number" || parseFloat(year) != parseInt(year, 10) || year < 1970 || year > 9999) {
            throw new ArgumentValueNotValidException("el valor de year no es valido");
        } else {

            lenguaje = new Language();
            meses = new Array();
            meses[0] = lenguaje.getLangugeEntry("enero");
            meses[1] = lenguaje.getLangugeEntry("febrero");
            meses[2] = lenguaje.getLangugeEntry("marzo");
            meses[3] = lenguaje.getLangugeEntry("abril");
            meses[4] = lenguaje.getLangugeEntry("mayo");
            meses[5] = lenguaje.getLangugeEntry("junio");
            meses[6] = lenguaje.getLangugeEntry("julio");
            meses[7] = lenguaje.getLangugeEntry("agosto");
            meses[8] = lenguaje.getLangugeEntry("septiembre");
            meses[8] = lenguaje.getLangugeEntry("octubre");
            meses[10] = lenguaje.getLangugeEntry("noviembre");
            meses[11] = lenguaje.getLangugeEntry("diciembre");

            this.offercontainer.innerHTML = "";
            this.ajaxobj.calendarcontainer = this.calendarcontainer;
            this.calendarcontainer.innerHTML = "";
            fecha = new Date(year, month, 1);
            diasemana = fecha.getDay();
            if (diasemana == 0) {
                diasemana = 7;
            } else {
                diasemana++;
            }
            capa = document.createElement("div")

            cabeceracuerpotabla = document.createElement("h1");
            cabeceracuerpotabla.className = "bold";
            texto = document.createTextNode(meses[month - 1] + " - " + year);
            cabeceracuerpotabla.appendChild(texto);
            capa.appendChild(cabeceracuerpotabla);

            capa2 = document.createElement("div");
            tabla = document.createElement("table");
            tabla.setAttribute("border", "2");
            tabla.className = "table table-resposive";

            cabeceracuerpotabla = document.createElement("thead");
            fila = document.createElement("tr");
            columna = document.createElement("th");
            columna.className = "text-center";
            if (lenguaje.getLangugeEntry("lunes") != null) {

                texto = document.createTextNode(lenguaje.getLangugeEntry("lunes"));
            } else {
                texto = document.createTextNode("Lunes");
            }
            columna.appendChild(texto);
            fila.appendChild(columna);
            columna = document.createElement("th");
            columna.className = "text-center";
            if (lenguaje.getLangugeEntry("martes") != null) {

                texto = document.createTextNode(lenguaje.getLangugeEntry("martes"));
            } else {
                texto = document.createTextNode("Martes");
            }


            columna.appendChild(texto);
            fila.appendChild(columna);
            columna = document.createElement("th");
            columna.className = "text-center";
            if (lenguaje.getLangugeEntry("miercoles") != null) {

                texto = document.createTextNode(lenguaje.getLangugeEntry("miercoles"));
            } else {
                texto = document.createTextNode("Miercoles");
            }


            columna.appendChild(texto);
            fila.appendChild(columna);
            columna = document.createElement("th");
            columna.className = "text-center";
            if (lenguaje.getLangugeEntry("jueves") != null) {

                texto = document.createTextNode(lenguaje.getLangugeEntry("jueves"));
            } else {
                texto = document.createTextNode("Jueves");
            }


            columna.appendChild(texto);
            fila.appendChild(columna);
            columna = document.createElement("th");
            columna.className = "text-center";
            if (lenguaje.getLangugeEntry("viernes") != null) {

                texto = document.createTextNode(lenguaje.getLangugeEntry("viernes"));
            } else {
                texto = document.createTextNode("Viernes");
            }

            columna.appendChild(texto);
            fila.appendChild(columna);
            columna = document.createElement("th");
            columna.className = "text-center";
            if (lenguaje.getLangugeEntry("sabado") != null) {

                texto = document.createTextNode(lenguaje.getLangugeEntry("sabado"));
            } else {
                texto = document.createTextNode("Sabado");
            }
            columna.appendChild(texto);
            fila.appendChild(columna);
            columna = document.createElement("th");
            columna.className = "text-center";
            if (lenguaje.getLangugeEntry("domingo") != null) {

                texto = document.createTextNode(lenguaje.getLangugeEntry("domingo"));
            } else {
                texto = document.createTextNode("Domingo");
            }
            columna.appendChild(texto);
            fila.appendChild(columna);
            cabeceracuerpotabla.appendChild(fila);
            tabla.appendChild(cabeceracuerpotabla);
            cabeceracuerpotabla = document.createElement("tbody");
            fila = document.createElement("tr");

            for (let i = 1; i < diasemana; i++) {
                columna = document.createElement("td");
                columna.className = "text-center bg-white text-black";
                texto = document.createTextNode("");
                columna.appendChild(texto);
                fila.appendChild(columna);
            }
            columna = document.createElement("td");
            columna.id = "celdacalendario1"
            diasconoferta = this.getMothOfferDays(month, year)


            if (diasconoferta.indexOf(1) != -1) {


                columna.className = "text-center bg-danger text-white";
                enlace = document.createElement("a");
                enlace.setAttribute("href", "#");
                enlace.setAttribute("data-fecha", year + month + "-1");
                enlace.onclick = Controller.calendarlinks;
                texto = document.createTextNode("1");
                enlace.appendChild(texto);
                columna.appendChild(enlace);
            } else {
                columna.className = "text-center bfg-white text-black";
                texto = document.createTextNode("1");
                columna.appendChild(texto);
            }



            fila.appendChild(columna);
            if (diasemana == 7) {
                diasemana = 0;
                cabeceracuerpotabla.appendChild(fila);
            }
            fecha = new Date(year, month, 0)
            for (let i = 2; i <= fecha.getDate(); i++) {
                diasemana++;
                if (diasemana == 1) {
                    fila = document.createElement("tr");
                }

                columna = document.createElement("td");
                columna.id = "celdacalendario" + i


                if (diasconoferta.indexOf(i) != -1) {

                    columna.className = "text-center bg-danger text-white";
                    enlace = document.createElement("a");
                    enlace.setAttribute("href", "#");
                    enlace.setAttribute("data-fecha", year + "-" + month + "-" + i);
                    enlace.onclick = Controller.calendarlinks;
                    texto = document.createTextNode(i);
                    enlace.appendChild(texto);
                    columna.appendChild(enlace);
                } else {
                    columna.className = "text-center bfg-white text-black";
                    texto = document.createTextNode(i);
                    columna.appendChild(texto);
                }


                fila.appendChild(columna);
                if (diasemana == 7) {
                    diasemana = 0;
                    cabeceracuerpotabla.appendChild(fila);
                }


            }


            if (diasemana != 0 && diasemana < 7) {
                for (let i = diasemana; i < 7; i++) {
                    columna = document.createElement("td");
                    columna.className = "text-center bg-white text-black";
                    texto = document.createTextNode("");
                    columna.appendChild(texto);
                    fila.appendChild(columna);
                }
                diasemana = 0;
                cabeceracuerpotabla.appendChild(fila);
            }


            tabla.appendChild(cabeceracuerpotabla);
            capa2.appendChild(tabla);
            capa.appendChild(capa2);
            this.calendarcontainer.appendChild(capa);
        }
    }

    getMothOfferDays(month, year) {
        let ajaxurl;
        let cadenaenvio;
        let retval;

        retval = true;
        if (typeof (month) != "number" || parseFloat(month) != parseInt(month, 10) || month < 1 || month > 12) {
            throw new ArgumentValueNotValidException("el valor de month no es valido");
        } else if (typeof (year) != "number" || parseFloat(year) != parseInt(year, 10) || year < 1970 || year > 9999) {
            throw new ArgumentValueNotValidException("el valor de year no es valido");
        } else {

            ajaxurl = new AjaxURL();
            cadenaenvio = "month=" + escape(month) + "&year=" + escape(year);
            this.ajaxobj.open("POST", ajaxurl.daysWithOffer, false);
            this.ajaxobj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            this.ajaxobj.send(cadenaenvio); //pasar datos como parámetro
            cadenaenvio = this.ajaxobj.responseText;
            retval = JSON.parse(cadenaenvio);
        }

        return retval;
    }

    showDayOffers(datestring) {
        let lenguaje;
        let ajaxurl;
        let cadenaenvio;
        if ((this.calendarcontainer instanceof Element) == false) {
            throw new ArgumentValueNotValidException("el valor de calendarcontainer no es valido");
        } else if ((this.offercontainer instanceof Element) == false) {
            throw new ArgumentValueNotValidException("el valor de offercontainer no es valido");
        } else {
            lenguaje = new Language();
            ajaxurl = new AjaxURL();

            if (lenguaje.getLangugeEntry("cargando") != null) {

                this.offercontainer.innerHTML = lenguaje.getLangugeEntry("cargando");
            } else {
                this.offercontainer.innerHTML = "Cargando";


            }
            cadenaenvio = "fecha=" + datestring;
            this.ajaxobj.offercontainer = this.offercontainer;
            this.ajaxobj.open("POST", ajaxurl.offersDay, true);
            this.ajaxobj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            this.ajaxobj.onreadystatechange = function () {
                let cadenaenvio;
                let ofertas;
                let articulo;
                let articulo2;
                let etiqueta;
                let etiqueta2;
                let partes;
                let partes2;
                let partes3;
                let texto;





                if (this.readyState == 4) {
                    if (this.status == 200) {

                        cadenaenvio = this.responseText;
                        ofertas = JSON.parse(cadenaenvio);


                        if (ofertas.length >= 1) {
                            this.offercontainer.innerHTML = "";
                            articulo = null;
                            for (let i = 0; i < ofertas.length; i++) {


                                if (i % 3 == 0) {
                                    articulo = document.createElement("article");
                                    articulo.className = "container-fluid row";



                                }
                                articulo2 = document.createElement("article");
                                articulo2.className = "col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4";
                                etiqueta = document.createElement("header");
                                etiqueta2 = document.createElement("h2");
                                etiqueta2.className = "cabecerarecinto";
                                texto = document.createTextNode(ofertas[i].nombrerecinto);
                                etiqueta2.appendChild(texto);
                                etiqueta.appendChild(etiqueta2);

                                etiqueta2 = document.createElement("h3");
                                etiqueta2.className = "subcabecerarecinto";
                                texto = document.createTextNode(lenguaje.getLangugeEntry("por.solo") + " " + ofertas[i].precio + " " + lenguaje.getLangugeEntry("euros"));
                                etiqueta2.appendChild(texto);
                                etiqueta.appendChild(etiqueta2);
                                articulo2.appendChild(etiqueta);

                                if (ofertas[i].fotorecinto != null && ofertas[i].fotorecinto.trim() != "") {

                                    etiqueta = document.createElement("figure");
                                    etiqueta2 = document.createElement("img");
                                    etiqueta2.setAttribute("src", "/reservas/web/assets/images/" + ofertas[i].fotorecinto)
                                    etiqueta2.setAttribute("alt", ofertas[i].nombrerecinto);
                                    etiqueta2.className = "img-fluid";
                                    etiqueta.appendChild(etiqueta2);
                                    articulo2.appendChild(etiqueta);
                                }
                                etiqueta = document.createElement("p");
                                etiqueta.className = "fechaoferta";
                                partes = ofertas[i].fioferta.date.split(" ");
                                partes2 = partes[0].split("-");
                                partes2 = partes2.reverse();

                                partes = ofertas[i].ffoferta.date.split(" ");
                                partes3 = partes[0].split("-");
                                partes3 = partes3.reverse();

                                texto = document.createTextNode(lenguaje.getLangugeEntry("los.dias.del") + " " + partes2.join("-") + " - " + partes3.join("-"));
                                etiqueta.appendChild(texto);
                                articulo2.appendChild(etiqueta);


                                etiqueta = document.createElement("p");
                                etiqueta.className = "descripcionoferta";
                                texto = document.createTextNode(ofertas[i].descripcion);
                                etiqueta.appendChild(texto);
                                articulo2.appendChild(etiqueta);

                                etiqueta = document.createElement("p");
                                etiqueta2 = document.createElement("a");
                                etiqueta2.setAttribute("href", ajaxurl.reservation + "/" + ofertas[i].id);
                                etiqueta2.className = "btn btn-info enlacereserva";
                                texto = document.createTextNode(lenguaje.getLangugeEntry("reservar"));
                                etiqueta2.appendChild(texto);
                                etiqueta.appendChild(etiqueta2);
                                articulo2.appendChild(etiqueta);
                                articulo.appendChild(articulo2)

                                if (i % 3 == 2) {
                                    this.offercontainer.appendChild(articulo);
                                    articulo = null;
                                }



                            }
                            if (articulo != null) {
                                this.offercontainer.appendChild(articulo);
                                articulo = null;
                            }


                        } else {
                            if (lenguaje.getLangugeEntry("se.ha.producido.un.error") != null) {

                                this.offercontainer.innerHTML = lenguaje.getLangugeEntry("se.ha.producido.un.error");
                            } else {
                                this.offercontainer.innerHTML = "Se ha producido un error";


                            }
                        }
                    } else {

                        if (lenguaje.getLangugeEntry("se.ha.producido.un.error") != null) {

                            this.offercontainer.innerHTML = lenguaje.getLangugeEntry("se.ha.producido.un.error");
                        } else {
                            this.offercontainer.innerHTML = "Se ha producido un error";


                        }
                    }

                }

            };
            this.ajaxobj.send(cadenaenvio); //pasar datos como parámetro


        }

    }

}

