class Ajax {

    constructor() {


    }

    static createAjax() {

        var obj;
        if (window.XMLHttpRequest) {
            obj = new XMLHttpRequest();
        } else {
            obj = new ActiveXObject(Microsoft.XMLHTTP);
        }
        return obj;

    }

}
